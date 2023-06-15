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
<form role="form" action="<?= base_url; ?>/vendor/updateVendor" method="POST"
enctype="multipart/form-data">
<input type="hidden" name="id" value="<?= $data['vendor']['id']; ?>">
<div class="card-body">
<div class="form-group">
<label >Nama Perusahaan</label>
<input type="text" class="form-control" placeholder="masukkan nama perusahaan..." 
name="nama_perusahaan" value="<?= $data['vendor']['nama_perusahaan'];?>">
</div>
<div class="form-group">
<label >Alamat</label>
<input type="text" class="form-control" placeholder="masukkan alamat..." 
name="alamat" value="<?= $data['vendor']['alamat'];?>">
</div>
<div class="form-group">
<label >Kota</label>
<input type="text" class="form-control" placeholder="masukkan kota..." 
name="kota" value="<?=$data['vendor']['kota'];?>">
</div>
<div class="form-group">
<label >Provinsi</label>
<input type="text" class="form-control" placeholder="masukkan provinsi..." 
name="provinsi" value="<?= $data['vendor']['provinsi'];?>">
</div>
<div class="form-group">
<label >Jenis Perusahaan</label>
<select class="form-control" name="jenis_perusahaan">
<option value="">Pilih</option>
<?php foreach ($data['jenis'] as $row) :?>
<option value="<?= $row['id']; ?>" <?php if($data['vendor']['jenis_perusahaan'] ==
$row['id']) { echo "selected"; } ?>><?= $row['jenis_usaha']; ?></option>
<?php endforeach; ?>
</select>
</div>
<div class="form-group">
<label >Kode</label>
<input type="text" class="form-control" placeholder="masukkan kode..." 
name="kode" value="<?= $data['vendor']['kode'];?>">
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

