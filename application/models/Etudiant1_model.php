<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Etudiant1_model extends CI_model {
    public function update($id_etudiant, $nom, $date_naissance) {
        $sql = "update etudiant set nom = %s, date_naissance= %s  where id = %d";
        $sql = sprintf($sql, $this->db->escape($nom), $this->db->escape($date_naissance), $id_etudiant);
        $this->db->query($sql);
        $result = array(
            "message" => "erreur"
        );
        if($this->db->affected_rows()) {
            $result = array(
                "message" => "mise à jour avec succés"
            );
        }
        return $result;
    }

    public function commander($id_plat_menu, $quantite, $id_etudiant) {
        $sql = "insert into commander (id_plat_menu, quantite, id_etudiant) values (%d, %f, %d)";
        $sql = sprintf($sql, $id_plat_menu, $quantite, $id_etudiant);
        $this->db->query($sql);
        $result = array(
            "message" => "erreur",
        );
        if($this->db->affected_rows()) {
            $result = array(
                "message" => "succés",
            );
        }
        return $result;
    }

    public function update_commande($id_commande, $quantite) {
        $sql = "update commander set quantite = %d where id = %d";
        $sql = sprintf($sql, $quantite, $id_commande);
        $this->db->query($sql);
        $result = array(
            "message" => "erreur",
        );
        if($this->db->affected_rows()) {
            $result = array(
                "message" => "succés",
            );
        }
        return $result;
    }

    public function total_plat($id_etudiant, $id_menu) {
        $sql = "select menu_plat.id_menu, sum(commander.quantite * plat.prix) as total from commander join menu_plat on menu_plat.id = commander.id_plat_menu join plat on plat.id = menu_plat.id_plat where commander.id_etudiant = %d  and menu_plat.id_menu = %d group by (menu_plat.id_menu)";
        $sql = sprintf($sql, $id_etudiant, $id_menu);
        $query = $this->db->query($sql);
        $row = $query->row_array();
        $result = array(
            "total" => 0
        );
        if($row) {
            $result = array(
                "total" => $row["total"]
            );
        }
        return $result;
    }
}


?>