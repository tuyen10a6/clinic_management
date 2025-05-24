<?php

namespace App\Http\Controllers\Admin;

use App\Mail\CustomerAdviceNotification;
use App\Models\CustomerAdvice;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CustomerAdviceController
{
    public function index(Request $request)
    {
        $query = CustomerAdvice::query();

        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        if ($request->filled('phone')) {
            $query->where('phone', 'like', '%' . $request->phone . '%');
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $data = $query->latest()->get();

        return view('pages.admin.customer_advice.index', compact('data'));
    }


    public function create()
    {
        return view('pages.admin.customer_advice.create');
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'name'  => 'required',
            'phone' => 'required',
            'note'  => 'nullable',
            'email' => 'nullable'
        ]);

        $data = $request->only(['name', 'phone', 'note', 'email']);

        CustomerAdvice::query()->create($data);

        if ($request->get('email') && $request->get('email') != null) {
            Mail::to($data['email'])->send(new CustomerAdviceNotification($data));
        }
        return redirect()->back()->with('success', 'Tạo yêu cầu thành công');
    }

    public function edit($id)
    {
        $doctors = User::query()->where('permission', 'doctor')->get();
        $advice = CustomerAdvice::query()->findOrFail($id);
        return view('pages.admin.customer_advice.edit', compact('advice', 'doctors'));
    }

    public function update(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        $advice = CustomerAdvice::query()->findOrFail($id);
        $advice->update($request->only([
            'name',
            'phone',
            'note',
            'status',
            'doctor_id',
            'note_doctor',
            'date'
        ]));

        return redirect()->route('admin.customer-advice.index')->with('success', 'Cập nhật thành công');
    }

    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        CustomerAdvice::destroy($id);
        return redirect()->back()->with('success', 'Xoá thành công');
    }
}
