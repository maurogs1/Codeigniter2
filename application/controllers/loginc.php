<?php

class Loginc extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('login');
        $this->load->library('encrypt');
        
        
    }

    public function index(){
        $data['msg'] = null;
        $this->load->view('usuario/loginv',$data);
    }


    //user data dura el tiempo de sesión que le asignamos en config.php
    //set_flashdata dura hasta que se actualiza la página
    public function login(){
        $username = $this->input->post('username');
        $password =$this->encrypt->sha1($this->input->post('password'));
        
        $resp = $this->login->login($username, $password);
        if($resp){
            $this->load->view('layout/header');
            $this->load->view('layout/menu'); 
            $this->load->view('persona/persona_menu');
            $this->load->view('layout/footer');
        }else{
            $data['msg'] = "Nombre de usuario o contraseña inválido jaja";
            
            $this->load->view('usuario/loginv',$data);
        }
    }

} 