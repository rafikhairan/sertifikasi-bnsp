@extends('layouts.main')

@section('content')
    <div class="d-flex justify-content-between align-items-center mt-2 mb-3">
        <div>
            <h3>Users</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Users</li>
                </ol>
            </nav>
        </div>
        <a class="btn btn-primary" href="{{ route('users.create') }}">
            Tambah
        </a>
    </div>
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <table class="table" id="table">
                <thead>
                    <tr>
                        <td>No</td>
                        <th>Email</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->is_active ? 'Active' : 'Not active' }}</td>
                            <td>
                                <div class="d-flex">
                                    @if (!$user->is_active)
                                    <button type="button" class="btn badge text-bg-primary" data-bs-toggle="modal" data-bs-target="#activate-modal" onclick="bindingActivate({{ $user->id }})">Activate</button>
                                    @endif
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn badge text-bg-secondary text-decoration-none ms-1">Edit</a>
                                    <button type="button" class="btn badge text-bg-danger ms-1" data-bs-toggle="modal" data-bs-target="#delete-modal" onclick="bindingDelete('{{ $user->id }}')">Hapus</button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>  
    </div>

    <div class="modal fade" id="delete-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Hapus User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post" id="delete-form">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body px-4 pb-4 pt-3">
                        <div class="mb-3 text-center">
                            <svg class="mb-3" xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-exclamation-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
                            </svg>
                            <span class="fs-4 d-block">Apakah anda yakin akan menghapus user ini?</span>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Yes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="activate-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Activate User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post" id="activate-form">
                    @csrf
                    @method('PUT')
                    <div class="modal-body px-4 pb-4 pt-3">
                        <div class="mb-3 text-center">
                            <svg class="mb-3" xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-exclamation-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
                            </svg>
                            <span class="fs-4 d-block">Are you sure you want to activate this user?</span>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Yes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        const table = new DataTable('#table')

        function bindingDelete(id) {
            $('#delete-form').attr('action', `{{ url('users') }}/${id}`)
        }

        function bindingActivate(id) {
            $('#activate-form').attr('action', `{{ url('users') }}/${id}/activate`)
        }
    </script>
@endpush