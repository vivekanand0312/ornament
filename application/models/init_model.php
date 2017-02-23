<?php
/**
 * Init_model
 * 
 * @package   
 * @author Vivekanand
 * @copyright ornament
 * @version 2016
 * @access public
 */
class Init_model extends CI_Model
{
    
    /**
     * Init_model::__construct()
     * 
     * @return
     */
    function __construct() {
        parent::__construct();
        $this->index();
    }
    
    /**
     * Init_model::index()
     * 
     * @return
     */
    function index(){
//        $this->init();
    }
    
    /**
     * Init_model::init()
     * 
     * @return
     */
    function init(){
//        $query = 'SELECT item.id as itemID, item.item, transaction.comment, transaction.created';        
//        $this->db->from('item');
//        $this->db->join('transaction', 'transaction.item_id = item.id', 'right');
//        $this->db->limit(4, $this->uri->segment(3));
//        //$this->db->order_by("transaction.id", "desc"); 
//        $query = $this->db->get();
       $segment = intval($this->uri->segment(3));
//       echo gettype($segment); exit;
        $sql = "SELECT item.item, item.id as itemID, transaction.id, transaction.weight, transaction.nug, transaction.total_weight, transaction.transaction_type, transaction.comment, transaction.created from transaction LEFT JOIN item ON transaction.item_id = item.id ORDER BY transaction.id DESC ";        
        $query = $this->db->query($sql);
        
        return $query;
    }
    
    /**
     * Init_model::listItem()
     * 
     * @return
     */
    function listItem(){
        $this->db->order_by("item"); 
        $query = $this->db->get('item');
        
        return $query;
    }   
}
/* End of file init_model.php */
/* Location: ./application/models/init_model.php */