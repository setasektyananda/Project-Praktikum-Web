<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $data['title']; ?></h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><?= $data['title']; ?></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="<?= base_url; ?>/penerbit/simpanPenerbit" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group">
                        <label>Nama Penerbit</label>
                        <input type="text" class="form-control" placeholder="masukkan penerbit..." name="nama_penerbit">
                    </div>
                    <div class="form-group">
                        <label>Alamat Penerbit</label>
                        <input type="text" class="form-control" placeholder="masukkan alamat penerbit..." name="alamat_penerbit">
                    </div>
                    <div class="form-group">
                        <label>Kontak</label>
                        <input type="text" class="form-control" placeholder="masukkan kontak penerbit..." name="nomor_telp">
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->