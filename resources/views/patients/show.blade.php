<!DOCTYPE html>
<html>
<head>
    <title>Chi tiết bệnh nhân</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Chi tiết bệnh nhân</h1>
        <div class="card">
            <div class="card-body">
                <p><strong>ID:</strong> {{ $patient->id }}</p>
                <p><strong>Họ tên:</strong> {{ $patient->full_name }}</p>
                <p><strong>Ngày sinh:</strong> {{ $patient->date_of_birth }}</p>
                <p><strong>Giới tính:</strong> {{ $patient->gender }}</p>
                <p><strong>Địa chỉ:</strong> {{ $patient->address }}</p>
                <p><strong>Số CCCD:</strong> {{ $patient->id_card }}</p>
            </div>
        </div>
        <a href="{{ route('patients.index') }}" class="btn btn-secondary mt-3">Quay lại</a>
    </div>
</body>
</html>