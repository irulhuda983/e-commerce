<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Barang</h1>

    <?= $this->session->flashdata('message'); ?>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Data Barang</h6>
            
            <a href="<?= base_url('barang/tambah'); ?>" class="btn btn-primary">Tambah</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>Nama Barang</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th style="width: 15%"></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>Nama Barang</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th></th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach($barang as $item) : $no = 1; ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td>
                                <img src="<?= base_url('assets/img/'). $item['gambar'] ?>" class="rounded img-fluid" style="width: 90px">
                            </td>
                            <td><?= $item['nama_barang'] ?></td>
                            <td><?= $item['harga'] ?></td>
                            <td><?= $item['stok'] ?></td>
                            <td>
                                <a href="<?= base_url('barang/edit/'). $item['id']; ?>" class="btn btn-primary">Edit</a>
                                <a href="<?= base_url('barang/hapus/').$item['id']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ?');">Hapus</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->