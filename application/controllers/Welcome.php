<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function  __construct() {
        parent::__construct();
      
        $this->load->library('session');
        $this->load->model('file');
    }
    
    public function index(){
        $data = array();
       
        if($this->input->post('fileSubmit') && !empty($_FILES['files']['name']))
        {
            $filesCount = count($_FILES['files']['name']);
            for($i = 0; $i < $filesCount; $i++)
            {
                $_FILES['file']['name']     = $_FILES['files']['name'][$i];
                $_FILES['file']['type']     = $_FILES['files']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
                $_FILES['file']['error']     = $_FILES['files']['error'][$i];
                $_FILES['file']['size']     = $_FILES['files']['size'][$i];
                
                
                //$uploadPath = 'uploads/files/';
                $config['upload_path'] = 'uploads/files';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                
                
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                
                
                if($this->upload->do_upload('file'))
                {
                 
                    $fileData = $this->upload->data();
                    echo "<pre>";
                    print_r($fileData);
                    echo "<pre>";
                    $uploadData[$i]['file_name'] = $fileData['file_name'];
                    $uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s");
                }
            }
            
            if(!empty($uploadData))
            {
               
                $insert = $this->file->insert($uploadData);
              
               // $statusMsg = $insert?'Files uploaded successfully.':'Some problem occurred, please try again.';
                //$this->session->set_flashdata('statusMsg',$statusMsg);
            }
        }
        
       
        $data['files'] = $this->file->getRows();
        
       
        $this->load->view('upload_files/index', $data);
    }

}

