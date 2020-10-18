<?php

class Ciudadc extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('ciudad');
    }

    public function index(){
        $this->load->view('layout/header');
        $this->load->view('layout/menu');
        $this->load->view('ciudad/ciudadv');
        $this->load->view('layout/footer');
    }

    public function getCiudades(){
        $sitReg =  $this->input->post('sitReg');
        $data = $this->ciudad->getCiudades($sitReg);

        echo json_encode($data);
    }

    public function updateCiudad(){
        $ciudad_data['nombre'] = $this->input->post('nombre');
        $ciudad_data['id'] = $this->input->post('id');

        $this->ciudad->updateCiudad($ciudad_data);
        $this->index();
    }

  
}