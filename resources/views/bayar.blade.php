<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Deni Prasetyo</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>

    <body>
        <div class="container mt-5">
            <div class="card">
                <div class="card-header text-center">
                    <div class="d-flex justify-content-between">
                        <a href="/nomor3" class="btn btn-primary">back</a>
                        <h5>Nomor 3</h5>
                        <br>
                    </div>
                </div>
                <div class="card-body shadow-lg">
                    <h5 class="card-title text-center mb-3">Daftar Peminjaman Buku</h5>
                    <div class="table-responsive">
                        <table class="table-bordered mx-auto p-3">
                            <thead>
                                <tr class="text-center">
                                    <th class="p-3">Nama</th>
                                    <th class="p-3">Daftar Buku</th>
                                    <th class="p-3">Tanggal Pinjam</th>
                                    <th class="p-3">Tanggal Batas Kembali</th>
                                    <th class="p-3">Tanggal Kembali</th>
                                    <th class="p-3">Denda</th>
                                    <th class="p-3">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-center">
                                    <td class="p-3">{{ $peminjaman->anggota->nama }}</td>
                                    <td class="p-3">{{ $peminjaman->buku->judul }}</td>
                                    <td class="p-3">
                                        {{ \Carbon\Carbon::parse($peminjaman->tanggal_pinjam)->translatedFormat('d F Y') }}
                                    </td>
                                    <td class="p-3">
                                        {{ \Carbon\Carbon::parse($peminjaman->tanggal_batas_kembali)->translatedFormat('d F Y') }}
                                    </td>
                                    <td class="p-3">
                                        {{ \Carbon\Carbon::parse($peminjaman->tanggal_kembali)->translatedFormat('d F Y') }}
                                    </td>
                                    <td class="p-3">Rp.{{ $peminjaman->denda }}</td>
                                    <td class="p-3">
                                        <form action="/bayar/{{ $peminjaman->id }}" method="POST"
                                            enctype="multipart/form-data">
                                            @method('put')
                                            @csrf
                                            <button type="submit" class="btn btn-warning">Bayar</button>
                                        </form>
                                    </td>
                                </tr>
                            <tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
    </body>

</html>
