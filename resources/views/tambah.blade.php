<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Input Data Peminjaman</title>
        <!-- Bootstrap CSS -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <!-- Bootstrap Datepicker CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"
            rel="stylesheet">
        <!-- Select2 CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    </head>

    <body>
        <div class="container col-6 mt-5">
            <div class="card">
                <div class="card-header text-center">
                    <div class="d-flex justify-content-between">
                        <a href="/nomor3" class="btn btn-primary">back</a>
                        <h5>Form Tambah Data Peminjaman</h5>
                        <br>
                    </div>
                </div>
                <div class="card-body shadow-lg">
                    <form action="/tambah" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <select name="nama" id="nama" class="form-control select2">
                                <option selected>--Pilih Nama--</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="judul">Judul Buku</label>
                            <select name="judul" id="judul" class="form-control select2">
                                <option selected>--Pilih Buku--</option>
                                @foreach ($buku as $book)
                                    <option value="{{ $book->id }}">{{ $book->judul }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_pinjam">Tanggal Pinjam</label>
                            <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam">
                        </div>
                        <div class="form-group">
                            <label for="tanggal_batas_kembali">Tanggal Batas Kembali</label>
                            <input type="date" class="form-control" id="tanggal_batas_kembali"
                                name="tanggal_batas_kembali">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <!-- Bootstrap JS -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
        <!-- Bootstrap Datepicker JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
        <!-- Select2 JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
        <script>
            $(document).ready(function() {
                // Inisialisasi Select2 pada semua elemen select dengan class select2
                $('.select2').select2();
                // Inisialisasi datepicker untuk Tanggal Pinjam
                $('#tanggal_pinjam').datepicker({
                    format: 'yyyy-mm-dd', // Atur format tanggal
                    autoclose: true, // Tutup datepicker secara otomatis setelah memilih tanggal
                    todayHighlight: true // Sorot tanggal hari ini
                }).on('changeDate', function(e) {
                    var tanggalPinjam = new Date(e.date); // Dapatkan tanggal yang dipilih
                    var tanggalBatasKembali = new Date(tanggalPinjam); // Salin tanggal tersebut
                    tanggalBatasKembali.setDate(tanggalBatasKembali.getDate() +
                        14); // Tambahkan 14 hari

                    $('#tanggal_batas_kembali').datepicker('setStartDate',
                        tanggalPinjam); // Atur tanggal minimum untuk Tanggal Batas Kembali
                    $('#tanggal_batas_kembali').datepicker('setEndDate',
                        tanggalBatasKembali); // Atur tanggal maksimum untuk Tanggal Batas Kembali
                    $('#tanggal_batas_kembali').datepicker('update', ''); // Hapus tanggal saat ini
                });

                // Inisialisasi datepicker untuk Tanggal Batas Kembali
                $('#tanggal_batas_kembali').datepicker({
                    format: 'yyyy-mm-dd', // Atur format tanggal
                    autoclose: true, // Tutup datepicker secara otomatis setelah memilih tanggal
                    todayHighlight: true // Sorot tanggal hari ini
                });
            });
        </script>
    </body>

</html>
