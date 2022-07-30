<?php
    require('koneksi.php');

    $id = $_GET['id_data'];

    $result= mysqli_query($conn, "SELECT * FROM data_pengajuan_surat WHERE id_data='$id'");
    $cetak1 = mysqli_fetch_assoc($result);
    ?>
    <head>
    <title>Administrasi Desa</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- Custom logo -->
    <link rel="icon" href="images/tanah_siang.PNG">
    <meta charset="utf-8">
    <style>
        #judul{
            text-align:center;
            margin-top: 1%;
        }

        #judul2{
            text-align:center;
            margin-top: -3%;
        }

        #halaman{
            width: 90%; 
            height: auto; 
            position: absolute; 
            border: 1px solid; 
            padding-top: 30px; 
            padding-left: 30px; 
            padding-right: 30px; 
            padding-bottom: 80px;
        }
        .logosurat{
            width: 70%;
        }
        .kop1{
            width: 15%;
        }
        .kop2{
            width: 85%;
            font-size: 120%;
            padding-top: 2%;
        }
        .tb_cetak{
            border: 2px solid black;
            border-top-width: 0;
            border-left-width: 0;
            border-right-width: 0;
        }
        .bold{
            font-size: 120%;
        }
        .para{
            text-indent: 45px;
            text-align: justify;
        }

    </style>

    </head>

    <body>
        <div id=halaman>
            <table class="tb_cetak" border="0" width="100%" height="140px">
                <tr>
                    <td class="kop1">
                    <center>
                        <img class="logosurat" src="images/tanah_siang.PNG">
                    </center>
                    </td>
                    <td class="kop2">
                    <center>
                    <b class="bold"> PEMERINTAH KABUPATEN MURUNG RAYA<br>
                        KECAMATAN  TANAH SIANG<br>
                        DESA KONUT<br></b>
                        Alamat : Jl Saripoi Desa Konut Kec. Tanah Siang Kode Pos : 73961<br>
                    </center>
                    </td>
                </tr>
            </table>
            <h3 id=judul><u>SURAT KETERANGAN TIDAK MAMPU</u></h3>
            <br>

            <p>Yang bertanda tangan di bawah ini :</p>

            <table border="0">
                <tr>
                    <td style="width: 43%;">Nama</td>
                    <td style="width: 5%;">:</td>
                    <td style="width: 70%;">MATIUS DADANG</td>
                </tr>
                <tr>
                    <td style="width: 43%;">Jabatan</td>
                    <td style="width: 5%;">:</td>
                    <td style="width: 65%;">Kepala Desa Konut</td>
                </tr>
            </table>
            <p>Dengan ini menerangkan bahwa :</p>
            <table border="0">
                <tr>
                    <td style="width: 61.5%;">NIK</td>
                    <td style="width: 5%;">:</td>
                    <td style="width: 70%;"><?php echo $cetak1['nik']; ?></td>
                </tr>
                <tr>
                    <td style="width: 61.5%;">Nama</td>
                    <td style="width: 5%;">:</td>
                    <td style="width: 65%;"><?php echo $cetak1['nama']; ?></td>
                </tr>
                <tr>
                    <td style="width: 61.5%;">Jenis Kelamin</td>
                    <td style="width: 5%;">:</td>
                    <td style="width: 65%;"><?php echo $cetak1['jenis_kelamin']; ?></td>
                </tr>
                <tr>
                    <td style="width: 61.5%;">Agama</td>
                    <td style="width: 5%;">:</td>
                    <td style="width: 65%;"><?php echo $cetak1['agama']; ?></td>
                </tr>
                <tr>
                    <td style="width: 61.5%;">Tanggal Rencana</td>
                    <td style="width: 5%;">:</td>
                    <td style="width: 65%;"><?php echo $cetak1['tanggal']; ?></td>
                </tr>
                <tr>
                    <td style="width: 61.5%;">Alamat</td>
                    <td style="width: 5%;">:</td>
                    <td style="width: 65%;"><?php echo $cetak1['alamat']; ?></td>
                </tr>
                <tr>
                    <td style="width: 61.5%;">Pekerjaan</td>
                    <td style="width: 5%;">:</td>
                    <td style="width: 65%;"><?php echo $cetak1['pekerjaan']; ?></td>
                </tr>
                <tr>
                    <td style="width: 61.5%;">Pendidikan</td>
                    <td style="width: 5%;">:</td>
                    <td style="width: 65%;"><?php echo $cetak1['pendidikan']; ?></td>
                </tr>
            </table>
            <br>
            <p  class="para">Benar nama yang tercantum diatas adalah warga Desa Konut. Dengan sepengetahuan kami dan sesuai data yang ada di kantor Desa orang tersebut diatas benar keluarga kurang mampu <b>( KELUARGA BERPENGHASILAN RENDAH )</b> </p>

            <p  class="para">Demikian Surat Keterangan Kurang Mampu ini dikeluarkan kepada yang bersangkutan untuk dipergunakan sebagaimana mestinya.</p>

            <br>

            <div style="width: 40%; text-align: left; float: right;">Konut, ........,........,..........</div><br>
            <div style="width: 40%; text-align: left; float: right;">KEPALA DESA KONUT</div><br><br><br><br><br>
            <br>
            <div style="width: 39%; text-align: left; float: right;"><b>MATIUS DADANG</b></div>

        </div>
        <!-- Coding Print -->
        <script>
            window.print();
        </script>
    </body>