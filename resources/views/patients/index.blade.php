<!DOCTYPE html>
<html>
<head>
    <title>Quản lý bệnh nhân</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Quản lý bệnh nhân</h1>
        <a href="{{ route('patients.create') }}" class="btn btn-primary mb-3">Thêm bệnh nhân</a>
        <form method="GET" action="{{ route('patients.index') }}" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Tìm theo họ tên hoặc số CCCD" value="{{ $search }}">
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
                    <th>Ngày sinh</th>
                    <th>Giới tính</th>
                    <th>Địa chỉ</th>
                    <th>Số CCCD</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($patients as $patient)
                    <tr>
                        <td>{{ $patient->id }}</td>
                        <td>{{ $patient->full_name }}</td>
                        <td>{{ $patient->date_of_birth }}</td>
                        <td>{{ $patient->gender }}</td>
                        <td>{{ $patient->address }}</td>
                        <td>{{ $patient->id_card }}</td>
                        <td>
                            <a href="{{ route('patients.show', $patient) }}" class="btn btn-info btn-sm">Xem</a>
                            <a href="{{ route('patients.edit', $patient) }}" class="btn btn-warning btn-sm">Sửa</a>
                            <form action="{{ route('patients.destroy', $patient) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Xóa bệnh nhân này?')">Xóa</button>
                            </form>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-patient-id="{{ $patient->id }}">
                                Chọn
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $patients->links() }}
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Chọn phòng</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('appointments.store') }}">
                        @csrf
                        <input type="hidden" name="patient_id" id="modalPatientId">
                        <div class="mb-3">
                            <label class="form-label">Chọn phòng</label>
                            <select name="room_id" class="form-control" required>
                                <option value="">Chọn</option>
                                @foreach ($rooms as $room)
                                    <option value="{{ $room->id }}">{{ $room->specialty }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Lưu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        var exampleModal = document.getElementById('exampleModal');
        exampleModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var patientId = button.getAttribute('data-patient-id');
            var inputPatientId = exampleModal.querySelector('#modalPatientId');
            inputPatientId.value = patientId;
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>