<?php
require APPPATH . 'libraries/REST_controller.php';
use Restserver\Libraries\REST_Controller;

class Etudiant extends REST_Controller {
    /**
    * Get All Data from this method.
    *
    * @return Response
    */

    public function __construct() {
        parent::__construct();
    }
    /**
    * Get All Data from this method.
    *
    * @return Response
    */
    public function index_get($id = NULL, $commande = NULL, $id_menu = NULL, $total = NULL)
    {
        $headers = $this->input->request_headers();
        if(isset($headers["Token"])) {
            $token = $headers["Token"];
            if($commande) {
                $this->load->model("etudiant1_model");
                $data = $this->etudiant1_model->total_plat($id, $id_menu);
                $this->response($data, REST_Controller::HTTP_OK);

            } else {
                $this->response(["Endpoint pour étudiant"], REST_Controller::HTTP_OK);
            }
        } else {
            $this->response(["Vous n'êtes pas authentifié"], REST_Controller::HTTP_OK);
        }
    }
    /**
    * Get All Data from this method.
    *
    * @return Response
    */
    public function index_post($id = NULL, $commande = NULL)
    {
        $headers = $this->input->request_headers();
        if(isset($headers["Token"])) {
            $token = $headers["Token"];
            if(!$commande) {
                $etu = $this->input->post("etu");
                $mdp = $this->input->post("mdp");
                $nom = $this->input->post("nom");
                $date_naissance = $this->input->post("date_naissance");
        
                $this->load->model("auth1_model");
                $data = $this->auth1_model->inscription($etu, $mdp, $nom, $date_naissance);
                $this->response($data, REST_Controller::HTTP_OK);
            } else {
                $id_plat_menu = $this->input->post("id_plat_menu");
                $quantite = $this->input->post("quantite");

                $this->load->model("etudiant1_model");
                $data = $this->etudiant1_model->commander($id_plat_menu, $quantite, $id);
                $this->response($data, REST_Controller::HTTP_OK);
            }
        } else {
            $this->response(["Vous n'êtes pas authentifié"], REST_Controller::HTTP_OK);
        }
      
    }
    /**
    * Get All Data from this method.
    *
    * @return Response
    */
    public function index_put($id = NULL, $commande = NULL, $id_commande = NULL)
    {
        $headers = $this->input->request_headers();
        if(isset($headers["Token"])) {
            $token = $headers["Token"];
            if(!$id_commande) {
                $nom = $this->put("nom");
                $date_naissance = $this->put("date_naissance");
                $this->load->model("etudiant1_model");
        
                $data = $this->etudiant1_model->update($id, $nom, $date_naissance);
                $this->response($data, REST_Controller::HTTP_OK);
            } else {
                $quantite = $this->put("quantite");
                $this->load->model("etudiant1_model");
        
                $data = $this->etudiant1_model->update_commande($id_commande, $quantite);
                $this->response($data, REST_Controller::HTTP_OK);
            }
        } else {
            $this->response(["Vous n'êtes pas authentifié"], REST_Controller::HTTP_OK);
        }
        
    }
    /**
    * Get All Data from this method.
    *
    * @return Response
    */
    public function index_delete($id)
    {
        $this->response(['Pas d\'implémentation'], REST_Controller::HTTP_OK);
    }
}