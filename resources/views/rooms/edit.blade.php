<!DOCTYPE html>
<html>
<head>
    <title>Sửa phòng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Sửa phòng</h1>
        <form method="POST" action="{{ route('rooms.update', $room) }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Tên phòng</label>
                <input type="text" name="room_name" class="form-control" value="{{ $room->room_name }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Chuyên khoa</label>
                <input type="text" name="specialty" class="form-control" value="{{ $room->specialty }}">
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
            <a href="{{ route('rooms.index') }}" class="btn btn-secondary">Hủy</a>
        </form>
    </div>
</body>
</html>