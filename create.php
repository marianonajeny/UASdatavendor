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
<form role="form" action="<?= base_url; ?>/vendor/simpanvendor" method="POST"
enctype="multipart/form-data">
<div class="card-body">
<div class="form-group">
<label >Nama Perusahaan</label>
<input type="text" class="form-control" placeholder="masukkan nama perusahaan..."
name="nama_perusahaan">
</div>
<div class="form-group">
<label >Alamat</label>
<input type="text" class="form-control" placeholder="masukkan alamat..."
name="alamat">
</div>
<div class="form-group">
<label >Kota</label>
<input type="text" class="form-control" placeholder="masukkan kota..." name="kota">
</div>
<div class="form-group">
<label >Provinsi</label>
<input type="text" class="form-control" placeholder="masukkan provinsi..."
name="provinsi">
</div>
<div class="form-group">
<label >Jenis Perusahaan</label>
<select class="form-control" name="jenis_perusahaan">
<option value="">Pilih</option>
<?php foreach ($data['jenis'] as $row) :?>
<option value="<?= $row['id']; ?>"><?= $row['jenis_usaha']; ?></option>
<?php endforeach; ?>
</select>
</div>
<div class="form-group">
<label >Kode</label>
<input type="text" class="form-control" placeholder="masukkan kode..."
name="kode">
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
