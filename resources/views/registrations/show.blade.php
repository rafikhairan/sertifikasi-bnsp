@extends('layouts.main')

@section('content')
<div class="mt-2 mb-4">
  <h3>
    Data Mahasiswa Baru
    <span class="ms-2 badge {{ $registration->registration_status === 'Waiting' ? 'text-bg-primary' : ($registration->registration_status === 'Approved' ? 'text-bg-success' : 'text-bg-danger') }}">{{ $registration->registration_status }}</span>
  </h3>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Data Mahasiswa Baru</li>
    </ol>
  </nav>
</div>
@if (session()->has('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif
@if (session()->has('error'))
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
    {{ session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif
<div class="row">
  <div class="col-9">
    <div class="mb-3">
      <label for="fullname" class="form-label fw-medium">Name Lengkap</label>
      <input type="text" class="form-control" id="fullname" name="fullname" value="{{ $registration->fullname }}" readonly>
    </div>
    <div class="mb-3">
      <label for="ktp-address" class="form-label fw-medium">Alamat KTP</label>
      <textarea class="form-control" id="ktp-address" name="ktp_address" rows="3" readonly>{{ $registration->ktp_address }}</textarea>
    </div>
    <div class="mb-3">
      <label for="now-address" class="form-label fw-medium">Alamat Lengkap Saat Ini</label>
      <textarea class="form-control" id="now-address" name="now_address" rows="3" readonly>{{ $registration->now_address }}</textarea>
    </div>
    <div class="row">
      <div class="col-6 mb-3">
        <label for="province" class="form-label fw-medium">Provinsi</label>
        <input type="text" class="form-control" id="province" name="province" value="{{ $registration->province->province_name }}" readonly>
      </div>
      <div class="col-6 mb-3">
        <label for="regency" class="form-label fw-medium">Kabupaten</label>
        <input type="text" class="form-control" id="regency" name="regency" value="{{ $registration->regency->regency_name }}" readonly>
      </div>
      <div class="col-6 mb-3">
        <label for="district" class="form-label fw-medium">Kecamatan</label>
        <input type="text"" class="form-control" id="district" name="district" value="{{ $registration->district->district_name }}" readonly>
      </div>
    </div>
    <div class="row">
      <div class="col-6 mb-3">
        <label for="tel-no" class="form-label fw-medium">Nomor Telepon</label>
        <input type="tel" class="form-control" id="tel-no" name="tel_no" value="{{ $registration->tel_no }}" readonly>
      </div>
      <div class="col-6 mb-3">
        <label for="phone-no" class="form-label fw-medium">Nomor HP</label>
        <input type="tel" class="form-control" id="phone-no" name="phone_no" value="{{ $registration->phone_no }}" readonly>
      </div>
      <div class="col-6 mb-3">
        <label for="email" class="form-label fw-medium">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ $registration->email }}" readonly>
      </div>
    </div>
    <div class="row">
      <div class="col-6 mb-3">
        <label for="citizenship" class="form-label fw-medium">Kewarganegaraan</label>
        <input type="text" class="form-control" id="citizenship" name="citizenship" value="{{ $registration->citizenship }}" readonly>
      </div>
      <div class="col-6 mb-3">
        <label for="birth_date" class="form-label fw-medium">Tanggal Lahir</label>
        <input type="text" class="form-control" id="birth_date" name="birth_date" value="{{ Carbon\Carbon::parse($registration->birth_date)->format('d F Y') }}" readonly>
      </div>
      @if ($registration->birth_country_code !== null)
      <div class="col-6 mb-3">
        <label for="birth-country" class="form-label fw-medium">Negara Kelahiran</label>
        <input type="text" class="form-control" id="birth-country" name="birth-country" value="{{ $registration->country->country_name }}" readonly>
      </div>
      @else
      <div class="col-6 mb-3">
        <label for="birth-province" class="form-label fw-medium">Provinsi Kelahiran</label>
        <input type="text" class="form-control" id="birth-province" name="birth-province" value="{{ $registration->province->province_name }}" readonly>
      </div>
      <div class="col-6 mb-3">
        <label for="birth-regency" class="form-label fw-medium">Kabupaten Kelahiran</label>
        <input type="text" class="form-control" id="birth-regency" name="birth-regency" value="{{ $registration->regency->regency_name }}" readonly>
      </div>
      @endif
      <div class="col-6 mb-3">
        <label for="gender" class="form-label fw-medium">Jenis Kelamin</label>
        <input type="text" class="form-control" id="gender" name="gender" value="{{ $registration->gender }}" readonly>
      </div>
      <div class="col-6 mb-3">
        <label for="married-status" class="form-label fw-medium">Status Menikah</label>
        <input type="text" class="form-control" id="married-status" name="married-status" value="{{ $registration->married_status }}" readonly>
      </div>
      <div class="col-6 mb-4">
        <label for="religion" class="form-label fw-medium">Agama</label>
        <input type="text" class="form-control" id="religion" name="religion" value="{{ $registration->religion }}" readonly>
      </div>
    </div>
    <div class="row mb-3">
      @if ($registration->registration_status === 'Waiting' && auth()->user()->is_admin)
      <div class="col-6">
        <div class="d-grid">
          <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#approve-modal">Approve</button>
        </div>
      </div>
      <div class="col-6">
        <div class="d-grid">
          <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#reject-modal">Reject</button>
        </div>
      </div>
      @endif
      @if ($registration->registration_status !== 'Waiting')
      <div class="col-12">
        <div class="d-grid">
          <a href="{{ route('registrations.print', $registration->user_id) }}" class="btn btn-primary">Print</a>
        </div>
      </div>
      @endif
    </div>
  </div>
  <div class="col-3 mt-4 pt-2">
    <img src="{{ asset('storage/uploads/' . $registration->image ) }}" class="img-thumbnail" alt="Image">
  </div>
</div>

@if ($registration->registration_status === 'Waiting' && auth()->user()->is_admin)
<div class="modal fade" id="approve-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Approve Registrasi</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('registrations.approve', $registration->user_id) }}" method="post" id="approve-form">
        @csrf
        @method('PATCH')
        <div class="modal-body px-4 pb-4 pt-3">
          <div class="mb-3 text-center">
            <svg class="mb-3" xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-exclamation-circle" viewBox="0 0 16 16">
              <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
              <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
            </svg>
            <span class="fs-4 d-block">Apakah anda yakin akan melakukan approve untuk registrasi ini?</span>
          </div>
          <div class="d-grid">
            <button type="submit" class="btn btn-primary">Yes</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="reject-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Reject Registrasi</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('registrations.reject', $registration->user_id) }}" method="post" id="reject-form">
        @csrf
        @method('PATCH')
        <div class="modal-body px-4 pb-4 pt-3">
          <div class="mb-3 text-center">
            <svg class="mb-3" xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-exclamation-circle" viewBox="0 0 16 16">
              <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
              <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
            </svg>
            <span class="fs-4 d-block">Apakah anda yakin akan melakukan approve untuk registrasi ini?</span>
          </div>
          <div class="d-grid">
            <button type="submit" class="btn btn-primary">Yes</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endif
@endsection