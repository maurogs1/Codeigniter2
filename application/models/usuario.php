<?php

class Usuario extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    public function save($param){
        $data = array(
          'username' => $param['username'],  
          'password' => $param['password'],
          'personaId' => $param['personaId']
        );
        
        $this->db->insert('usuarios', $data);
    }
    public function delete($id){
       
         $this->db->where('id', $id);
         $this->db->delete('usuarios');
     
    }

    public function findByPersona($id){
        $this->db->select('id');
        $this->db->from('usuarios u');
        $this->db->where('u.personaId', $id);
        return  $this->db->get()->row()->id;
    }

}