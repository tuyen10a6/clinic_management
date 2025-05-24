<?php

namespace App\Http\Controllers\Doctor;


use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;

class DoctorNotificationController
{
    public function index()
    {
        $userId = auth()->id();

        $sentNotifications = Notification::query()->where('user_send', $userId)
                                         ->with('receiver')
                                         ->orderByDesc('created_at')
                                         ->get();

        $receivedNotifications = Notification::query()->where('user_receiver', $userId)
                                             ->with('sender')
                                             ->orderByDesc('created_at')
                                             ->get();

        return view('pages/doctor/notification_index', compact('sentNotifications', 'receivedNotifications'));
    }

    public function create()
    {
        $admins = User::query()->where('permission', 'manager')->get();

        return view('pages/doctor/notification_create', compact('admins'));
    }

    public function send(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'user_receiver' => 'required|exists:users,id',
            'title'         => 'required|string|max:255',
            'content'       => 'required|string',
        ]);

        Notification::query()->create([
            'title'                => $request->get('title'),
            'content'              => $request->get('content'),
            'user_send'            => auth()->id(),
            'user_receiver'        => $request->get('user_receiver'),
            'user_send_permission' => 'doctor',
        ]);

        return redirect()->route('doctor.notification.index')->with('success', 'Đã gửi thông báo thành công.');
    }
}
