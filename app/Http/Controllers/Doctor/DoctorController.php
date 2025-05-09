<?php

namespace App\Http\Controllers\Doctor;

use App\Models\ChuyenKhoa;
use App\Models\DoctorSchedule;
use App\Models\ProfileDoctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class DoctorController
{
    public function index()
    {
        return view('pages/doctor/dashboard');
    }

    public function update()
    {
        $chuyenKhoa = ChuyenKhoa::query()->get();
        $profileDoctor = ProfileDoctor::query()->where('user_id', Auth::id())->first();
        return view('pages/doctor/update_profile', compact('chuyenKhoa', 'profileDoctor'));
    }

    public function updateProfile(Request $request): \Illuminate\Http\RedirectResponse
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->back()->withErrors(['error' => 'Không xác định được người dùng']);
        }

        $imageFile = $request->file('image');
        if ($imageFile) {

            if ($imageFile->getError()) {
                return redirect()->back()->withErrors(['error' => 'Lỗi tải lên tệp, vui lòng kiểm tra lại.']);
            }
        }

        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email,' . $user->id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:9216',
        ]);


        if ($request->hasFile('image')) {
            // Xóa ảnh cũ nếu có
            if ($user->image) {
                Storage::delete('public/' . $user->image);
            }

            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/uploads/users', $imageName);

            $validated['image'] = 'uploads/users/' . $imageName;
        }

        $dataProfile = [
            'user_id'            => $user->id,
            'chuyen_khoa_id'     => $request->get('chuyen_khoa'),
            'phone'              => $request->get('phone'),
            'bio'                => $request->get('kinh_nghiem'),
            'gioi_thieu_chung'   => $request->get('gioi_thieu_chung'),
            'hoc_van'            => $request->get('hoc_van'),
            'qua_trinh_cong_tac' => $request->get('qua_trinh_cong_tac'),
        ];

        DB::beginTransaction();
        try {
            $user->update($validated);

            $checkProfileExist = ProfileDoctor::query()->where('user_id', $user->id)->first();
            if (!$checkProfileExist) {
                ProfileDoctor::query()->create($dataProfile);
            } else {
                $checkProfileExist->update($dataProfile);
            }

            DB::commit();
            return redirect()->route('doctor-dashboard')->with('success', 'Cập nhật hồ sơ thành công!');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function scheduleList()
    {
        $schedules = DoctorSchedule::query()->where('doctor_id', Auth::id())
                                   ->orderByRaw("FIELD(day_of_week, 'Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday')")
                                   ->orderBy('start_time')
                                   ->get();

        return view('pages/doctor/schedule', compact('schedules'));
    }

    public function doctorScheduleStore(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'day_of_week' => 'required|in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday',
            'start_time'  => 'required|date_format:H:i',
            'end_time'    => 'required|date_format:H:i|after:start_time',
        ]);

        $doctorId = Auth::id();

        DoctorSchedule::query()->create([
            'doctor_id'   => $doctorId,
            'day_of_week' => $request->day_of_week,
            'start_time'  => now()->format('Y-m-d') . ' ' . $request->start_time,
            'end_time'    => now()->format('Y-m-d') . ' ' . $request->end_time,
            'status'      => 'active',
        ]);

        return redirect()->back()->with('success', 'Đã lưu ca làm việc thành công.');
    }

    public function editScheduleDoctor($id)
    {
        $schedule = DoctorSchedule::query()->where('id', $id)
                                  ->where('doctor_id', Auth::id())
                                  ->firstOrFail();

        return view('pages/doctor/update_schedule_doctor', compact('schedule'));
    }

    public function updateScheduleDoctor(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'day_of_week' => 'required',
            'start_time'  => 'required|date_format:H:i',
            'end_time'    => 'required|date_format:H:i|after:start_time',
            'status'      => 'required|in:active,inactive',
        ]);

        $schedule = DoctorSchedule::query()->where('id', $id)
                                  ->where('doctor_id', Auth::id())
                                  ->firstOrFail();

        $schedule->update([
            'day_of_week' => $request->day_of_week,
            'start_time'  => now()->setTimeFromTimeString($request->start_time),
            'end_time'    => now()->setTimeFromTimeString($request->end_time),
            'status'      => $request->status,
        ]);

        return redirect()->route('doctor-schedule-view')->with('success', 'Đã cập nhật ca làm việc');
    }

    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        $schedule = DoctorSchedule::query()->where('id', $id)
                                  ->where('doctor_id', Auth::id())
                                  ->firstOrFail();

        $schedule->delete();

        return back()->with('success', 'Đã xoá ca làm việc');
    }

}
