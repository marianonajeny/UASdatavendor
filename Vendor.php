<?php
class Vendor extends Controller {
    public function __construct()
{
if($_SESSION['session_login'] != 'sudah_login') { 
Flasher::setMessage('Login','Tidak ditemukan.','danger'); 
header('location: '. base_url . '/login');
exit;
}
}

public function index()
{
$data['title'] = 'Data Vendor';
$data['vendor'] = $this->model('VendorModel')->getAllVendor();
$this->view('templates/header', $data);
$this->view('templates/sidebar', $data);
$this->view('vendor/index', $data);
$this->view('templates/footer');
}
public function cari()
{
    $data['title'] = 'Data Vendor';
    $data['vendor'] = $this->model('VendorModel')->cariVendor();
    $data['key'] = $_POST['key'];
    $this->view('templates/header' ,  $data);
    $this->view('templates/sidebar', $data);
    $this->view('vendor/index', $data);
    $this->view('templates/footer');
}
public function edit($id)
{
    $data['title'] = 'Detail Vendor';
    $data['jenis'] = $this->model('JenisModel')->getAllJenis();
    $data['vendor'] = $this->model('VendorModel')->getVendorById($id);
    $this->view('templates/header', $data);
    $this->view('templates/sidebar', $data);
    $this->view('vendor/edit', $data);
    $this->view('templates/footer');
}
public function tambah()
{
    $data['title'] = 'Tambah Vendor';
    $data['jenis'] = $this->model('JenisModel')->getAllJenis();
    $this->view('templates/header', $data);
    $this->view('templates/sidebar', $data);
    $this->view('vendor/create', $data);
    $this->view('templates/footer');
}
public function simpanVendor()
{
    if( $this->model('VendorModel')->tambahVendor($_POST) > 0 ) {
        Flasher::setMessage('Berhasil', 'ditambahkan','success');
        header('location: '. base_url . '/vendor');
        exit;
    }else {
        Flasher::setMessage('Gagal', 'ditambahkan','danger');
        header('location: '. base_url . '/vendor');
        exit;
    }
}
public function updateVendor()
{
    if( $this->model('VendorModel')->updateDataVendor($_POST) > 0 ) {
        Flasher::setMessage('Berhasil', 'diupdate', 'success');
        header('location: '. base_url . '/vendor');
        exit;
    }else{
        Flasher::setMessage('Gagal', 'diupdate', 'danger');
        header('location: '. base_url . '/vendor');
        exit;
    }
}
public function hapus($id)
{
    if($this->model('VendorModel')->deleteVendor($id) > 0 ) {
        Flasher::setMessage('Berhasil', 'dihapus','success');
        header('location: '. base_url . '/vendor');
        exit;
    }else{
        Flasher::setMessage('Gagal', 'dihapus','danger');
        header('location: '. base_url . '/vendor');
        exit;
    }
}
public function lihatlaporan()
{
$data['title'] = 'Data Laporan Vendor';
$data['vendor'] = $this->model('VendorModel')->getAllVendor();
$this->view('vendor/lihatlaporan', $data);
}
public function laporan()
{
$data['vendor'] = $this->model('VendorModel')->getAllVendor();
$pdf = new FPDF('p','mm','A4');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',14);
// mencetak string
$pdf->Cell(190,7,'LAPORAN VENDOR',0,1,'C');
// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(85,6,'NAMA_PERUSAHAAN',1);
$pdf->Cell(30,6,'ALAMAT',1);
$pdf->Cell(30,6,'KOTA',1);
$pdf->Cell(15,6,'PERUSAHAAN',1);
$pdf->Cell(25,6,'JENIS',1);
$pdf->Ln();
$pdf->SetFont('Arial','',10);
foreach($data['vendor'] as $row) {
$pdf->Cell(85,6,$row['nama_perusahaan'],1);
$pdf->Cell(30,6,$row['alamat'],1);
$pdf->Cell(30,6,$row['kota'],1);
$pdf->Cell(15,6,$row['provinsi'],1);
$pdf->Cell(25,6,$row['jenis_usaha'],1);
$pdf->Ln();
}
$pdf->Output('D', 'Laporan Vendor.pdf', true);
}

}
?>