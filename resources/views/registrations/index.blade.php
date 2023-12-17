@extends('layouts.main')

@section('content')
    <div class="mt-2 mb-4">
        <h2>Mahasiswa Baru</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Mahasiswa Baru</li>
            </ol>
        </nav>
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
                        <th>Nama Lengkap</th>
                        <th>No HP</th>
                        <th>Kewarganegaraan</th>
                        <th>Jenis Kelamin</th>
                        <th>Status Pendaftaran</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($registrations as $registration)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $registration->fullname }}</td>
                            <td>{{ $registration->phone_no }}</td>
                            <td>{{ $registration->citizenship }}</td>
                            <td>{{ $registration->gender }}</td>
                            <td>
                                @if ($registration->registration_status === 'Waiting')
                                <span class="badge text-bg-primary">
                                    Waiting
                                </span>
                                @elseif ($registration->registration_status === 'Approved')
                                <span class="badge text-bg-success">
                                    Approved
                                </span>
                                @else
                                <span class="badge text-bg-danger">
                                    Rejected
                                </span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('registrations.show', $registration->user_id) }}" class="btn badge text-bg-secondary">Lihat</a>
                                <button type="button" class="btn badge text-bg-danger" data-bs-toggle="modal" data-bs-target="#delete-modal" onclick="bindingDelete('{{ $registration->user_id }}')">Hapus</button>
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
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Hapus Registrasi</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="POST" id="delete-form">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body px-4 pb-4 pt-3">
                        <div class="mb-3 text-center">
                            <svg class="mb-3" xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-exclamation-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
                            </svg>
                            <span class="fs-4 d-block">Apakah anda yakin ingin menghapus data registrasi ini?</span>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary w-full">Yes</button>
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
            $('#delete-form').attr('action', `{{ url('registrations') }}/${id}`)
        }
    </script>
@endpush