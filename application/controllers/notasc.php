<?php
class Notasc extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('nota');
    }
    public function index(){
        $this->load->view('layout/header');
        $this->load->view('layout/menu');
        $this->load->view('notas/notasv');
        $this->load->view('layout/footer');
    }

    public function getNotas(){
       echo json_encode($this->nota->getNotas());

    }
    public function saveNotas(){
        $params['idPer'] = $this->input->post('idPer');
        $params['n1'] = $this->input->post('n1');
        $params['n2'] = $this->input->post('n2');
        $params['n3'] = $this->input->post('n3');
        $params['n4'] = $this->input->post('n4');
        $params['nf'] = $this->input->post('nf');

        $this->nota->saveNotas($params);
    }
     
    
    public function deleteNotas(){
        $this->nota->deleteNotas($this->input->post('idPer'));
    }
    
}