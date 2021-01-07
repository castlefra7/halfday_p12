<?php
require APPPATH . 'libraries/REST_controller.php';
use Restserver\Libraries\REST_Controller;

class Info extends REST_Controller {
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
    public function index_get($plats = NULL)
    {
        $data = array(
            "nom" => "Lachapelle Kaky Jean Philippe",
            "numero" => "ETU982"
        );
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