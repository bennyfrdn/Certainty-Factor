<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<main>
    <div class="container-fluid px-5">
    <br>
        <div class="card">
            <div class="card-header">
                <header class="text-center">
                        <img class="br-100" width="250px" src="style/img/dokter.png" >

                      <h1 class="f3 lh-title mv2 dark-gray"><?=$namaapp?></h1>
                      <p class="f6 silver mt2 mb0">

   
                            <button onclick="pengembang()" style="margin-bottom: 10px;" data-toggle="tooltip" data-placement="bottom" type="button" class="btn btn-primary" title="Mahasiswa" ><i class="fa fa-user" aria-hidden="true"></i> Beni Frandian</button>

                            <button onclick="pakar1()" style="margin-bottom: 10px;" data-toggle="tooltip" data-placement="bottom" type="button" class="btn btn-primary" title="Pakar I" ><i class="fa fa-user-md" aria-hidden="true"></i> Mirza Dhika Ginta Surbakti, S.P</button>

                            <button onclick="pakar2()" style="margin-bottom: 10px;" type="button" data-toggle="tooltip" data-placement="bottom" class="btn btn-primary" title="Pakar II" ><i class="fa fa-user-md" aria-hidden="true"></i> Dheandry Pratama Usman, S.S.T</button>
                      
                      </p>

                      <p>
                             <a class="link dim green"><button style="margin-bottom: 10px;" type="button" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Dosen Pembimbing I"><i class="fa fa-user-plus" aria-hidden="true"></i> Ilka Zufria M.Kom</button></a>

                             <a class="link dim green"><button style="margin-bottom: 10px;" type="button" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Dosen Pembimbing II"><i class="fa fa-user-plus" aria-hidden="true"></i> Muhammad Dedi Irawan M.Kom</button></a>
                      </p>
                      
                      <br>

                    <script>
                    $(document).ready(function(){
                        $('[data-toggle="tooltip"]').tooltip();   
                    });
                    </script>

                       <div id="pengembang" style="text-align:left; border: 2px solid darkgrey; padding: 10px;">
                        <table border="0px" width="100%">
                            <tr>
                                <td width="20%">Nama Lengkap</td>
                                <td width="1%">: </td>
                                <td>Beni Frandian</td>
                            </tr>
                            <tr>
                                <td>NIM</td>
                                <td>: </td>
                                <td>072172072</td>
                            </tr>
                            <tr>
                                <td>Universitas</td>
                                <td>: </td>
                                <td>UNIVERSITAS ISLAM NEGERI SUMATERA UTARA</td>
                            </tr>
                            </tr>
                        </table>
                       </div>

                       <div id="pakar1" style="text-align:left; border: 2px solid darkgrey; padding: 10px;">
                        <table border="0px" width="100%">
                             <tr>
                                <td width="20%">BIODATA PAKAR</td>
                            </tr>
                            <tr>
                                <td width="20%">Nama Lengkap</td>
                                <td width="1%">: </td>
                                <td>Mirza Dhika Ginta Surbakti, S.P</td>
                            </tr>
                            <tr>
                                <td>Tanggal Lahir</td>
                                <td>: </td>
                                <td>23 Juni 1993</td>
                            </tr>
                            <tr>
                                <td>Jabatan</td>
                                <td>: </td>
                                <td>FA (Field Assistant)</td>
                            </tr>
                            <tr>
                                <td>Tanggung Jawab</td>
                                <td>: </td>
                                <td>Melakukan perawatan pada bagian pembibitan perkebunan, beserta melakukan perawatan pada   pembibitan tersebut sepertimengendalikan serangan hama, gulma, penyakit,penyemprotan, dan lain-lain yang berhubungan dengan perawatan pembibitan kelapa sawit.</td>
                            </tr>
                            <tr>
                                <td>Jurusan Perkuliahan</td>
                                <td>: </td>
                                <td>Agroekoteknologi</td>
                            </tr>
                            <tr>
                                <td>Alumni</td>
                                <td>: </td>
                                <td>UNIVERSITAS ANDALAS</td>
                            </tr>
                            <tr>
                                <td>Perusahaan</td>
                                <td>: </td>
                                <td>BAGERPANG PALM OIL MILL PT.PP LONSUM</td>
                            </tr>
                            <tr>
                                <td>Alamat Perusahaan</td>
                                <td>: </td>
                                <td>Desa Batu Lokong, Kabupaten Deli Serdang, Provinsi  
                            Sumatera Utara</td>
                            </tr>
                        </table>
                       </div>
                       
                       <div id="pakar2" style="text-align:left; border: 2px solid darkgrey; padding: 10px;">
                        <table border="0px" width="100%">
                            <td width="20%">BIODATA PAKAR</td>
                            <tr>
                                <td width="20%">Nama Lengkap</td>
                                <td width="1%">: </td>
                                <td>Dheandry Pratama Usman, S.S.T</td>
                            </tr>
                            <tr>
                                <td>Tanggal Lahir</td>
                                <td>: </td>
                                <td>01 Oktober 1994</td>
                            </tr>
                            <tr>
                                <td>Jabatan</td>
                                <td>: </td>
                                <td>FA (Field Assistant)</td>
                            </tr>
                            <tr>
                                <td>Tanggung Jawab</td>
                                <td>: </td>
                                <td>Melakukan perawatan seperti pemupukan, perawatan   
                                    lahan,  menjaga lahan agar tidak semak, mengendalikan hama, gulma,  penyakit,penyemprotan, dan lain-lain yang berhubungan dengan perawatan. Tanggung jawab yang lain adalah panen. Ini berhubungan dengan pengaturan rotasi panen, pengutipan  brondolan, penyusunan pelepah, grading buah, dan lain-lain.  Kemudian administrasi berkaitan dengan musterchit ,aktivitas,nota permintaan barang dan lain-lain. </td>
                            </tr>
                            <tr>
                                <td>Jurusan Perkuliahan</td>
                                <td>: </td>
                                <td>Budidaya Tanaman</td>
                            </tr>
                            <tr>
                                <td>Alumni</td>
                                <td>: </td>
                                <td>STIP-AP Medan ( Sekolah Tinggi Ilmu Pertanian Agrobisnis  Perkebunan) </td>
                            </tr>
                            <tr>
                                <td>Perusahaan</td>
                                <td>: </td>
                                <td>BAGERPANG PALM OIL MILL PT.PP LONSUM</td>
                            </tr>
                            <tr>
                                <td>Alamat Perusahaan</td>
                                <td>: </td>
                                <td>Desa Batu Lokong, Kabupaten Deli Serdang, Provinsi  
                            Sumatera Utara</td>
                            </tr>
                        </table>
                       </div>
                       <br>
                       <h5 class="f5 silver mt2 mb1">Sistem Pakar Diagnosis Penyakit dan Hama Pada Pelepah Daun Kelapa Sawit</h5>
                      <h5 class="f5 silver mt2 mb1">Copyright © <?=$tahunapp?>, <a class="link dim silver">UINSU Medan</a></h5>
                    </header>
                    <p class="f6 tl lh-copy silver text-justify" style="margin: 20px;text-align: justify;">Sistem pakar ini diharapkan dapat membantu para petani kelapa sawit dalam mendiagnosis jenis penyakit beserta jenis serangan hama pada pelepah daun kelapa sawit, serta dapat memberikan gambaran tingkat keyakinan terhadap jenis penyakit dan hama yang sedang terjadi sekaligus saran ataupun solusi dari penyakit yang dialami berdasarkan pengetahuan yang diberikan langsung dari pakar dan beberapa informasi diambil melalui studi  literatur. Penelitian ini menggunakan metode perhitungan Certainty Factor (CF) dalam menghitung tingkat kepakaran. Aplikasi sistem pakar ini dapat menyesuaikan ukuran perangkat anda, dapat diakses diberbagai device. Hasil dari diagnosis pada sistem akan menjadi langkah awal pendeteksian dini pada tanaman, untuk hasil yang lebih akurat anda bisa melakukan konsultasi langsung terhadap pakar atau ahli dalam bidang kelapa sawit</p>

            </div>

        </div>
    </div>
</main>
