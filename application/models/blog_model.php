<?php
/**
 * Blog_model
 * 
 * @package   
 * @author Vivekanand
 * @copyright ornament
 * @version 2016
 * @access public
 */
class Blog_model extends CI_Model
{
    
    /**
     * Blog_model::__construct()
     * 
     * @return
     */
    function __construct() {
        parent::__construct();
    }
    
    /**
     * Blog_model::register_user()
     * 
     * @return
     */
    function register_user($name, $email, $password, $created)
    {
        $password = sha1($password);
        $query = "INSERT INTO admin (name, email, password, created) VALUES(?,?,?,?)";
        
        $this->db->query($query, array($name, $email, $password, $created));
        if($this->db->affected_rows()>0)
        {
            echo'<div class="alert alert-dismissable alert-success"><h4>Registration Successfully</h4></div>';
        }
        else
        {
            echo'<div class="alert alert-dismissable alert-danger"><h4>Somethng went wrong! please try later</h4></div>';
        }
        
    }
}
/* End of file blog_model.php */
/* Location: ./application/models/blog_model.php */