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
        <div class="container">
            <div class="card my-3">
                <div class="card-header text-center">
                    <div class="d-flex justify-content-between">
                        <a href="/nomor1" class="btn btn-primary">No.1</a>
                        <h5>Nomor 2</h5>
                        <a href="/nomor3" class="btn btn-primary">No.3</a>
                    </div>
                </div>
                <div class="card-body shadow-lg">
                    <h5 class="card-title text-center mb-3">SIPERPUS</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Soal</th>
                                    <th>Hasil</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1.</td>
                                    <td>Tampilkan daftar buku yang tidak pernah dipinjam di oleh siapapun.</td>
                                    <td>
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Nama Buku</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($buku as $buku)
                                                    <tr>
                                                        <td>{{ $buku->judul }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2.</td>
                                    <td>Tampilkan user yang pernah mengembalikan buku terlambat beserta
                                        dendanya.</td>
                                    <td>
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Nama User</th>
                                                    <th>Denda</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($user as $user)
                                                    <tr>
                                                        <td>{{ $user->nama }}</td>
                                                        <td>
                                                            @foreach ($user->peminjaman as $peminjaman)
                                                                @if ($peminjaman->denda > 0)
                                                                    {{ $peminjaman->denda }}
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3.</td>
                                    <td>Tampilkan user dengan daftar buku yang dipinjam nya.</td>
                                    <td>
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama User</th>
                                                    <th>Nama Buku</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($users as $users)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $users->nama }}</td>
                                                        <td>
                                                            <ol>
                                                                @foreach ($users->peminjaman as $peminjaman)
                                                                    <li>{{ $peminjaman->buku->judul }}</li>
                                                                @endforeach
                                                            </ol>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
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
