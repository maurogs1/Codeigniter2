<?php

class Login extends CI_Model{
    function __construct(){
        parent::__construct();
       $this->load->library('session');
  

    }
    
    public function login($username, $password){
        $this->db->select('u.id as uid,p.id as pid, p.nombre, p.apellido');
        $this->db->from('usuarios u');
        $this->db->join('personas p',' = u.personaId');
        $this->db->where('u.username',$username);
        $this->db->where('u.password',$password);
        $response = $this->db->get();
        
        if($response->num_rows() >= 1){
            //row obtiene el registro
            $result = $response->row();
             $user_session = array(
                 'session_usuario_id' => $result->uid,
                 'session_persona_id' => $result->pid,
                 'session_usuario' => $result->nombre.", ".$result->apellido
             );           
            //Dos formas distintas de agregar el usuario a la sesión, como un array o por separado
           $this->session->set_userdata($user_session);
           // $this->session->set_userdata('session_usuario',$result->nombre.", ".$result->apellido);
            return true;
        }else
            return false;   
    }

}