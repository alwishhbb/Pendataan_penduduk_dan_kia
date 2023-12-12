<?php
namespace Master;

use Config\Query_builder;

class anak
{
    private $db;

    public function __construct($con)
    {
        $this->db = new Query_builder($con);
        $this->kartuIdentitas = new KartuIdentitas($con);
    }

    public function index()
    {
        $data = $this->db->table('anak')->get()->resultArray();
        $res = '
            <a href="?target=anak&act=tambah_anak" class="btn btn-info btn-sm">Tambah Anak</a><br><br>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="table-primary">
                        <tr>
                            <th>NO</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Tanggal Lahir</th>
                            <th>Agama</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>';
        $no = 1;
        foreach ($data as $r) {
            $res .= '
                        <tr>
                            <td>' . $no . '</td>
                            <td>' . $r['tbnik'] . '</td>
                            <td>' . $r['tbnama'] . '</td>
                            <td>' . $r['tblahir'] . '</td>
                            <td>' . $r['agama'] . '</td>
                            <td>
                                <a href="?target=anak&act=edit_anak&id=' . $r['tbnik'] . '" class="btn btn-sm">EDIT</a>
                                <a href="?target=anak&act=delete_anak&id=' . $r['tbnik'] . '" class="btn btn-danger btn-sm">HAPUS</a>
                            </td>
                        </tr>';
            $no++;
        }
        $res .= '</tbody>
                </table>
            </div>';
        return $res;
    }

    public function tambah()
{
    $dataWarga = $this->db->table('warga')->get()->resultArray();

    $res = '<a href="?target=anak" class="btn btn-danger btn-sm">Kembali</a><br><br>';
    $res .= '<form method="post" action="?target=anak&act=simpan_anak">
                <div class="mb-3">
                    <label for="tbnik" class="form-label">NIK Warga</label>
                    <select class="form-select" id="tbnik" name="tbnik">';
    foreach ($dataWarga as $warga) {
        $res .= '<option value="' . $warga['tbnik'] . '">' . $warga['tbnik'] . ' - ' . $warga['tbnama'] . '</option>';
    }
    $res .= '</select>
                </div>
                <div class="mb-3">
                    <label for="tbnama" class="form-label">Nama Anak</label>
                    <input type="text" class="form-control" id="tbnama" name="tbnama">
                </div>
                <div class="mb-3">
                    <label for="tblahir" class="form-label">Tanggal Lahir</label>
                    <input type="text" class="form-control" id="tblahir" name="tblahir">
                </div>
                <div class="mb-3">
                    <label for="agama" class="form-label">Agama</label>
                    <input type="text" class="form-control" id="agama" name="agama">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>';

    return $res;
}


public function simpan_anak()
{
    $tbnik = $_POST['tbnik'];
    $tbnama = $_POST['tbnama'];
    $tblahir = $_POST['tblahir'];
    $agama = $_POST['agama'];

    $data = array(
        'tbnik' => $tbnik,
        'tbnama' => $tbnama,
        'tblahir' => $tblahir,
        'agama' => $agama
    );

    // Simpan anak
    if ($this->db->table('tbanak')->insert($data)) {
        return true;
    } else {
        return false;
    }
}
 public function setKartuIdentitas($tbnik)
    {
        return $this->kartuIdentitas->setKartuIdentitas($tbnik);
    }

    public function unsetKartuIdentitas($tbnik)
    {
        return $this->kartuIdentitas->unsetKartuIdentitas($tbnik);
    }

    public function isKartuIdentitasAvailable($tbnik)
    {
        return $this->kartuIdentitas->isKartuIdentitasAvailable($tbnik);
    }

public function index_warga()
{
    // Ambil data warga
    $dataWarga = $this->db->table('warga')->get()->resultArray();

    // Tampilkan data warga
    $res = '
        <h5>Data Warga</h5>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="table-primary">
                    <tr>
                        <th>NO</th>
                        <th>NIK</th>
                        <th>Nama</th>
                    </tr>
                </thead>
                <tbody>';
    $no = 1;
    foreach ($dataWarga as $r) {
        $res .= '
                    <tr>
                        <td>' . $no . '</td>
                        <td>' . $r['tbnik'] . '</td>
                        <td>' . $r['tbnama'] . '</td>
                    </tr>';
        $no++;
    }
    $res .= '</tbody>
            </table>
        </div>';
    return $res;
}



}

?>
