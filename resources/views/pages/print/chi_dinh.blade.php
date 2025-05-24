<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Phiếu chỉ định</title>
    <style>
        body {
            font-family: DejaVu Sans, Arial, sans-serif;
            margin: 40px;
            color: #333;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo {
            height: 80px;
        }

        .title {
            font-size: 22px;
            font-weight: bold;
            margin-top: 10px;
        }

        .patient-info {
            margin-top: 30px;
            font-size: 16px;
        }

        .patient-info p {
            margin: 4px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 25px;
            font-size: 15px;
        }

        th, td {
            border: 1px solid #666;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .total {
            text-align: right;
            margin-top: 20px;
            font-size: 18px;
            font-weight: bold;
        }

        .footer {
            margin-top: 50px;
            text-align: right;
            font-size: 14px;
        }

        @media print {
            body {
                margin: 0;
            }
        }
    </style>
</head>
<body>
<div class="header">
    <img src="{{ asset('statics/images/logo-top.png') }}" class="logo" alt="Logo">
    <div class="title">PHIẾU CHỈ ĐỊNH XÉT NGHIỆM</div>
</div>
<div class="patient-info">
    <p><strong>Họ tên bệnh nhân:</strong> {{ $patient->full_name }}</p>
    <p><strong>Ngày sinh:</strong> {{ \Carbon\Carbon::parse($patient->birth_date)->format('d/m/Y') }}</p>
    <p><strong>Giới tính:</strong> {{ $patient->gender == 'male' ? 'Nam' : 'Nữ' }}</p>
    <p><strong>Mã bệnh nhân:</strong> {{ $patient->code }}</p>
</div>

<table>
    <thead>
    <tr>
        <th>STT</th>
        <th>Tên thủ thuật / xét nghiệm</th>
        <th>Bác sĩ chỉ định</th>
        <th>Trạng thái</th>
        <th>Giá (VNĐ)</th>
    </tr>
    </thead>
    <tbody>
    @php $total = 0; @endphp
    @foreach ($listTestOrder as $index => $item)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $item->testType->name }}</td>
            <td>{{ $item->doctor->name ?? '---' }}</td>
            <td>
                @switch($item->status)
                    @case('ordered') Chờ @break
                    @case('completed') Xong @break
                    @case('cancelled') Huỷ @break
                    @default ---
                @endswitch
            </td>
            <td>{{ number_format($item->testType->price, 0, ',', '.') }}</td>
        </tr>
        @php $total += $item->status == 'completed' ? $item->testType->price : 0; @endphp
    @endforeach
    </tbody>
</table>

<div class="total">
    Tổng tiền: {{ number_format($total, 0, ',', '.') }} VNĐ
</div>

<div class="footer">
    <p>Ngày in: {{ now()->format('d/m/Y H:i') }}</p>
</div>

<script>
    window.onload = function () {
        window.print();
    };
</script>
</body>
</html>
