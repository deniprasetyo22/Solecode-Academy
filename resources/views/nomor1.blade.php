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
            <div class="d-flex vh-100">
                <div class="card col-6 m-auto">
                    <div class="card">
                        <div class="card-header text-center">
                            <div class="d-flex justify-content-between">
                                <a href="/" class="btn btn-primary">Home</a>
                                <h5>Nomor 1</h5>
                                <a href="/nomor2" class="btn btn-primary">No.2</a>
                            </div>
                        </div>
                        <div class="card-body shadow-lg">
                            <h5 class="card-title text-center mb-3">Tambah Buku</h5>
                            <div class="row mb-2">
                                <div class="col-4">
                                    <label for="judulbuku" class="form-label float-end" id="judulbuku"
                                        name="judulbuku">Judul
                                        buku</label>
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control" id="judulbuku" name="judulbuku">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-4">
                                    <label for="isbn" class="form-label float-end" id="isbn"
                                        name="isbn">ISBN</label>
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control" id="isbn" name="isbn">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-4">
                                    <label for="kategori" class="form-label float-end" id="kategori"
                                        name="kategori">Kategori</label>
                                </div>
                                <div class="col-6">
                                    <select class="form-select" id="kategori" name="kategori">
                                        <option selected>-- Pilih Katergori --</option>
                                        <option value="Fiksi">Fiksi</option>
                                        <option value="Teknologi">Teknologi</option>
                                        <option value="Sains">Sains</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-4">
                                    <label for="pengarang" class="form-label float-end" id="pengarang"
                                        name="pengarang">Pengarang</label>
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control" id="pengarang" name="pengarang">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-4">
                                    <label for="penerbit" class="form-label float-end" id="penerbit"
                                        name="penerbit">Penerbit</label>
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control" id="penerbit" name="penerbit">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-4">
                                    <label for="tahunterbit" class="form-label float-end" id="tahunterbit"
                                        name="tahunterbit">Tahun Terbit</label>
                                </div>
                                <div class="col-4">
                                    <input type="number" class="form-control" id="tahunterbit" name="tahunterbit">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-4">
                                    <label for="jumlahbukutersedia" class="form-label float-end" id="jumlahbukutersedia"
                                        name="jumlahbukutersedia">Jumlah Buku Tersedia</label>
                                </div>
                                <div class="col-4">
                                    <input type="number" class="form-control" id="jumlahbukutersedia"
                                        name="jumlahbukutersedia">
                                </div>
                            </div>
                            <div class="text-center mt-4">
                                <a href="" class="btn btn-success">Simpan</a>
                                <a href="" class="btn btn-danger">Batal</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
    </body>

</html>
