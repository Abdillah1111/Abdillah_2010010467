<?php
include 'fpdf.php';
include 'koneksi.php';

$pdf = new FPDF('P','mm','A4');
$pdf ->AddPage();

$pdf ->SetFont('Arial','B',16);
$pdf ->Cell(0,5,'RADIO REPUBLIK INDONESIA','0','1','C',false);
$pdf ->SetFont('Arial','i','6');
$pdf ->Cell(0,5,'Alamat : Jl.A Yani No.Km. 3.5 RW.No.7, Karang Mekar, Kec.Banjarmasin','0','1','C',false);
$pdf ->SetFont('Arial','i','6');
$pdf ->Cell(0,5,'Telp : (0511)3252601, KodePos : 70235','0','1','C',false);
$pdf ->Ln(3);
$pdf ->Cell(190,0.6,'','0','C',true);
$pdf ->Ln(5);

$pdf ->SetFont('Arial','B','9');
$pdf ->Cell(50,5,'Laporan Data Acara','0','1','L',false);
$pdf ->Ln(2);

$pdf ->SetFont('Arial','B',7);
$pdf ->SetFillColor(192,192,192); // Warna latar belakang header
$pdf ->Cell(8,6,'No',1,0,'C',true);
$pdf ->Cell(60,6,'Nama Acara',1,0,'C',true);
$pdf ->Cell(80,6,'Deskripsi Acara',1,0,'C',true);
$pdf ->Cell(40,6,'Hari Siaran',1,0,'C',true); // Lebar kolom hari siaran diperlebar
$pdf ->Ln();

$no=1;
$sql = mysqli_query($koneksi,"SELECT * FROM daftar_acara_siaran");
if(mysqli_num_rows($sql)>0){
    while($hasil = mysqli_fetch_array($sql)){

    $pdf ->SetFont('Arial','',7);
    $pdf ->Cell(8,6,$no++,1,0,'C');
    $pdf ->Cell(60,6,$hasil['nama_acara_siaran'],1,0,'L');
    $pdf ->Cell(80,6,$hasil['deskripsi'],1,0,'L');
    $pdf ->MultiCell(40,6,$hasil['hari_siaran'],1); // Menggunakan MultiCell untuk hari siaran agar dapat melanjutkan ke baris berikutnya jika terlalu banyak
    }
}

$pdf ->Output('Laporan-data_acara.pdf','I');
?>
