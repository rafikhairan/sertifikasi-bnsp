<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Surat Penerimaan Mahasiswa Baru</title>
		<style>
			* {
				line-height: 1.5;
			}

			body {
				width: 85%;
				margin: auto;
			}

			p {
				text-align: justify
			}

			.logo {
				width: 200px;
			}

			.photo {
				width: 100px;
				object-fit: cover;
			}

			.judul {
				margin-top: 60px;
				text-align: center;
				text-decoration: underline;
				margin-bottom: 50px
			}

			.detail {
				margin-left: 30px;	
			}

			.middle {
				width: 25px; 
				text-align: center;
			}
		</style>
	</head>
	<body>
		<img class="logo" src="{{ public_path('assets/images/tel-u.jpg') }}" alt="Logo" />
		<h2 class="judul">Surat Penerimaan Mahasiswa Baru</h2>
		<p>Setelah melalui proses seleksi yang ketat, dengan ini kami menyatakan bahwa:</p>
		<div class="detail">
			<table>
				<tbody>
					<tr>
						<td>Nama</td>
						<td class="middle">:</td>
						<td>{{ $registration->fullname }}</td>
					</tr>
					<tr>
						<td>Tempat, Tanggal Lahir</td>
						<td class="middle">:</td>
						<td>{{ $registration->birth_country_code === null ? $registration->birthRegency->regency_name : $registration->country->country_name }}, {{ Carbon\Carbon::parse($registration->birth_date)->format('d F Y') }}</td>
					</tr>
					<tr>
						<td>Jenis Kelamin</td>
						<td class="middle">:</td>
						<td>{{ $registration->gender }}</td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td class="middle">:</td>
						<td>{{ $registration->now_address }}</td>
					</tr>
					<tr>
						<td>Kewarganegaraan</td>
						<td class="middle">:</td>
						<td>{{ $registration->citizenship }}</td>
					</tr>
				</tbody>
			</table>
		</div>
		@if ($registration->registration_status === 'Rejected')
		<p>
			Pendaftaran Anda sebagai mahasiswa baru di Universitas Telkom <strong>belum dapat kami terima</strong>, keputusan ini tidak mengurangi apresiasi kami terhadap upaya yang Anda berikan selama proses seleksi. Kami memahami betapa pentingnya keinginan untuk mengembangkan diri melalui pendidikan tinggi, dan kami berharap Anda akan menemukan kesempatan yang sesuai dengan potensi dan aspirasi Anda.
		</p>
		<p>
			Kami menghargai partisipasi Anda dalam proses seleksi dan mengucapkan terima kasih atas ketertarikan Anda terhadap [Nama Universitas/Institusi]. Mohon mengerti bahwa keputusan ini diambil setelah pertimbangan matang dan evaluasi hati-hati.
		</p>
		@else
		<p>
			Dengan senang hati kami sampaikan bahwa Anda <strong>telah diterima</strong> sebagai mahasiswa baru di Universitas Telkom, Keberhasilan Anda dalam proses seleksi merupakan bukti dedikasi dan prestasi yang luar biasa.
		</p>
		<p>
			Kami yakin bahwa kontribusi dan semangat belajar Anda akan menjadi nilai tambah bagi lingkungan akademis kami. Mohon segera melengkapi proses pendaftaran dan registrasi akademis sesuai dengan petunjuk yang telah disediakan.
		</p>
		@endif
		<br>
		<br>
		<br>
		<p style="display: block; text-align: right">Salam Hormat,</p>
		<br>
		<br>
		<p style="text-align: right">Universitas Telkom</p>
	</body>
</html>
