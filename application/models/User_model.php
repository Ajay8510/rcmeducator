<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends CI_Model{
    function __construct() {
        $this->userTbl = 'users';
    }
    /*
     * get rows from the users table
     */
    function getRows($params = array()){
        $this->db->select('payments.trasaction_id, payments.product_amount, payments.payment_status,payments.posted_date,payments.payer_name,users.id, users.email,users.name, users.phone,users.gender');
        $this->db->join('payments', 'payments.log_id = users.id','left');
        $this->db->from($this->userTbl);

        //fetch data by conditions
        if(array_key_exists("conditions",$params)){
            foreach ($params['conditions'] as $key => $value) {
                $this->db->where($key,$value);
            }
        }
        
        if(array_key_exists("id",$params)){
            $this->db->where('users.id',$params['id']);
            $query = $this->db->get();
            $result = $query->row_array();
        }else{
            //set start and limit
            if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit'],$params['start']);
            }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit']);
            }
            $query = $this->db->get();
            if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){
                $result = $query->num_rows();
            }elseif(array_key_exists("returnType",$params) && $params['returnType'] == 'single'){
                $result = ($query->num_rows() > 0)?$query->row_array():FALSE;
            }else{
                $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
            }
        }

        //return fetched data
        return $result;
    }
    
    /*
     * Insert user information
     */
    public function insert($data = array()) {
        //add created and modified data if not included
        if(!array_key_exists("created", $data)){
            $data['created'] = date("Y-m-d H:i:s");
        }
        if(!array_key_exists("modified", $data)){
            $data['modified'] = date("Y-m-d H:i:s");
        }
        
        //insert user data to users table
        $this->db->where('email', $data['email']);
        $query = $this->db->get($this->userTbl);
        if($query->num_rows() > 0)
        {
            $this->db->where('email', $data['email']);
            $this->db->update($this->userTbl, $data);
            return true;
        }
        else{
            $insert = $this->db->insert($this->userTbl, $data);
            if($insert){
                return $this->db->insert_id();
            }else{
                return false;
            }
        }
        
    }

    public function userList($limit, $offset){
        $this->db->order_by("id", "desc");
        $data = $this->db->get('users');
        return $data->result_array();
    }

     public function userRows()
    {
        $this->db->order_by("id","desc");
        $data = $this->db->get('users');
        return $data->num_rows(); 
    }

    public function paymentList($limit, $offset){
        $this->db->select('payments.id, payments.trasaction_id, payments.product_amount, payments.payment_status,payments.posted_date,payments.payer_name,users.email,users.name, users.phone');
        $this->db->order_by("payments.id","desc");
        $this->db->limit($limit, $offset);
        $this->db->join('users', 'users.id = payments.log_id','left');
        $data = $this->db->get('payments');
        return $data->result_array(); 
    }

    public function paymentRows()
    {
        $this->db->select('payments.trasaction_id, payments.product_amount, payments.payment_status,payments.posted_date,payments.payer_name,users.email,users.name, users.phone');
        $this->db->order_by("payments.id","desc");
        $this->db->join('users', 'users.id = payments.log_id','left');
        $data = $this->db->get('payments');
        return $data->num_rows(); 
    }

    public function savePayment($data)
    {
        $insert = $this->db->insert('payments', $data);
        if($insert)
        {
            return $this->db->insert_id();
        }
        else{
            return false;
        }
    }
    
    public function payment_list($id)
    {
        $this->db->select('*');
        $this->db->where('log_id', $id);
       $data = $this->db->get('payments');
       return $data->result_array();
    }


}