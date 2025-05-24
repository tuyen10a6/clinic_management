<?php

namespace App\Http\Controllers\Admin;


use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;

class NotificationController
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

        return view('pages/admin/notification/index', compact('sentNotifications', 'receivedNotifications'));
    }

    public function create()
    {
        $doctors = User::query()->where('permission', 'doctor')->get();

        return view('pages/admin/notification/create', compact('doctors'));
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
            'user_send_permission' => 'admin',
        ]);

        return redirect()->route('admin.notification.index')->with('success', 'Đã gửi thông báo thành công.');
    }
}
