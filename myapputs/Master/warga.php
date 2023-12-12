<?php 
namespace Master;

use Config\Query_builder;

class warga
{
  private $db;
  public function __construct($con)
  {
    $this->db = new Query_builder($con);
  }
  public function index()
  {
    $data = $this->db->table('warga')->get()->resultArray();
    $res = '<a href="?target=datawarga&act=tambah_warga" class="btn btn-info btn-sm">Tambah Warga</a><br><br>
    <div class ="table-responsive">
    <table class="table table-striped">
    <thead class="table-primary">
      <tr>
        <th>NO</th>
        <th>NIK</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>';
    $no = 1;
    foreach ($data as $r) {
      $res .= '<tr>
      <td>'.$no.'</td>
      <td>'.$r['tbnik'].'</td>
      <td>'.$r['tbnama'].'</td>
      <td>'.$r['tbalamat'].'</td>
      <td>
        <a href="?target=datawarga&act=edit_warga&id=' .$r['tbnik']. '" class="btn btn-sm">EDIT</a>
        <a href="?target=datawarga&act=delete_warga&id= '.$r['tbnik']. '" class="btn btn-danger btn-sm">HAPUS</a>

      </td>';
      $no++;
    }
    $res .='</tbody>
    </table>
    </div>';
    return $res;
  }
  public function tambah()
  {
    $res = '<a href="?target=datawarga" class="btn btn-danger btn-sm">Kembali</a><br><br>';
    $res .= '<form method="post" action="?target=datawarga&act=simpan_warga">
      <div class="mb-3">
        <label for="tbnik" class="form-label">NIK</label>
        <input type="text" class="form-control" id="tbnik" name="tbnik">
      </div>
      <div class="mb-3">
        <label for="tbnama" class="form-label">Nama</label>
        <input type="text" class="form-control" id="tbnama" name="tbnama">
      </div>
      <div class="mb-3">
      <label for="tbalamat" class="form-label">Alamat</label>
      <input type="text" class="form-control" id="tbalamat" name="tbalamat">
      </div>    
      <button type="submit" class="btn btn-primary">Simpan</button>
    </form>';

    return $res;
  }
  public function simpan(){
    $tbnik = $_POST['tbnik'];
    $tbnama = $_POST['tbnama'];
    $tbalamat = $_POST['tbalamat'];

    $data = array(
      'tbnik' => $tbnik,
      'tbnama' => $tbnama,
      'tbalamat' =>$tbalamat
    );
    return $this->db->table(' warga ')->insert($data);
  }
  public function edit($datawarga, $id)
{
    // get data warga
    $r = $this->db->table('warga')->where("$datawarga = ?")->get([$id])->rowArray();
    $res = '<a href="?target=datawarga" class="btn btn-danger btn-sm">Kembali</a><br><br>';
    $res .= '<form method="post" action="?target=datawarga&act=update_warga">
      <input type="hidden" class="form-control" name="param" id="param" value="' . $r['tbnik'] . '">
      <div class="mb-3">
        <label for="tbnama" class="form-label">Nama</label>
        <input type="text" class="form-control" name="tbnama" id="tbnama" value="' . $r['tbnama'] . '">
      </div>
      <div class="mb-3">
        <label for="tbalamat" class="form-label">Alamat</label>
        <input type="text" class="form-control" name="tbalamat" id="tbalamat" value="' . $r['tbalamat'] . '">
      </div>
      <button type="submit" class="btn btn-primary">Ubah</button>
    </form>';
    return $res;
}

public function update()
{
    $tbnama = $_POST['tbnama'];
    $tbnik = $_POST['tbnik'];
    $tbalamat = $_POST['tbalamat'];

    $data = array(
        'tbnama' => $tbnama,
        'tbnik' => $tbnik,
        'tbalamat' => $tbalamat
    );

    return $this->db->table('warga')->where("tbnik='$tbnik'")->update($data);
}


public function delete($id)
{
    if ($this->db->table('warga')->where("tbnik='$id'")->delete()) {
        echo "<script>
                alert('Data warga berhasil dihapus');
                window.location.href='?target=datawarga';
              </script>";
    } else {
        echo "<script>
                alert('Gagal menghapus data warga');
                window.location.href='?target=datawarga';
              </script>";
    }
}

}



?>