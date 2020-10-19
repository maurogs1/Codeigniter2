<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Personac extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('persona');
        $this->load->model('usuario');
        $this->load->library('encrypt');
        $this->load->library('session');
    }

    public function index(){
        $this->load->view('layout/header');
        $this->load->view('persona/personav');
        $this->load->view('layout/footer');
    }

    public function save(){
        $persona_data['nombre'] = $this->input->post('nombre');
        $persona_data['apellido'] = $this->input->post('apellido');
        $persona_data['dni'] = $this->input->post('dni');
        $persona_data['email'] = $this->input->post('email');
        $persona_data['ciudadId'] = $this->input->post('ciudadId');
        $persona_data['fecha_nac'] = $this->input->post('fecha_nac');        
        $user_data['username'] = $this->input->post('username');
        $user_data['password'] = $this->encrypt->sha1($this->input->post('password'));

        $id =  $this->persona->save($persona_data);
        if($id > 0){
            $data['msg'] = "Registro con éxito";

            $user_data['personaId'] = $id;
            $this->usuario->save($user_data);  
            $this->load->view('usuario/loginv',$data);    
        
        }

    }

    public function update(){
        $persona_data['nombre'] = $this->input->post('nombre');
        $persona_data['apellido'] = $this->input->post('apellido');
        $persona_data['email'] = $this->input->post('email');
        $persona_data['dni'] = $this->input->post('dni');
        $persona_data['personaId'] = $this->input->post('personaId');
        $this->persona->update($persona_data);
       
    }

    public function delete(){
        $data['msg'] = null;

        $this->usuario->delete($this->session->userdata('session_usuario_id'));
        $this->persona->delete($this->session->userdata('session_persona_id'));
        $this->load->view('usuario/loginv',$data);    
    }

    public function getAll(){
        echo json_encode(($this->persona->getAll()));
    }

    public function goToPersonList(){

        $this->load->view('layout/header');
        $this->load->view('layout/menu');
        $this->load->view('persona/personasList');
        $this->load->view('layout/footer');
    }

    public function deletePersona(){
        $data['msg'] = null;
        
        $id = $this->usuario->findByPersona($this->input->post('idPer'));

        $this->usuario->delete($id);
        $this->persona->delete($this->input->post('idPer'));
        $this->load->view('usuario/loginv',$data);    
    }
 

}