<?php
class Uploadfileimage extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }

    function uploadImage($titulo,$imagen){
        $data = array(
            'titulo' => $titulo,
            'url' => $imagen
        );

        return $this->db->insert('files_images', $data);
    }


}