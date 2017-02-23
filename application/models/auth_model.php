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
class Auth_model extends CI_Model
{
    
    /**
     * Auth_model::__construct()
     * 
     * @return
     */
    function __construct() {
        parent::__construct();
    }
    
    /**
     * Auth_model::auth()
     * 
     * @param mixed $name
     * @param mixed $password
     * @return
     */
    function auth($name,$password){
        $password = sha1($password);
        $this->db->where('user_name',$name);
        $this->db->where('password',$password);
        $this->db->where('is_active',1);
        $query = $this->db->get('auth');
        if($query->num_rows()==1){
            foreach ($query->result() as $row){
                $data = array(
                            'username'=> $row->user_name,
                            'logged_in'=>TRUE,
                            'role'=>$row->role
                        );
            }
            $this->session->set_userdata($data);
            return TRUE;
        }
        else{
            return FALSE;
      }
        
    }   
}
/* End of file auth_model.php */
/* Location: ./application/models/auth_model.php */