<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tambah Barang</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
        <form method="post" action="<?= base_url('barang/tambah'); ?>">
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="nama">Nama Barang</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="text" class="form-control" id="harga" name="harga">
                        <?= form_error('harga', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label for="stock">Stok</label>
                        <input type="text" class="form-control" id="stock" name="stok">
                        <?= form_error('stok', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="nama">Foto Barang</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="file" name="foto">
                            <label class="custom-file-label" for="file" aria-describedby="inputGroupFileAddon02">Choose file</label>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        </div>
    </div>


</div>
<!-- /.container-fluid -->