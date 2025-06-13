<!DOCTYPE html>
<html>
<head>
    <title>Quản lý phòng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Quản lý phòng</h1>
        <a href="{{ route('rooms.create') }}" class="btn btn-primary mb-3">Thêm phòng</a>
        <form method="GET" action="{{ route('rooms.index') }}" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Tìm theo tên hoặc chuyên khoa" value="{{ $search }}">
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
                    <th>Tên phòng</th>
                    <th>Chuyên khoa</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rooms as $room)
                    <tr>
                        <td>{{ $room->id }}</td>
                        <td>{{ $room->room_name }}</td>
                        <td>{{ $room->specialty }}</td>
                        <td>
                            <a href="{{ route('rooms.show', $room) }}" class="btn btn-info btn-sm">Xem</a>
                            <a href="{{ route('rooms.edit', $room) }}" class="btn btn-warning btn-sm">Sửa</a>
                            <form action="{{ route('rooms.destroy', $room) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Xóa phòng này?')">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $rooms->links() }}
    </div>
</body>
</html>