<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Uploadc extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('uploadfileimage');
        $this->load->helper('download');
        
    }

    public function index()
    {
        
        $this->showView($data = $this->setData());
    }
    private function setData(){
        $data['error'] = "";
        $data['errorArch'] = "";
        $data['estado'] = "";
        $data['archivo'] = "";
        return $data;
    }

    public function uploadImage()
    {
        $data = $this->setData();
        $config['upload_path'] = "./uploads/images";
        $config['allowed_types'] = "gif|jpg|png";
        $config['max_size'] = "2048";
        $config['max_width'] = "2024";
        $config['max_height'] = "2008";
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload("fileImagen")) {
            $data['error'] = $this->upload->display_errors();
            $this->showView($data);
        }else{
            $file_info = $this->upload->data();
            $titulo = $this->input->post('titulo');
            $imagen = $file_info['file_name'];
            $subir = $this->uploadfileimage->uploadImage($titulo,$imagen);
            $data['titulo'] = $titulo;
            $data['imagen'] = $imagen;
            $data['estado'] = "Imagen subida con éxito!";
            $this->showView($data);
        }
    }



    public function showView($data, $isInfo=null){
        $this->load->view('layout/header');
        $this->load->view('layout/menu');
        if($isInfo == null){
        $this->load->view('upload/uploadv',$data);    
        }else
        $this->load->view('upload/'.$isInfo,$data);    
        $this->load->view('layout/footer');        
    }


    public function uploadFile(){
        $config['upload_path'] = "./uploads/files";
        $config['allowed_types'] = 'pdf|xlsx|docx';
        $config['max_size'] = '2048';
        $this->load->library('upload', $config);
        if(!$this->upload->do_upload('file')){
            $data['errorArch']=$this->upload->display_errors();
           $this->showView($data); 
        }{
            $file_info = $this->upload->data();
            $titulo = $this->input->post('tituloFile');
            $archivo = $file_info['file_name'];
            $this->uploadfileimage->uploadImage($titulo,$archivo);            
            $data['estado'] = "Archivo Subido.";
            $data['archivo'] = $archivo;
            $data['error'] = "";
            $data['errorArch']="";
            $this->showView($data);
        }
    }

        public function download($name){
            $data = file_get_contents('./uploads/files/'.$name);
            force_download($name,$data);
        }    
}
