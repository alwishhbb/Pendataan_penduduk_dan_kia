<?php


use Master\Menu;
use Master\warga;
use Master\anak; 
use Master\KartuIdentitas;

include('autoload.php');
include('Config/Database.php');


$menu = new Menu();
$warga = new warga($dataKoneksi);
$anak = new anak($dataKoneksi);
$KartuIdentitas = new KartuIdentitas($dataKoneksi);
// $warga->tambah();
$target = @$_GET['target'];
$act = @$_GET['act'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>OOP Native</title>
  <link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet">
  <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</head>

<body>
  <div class="container">
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="assets/image/dispenduk_logo.png" style="width: 70px;"></a>
      <a class="navbar-brand" href="#">Data Warga</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#MyMenu" aria- controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="MyMenu">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <?php
        foreach ($menu->topMenu() as $r) {
        ?>
        <li class="nav-item">
        <a href="<?php echo $r['Link']; ?>" class="nav-link">
        <?php echo $r['Text']; ?>
        </a>
        </li>
        <?php
        }
        ?>
        </ul>
      </div>
      </div>
    </nav>
  <br>
    <div class="content">
      <h5>Content <?php echo strtoupper($target); ?></h5>
        <?php
          if (!isset($target) or $target == "home") { 
            echo "Haloooo, Selamat datang di beranda";
          // =========== start kontent warga ======================
          } elseif ($target == "datawarga") {
            if ($act == "tambah_warga") { 
              echo $warga->tambah();
            } elseif ($act == "simpan_warga") { 
              if ($warga->simpan()) {
                echo "<script>
                      alert('data sukses disimpan');
                      window.location.href='?target=datawarga';
                      </script>";
                } else {
                echo "<script>
              alert('data gagal disimpan');
              window.location.href='?target=datawarga';
              </script>";
            }
          } elseif ($act == "edit_warga") {
            $id = $_GET['id'];
            echo $warga->edit('tbnik',$id);
        } elseif ($act == "update_warga") { 
            if ($warga->update()) {
                echo "<script>
                        alert('data sukses diubah');
                        window.location.href='?target=warga';
                      </script>";
            } else {
                echo "<script>
                        alert('data gagal diubah');
                        window.location.href='?target=warga';
                      </script>";
            }
        } elseif ($act == "delete_warga") {
            $id = $_GET['id'];
            if ($warga->delete($id)) { 
                echo "<script>
                        alert('data sukses dihapus');
                        window.location.href='?target=warga';
                      </script>";
            } else {
                echo "<script>
                        alert('data gagal dihapus');
                        window.location.href='?target=warga';
                      </script>";
            }
        
            } else {
            echo $warga->index();
            }
            // ========================= end konten warga ===========================

            // konten anak

} elseif ($target == "anak") {
  if ($act == "tambah_anak") {
      echo $anak->tambah();
  } elseif ($act == "simpan_anak") {

    if ($act == "simpan_anak") { 
      $dataAnak = [
          'tbnik' => $_POST['tbnik'],
          'tbnama' => $_POST['tbnama'],
          'tblahir' => $_POST['tblahir'],
          'agama' => $_POST['agama']
      ];
  
      if ($anak->simpan_anak($dataanak)) {
          echo "<script>
                  alert('data sukses disimpan');
                  window.location.href='?target=dataanak';
                </script>";
      } else {
          echo "<script>
                  alert('data gagal disimpan');
                  window.location.href='?target=dataanak';
                </script>";
      }
  }

// ...

  } elseif ($act == "edit_anak") {
      $id = $_GET['id'];
      echo $anak->edit('tbnik', $id);
  } elseif ($act == "update_anak") {
      if ($anak->update()) {
          echo "<script>
              alert('data sukses diubah');
              window.location.href='?target=anak';
          </script>";
      } else {
          echo "<script>
              alert('data gagal diubah');
              window.location.href='?target=anak';
          </script>";
      }
  } elseif ($act == "delete_anak") {
      $id = $_GET['id'];
      if ($anak->delete($id)) {
          echo "<script>
              alert('data sukses dihapus');
              window.location.href='?target=anak';
          </script>";
      } else {
          echo "<script>
              alert('data gagal dihapus');
              window.location.href='?target=anak';
          </script>";
      }
  } else {
    echo $warga->index();
      echo $anak->index();
  }
  } elseif ($target == "datawarga") {


          } elseif ($target == "anak") {
            echo "ini adalah konten anak";

          } else {
            echo "Page 404 Not found";
          }
    ?>
    </div>
</div>

</body>

</html>