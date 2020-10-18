<?php
class Ciudad extends CI_Model{
    function __construct()
    {
        parent::__construct();
    }

    public function getCiudades($sitReg){
        $data = $this->db->get_where('ciudades',array('sitReg'=> $sitReg));
        return $data->result();
    }
    public function updateCiudad($nombre){
        $data = array(
            'nombre' => $nombre['nombre'],                     
        );

        $this->db->update('ciudades',$data);
        $this->db->where('id',$nombre['id']);
        redirect('ciudadc/index');

    }
}