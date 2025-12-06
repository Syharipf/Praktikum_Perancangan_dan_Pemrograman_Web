<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #fff; }
        .task-card { margin-bottom: 10px; }
        .badge-pending { background-color: #ffc107; color: #000; } /* Warna kuning */
        .badge-completed { background-color: #198754; color: #fff; } /* Warna hijau */
    </style>
</head>
<body>

<div class="container mt-5">
    
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0">Selamat Datang, admin</h4>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="btn btn-danger">Logout</button>
        </form>
    </div>

    <h2 class="text-center mb-4">To Do List I am</h2>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card mb-4 shadow-sm">
        <div class="card-header bg-light">
            <h5 class="mb-0">Add New Task</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('tasks.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Task Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Masukkan nama task" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" name="description" rows="3" placeholder="Masukkan deskripsi task"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Add Task</button>
            </form>
        </div>
    </div>

    <div class="list-group">
        @forelse($tasks as $task)
            <div class="list-group-item d-flex justify-content-between align-items-center mb-2 border rounded shadow-sm">
                
                <div class="ms-2 me-auto">
                    <div class="fw-bold">{{ $task->name }}</div>
                    <small class="text-muted">{{ $task->description }}</small>
                </div>

                <div class="d-flex align-items-center gap-2">
                    @if($task->status == 'completed')
                        <span class="badge badge-completed rounded-pill">Completed</span>
                    @else
                        <span class="badge badge-pending rounded-pill">Pending</span>
                    @endif

                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" onsubmit="return confirm('Yakin hapus task ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                    
                    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-sm text-white">Edit</a>
                </div>
            </div>
        @empty
            <div class="alert alert-info text-center" role="alert">
                No task available
            </div>
        @endforelse
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>