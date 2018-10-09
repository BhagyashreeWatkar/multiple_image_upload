<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class File extends CI_Model{
    function __construct() {
        $this->tableName = 'files';
    }
    
   
    public function getRows($id = '')
    {
        $this->db->select('id,file_name');
        $this->db->from('files');
    if($id)
    {
            $this->db->where('id',$id);
           
            $query = $this->db->get();
            $result = $query->row_array();
        }
        else{
            //$this->db->order_by('uploaded_on','desc');
            $query = $this->db->get();
            $result = $query->result_array();
        
        return !empty($result)?$result:false;
    }
}
    
    
    public function insert($data = array()){
        $insert = $this->db->insert_batch('files',$data);
        return $insert;
    }
    
}