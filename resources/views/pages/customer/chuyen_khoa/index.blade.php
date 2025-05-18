@extends('layouts.customer.master')

@section('content')
    <div class="container py-5">
        <h2 class="mb-5 text-center">{{$chuyenKhoaFrist->ten_chuyen_khoa}}</h2>
        <div class="row justify-content-center">
            @foreach ($chuyenKhoaFrist->profileDoctor as $profile)
                <div class="col-md-4 text-center mb-4">
                    <a href="{{route('doctor.show', $profile->user_id)}}">
                        <div class="p-3 border rounded shadow-sm h-100">
                            <div class="mb-3">
                                <img src="{{ asset('storage/' . $profile->userDoctor->image) }}"
                                     alt="{{ $profile->userDoctor->name }}"
                                     class="rounded-circle"
                                     style="width: 120px; height: 120px; object-fit: cover;">
                            </div>
                            <h5 class="fw-bold mb-1">
                                {{ $profile->userDoctor->name }}
                            </h5>
                            <div class="text-muted">
                                {{ $chuyenKhoaFrist->ten_chuyen_khoa ?? 'Bác sĩ chuyên khoa' }}
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
                <div style="margin: 20px 0;">
                    <h2 style="font-size: 24px; font-weight: bold;">Giới thiệu chung</h2>

                    <div style="border: 1px solid #cbd5e1; border-radius: 6px; padding: 16px;">
                        {!! $chuyenKhoaFrist->gioi_thieu_chung !!}
                    </div>
                </div>

        </div>
    </div>
@endsection
