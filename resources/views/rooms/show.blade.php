<!DOCTYPE html>
<html>
<head>
    <title>Chi tiết phòng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Chi tiết phòng</h1>
        <div class="card">
            <div class="card-body">
                <p><strong>ID:</strong> {{ $room->id }}</p>
                <p><strong>Họ tên:</strong> {{ $room->room_name }}</p>
                <p><strong>Ngày sinh:</strong> {{ $room->specialty }}</p>
            </div>
        </div>
        <a href="{{ route('rooms.index') }}" class="btn btn-secondary mt-3">Quay lại</a>
    </div>
</body>
</html>