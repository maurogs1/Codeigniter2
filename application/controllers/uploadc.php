<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Uploadc extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('upload');
        $this->load->helper(array('download'));
    }

    public function index()
    {
        $data['error'] = "";
        $data['errorArch'] = "";
        $data['estado'] = "";
        $data['archivo'] = "";
        $this->showView($data);
    }

    public function uploadImage()
    {
        $config['upload_path'] = "./uploads/images";
        $config['allowed_types'] = "gif|jpg|png";
        $config['max_size'] = "2048";
        $config['max_width'] = "2024";
        $config['max_height'] = "2008";
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload("fileImage")) {
            $data['error'] = $this->upload->display_errors();
            $this->showView($data);
        }else{
            $file_info = $this->upload->data();
            $this->createMiniImage($file_info['file_name']);
            $titulo = $this->input->post('titulo');
            $imagen = $file_info('file_name');
            $upload = $this->upload->uploadImage($titulo,$imagen);
            $data['titulo'] = $titulo;
            $data['imagen'] = $imagen;
            $this->showView($data);
        }
    }

    public function createMiniImage($filename){
        $config['image_library'] ="gd2";
        $config['source_image'] ="uploads/images/.$filename";
        $config['create_thub'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['new_image'] ="uploads/images/thumbs/";
        $config['thumb_marker']='';
        $config['width'] =150;
        $config['height'] =150;
        $this->load->library('image_lib',$config);
        $this->image_lib->resize();
    }

    public function showView($data){
        $this->load->view('layout/header');
        $this->load->view('layout/menu');
        $this->load->view('upload/uploadv',$data);
        $this->load->view('layout/footer');        
    }

}
