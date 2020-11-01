<?php

class SendEmail extends CI_Controller{
     function __construct(){
        parent::__construct();
    }

    public function sendEmail(){
      
        $this->load->library('email',$this->emailConfiguration());        
        $this->email->set_newline("\r\n");
        $this->email->from('maudev.test123@gmail.com');
        $this->email->to('maurosaravia59@gmail.com');
        $this->email->subject('test');
        $this->email->message('test to send an email');           
        if($this->email->send())
        echo "Correo enviado";
        else
        show_error($this->email->print_debugger());
    }

    private function emailConfiguration(){
        $configGmail = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => '@gmail.com',
            'smtp_pass' => '',
            'mailtype' => 'html',
            'charset' => 'utf-8'            
        );
        return $configGmail;
    }


}