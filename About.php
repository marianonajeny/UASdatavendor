<?php
class About extends Controller {
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
$data['title'] = 'Halaman AboutMe';
$data['nama'] = 'Maria Nona Jeni';
$data['alamat'] = 'Jln Nawaripi';
$data['no_hp'] = '082198150591';
$this->view('templates/header', $data);
$this->view('templates/sidebar', $data);
$this->view('about/index', $data);
$this->view('templates/footer');
}
}
?>