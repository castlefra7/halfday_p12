<?php
require APPPATH . 'libraries/REST_controller.php';
use Restserver\Libraries\REST_Controller;

class Menu extends REST_Controller {
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
        $date = $this->input->get("date");
        $this->load->model("menu1_model");
        if($date != NULL) {
            $data = $this->menu1_model->menus_date($date);
        } else {
            $data = $this->menu1_model->menus();
        }
        $this->response($data, REST_Controller::HTTP_OK);
    }
    /**
    * Get All Data from this method.
    *
    * @return Response
    */
    public function index_post()
    {
        $input = $this->input->post();
        $this->response(['Pas d\'implémentation'], REST_Controller::HTTP_OK);
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