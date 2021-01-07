<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cantine1_model extends CI_model {
    
    public function liste_plats_avec_nombre() {
        $sql = "select plat.id, plat.nom, commander_plat.quantite from commander_plat join menu_plat on menu_plat.id = commander_plat.id_plat_menu join plat on menu_plat.id_plat = plat.id";
        return $this->get_all($sql);
    }
    public function get_all($sql) {
        $query = $this->db->query($sql);
        $result = array();
        foreach($query->result() as $row) {
            $result[] = $row;
        }
        return $result;
    }
}


?>