<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đơn thuốc - {{ $prescription->patient->full_name ?? 'Bệnh nhân' }}</title>
    <style>
        body {
            font-family: DejaVu Sans, Arial, sans-serif;
            margin: 40px;
        }

        h2 {
            text-align: center;
        }

        .info, .footer {
            margin-bottom: 20px;
        }

        .info table {
            width: 100%;
        }

        .info td {
            padding: 5px;
        }

        table.medicine-table {
            width: 100%;
            border-collapse: collapse;
        }

        .medicine-table th, .medicine-table td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }

        @media print {
            .no-print {
                display: none;
            }
        }

        .footer {
            margin-top: 40px;
        }

        .signature {
            text-align: right;
        }
    </style>
</head>
<body>

<div class="header">
    <img src="{{ asset('statics/images/logo-top.png') }}" class="logo" alt="Logo">
</div>

<h2>ĐƠN THUỐC</h2>

<div class="info">
    <table>
        <tr>
            <td><strong>Bệnh nhân:</strong> {{ $prescription->patient->full_name ?? 'N/A' }}</td>
            <td><strong>Ngày kê:</strong> {{ $prescription->created_at->format('d/m/Y') }}</td>
        </tr>
        <tr>
            <td><strong>Bác sĩ:</strong> {{ $prescription->doctor->name ?? 'N/A' }}</td>
            <td><strong>Mã đơn thuốc:</strong> #{{ $prescription->id }}</td>
        </tr>
    </table>
</div>

<table class="medicine-table">
    <thead>
    <tr>
        <th>#</th>
        <th>Tên thuốc</th>
        <th>Liều dùng</th>
        <th>Thời gian</th>
        <th>Ghi chú</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($prescription->medicines as $index => $item)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $item->medicine->name ?? 'Đã xóa' }}</td>
            <td>{{ $item->dosage }}</td>
            <td>{{ $item->duration }}</td>
            <td>{{ $item->instructions }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

<div class="footer">
    <p class="signature">Bác sĩ ký tên: ______________________</p>
</div>
<script>
    window.onload = function () {
        window.print();
    };
</script>
</body>
</html>
