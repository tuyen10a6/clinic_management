@extends('layouts.admin.master')

@section('content')
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">📬 Quản lý thông báo</h4>
            <a href="{{route('admin.notification.create')}}" class="btn btn-primary">
                📨 Gửi thông báo cho bác sĩ
            </a>
        </div>


        {{-- Tab Nav --}}
        <ul class="nav nav-tabs" id="notificationTabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="sent-tab" data-bs-toggle="tab" href="#sent" role="tab">✅ Đã gửi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="received-tab" data-bs-toggle="tab" href="#received" role="tab">📩 Đã nhận</a>
            </li>
        </ul>

        {{-- Tab Content --}}
        <div class="tab-content mt-3" id="notificationTabsContent">
            {{-- Tab: Đã gửi --}}
            <div class="tab-pane fade show active" id="sent" role="tabpanel">
                <table class="table table-bordered">
                    <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Tiêu đề</th>
                        <th>Nội dung</th>
                        <th>Người nhận</th>
                        <th>Thời gian</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($sentNotifications as $notification)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $notification->title }}</td>
                            <td class="w-300px">{{ $notification->content }}</td>
                            <td>{{ $notification->receiver->name ?? '-' }}</td>
                            <td>{{ $notification->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="text-center">Không có thông báo đã gửi.</td></tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Tab: Đã nhận --}}
            <div class="tab-pane fade" id="received" role="tabpanel">
                <table class="table table-bordered">
                    <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Tiêu đề</th>
                        <th>Người gửi</th>
                        <th>Quyền người gửi</th>
                        <th>Thời gian</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($receivedNotifications as $notification)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $notification->title }}</td>
                            <td>{{ $notification->sender->name ?? '-' }}</td>
                            <td>{{ $notification->user_send_permission }}</td>
                            <td>{{ $notification->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="text-center">Không có thông báo nhận được.</td></tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
