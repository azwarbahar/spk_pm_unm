<?php
require_once '../template/header/header.php';
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Perhitungan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/spk_pm_unm/admin/">Home</a></li>
              <li class="breadcrumb-item active">Perhitungan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <?php
              $array_aspek = array();
              $aspek = mysqli_query($conn, "SELECT * FROM tb_aspek");
              $rowaspek = 1;
              foreach($aspek as $dta_aspek) {

            ?>
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Aspek <?= $dta_aspek['nama_aspek'] ?></h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                  </div>
              </div>
              <div class="card-body">

                <!-- Card Nilai Mahasiswa -->
                <div class="card card-danger">
                  <div class="card-header">
                    <h3 class="card-title">Nilai Mahasiswa</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    </div>
                  </div>
                  <div class="card-body">
                    <table id="tbl_example<?= $rowaspek ?>1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th style="width: 120px;">No Induk</th>
                          <th>Nama</th>
                          <?php
                          $kriteria11 = mysqli_query($conn, "SELECT * FROM tb_kriteria WHERE id_aspek='$dta_aspek[id_aspek]'");
                          foreach($kriteria11 as $dta_kriteria11) {
                            echo "<th style='text-align:center; max-width: 5px;'>$dta_kriteria11[nama_kriteria]</th>";
                          }
                          ?>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $tampil_nilai1 = mysqli_query($conn, "SELECT * FROM tb_nilai GROUP by id_mahasiswa");
                          foreach($tampil_nilai1 as $dta_tampil_nilai1) {
                            $mahasiswa = mysqli_query($conn, "SELECT * FROM tb_mahasiswa WHERE id_mahasiswa ='$dta_tampil_nilai1[id_mahasiswa]'");
                            foreach($mahasiswa as $dta_mahasiswa) {
                              echo "
                                <tr>
                                  <td style='text-align:center;'>$dta_mahasiswa[no_induk_mahasiswa]</td>
                                  <td>$dta_mahasiswa[nama_mahasiswa]</td>
                              ";
                              $kriteria12 = mysqli_query($conn, "SELECT * FROM tb_kriteria WHERE id_aspek='$dta_aspek[id_aspek]'");
                              foreach($kriteria12 as $dta_kriteria12) {
                                $nilai = mysqli_query($conn, "SELECT * FROM tb_nilai WHERE id_mahasiswa = '$dta_mahasiswa[id_mahasiswa]'
                                                                                    AND id_aspek = '$dta_aspek[id_aspek]'
                                                                                    AND id_kriteria = '$dta_kriteria12[id_kriteria]'");
                                foreach($nilai as $dta_nilai) {
                                  echo "<td style='text-align:center'>$dta_nilai[nilai]</td>";
                                }
                              }
                              echo "
                                </tr>";
                            }
                          }
                        ?>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- Card Nilai Mahasiswa -->

                <!-- Card Perhitungan Pemetaan GAP -->
                <div class="card card-danger">
                  <div class="card-header">
                    <h3 class="card-title">Perhitungan Pemetaan GAP</h3>
                        <!-- <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse"> -->
                        <!-- <i class="fas fa fa-question-circle"></i></button> -->
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    </div>
                  </div>
                  <div class="card-body">
                    <table id="tbl_example<?= $rowaspek ?>2" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th style="width: 120px;">No Induk</th>
                          <th>Nama</th>
                          <?php
                          $kriteria11 = mysqli_query($conn, "SELECT * FROM tb_kriteria WHERE id_aspek='$dta_aspek[id_aspek]'");
                          foreach($kriteria11 as $dta_kriteria11) {
                            echo "<th style='text-align:center; max-width: 5px;'>$dta_kriteria11[nama_kriteria]</th>";
                          }
                          ?>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $tampil_nilai1 = mysqli_query($conn, "SELECT * FROM tb_nilai GROUP by id_mahasiswa");
                          foreach($tampil_nilai1 as $dta_tampil_nilai1) {
                            $mahasiswa = mysqli_query($conn, "SELECT * FROM tb_mahasiswa WHERE id_mahasiswa ='$dta_tampil_nilai1[id_mahasiswa]'");
                            foreach($mahasiswa as $dta_mahasiswa) {
                              echo "
                                <tr>
                                  <td style='text-align:center;'>$dta_mahasiswa[no_induk_mahasiswa]</td>
                                  <td>$dta_mahasiswa[nama_mahasiswa]</td>
                              ";
                              $kriteria12 = mysqli_query($conn, "SELECT * FROM tb_kriteria WHERE id_aspek='$dta_aspek[id_aspek]'");
                              foreach($kriteria12 as $dta_kriteria12) {
                                $nilai = mysqli_query($conn, "SELECT * FROM tb_nilai WHERE id_mahasiswa = '$dta_mahasiswa[id_mahasiswa]'
                                                                                    AND id_aspek = '$dta_aspek[id_aspek]'
                                                                                    AND id_kriteria = '$dta_kriteria12[id_kriteria]'");
                                foreach($nilai as $dta_nilai) {
                                  $nilai_hitung_gap = $dta_nilai['nilai'] - $dta_kriteria12['nilai_kriteria'] ;
                                  echo "<td style='text-align:center'>$nilai_hitung_gap</td>";
                                }
                              }
                              echo "
                                </tr>";
                            }
                          }
                        ?>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- Card Perhitungan Pemetaan GAP -->

                <!-- Card Perhitungan Factor -->
                <div class="card card-danger">
                  <div class="card-header">
                    <h3 class="card-title">Perhitungan Factor</h3>
                        <!-- <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse"> -->
                        <!-- <i class="fas fa fa-question-circle"></i></button> -->
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    </div>
                  </div>
                  <div class="card-body">
                    <table id="tbl_example<?= $rowaspek ?>3" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th style="width: 120px;">No Induk</th>
                          <th>Nama</th>
                          <?php
                          $kriteria11 = mysqli_query($conn, "SELECT * FROM tb_kriteria WHERE id_aspek='$dta_aspek[id_aspek]'");
                          foreach($kriteria11 as $dta_kriteria11) {
                            echo "<th style='text-align:center;'>Bobot $dta_kriteria11[nama_kriteria]</th>";
                          }
                          $jenis_kriteria = mysqli_query($conn, "SELECT * FROM tb_jenis_kriteria");
                          foreach($jenis_kriteria as $dta_jenis_kriteria) {
                            $presen = $dta_jenis_kriteria['nilai_jenis_kriteria'] * 100;
                            if($dta_jenis_kriteria['id_jenis_kriteria'] == 1) {
                              echo "<th style='text-align:center;'>Core $presen% </th>";
                            } else{
                              echo "<th style='text-align:center;'>Secondary $presen% </th>";
                            }
                          }
                          echo "<th style='text-align:center;'>Total</th>";
                          ?>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $tampung_total = array();
                          $tampil_nilai1 = mysqli_query($conn, "SELECT * FROM tb_nilai GROUP by id_mahasiswa");
                          $z = 1;
                          foreach($tampil_nilai1 as $dta_tampil_nilai1) {
                            $mahasiswa = mysqli_query($conn, "SELECT * FROM tb_mahasiswa WHERE id_mahasiswa ='$dta_tampil_nilai1[id_mahasiswa]'");
                            foreach($mahasiswa as $dta_mahasiswa) {
                              // No induk dan nama
                              echo "
                                <tr>
                                  <td style='text-align:center;'>$dta_mahasiswa[no_induk_mahasiswa]</td>
                                  <td>$dta_mahasiswa[nama_mahasiswa]</td>
                              ";
                              $kriteria12 = mysqli_query($conn, "SELECT * FROM tb_kriteria WHERE id_aspek='$dta_aspek[id_aspek]'");
                              // forech Pembobotan Kriteria
                              foreach($kriteria12 as $dta_kriteria12) {
                                $nilai = mysqli_query($conn, "SELECT * FROM tb_nilai WHERE id_mahasiswa = '$dta_mahasiswa[id_mahasiswa]'
                                                                                    AND id_aspek = '$dta_aspek[id_aspek]'
                                                                                    AND id_kriteria = '$dta_kriteria12[id_kriteria]'");
                                foreach($nilai as $dta_nilai) {
                                  $nilai_hitung_selisih = $dta_nilai['nilai'] - $dta_kriteria12['nilai_kriteria'] ;
                                  $hasil_bobot = "";
                                  if ($nilai_hitung_selisih == "0"){
                                      $hasil_bobot = "5";
                                  } elseif ($nilai_hitung_selisih == "1") {
                                      $hasil_bobot = "4.5";
                                  } elseif ($nilai_hitung_selisih == "-1") {
                                      $hasil_bobot = "4";
                                  } elseif ($nilai_hitung_selisih == "2") {
                                      $hasil_bobot = "3.5";
                                  } elseif ($nilai_hitung_selisih == "-2") {
                                      $hasil_bobot = "3";
                                  } elseif ($nilai_hitung_selisih == "3") {
                                      $hasil_bobot = "2.5";
                                  } elseif ($nilai_hitung_selisih == "-3") {
                                      $hasil_bobot = "2";
                                  } elseif ($nilai_hitung_selisih == "4") {
                                      $hasil_bobot = "1.5";
                                  } else {
                                      $hasil_bobot = "1";
                                  }
                                  // TD Data Bobot Kriteria
                                  echo "<td style='text-align:center'>$hasil_bobot</td>";
                                }
                              }

                              // forech Factor Core
                              $kriteria13 = mysqli_query($conn, "SELECT * FROM tb_kriteria WHERE id_aspek='$dta_aspek[id_aspek]' AND id_jenis_kriteria='1'");
                              $jumlah_row_kriteria = mysqli_num_rows($kriteria13);
                              unset($hasil_bobot_sementara);
                              $hasil_bobot_sementara = array();
                              $a = 1;
                              foreach($kriteria13 as $dta_kriteria13) {
                                $nilai1 = mysqli_query($conn, "SELECT * FROM tb_nilai WHERE id_mahasiswa = '$dta_mahasiswa[id_mahasiswa]'
                                                                                    AND id_aspek = '$dta_aspek[id_aspek]'
                                                                                    AND id_kriteria = '$dta_kriteria13[id_kriteria]'");
                                foreach($nilai1 as $dta_nilai1) {
                                  $nilai_hitung_selisih = $dta_nilai1['nilai'] - $dta_kriteria13['nilai_kriteria'] ;
                                  if ($nilai_hitung_selisih == "0"){
                                      $hasil_bobot_sementara[$a] = "5";
                                  } elseif ($nilai_hitung_selisih == "1") {
                                      $hasil_bobot_sementara[$a] = "4.5";
                                  } elseif ($nilai_hitung_selisih == "-1") {
                                      $hasil_bobot_sementara[$a] = "4";
                                  } elseif ($nilai_hitung_selisih == "2") {
                                      $hasil_bobot_sementara[$a] = "3.5";
                                  } elseif ($nilai_hitung_selisih == "-2") {
                                      $hasil_bobot_sementara[$a] = "3";
                                  } elseif ($nilai_hitung_selisih == "3") {
                                      $hasil_bobot_sementara[$a] = "2.5";
                                  } elseif ($nilai_hitung_selisih == "-3") {
                                      $hasil_bobot_sementara[$a] = "2";
                                  } elseif ($nilai_hitung_selisih == "4") {
                                      $hasil_bobot_sementara[$a] = "1.5";
                                  } else {
                                      $hasil_bobot_sementara[$a] = "1";
                                  }
                                }
                                $a = $a + 1;
                              }
                              // TD factor Core
                              $hasil_core1 = array_sum($hasil_bobot_sementara);
                              $hasil_core2 = $hasil_core1/$jumlah_row_kriteria;
                              echo "<td style='text-align:center'>$hasil_core2</td>";


                              // forech Factor Secoundary
                              $kriteria13 = mysqli_query($conn, "SELECT * FROM tb_kriteria WHERE id_aspek='$dta_aspek[id_aspek]' AND id_jenis_kriteria='2'");
                              $jumlah_row_kriteria = mysqli_num_rows($kriteria13);
                              unset($hasil_bobot_sementara);
                              $hasil_bobot_sementara = array();
                              $a = 1;
                              foreach($kriteria13 as $dta_kriteria13) {
                                $nilai1 = mysqli_query($conn, "SELECT * FROM tb_nilai WHERE id_mahasiswa = '$dta_mahasiswa[id_mahasiswa]'
                                                                                    AND id_aspek = '$dta_aspek[id_aspek]'
                                                                                    AND id_kriteria = '$dta_kriteria13[id_kriteria]'");
                                foreach($nilai1 as $dta_nilai1) {
                                  $nilai_hitung_selisih = $dta_nilai1['nilai'] - $dta_kriteria13['nilai_kriteria'] ;
                                  if ($nilai_hitung_selisih == "0"){
                                      $hasil_bobot_sementara[$a] = "5";
                                  } elseif ($nilai_hitung_selisih == "1") {
                                      $hasil_bobot_sementara[$a] = "4.5";
                                  } elseif ($nilai_hitung_selisih == "-1") {
                                      $hasil_bobot_sementara[$a] = "4";
                                  } elseif ($nilai_hitung_selisih == "2") {
                                      $hasil_bobot_sementara[$a] = "3.5";
                                  } elseif ($nilai_hitung_selisih == "-2") {
                                      $hasil_bobot_sementara[$a] = "3";
                                  } elseif ($nilai_hitung_selisih == "3") {
                                      $hasil_bobot_sementara[$a] = "2.5";
                                  } elseif ($nilai_hitung_selisih == "-3") {
                                      $hasil_bobot_sementara[$a] = "2";
                                  } elseif ($nilai_hitung_selisih == "4") {
                                      $hasil_bobot_sementara[$a] = "1.5";
                                  } else {
                                      $hasil_bobot_sementara[$a] = "1";
                                  }
                                }
                                $a = $a + 1;
                              }
                              // TD factor Secound
                              $hasil_secound1 = array_sum($hasil_bobot_sementara);
                              $hasil_secound2 = $hasil_secound1/$jumlah_row_kriteria;
                              echo "<td style='text-align:center'>$hasil_secound2</td>";

                              // TD Total
                              $total = (0.6*$hasil_core2)+(0.4*$hasil_secound2);
                              $tampung_total[$z] = $total;
                              $z = $z + 1;
                              echo "<td style='text-align:center'>$total</td>";
                              $query_hasil_akhir_aspek = "UPDATE tb_hasil_akhir_aspek SET nilai_hasil_akhir_aspek = '$total'
                                                                                      WHERE id_mahasiswa = '$dta_mahasiswa[id_mahasiswa]'
                                                                                    AND id_aspek = '$dta_aspek[id_aspek]'";
                              mysqli_query($conn, $query_hasil_akhir_aspek);
                              echo "
                                </tr>";
                            $array_aspek[$rowaspek] =  $tampung_total;
                            }
                          }
                        ?>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- Card Perhitungan Factor -->

              </div>
            </div><br>
            <!-- /.card -->

            <?php $rowaspek = $rowaspek+1; } ?>

            <!-- CARD HASIL AKHIR -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Hasil Akhir</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                  </div>
              </div>
              <div class="card-body">

              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th style="width: 45px;">No</th>
                    <th>Nama</th>
                    <?php
                      $aspek2 = mysqli_query($conn, "SELECT * FROM tb_aspek");
                      $row_aspek3 = mysqli_num_rows($aspek2);
                      $rowaspek2 = 1;
                      foreach($aspek2 as $dta_aspek2) {
                        echo "<th>$dta_aspek2[nama_aspek] $dta_aspek2[persentase_aspek]%</th>";
                      }
                    ?>
                    <th>Total Akhir</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                    $nomor = 1;
                    $total_akhir = array();
                    $himpun_persen_aspek = array();
                    $himpun_nilai_aspek = array();
                    $tampil_nilai2 = mysqli_query($conn, "SELECT * FROM tb_nilai GROUP by id_mahasiswa");
                    foreach($tampil_nilai2 as $dta_tampil_nilai2) {
                      echo "<tr>";
                      $mahasiswa2 = mysqli_query($conn, "SELECT * FROM tb_mahasiswa WHERE id_mahasiswa ='$dta_tampil_nilai2[id_mahasiswa]'");
                      foreach($mahasiswa2 as $dta_mahasiswa2) {
                        echo "<td style='text-align:center'>$nomor</td>";
                        echo "<td>$dta_mahasiswa2[no_induk_mahasiswa] - $dta_mahasiswa2[nama_mahasiswa]</td>";
                        for($f = 1; $f <= $row_aspek3; $f++){
                        ?>
                        <td><?= $array_aspek[$f][$nomor]?></td>
                        <?php
                        }
                        $aspek3 = mysqli_query($conn, "SELECT * FROM tb_aspek");
                        $f2 = 1;
                        $himpun_baru = array();
                        foreach($aspek3 as $dta_aspek3) {
                          $himpun_persen_aspek2 = $dta_aspek3['persentase_aspek'];
                          $himpun_nilai_aspek2 = $array_aspek[$f2][$nomor];
                          $himpun_baru[$f2] = (($himpun_persen_aspek2/100)*$himpun_nilai_aspek2);
                          $f2 = $f2 + 1;
                        }
                          $total_akhir = array_sum($himpun_baru);
                          echo "<td>$total_akhir</td>";
                          $query_hasil_akhir_mahasiswa = "UPDATE tb_hasil_akhir_mahasiswa SET nilai_hasil_akhir_mahasiswa = '$total_akhir'
                                                            WHERE id_mahasiswa = '$dta_mahasiswa2[id_mahasiswa]'";
                          mysqli_query($conn, $query_hasil_akhir_mahasiswa);
                      }
                      $nomor = $nomor + 1;
                    }
                    ?>
                  </tr>
                </tbody>
              </table>

              </div>
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<?php
require '../template/footer/footer.php';
?>