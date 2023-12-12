<?php 
namespace Master;

class Menu
{
  public function topMenu()
  {
    $base = "http://localhost/tugas/myapputs/index.php?target=";
    $data = [
      array('Text' => 'Home', 'Link' =>$base . 'beranda'),
      array('Text' => 'Data Warga', 'Link' => $base . 'datawarga'),
      array('Text' => 'Data Anak', 'Link' => $base . 'anak'),
      array('Text' => 'Kartu Identitas Anak', 'Link' => $base .'KartuIdentitas')
    ];
    return $data;
  }
}


?>