@extends('layouts.main')

@section('content')
    <div class="mt-2 mb-4">
      <h2>
        Status Pendaftaran
        <span class="ms-2 badge {{ $registration->registration_status === 'Waiting' ? 'text-bg-primary' : ($registration->registration_status === 'Approved' ? 'text-success-primary' : 'text-danger-primary') }}">{{ $registration->registration_status }}</span>
      </h2>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Status Pendaftaran</li>
        </ol>
      </nav>
    </div>
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
            <input type="tel" class="form-control" id="phone-no" name="phone_no" value="{{ $registration->phone_no }}" required>
          </div>
        </div>
        <div class="mb-3">
          <label for="citizenship" class="form-label fw-medium">Kewarganegaraan</label>
          <input type="text" class="form-control" id="citizenship" name="citizenship" value="{{ $registration->citizenship }}" required>
        </div>
        <div class="row">
          <div class="col-6 mb-3">
            <label for="birth_date" class="form-label fw-medium">Tanggal Lahir</label>
            <input type="date" class="form-control" id="no-birth_date" name="birth_date" value="{{ $registration->birth_date }}">
          </div>
          <div class="col-6 mb-3">
            <label for="birth-province" class="form-label fw-medium">Provinsi Kelahiran</label>
            <input type="text" class="form-control" id="birth-province" name="birth-province" value="{{ $registration->province->province_name }}" readonly>
          </div>
          <div class="col-6 mb-3">
            <label for="birth-regency" class="form-label fw-medium">Kabupaten Kelahiran</label>
            <input type="text" class="form-control" id="birth-regency" name="birth-regency" value="{{ $registration->regency->regency_name }}" readonly>
          </div>
          <div class="col-6 mb-3">
            <label for="birth-foreign" class="form-label fw-medium">Untuk Kelahiran Luar Negeri</label>
            <input type="text" class="form-control" id="birth-foreign" name="birth-foreign" value="{{ $registration->birth_foreign }}" readonly>
          </div>
        </div>
        <div class="mb-3">
          <label for="gender" class="form-label fw-medium">Jenis Kelamin</label>
          <input type="text" class="form-control" id="gender" name="gender" value="{{ $registration->gender }}" readonly>
        </div>
        <div class="mb-3">
          <label for="married-status" class="form-label fw-medium">Status Menikah</label>
          <input type="text" class="form-control" id="married-status" name="married-status" value="{{ $registration->married_status }}" readonly>
        </div>
        <div class="mb-3">
          <label for="religion" class="form-label fw-medium">Agama</label>
          <input type="text" class="form-control" id="religion" name="religion" value="{{ $registration->religion }}" readonly>
        </div>
      </div>
      <div class="col-3 mt-4 pt-2">
        <img src="{{ asset('storage/uploads/' . $registration->image ) }}" class="img-thumbnail" alt="Image">
      </div>
    </div>
@endsection