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
$pdf ->Cell(50,5,'Laporan Data Lagu','0','1','L',false);
$pdf ->Ln(2);
$pdf ->SetFont('Arial','B',7);
$pdf ->SetFillColor(192,192,192); // Warna latar belakang header
$pdf ->Cell(8,6,'No',1,0,'C',true);
$pdf ->Cell(75,6,'Judul & Penyanyi Lagu',1,0,'C',true);
$pdf ->Cell(50,6,'Genre Lagu',1,0,'C',true); // Menyesuaikan lebar kolom Genre Lagu
$pdf ->Cell(50,6,'Tahun Lagu',1,0,'C',true); // Menyesuaikan lebar kolom Tahun Lagu
$pdf ->Ln();

$no=1;
$sql = mysqli_query($koneksi,"SELECT * FROM daftar_lagu");
if(mysqli_num_rows($sql)>0){
    while($hasil = mysqli_fetch_array($sql)){

    $pdf ->SetFont('Arial','',7);
    $pdf ->Cell(8,6,$no++,1,0,'C');
    $pdf ->Cell(75,6,$hasil['judul_lagu'],1,0,'L');
    $pdf ->Cell(50,6,$hasil['genre'],1,0,'C');
    $pdf ->Cell(50,6,$hasil['tahun'],1,0,'C');    
    $pdf ->Ln();
    }
}

$pdf ->Output('Laporan-data_lagu.pdf','I');
?>
