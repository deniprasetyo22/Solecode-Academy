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
        <!-- Session Message -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="container-fluid mt-3">
            <div class="card">
                <div class="card-header text-center">
                    <div class="d-flex justify-content-between">
                        <a href="/nomor2" class="btn btn-primary">No.2</a>
                        <h5>Nomor 3</h5>
                        <a href="/" class="btn btn-primary">Home</a>
                    </div>
                </div>
                <div class="card-body shadow-lg">
                    <h5 class="card-title text-center mb-3">Daftar Peminjaman Buku</h5>
                    <div class="table-responsive">
                        <table class="table-bordered mx-auto">
                            <thead>
                                <tr class="text-center">
                                    <th class="p-3">No</th>
                                    <th class="p-3">Nama</th>
                                    <th class="p-3">Daftar Buku</th>
                                    <th class="p-3">Tanggal Pinjam</th>
                                    <th class="p-3">Tanggal Batas Kembali</th>
                                    <th class="p-3">Tanggal Kembali</th>
                                    <th class="p-3">Denda Harian (Rp.1000/Hari)</th>
                                    <th class="p-3">Total Denda</th>
                                    <th class="p-3">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $users)
                                    <tr class="text-center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $users->nama }}</td>
                                        <td class="text-start">
                                            <ol>
                                                @foreach ($users->peminjaman as $peminjaman)
                                                    <li>{{ $peminjaman->buku->judul }}</li>
                                                @endforeach
                                            </ol>
                                        </td>
                                        <td>
                                            <ol>
                                                @foreach ($users->peminjaman as $peminjaman)
                                                    <li>{{ \Carbon\Carbon::parse($peminjaman->tanggal_pinjam)->translatedFormat('d F Y') }}
                                                    </li>
                                                @endforeach
                                            </ol>
                                        </td>
                                        <td>
                                            <ol>
                                                @foreach ($users->peminjaman as $peminjaman)
                                                    <li>{{ \Carbon\Carbon::parse($peminjaman->tanggal_batas_kembali)->translatedFormat('d F Y') }}
                                                    </li>
                                                @endforeach
                                            </ol>
                                        </td>
                                        <td>
                                            <ol>
                                                @foreach ($users->peminjaman as $peminjaman)
                                                    @if ($peminjaman->tanggal_kembali)
                                                        <li>{{ \Carbon\Carbon::parse($peminjaman->tanggal_kembali)->translatedFormat('d F Y') }}
                                                        </li>
                                                    @else
                                                        <li></li>
                                                    @endif
                                                @endforeach
                                            </ol>
                                        </td>
                                        <td>
                                            <ul class="list-unstyled">
                                                @foreach ($users->peminjaman as $peminjaman)
                                                    <li>Rp.{{ $peminjaman->denda }}</li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td>
                                            Rp.{{ number_format($users->total_denda, 0, ',', '.') }}
                                        </td>
                                        <td>
                                            <ul class="list-unstyled">
                                                @foreach ($users->peminjaman as $peminjaman)
                                                    @if ($peminjaman->denda > 0)
                                                        <li class="mb-1">
                                                            <a href="/bayar/{{ $peminjaman->id }}"
                                                                class="btn btn-warning">Bayar</a>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                            <ul class="list-unstyled">
                                                @foreach ($users->peminjaman as $peminjaman)
                                                    @if ($peminjaman->tanggal_kembali)
                                                    @else
                                                        <li class="mb-1">
                                                            <a href="/kembalikan/{{ $peminjaman->id }}"
                                                                class="btn btn-warning">Kembalikan</a>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="text-center mt-3">
                            <a href="/tambah" class="btn btn-primary">
                                Tambah
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('sweetalert::alert')

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
    </body>

</html>
