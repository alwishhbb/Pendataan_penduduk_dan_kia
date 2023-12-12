<?php
namespace Master;

use Config\Query_builder;

class KartuIdentitas
{
    private $db;

    public function __construct($con)
    {
        $this->db = new Query_builder($con);
    }

    public function setKartuIdentitas($tbnik)
    {
        $data = array('kartu_identitas' => true);
        return $this->db->table('tbanak')->where("tbnik='$tbnik'")->update($data);
    }

    public function unsetKartuIdentitas($tbnik)
    {
        $data = array('kartu_identitas' => false);
        return $this->db->table('tbanak')->where("tbnik='$tbnik'")->update($data);
    }

    public function isKartuIdentitasAvailable($tbnik)
    {
        $result = $this->db->table('tbanak')->select('kartu_identitas')->where("tbnik='$tbnik'")->get()->rowArray();
        return $result['kartu_identitas'];
    }
}
