@extends('layouts.doctor.master')

@section('content')
    <div class="nk-content-body">
        <div class="nk-block-head">
            <div class="nk-block-head-content">
                <h4 class="nk-block-title">Thêm đơn thuốc</h4>
            </div>
        </div>
        <form action="{{route('doctor.ke-don-thuoc.store')}}" method="POST">
            @csrf
            <div class="card">
                <div class="card-inner">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label class="form-label">Bác sĩ</label>
                            <select name="doctor_id" class="form-select js-select2" required>
                                <option value="">-- Chọn bác sĩ --</option>
                                @foreach ($doctors as $doctor)
                                    <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Bệnh nhân</label>
                            <select name="patient_id" class="form-select js-select2" required>
                                <option value="">-- Chọn bệnh nhân --</option>
                                @foreach ($patients as $patient)
                                    <option value="{{ $patient->id }}">{{ $patient->full_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Ngày kê</label>
                            <input type="date" name="prescribed_date" class="form-control" value="{{ date('Y-m-d') }}" required>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label">Ghi chú</label>
                            <textarea name="note" class="form-control" rows="2"></textarea>
                        </div>

                        <div class="col-md-12 mt-4">
                            <h5>Thuốc kê</h5>
                            <table class="table table-bordered" id="medicine-table">
                                <thead>
                                <tr>
                                    <th>Thuốc</th>
                                    <th>Liều dùng</th>
                                    <th>Số ngày</th>
                                    <th>Hướng dẫn</th>
                                    <th><button type="button" class="btn btn-sm btn-success" id="add-row">+</button></th>
                                </tr>
                                </thead>
                                <tbody class="dad-full-item">
                                <tr class="child-item">
                                    <td>
                                        <select name="medicines[0][medicine_id]" class="form-select js-select2" required>
                                            <option value="">-- Chọn thuốc --</option>
                                            @foreach ($medicines as $medicine)
                                                <option value="{{ $medicine->id }}">{{ $medicine->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td><input type="text" name="medicines[0][dosage]" class="form-control" required></td>
                                    <td><input type="text" name="medicines[0][duration]" class="form-control" required></td>
                                    <td><input type="text" name="medicines[0][instructions]" class="form-control"></td>
                                    <td><button type="button" class="btn btn-sm btn-danger remove-row">x</button></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Lưu đơn thuốc</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('script')
    <script src="{{asset('vendor/assets/js/ke-don-thuoc.js')}}"></script>
@endsection
