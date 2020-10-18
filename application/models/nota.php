<?php

class Nota extends CI_Model{
    function __construct()
    {
        parent::__construct();
    }

    public function getNotas(){
        $this->db->select("p.id id, CONCAT(p.apellido, ', ',p.nombre) as alumno,
        n.1B A, n.2B B, n.3B C, n.4B D, n.notafinal", false);
        $this->db->from('notas n');
        $this->db->join('personas p','p.id = n.personaId','right');
        $r =  $this->db->get();
        return $r->result();
    }

    public function saveNotas($params){
        $data =array(
            'personaId' => $params['idPer'],
            '1B' => $params['n1'],
            '2B' => $params['n2'],
            '3B' => $params['n3'],
            '4B' => $params['n4'],
            'notafinal' => $params['nf'],
        );
        $this->db->insert('notas',$data);
    }


    public function deleteNotas($id){
        $notas = array(
            'personaId' => $id
        );       
        $this->db->delete('notas', $notas);


    }

}