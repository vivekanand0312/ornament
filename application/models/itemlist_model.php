<?php
/**
 * Itemlist_model
 * 
 * @package   
 * @author Vivekanand
 * @copyright ornament
 * @version 2016
 * @access public
 */
class Itemlist_model extends CI_Model
{
    
    /**
     * Itemlist_model::__construct()
     * 
     * @return
     */
    function __construct() {
        parent::__construct();
    }
    
    /**
     * Itemlist_model::add_item()
     * 
     * @param mixed $item
     * @param mixed $comment
     * @return
     */
    function add_item($item, $comment){
        $created = date("Y/m/d");
        $this->db->set('item', $item);
        $this->db->set('comment', $comment);
        $this->db->set('created', $created);
        $this->db->insert('item');
        $item_id = $this->db->insert_id();
        
        if($this->db->affected_rows()>0){
            echo'<div class="alert alert-dismissable alert-success"><h4>Item Added Successfully</h4></div>';
//            $this->addHistory($item_id, $created);
            exit;
        }
        else{
            echo'<div class="alert alert-dismissable alert-danger"><h4>Somethng went wrong! please try later</h4></div>';
            exit;
        }
    }
    
    /**
     * Itemlist_model::delete_item()
     * 
     * @param mixed $id
     * @return
     */
    function delete_item($id){
        if($this->session->userdata('role') == 'admin'){
            if($this->db->delete('item',  array('id'=>$id))){
                echo'<div class="alert alert-dismissable alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h6> One record deleted successfully </h6> 
                    </div>';
            }
            else{
               echo' <div class="alert alert-dismissable alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h6>Sorry something went wrong</h6> 
                    </div>';
            }
        }
        else{
            echo' <div class="alert alert-dismissable alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h6>Invalid user</h6> 
                    </div>';
            
        }
    }
    
    /**
     * Itemlist_model::load_edit_view()
     * 
     * @param mixed $id
     * @return
     */
    function load_edit_view($id){
       $data['query'] =   $this->db->query("SELECT * FROM item where id = '$id' ");
    }
            
    /**
     * Itemlist_model::do_edit()
     * 
     * @param mixed $comment
     * @param mixed $item
     * @param mixed $id
     * @return
     */
    function do_edit($comment, $item, $id){
        $data = array(
               'item' => $item,
               'comment' => $comment
            );

        $this->db->where('id', $id);
        $this->db->update('item', $data); 
 
        if($this->db->affected_rows()>0){
            echo'<div class="alert alert-success alert-dismissible" role="alert" style="margin-top: -18px; padding: 10px;">
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <strong>Success!</strong> This item updated successfully.
            </div>';
        }
        else{
            echo'<div class="alert alert-warning alert-dismissible" role="alert" style="margin-top: -18px; padding: 10px;">
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <strong>Warning:</strong> No Change for update.
            </div>';
        }
   }
   
    /**
     * Itemlist_model::addHistory()
     * 
     * @param mixed $item_id
     * @param mixed $created
     * @return
     */
    function addHistory($item_id, $created){
       $this->db->set('item_id', $item_id);
       $this->db->set('weight', 0);
       $this->db->set('quantity', 0);
       $this->db->set('created', $created);
       $this->db->insert('report');
   }    
}
/* End of file itemlist_model.php */
/* Location: ./application/models/itemlist_model.php */