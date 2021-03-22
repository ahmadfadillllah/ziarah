<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $data['title'] }}</title>
</head>

<body>
    <h4>
        Hallo "{{$data['nama_peziarah'] }}",
    </h4>
    <p>
        Selamat, Anda telah berhasil mendaftarkan diri di Ziarah Kubur TPK Macanda
    </p>
    <br>
    <p>
        Perlu diperhatikan, Sebelum memasuki pemakaman harap membaca Syarat melakukan ziarah kubur di TPK Macanda :
    </p>
    <br>
    <div>
        <strong>1. Maksimal membawa 5 anggota keluarga.</strong>
        <br>
        <strong>2. Datang sesuai jadwal. Apabila terlambat, harap mendaftar di jadwal yang lain.</strong>
        <br>
        <strong>3. Patuhi protokol kesehatan.</strong>
        <br>
    </div>
    <h4>
        Berikut informasi form yang telah diinputkan
    </h4>
    <br>

    Email : {{$data['email_peziarah']}} <br>
    Jenis Kelamin : {{$data['jenis_kelamin_peziarah']}} <br>
    No. Handphone {{$data['no_hp_peziarah']}}<br> <br>

    Nama Jenazah : {{$data["nama_jenazah"]}}<br>
    Blok : {{$data["blok_jenazah"]}}<br>
    Alamat Jenazah : {{ $data["alamat_jenazah"] }}<br><br>

    Tanggal Ziarah : {{ $data['tanggal_ziarah'] }}<br>
    Jam Ziarah : {{ $data['waktu_ziarah'] }}<br><br>

    Sekian,
</body>

</html>
