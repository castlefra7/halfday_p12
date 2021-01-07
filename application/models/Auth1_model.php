<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth1_model extends CI_model {
    public function login($etu, $mdp) {
        $sql = "select * from etudiant where etu = %s and mot_de_passe = %s";
        $sql = sprintf($sql, $this->db->escape($etu), $this->db->escape($mdp));
        $query = $this->db->query($sql);
        $result = array(
            "success" => "no",
            "token" => "-1"
        );
        $row = $query->row_array();
        if($row) {
            $result = array(
                "success" => "yes",
                "token" => $row["id"]
            );
        }
        return $result;
    }

    public function inscription($etu, $pwd, $nom, $date_naissance) {
        $sql = "insert into etudiant (etu, mot_de_passe, nom, date_naissance) values (%s, %s, %s, %s)";
        $sql = sprintf($sql, $this->db->escape($etu), $this->db->escape($pwd), $this->db->escape($nom), $this->db->escape($date_naissance));
        $this->db->query($sql);
        $result = array(
            "message" => "erreur",
            "token" => "-1"
        );
        if($this->db->affected_rows()) {
            return $this->login($etu, $pwd);
        }
        return $result;
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