<?php
/**
 * Auth_model
 * 
 * @package   
 * @author Vivekanand
 * @copyright ornament
 * @version 2016
 * @access public
 */
class Upload_model extends CI_Model
{
    /**
     * Upload_model::__construct()
     * 
     * @return
     */
    function __construct() {
        parent::__construct();
    }
    
    /**
     * Upload_model::save_upload()
     * 
     * @param mixed $file_title
     * @param mixed $file_path
     * @param mixed $file_title2
     * @return
     */
    public function save_upload($file_title, $file_path, $file_title2)
    {
        $today = date('y/m/d');
        $this->db->set('name', $file_title);
        $this->db->set('path', $file_path);
        $this->db->set('uploaded', $today);
        $this->db->set('title', $file_title2);
        $this->db->insert('files'); 
        
        if($this->db->affected_rows()>0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
        
    }
}
/* End of file upload_model.php */
/* Location: ./application/models/upload_model.php */