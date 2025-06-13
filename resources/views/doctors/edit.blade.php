<!DOCTYPE html>
<html>
<head>
    <title>Sửa bác sĩ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Sửa bác sĩ</h1>
        <form method="POST" action="{{ route('doctors.update', $doctor) }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Họ tên</label>
                <input type="text" name="full_name" class="form-control" value="{{ $doctor->full_name }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Phòng</label>
                <select name="room_id" class="form-control">
                    <option value="">Chọn</option>
                    @foreach ($rooms as $room)
                        <option value="{{ $room->id }}" 
                            {{ $room->id == $doctor->room_id ? 'selected' : '' }}>
                            {{ $room->specialty }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Vai trò</label>
                <input type="text" name="role" class="form-control"  value="{{ $doctor->role }}" require>
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
            <a href="{{ route('doctors.index') }}" class="btn btn-secondary">Hủy</a>
        </form>
    </div>
</body>
</html>