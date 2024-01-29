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
$pdf ->Cell(50,5,'Laporan Data Penyiar','0','1','L',false);
$pdf ->Ln(2);

$pdf ->SetFont('Arial','B',7);
$pdf ->SetFillColor(192,192,192); // Warna latar belakang header
$pdf ->Cell(8,6,'No',1,0,'C',true);
$pdf ->Cell(60,6,'Nama Penyiar',1,0,'C',true);
$pdf ->Cell(30,6,'Jenis Kelamin',1,0,'C',true);
$pdf ->Cell(20,6,'Tanggal Lahir',1,0,'C',true);
$pdf ->Cell(75,6,'No Telpon',1,0,'C',true);
$pdf ->Ln();

$no=1;
$sql = mysqli_query($koneksi,"SELECT * FROM data_penyiar");
if(mysqli_num_rows($sql)>0){
    while($hasil = mysqli_fetch_array($sql)){

    $pdf ->SetFont('Arial','',7);
    $pdf ->Cell(8,6,$no++,1,0,'C');
    $pdf ->Cell(60,6,$hasil['nama_penyiar'],1,0,'L');
    $pdf ->Cell(30,6,$hasil['kelamin_penyiar'],1,0,'C');
    $pdf ->Cell(20,6,$hasil['tanggal_lahir_penyiar'],1,0,'C');
    $pdf ->Cell(75,6,$hasil['no_telpon_penyiar'],1,0,'C'); // Menggunakan Cell agar data tetap berada di tengah
    $pdf ->Ln();
    }
}

$pdf ->Output('Laporan-data_penyiar.pdf','I');
?>
