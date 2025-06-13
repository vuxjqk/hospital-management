<!DOCTYPE html>
<html>
<head>
    <title>Số thứ tự</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Số thứ tự</h1>
        <div class="card">
            <div class="card-body">
                <p><strong>STT:</strong> {{ $appointment->number }}</p>
                <p><strong>Bệnh nhân:</strong> {{ $appointment->patient->full_name }}</p>
                <p><strong>Phòng:</strong> {{ $appointment->room->room_name }}</p>
            </div>
        </div>
        <a href="{{ route('patients.index') }}" class="btn btn-secondary mt-3">Quay lại</a>
    </div>
</body>
</html>