<?php 
include('koneksi.php');
require_once("dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf ();
$query = mysqli_query($koneksi,"select * from peserta_didik");
$html = '<hr><center><h3>Daftar Peserta Didik</h3></center><hr/><br/>';
$html .= '<table border="1" width="100%">
<tr>
<th>Nomor</th>
<th>Tanggal</th>
<th>Jenis Pendaftaran</th>
<th>Tanggal Masuk Sekolah</th>
<th>NIS</th>
<th>Nomor Peserta Ujian</th>
<th>Pernah PAUD</th>
<th>Pernah TK</th>
<th>Nomor Skhun</th>
<th>Nomor Ijazah</th>
<th>Hobi</th>
<th>Cita-cita</th>
<th>Nama</th>
<th>Jenis Kelamin</th>
<th>NISN</th>
<th>NIK</th>
<th>Tempat Lahir</th>
<th>Tanggal Lahir</th>
<th>Agama</th>
<th>Berkebutuhan Khusus</th>
<th>Alamat</th>
<th>RT</th>
<th>RW</th>
<th>Dusun</th>
<th>Kelurahan/Desa</th>
<th>Kecamatan</th>
<th>Kode Pos</th>
<th>Tempat Tinggal</th>
<th>Transportasi</th>
<th>Nomor HP</th>
<th>Nomor Telepon</th>
<th>E-mail</th>
<th>Penerima KPS/PKH/KIP</th>
<th>No KPS/KKS/PKH/KIP</th>
<th>Kewarganegaraan</th>
<th>Nama Negara</th>
</tr>';
$no = 1;
while ($row = mysqli_fetch_array($query))
{
    $html .= "<tr>
    <td>".$no."</td>
    <td>".$row['tgl']."</td>
    <td>".$row['jp']."</td>
    <td>".$row['tglmk']."</td>
    <td>".$row['nis']."</td>
    <td>".$row['noujian']."</td>
    <td>".$row['paud']."</td>
    <td>".$row['tk']."</td>
    <td>".$row['skhun']."</td>
    <td>".$row['ijazah']."</td>
    <td>".$row['hobi']."</td>
    <td>".$row['citacita']."</td>
    <td>".$row['nama']."</td>
    <td>".$row['jk']."</td>
    <td>".$row['nisn']."</td>
    <td>".$row['nik']."</td>
    <td>".$row['tmpl']."</td>
    <td>".$row['tgll']."</td>
    <td>".$row['agama']."</td>
    <td>".$row['berkhus']."</td>
    <td>".$row['alamat']."</td>
    <td>".$row['rt']."</td>
    <td>".$row['rw']."</td>
    <td>".$row['dusun']."</td>
    <td>".$row['desa']."</td>
    <td>".$row['camat']."</td>
    <td>".$row['kodepos']."</td>
    <td>".$row['tmptinggal']."</td>
    <td>".$row['transport']."</td>
    <td>".$row['nohp']."</td>
    <td>".$row['notelp']."</td>
    <td>".$row['email']."</td>
    <td>".$row['kps']."</td>
    <td>".$row['nokps']."</td>
    <td>".$row['kwn']."</td>
    <td>".$row['negara']."</td>
    </tr>";
    $no++;
}
$html .= "</html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A0', 'landscape');
// Rendering dari HTML ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('laporan_pesertadidik.pdf');
?>