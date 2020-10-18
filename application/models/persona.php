<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */

class Persona extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    public function save($param){
        $data = array(
            'dni' =>  $param['dni'],
            'nombre' => $param['nombre'],
            'apellido' => $param['apellido'],
            'fecha_nacimiento' => date('Y-m-d', strtotime(str_replace('/','-', $param['fecha_nac']))),
            'email' => $param['email'],
            'ciudadId' => $param['ciudadId']
        );

        $this->db->insert('personas', $data);      
        return $this->db->insert_id();
    }

    public function update($param){
        $data = array(
            'nombre' => $param['nombre'],
            'apellido' => $param['apellido'],
            'email' => $param['email'],
        );

        $this->db->update('personas',$data);
        $this->db->where('id', $this->session->userdata('session_persona_id'));
        redirect('personac/index');
      }

    public function delete($id){
        //dos formas de borrar
         $persona = array(
             'id' => $id
         );
        
         //Borrar por id
         $this->db->delete('personas', $persona);

        // $this->db->where('id', $id);
        // $this->db->delete('usuarios');
    }

    public function getAll(){
        $this->db->select('p.id, p.nombre, p.apellido,p.dni,c.nombre as ciudad');
        $this->db->from('personas p');
        $this->db->join('ciudades c', 'c.id = p.ciudadId');

        return $this->db->get()->result();
    }

}