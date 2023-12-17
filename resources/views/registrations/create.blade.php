@extends('layouts.main')

@section('content')
    <div class="mt-2 mb-4">
      <h3>Pendaftaran Mahasiswa Baru</h3>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Pendaftaran Mahasiswa Baru</li>
        </ol>
      </nav>
    </div>
    @if (session()->has('error'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      {{ session('error') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="row">
      <div class="col-9">
        <form action="{{ route('registrations.store') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label for="fullname" class="form-label fw-medium">Name Lengkap</label>
            <input type="text" class="form-control @error('fullname') is-invalid @enderror" id="fullname" name="fullname" value="{{ old('fullname', $user->name) }}" placeholder="Masukkan nama lengkap anda">
            @error('fullname')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="image" class="form-label fw-medium">Pas Foto 3x4</label>
            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" accept="image/*">
            @error('image')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="ktp-address" class="form-label fw-medium">Alamat KTP</label>
            <textarea class="form-control @error('ktp_address') is-invalid @enderror" id="ktp-address" name="ktp_address" rows="3" placeholder="Masukkan alamat KTP anda">{{ old('ktp_address') }}</textarea>
            @error('ktp_address')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="now-address" class="form-label fw-medium">Alamat Lengkap Saat Ini</label>
            <textarea class="form-control @error('now_address') is-invalid @enderror" id="now-address" name="now_address" rows="3" placeholder="Masukkan alamat lengkap anda saat ini">{{ old('now_address') }}</textarea>
            @error('now_address')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="row">
            <div class="col-6 mb-3">
              <label for="province-id" class="form-label fw-medium">Provinsi</label>
              <select class="form-select @error('province_id') is-invalid @enderror" id="province-id" name="province_id" data-placeholder="Pilih provinsi anda">
                <option></option>
                @foreach ($provinces as $province)
                  <option value="{{ $province->id }}">{{ $province->province_name }}</option>
                @endforeach
              </select>
              @error('province_id')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="col-6 mb-3">
              <label for="regency-id" class="form-label fw-medium">Kabupaten</label>
              <select class="form-select @error('regency_id') is-invalid @enderror" id="regency-id" name="regency_id" data-placeholder="Pilih kabupaten anda">
                <option></option>
                @foreach ($regencies as $regency)
                  <option value="{{ $regency->id }}" data-province-id="{{ $regency->province->id }}">{{ $regency->regency_name }}</option>
                @endforeach
              </select>
              @error('regency_id')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="col-6 mb-3">
              <label for="district-id" class="form-label fw-medium">Kecamatan</label>
              <select class="form-select @error('district_id') is-invalid @enderror" id="district-id" name="district_id" data-placeholder="Pilih kecamatan anda">
                <option></option>
                @foreach ($districts as $district)
                  <option value="{{ $district->id }}" data-regency-id="{{ $district->regency->id }}">{{ $district->district_name }}</option>
                @endforeach
              </select>
              @error('district_id')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>
          <div class="row">
            <div class="col-6 mb-3">
              <label for="tel-no" class="form-label fw-medium">Nomor Telepon</label>
              <input type="tel" class="form-control @error('tel_no') is-invalid @enderror" id="tel-no" name="tel_no" placeholder="Masukkan nomor telepon anda" value="{{ old('tel_no') }}">
              @error('tel_no')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="col-6 mb-3">
              <label for="phone-no" class="form-label fw-medium">Nomor HP</label>
              <input type="tel" class="form-control @error('phone_no') is-invalid @enderror" id="phone-no" name="phone_no" placeholder="Masukkan nomor HP anda" value="{{ old('phone_no') }}">
              @error('phone_no')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="col-6 mb-3">
              <label for="email" class="form-label fw-medium">Email</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Masukkan email anda" value="{{ old('email', auth()->user()->email) }}">
              @error('email')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label fw-medium">Kewarganegaraan</label>
            <br />
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="citizenship" id="wni-asli" value="WNI Asli">
              <label class="form-check-label" for="wni-asli">
                WNI Asli
              </label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="citizenship" id="wni-keturunan" value="WNI Keturunan">
              <label class="form-check-label" for="wni-keturunan">
                WNI Keturunan
              </label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="citizenship" id="wna" value="WNA">
              <label class="form-check-label d-flex align-items-center" for="wna">
                WNA
                <div class="ms-2 d-none">
                  <select class="form-select form-select-sm" id="wna-select" name="wna" data-placeholder="Pilih negara asal anda">
                    <option></option>
                    @foreach ($countries as $country)
                      <option value="{{ $country->country_name }}">{{ $country->country_name }}</option>
                    @endforeach
                  </select>
                </div>
              </label>
            </div>
            @error('citizenship')
            <div class="text-danger" style="margin-top: 4px; font-size: 14px">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="mb-3">
            <label class="form-label fw-medium">Lahir di Indonesia?</label>
            <br />
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="born" id="ya" value="Ya">
              <label class="form-check-label" for="ya">
                Ya
              </label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="born" id="tidak" value="Tidak">
              <label class="form-check-label" for="tidak">
                Tidak
              </label>
            </div>
          </div>
          <div class="row">
            <div class="col-6 mb-3">
              <label for="birth_date" class="form-label fw-medium">Tanggal Lahir</label>
              <input type="date" class="form-control @error('birth_date') is-invalid @enderror" id="no-birth_date" name="birth_date" placeholder="Masukkan nomor telepon anda" value="{{ old('birth_date') }}">
              @error('birth_date')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="col-6 mb-3 d-none">
              <label for="birth-country-code" class="form-label fw-medium">Negara Kelahiran</label>
              <select class="form-select @error('birth_country_code') is-invalid @enderror" id="birth-country-code" name="birth_country_code" data-placeholder="Pilih negara kelahiran anda">
                <option></option>
                @foreach ($countries as $country)
                  <option value="{{ $country->code }}">{{ $country->country_name }}</option>
                @endforeach
              </select>
              @error('birth_country_code')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="col-6 mb-3">
              <label for="birth-province-id" class="form-label fw-medium">Provinsi Kelahiran</label>
              <select class="form-select @error('birth_province_id') is-invalid @enderror" id="birth-province-id" name="birth_province_id" data-placeholder="Pilih provinsi kelahiran anda">
                <option></option>
                @foreach ($provinces as $province)
                  <option value="{{ $province->id }}">{{ $province->province_name }}</option>
                @endforeach
              </select>
              @error('birth_province_id')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="col-6 mb-3">
              <label for="birth-regency-id" class="form-label fw-medium">Kabupaten Kelahiran</label>
              <select class="form-select @error('regency_id') is-invalid @enderror" id="birth-regency-id" name="birth_regency_id" data-placeholder="Pilih kabupaten kelahiran anda">
                <option></option>
                @foreach ($regencies as $regency)
                  <option value="{{ $regency->id }}" data-birth-province-id="{{ $regency->province->id }}">{{ $regency->regency_name }}</option>
                @endforeach
              </select>
              @error('birth_regency_id')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label fw-medium">Jenis Kelamin</label>
            <br />
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="gender" id="pria" value="Pria">
              <label class="form-check-label" for="pria">
                Pria
              </label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="gender" id="wanita" value="Wanita">
              <label class="form-check-label" for="wanita">
                Wanita
              </label>
            </div>
            @error('gender')
            <div class="text-danger" style="margin-top: 4px; font-size: 14px">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="mb-3">
            <label class="form-label fw-medium">Status Menikah</label>
            <br />
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="married_status" id="belum-menikah" value="Belum menikah">
              <label class="form-check-label" for="belum-menikah">
                Belum menikah
              </label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="married_status" id="menikah" value="Menikah">
              <label class="form-check-label" for="menikah">
                Menikah
              </label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="married_status" id="lain-lain" value="Lain-lain (janda/duda)">
              <label class="form-check-label" for="lain-lain">
                Lain-lain (janda/duda)
              </label>
            </div>
            @error('married_status')
            <div class="text-danger" style="margin-top: 4px; font-size: 14px">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="mb-4">
            <label class="form-label fw-medium">Agama</label>
            <br />
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="religion" id="islam" value="Islam">
              <label class="form-check-label" for="islam">
                Islam
              </label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="religion" id="katolik" value="Katolik">
              <label class="form-check-label" for="katolik">
                Katolik
              </label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="religion" id="kristen" value="Kristen">
              <label class="form-check-label" for="kristen">
                Kristen
              </label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="religion" id="hindu" value="Hindu">
              <label class="form-check-label" for="hindu">
                Hindu
              </label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="religion" id="budha" value="Budha">
              <label class="form-check-label" for="budha">
                Budha
              </label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="religion" id="lain-lain-religion" value="Lain-lain">
              <label class="form-check-label" for="lain-lain-religion">
                Lain-lain
              </label>
            </div>
            @error('religion')
            <div class="text-danger" style="margin-top: 4px; font-size: 14px">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="d-grid mb-3">
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
      <div class="col-3 mt-4 pt-2">
        <img src="{{ asset('assets/images/no-pp.png') }}" class="img-thumbnail object-fit-cover" alt="Image" style="height: 400px">
      </div>
    </div>
@endsection

@push('scripts')
  <script>
    $('#province-id').select2({
      theme: "bootstrap-5",
      placeholder: $(this).data('placeholder')
    });

    $('#regency-id').select2({
      theme: "bootstrap-5",
      placeholder: $(this).data('placeholder')
    });

    $('#district-id').select2({
      theme: "bootstrap-5",
      placeholder: $(this).data('placeholder')
    });

    $('#birth-country-code').select2({
      theme: "bootstrap-5",
      placeholder: $(this).data('placeholder')
    });

    $('#birth-province-id').select2({
      theme: "bootstrap-5",
      placeholder: $(this).data('placeholder')
    });

    $('#birth-regency-id').select2({
      theme: "bootstrap-5",
      placeholder: $(this).data('placeholder')
    });

    $('#wna-select').select2({
      theme: "bootstrap-5",
      placeholder: $(this).data('placeholder')
    });

    $('#district-id').change(function (event) {
      $('#regency-id').val($('#district-id option:selected').data('regencyId')).change()
    });

    $('#regency-id').change(function (event) {
      $('#province-id').val($('#regency-id option:selected').data('provinceId')).change()
    });

    $('#birth-regency-id').change(function (event) {
      $('#birth-province-id').val($('#birth-regency-id option:selected').data('birthProvinceId')).change()
    });

    $("input[name='citizenship']").change(function (event) {
      if(event.target.value === 'WNA') {
        $("input[id='wna']").addClass('mt-2')
        $("#wna-select").parent().removeClass('d-none')
      } else {
        $("input[id='wna']").removeClass('mt-2')
        $("#wna-select").parent().addClass('d-none')
      }
    })

    $("input[name='born']").change(function (event) {
      if(event.target.value === 'Tidak') {
        $("#birth-country-code").parent().removeClass('d-none');
        $("#birth-province-id").parent().addClass('d-none');
        $("#birth-regency-id").parent().addClass('d-none');
      } else {
        $("#birth-country-code").parent().addClass('d-none');
        $("#birth-province-id").parent().removeClass('d-none');
        $("#birth-regency-id").parent().removeClass('d-none');
      }
    })

    $('#image').change(function (event) {
      const imageUrl = URL.createObjectURL(event.target.files[0])
      $('.img-thumbnail').attr('src', imageUrl)
    })
  </script>
@endpush