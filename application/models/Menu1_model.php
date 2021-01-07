<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu1_model extends CI_model {
    public function menus_date($date) {
        $sql = "select menu.date, plat.nom, plat.prix from menu join menu_plat on menu.id = menu_plat.id_menu join plat on plat.id = menu_plat.id_plat where menu.date = '%s'";
        $sql = sprintf($sql, $date);
        return $this->get_all($sql);
    }

    public function menus() {
        $sql = "select menu.date, plat.nom, plat.prix from menu join menu_plat on menu.id = menu_plat.id_menu join plat on plat.id = menu_plat.id_plat";
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