<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Peminjaman Senjata</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <main class="px-md-5">
                <table class="mb-3">
                    <tr>
                        <td style="text-align: center; font-family: serif">
                            <p class="mb-0" style="font-size: 15px">SUPWARS JASA PEMINJAMAN SENJATA</p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <hr class="border border-danger opacity-50">
                        </td>
                    </tr>
                    <tr style="text-align: center; font-family: serif">
                        <td colspan="2" style="font-size: 16px"><u>BERITA PEMINJAMAN SENJATA</u></td>
                    </tr>
                </table>

                <table class="mb-3" style="font-family: serif">
                    <tr>
                        <td>Yang bertanda tangan dibawah ini ( Peminjam )</td>
                        <td>:</td>
                    </tr>
                    <tr>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            Nama</td>
                        <td>:</td>
                        <td>{{ $peminjaman->users->username }}</td>
                    </tr>
                    <tr>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email</td>
                        <td>:</td>
                        <td>{{ $peminjaman->users->email }}</td>
                    </tr>
                    <tr>
                        <td>Selanjutnya disebut Pihak yang menyetujui</td>
                    </tr>
                </table>

                <table style="font-family: serif">
                    <tr>
                        <td>Saya selaku pemilik badan usaha Supwars menyetujui bahwa {{ $peminjaman->users->username }}
                            dapat melakukan peminjaman atas izin</td>
                    </tr>
                </table>

                <table class="mb-3" style="font-family: serif">
                    <tr>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama</td>
                        <td>:</td>
                        <td>{{ Auth::user()->username }}</td>
                    </tr>
                    <tr>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email</td>
                        <td>:</td>
                        <td>{{ Auth::user()->email }}</td>
                    </tr>
                    <tr>
                        <td>Selanjutnya disebut Pihak Kedua&nbsp;&nbsp;&nbsp;</td>
                    </tr>
                </table>

                <table style="font-family: serif">
                    <tr>
                        <td>Dengan ini kedua pihak menyatakan sepakat bahwa :</td>
                    </tr>
                    <tr>
                        <td>1. Pihak Pertama telah menyerahkan senjata berjenis
                            {{ $peminjaman->weapons->name }} untuk dilakukan peminjaman pada tanggal
                            {{ $peminjaman->tanggal_peminjaman }}</td>
                    </tr>
                </table>

                <table class="mb-3" style="font-family: serif">
                    <tr>
                        <td>dipinjam pakai kepada Pihak Kedua.</td>
                    </tr>
                    <tr>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama Senjata</td>
                        <td>:</td>
                        <td>{{ $peminjaman->weapons->name }}</td>
                    </tr>
                    <tr>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kode Senjata</td>
                        <td>:</td>
                        <td>{{ $peminjaman->weapons->kode }}</td>
                    </tr>
                </table>

                <table class="mb-3" style="font-family: serif">
                    <tr>
                        <td>2. Dengan telah diserahkannya barang tersebut diatas oleh Pihak Pertama kepada Pihak Kedua,
                            maka selanjutnya pengelolaan barang dimaksud menjadi tanggung jawab Pihak Kedua.
                        </td>
                    </tr>
                    <tr>
                        <td>3. Pihak Kedua wajib menyerahkan barang setelah dilakukan peminjaman, untuk melakukan
                            peminjaman pihak kedua wajib menyerahkan beberapa dokumen pendukung seperti surat keterangan
                            aparat dan KTP.</td>
                    </tr>
                </table>

                <table style="font-family: serif">
                    <tr>
                        <td style="padding-left: 90px">Pihak Pertama<br><br><br><br><br>
                            <p>{{ Auth::user()->username }}</p>
                        </td>
                        <td style="padding-left: 320px">Pihak Kedua<br><br><br><br><br>
                            <p>{{ $peminjaman->users->username }}</p>
                        </td>
                    </tr>
                </table>
            </main>
        </div>
    </div>

</body>

</html>
