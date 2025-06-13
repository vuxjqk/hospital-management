<!DOCTYPE html>
<html>
<head>
    <title>Chi tiết bác sĩ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Chi tiết bác sĩ</h1>
        <div class="card">
            <div class="card-body">
                <p><strong>ID:</strong> {{ $doctor->id }}</p>
                <p><strong>Họ tên:</strong> {{ $doctor->full_name }}</p>
                <p><strong>Phòng:</strong> {{ $doctor->room->specialty }}</p>
                <p><strong>Vai trò:</strong> {{ $doctor->role }}</p>
            </div>
        </div>
        <a href="{{ route('doctors.index') }}" class="btn btn-secondary mt-3">Quay lại</a>
    </div>
</body>
</html>