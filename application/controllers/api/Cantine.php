<?php
require APPPATH . 'libraries/REST_controller.php';
use Restserver\Libraries\REST_Controller;

class Cantine extends REST_Controller {
    /**
    * Get All Data from this method.
    *
    * @return Response
    */

    public function __construct() {
        parent::__construct();
    }

    public function plats_get() {
        $data = array();
        $this->load->model("cantine1_model");
        $data = $this->cantine1_model->liste_plats_avec_nombre();
        
        $this->response($data, REST_Controller::HTTP_OK);
    }
    /**
    * Get All Data from this method.
    *
    * @return Response
    */
    public function index_get()
    {
        $data = array();        
        $this->response($data, REST_Controller::HTTP_OK);
    }
    /**
    * Get All Data from this method.
    *
    * @return Response
    */
    public function index_post()
    {
        $this->response(['Pas d\'implémentation'], REST_Controller::HTTP_OK);
    }
    /**
    * Get All Data from this method.
    *
    * @return Response
    */
    public function index_put($id)
    {
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