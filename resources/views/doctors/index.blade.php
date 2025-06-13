<!DOCTYPE html>
<html>
<head>
    <title>Quản lý bác sĩ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Quản lý bác sĩ</h1>
        <a href="{{ route('doctors.create') }}" class="btn btn-primary mb-3">Thêm bác sĩ</a>
        <form method="GET" action="{{ route('doctors.index') }}" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Tìm theo họ tên" value="{{ $search }}">
                <button type="submit" class="btn btn-secondary">Tìm kiếm</button>
            </div>
        </form>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Họ và tên</th>
                    <th>Phòng</th>
                    <th>Vai trò</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($doctors as $doctor)
                    <tr>
                        <td>{{ $doctor->id }}</td>
                        <td>{{ $doctor->full_name }}</td>
                        <td>{{ $doctor->room->specialty }}</td>
                        <td>{{ $doctor->role }}</td>
                        <td>
                            <a href="{{ route('doctors.show', $doctor) }}" class="btn btn-info btn-sm">Xem</a>
                            <a href="{{ route('doctors.edit', $doctor) }}" class="btn btn-warning btn-sm">Sửa</a>
                            <form action="{{ route('doctors.destroy', $doctor) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Xóa bác sĩ này?')">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $doctors->links() }}
    </div>
</body>
</html>