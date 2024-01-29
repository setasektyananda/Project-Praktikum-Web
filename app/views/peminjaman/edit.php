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
            <form role="form" action="<?= base_url; ?>/peminjaman/updatePeminjaman" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $data['peminjaman']['id']; ?>">
                <div class="card-body">
                    <div class="form-group">
                        <label>Nama Peminjam</label>
                        <input type="text" class="form-control" placeholder="masukkan peminjam..." name="nama_peminjam" value="<?= $data['peminjaman']['nama_peminjam']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Buku</label>
                        <select class="form-control" name="buku_id">
                            <option value="">Pilih</option>
                            <?php foreach ($data['buku'] as $row) : ?>
                                <option value="<?= $row['id']; ?>" <?php if ($data['peminjaman']['buku_id'] == $row['id']) {
                                                                        echo "selected";
                                                                    } ?>><?= $row['judul']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </section>
    <!-- /.content -->
</div>