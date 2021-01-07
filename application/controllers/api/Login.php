<?php
require APPPATH . 'libraries/REST_controller.php';
use Restserver\Libraries\REST_Controller;

class Login extends REST_Controller {
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
    public function index_get()
    {
        $this->response(["Endpoint pour se connecter"], REST_Controller::HTTP_OK);
    }
    /**
    * Get All Data from this method.
    *
    * @return Response
    */
    public function index_post()
    {
        $etu = $this->input->post("etu");
        $mdp = $this->input->post("mdp");
        $this->load->model("auth1_model");
        $data = $this->auth1_model->login($etu, $mdp);
        $this->response($data, REST_Controller::HTTP_OK);
    }
    /**
    * Get All Data from this method.
    *
    * @return Response
    */
    public function index_put($id)
    {
        $input = $this->put();
        $this->response(['Pas d\'implémentation'], REST_Controller::HTTP_OK
    );
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