<!DOCTYPE html>
<html>
<head>
    <title>Thêm bác sĩ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Thêm bác sĩ</h1>
        <form method="POST" action="{{ route('doctors.store') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">Họ tên</label>
                <input type="text" name="full_name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Phòng</label>
                <select name="room_id" class="form-control" require>
                    <option value="">Chọn</option>
                    @foreach ($rooms as $room)
                        <option value="{{ $room->id }}">{{ $room->specialty }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Vai trò</label>
                <input type="text" name="role" class="form-control" require>
            </div>
            <button type="submit" class="btn btn-primary">Lưu</button>
            <a href="{{ route('doctors.index') }}" class="btn btn-secondary">Hủy</a>
        </form>
    </div>
</body>
</html>