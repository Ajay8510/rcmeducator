<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('User_model','user');
        $this->load->library('pagination');
      
    }
    

    /*
     * User account information
     */
    public function account(){
        $data = array();
        if($this->session->userdata('isUserLoggedIn') && ($this->session->userdata('userEmail')) != 'admin@example.com'){
            if($this->session->userdata('amount'))
            {
                $this->load->view('paynow');
            }
            else
            {
                $data['user'] = $this->user->getRows(array('id'=>$this->session->userdata('userId')));
                //load the view
                $this->template->set('title', 'RCM Educator | Revenue Cycle Solutions & Educator');
                $this->template->load('template', 'contents' , 'index', $data);    
            }
        }

        else if($this->session->userdata('isUserLoggedIn') && ($this->session->userdata('userEmail')) == 'admin@example.com')
        {
             $this->load->view('admin/index');
        }

        else{
            redirect('users/login');
        }
    }
    

     public function dashboard(){
        $data = array();
        if($this->session->userdata('isUserLoggedIn') && ($this->session->userdata('userEmail')) != 'admin@example.com' ){
            $data['user'] = $this->user->getRows(array('id'=>$this->session->userdata('userId')));
            $data['payment_list'] = $this->user->payment_list($this->session->userdata('userId'));
            //load the view
            $this->template->set('title', 'RCM Educator | Revenue Cycle Solutions & Educator');
            $this->template->load('template', 'contents' , 'account', $data);
        }

        else if($this->session->userdata('isUserLoggedIn') && ($this->session->userdata('userEmail')) == 'admin@example.com')
        {
             $this->load->view('admin/index');
        }
        else{
            redirect('users/login');
        }
    }
       

    /*
     * User login
     */
    public function login(){
        $data = array();
        if($this->session->userdata('success_msg')){
            $data['success_msg'] = $this->session->userdata('success_msg');
            $this->session->unset_userdata('success_msg');
        }
        if($this->session->userdata('error_msg')){
            $data['error_msg'] = $this->session->userdata('error_msg');
            $this->session->unset_userdata('error_msg');
        }
        if($this->input->post('loginSubmit')){
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'password', 'required');
            if ($this->form_validation->run() == true) {
                $con['returnType'] = 'single';
                $con['conditions'] = array(
                    'email'=>$this->input->post('email'),
                    'password' => md5($this->input->post('password')),
                    'status' => '1'
                );
                $checkLogin = $this->user->getRows($con);
                if($checkLogin){
                    $this->session->set_userdata('isUserLoggedIn',TRUE);
                    $this->session->set_userdata('userId',$checkLogin['id']);
                    $this->session->set_userdata('userEmail', $checkLogin['email']);
                    redirect('users/account/');
                }else{
                    $data['error_msg'] = 'Wrong email or password, please try again.';
                }
            }
        }

        //load the view
        $this->template->set('title', 'RCM Educator | Revenue Cycle Solutions & Educator');
        $this->template->load('template', 'contents' , 'login', $data); 
       
    }
    
    /*
     * User registration
     */
    public function registration(){
        $data = array();
        $userData = array();
        if($this->input->post('regisSubmit')){
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_email_check');
            $this->form_validation->set_rules('password', 'password', 'required');
            $this->form_validation->set_rules('conf_password', 'confirm password', 'required|matches[password]');

            $userData = array(
                'name' => strip_tags($this->input->post('name')),
                'email' => strip_tags($this->input->post('email')),
                'password' => md5($this->input->post('password')),
                'gender' => $this->input->post('gender'),
                'phone' => strip_tags($this->input->post('phone'))
            );

            if($this->form_validation->run() == true){
                $insert = $this->user->insert($userData);
                if($insert){
                    $this->session->set_userdata('success_msg', 'Your registration was successfully. Please login to your account.');
                    redirect('users/login');
                }else{
                    $data['error_msg'] = 'Some problems occured, please try again.';
                }
            }
        }
        $data['user'] = $userData;
        //load the view
        $this->template->set('title', 'RCM Educator | Revenue Cycle Solutions & Educator');
        $this->template->load('template', 'contents' , 'registration', $data); 
    }
    
    /*
     * User logout
     */
    public function logout(){
        $this->session->unset_userdata('isUserLoggedIn');
        $this->session->unset_userdata('userId');
        $this->session->unset_userdata('amount');
        $this->session->unset_userdata('trasaction_id');
        $this->session->unset_userdata('member');
        $this->session->unset_userdata('total');
        $this->session->unset_userdata('coupon');
        $this->session->unset_userdata('product_id');
        $this->session->sess_destroy();
        redirect('users/login/');
    }
    
    /*
     * Existing email check during validation
     */
    public function email_check($str){
        $con['returnType'] = 'count';
        $con['conditions'] = array('email'=>$str);
        $checkEmail = $this->user->getRows($con);
        if($checkEmail > 0){
            $this->form_validation->set_message('email_check', 'The given email already exists.');
            return FALSE;
        } else {
            return TRUE;
        }
    }


    public function userList()
    {
        $config = [
            'base_url' => base_url('users/paymentList'),
            'per_page' => 10,
            'total_rows' => $this->user->userRows(),
            'full_tag_open' => "<div class='pagination'>",
            'full_tag_close' => "</div>",
            'next_tag_open' => "<a>",
            'next_tag_close' => '</a>',
            'prev_tag_open' => '<a>',
            'prev_tag_close' => '</a>',
            'num_tag_open' => '<a>',
            'num_tag_close' => '</a>',
            'cur_tag_open' => '<a class="active">',
            'cur_tag_close' => '</a>'

        ];

        $this->pagination->initialize($config);
        $data['userList'] = $this->user->userList($config['per_page'], $this->uri->segment(3));
        $this->load->view('admin/userlist',$data);
    }


    public function paymentList()
    {
        

        
        $config = [
            'base_url' => base_url('users/paymentList'),
            'per_page' => 10,
            'total_rows' => $this->user->paymentRows(),
            'full_tag_open' => "<div class='pagination'>",
            'full_tag_close' => "</div>",
            'next_tag_open' => "<a>",
            'next_tag_close' => '</a>',
            'prev_tag_open' => '<a>',
            'prev_tag_close' => '</a>',
            'num_tag_open' => '<a>',
            'num_tag_close' => '</a>',
            'cur_tag_open' => '<a class="active">',
            'cur_tag_close' => '</a>'

        ];

        $this->pagination->initialize($config);
        $data['paymentList'] = $this->user->paymentList($config['per_page'], $this->uri->segment(3));
        $this->load->view('admin/paymentlist',$data);
    }


    public function members()
    {
        $webinar = $this->input->post('webinar');
        $recording = $this->input->post('recording');
        $total = $this->input->post('total');
        $this->session->set_userdata('webinar', $webinar);
        $this->session->set_userdata('recording', $recording);
        $amount = ceil($total);
        $this->session->set_userdata('amount', $amount);

    }

    public function paynow()
    {
       $data = $this->input->post();
       
       $member = 1; 
       $amount = '';

       if(!empty($data['member']))
       {
         $member = $data['member'];
       }
       if(!empty($data['total']))
       {
               if($data['total'] == 1)
               {
                    $amount =  (float)199.99 * (int)$member;
               }
               
               if($data['total'] == 2)
               {
                    $amount =  (float)199.99;
               }
        
               if($data['total'] == 3) 
               {
                  $amount = ((float)199.99 * (int)$member) + (float)199.99;
               }
            
            //apply discount coupon   
            if($data['coupon'] == 'save20')
            {
                $amount = (float)$amount - (float)20;
            }
            
            if($data['coupon'] == 'save50')
            {
                $amount = (float)$amount - (float)50;
            }
       
            $final_amount = ceil($amount);
            if($data['coupon'])
            {
                $this->session->set_userdata('coupon', $data['coupon']);
            }
            $this->session->set_userdata('amount', $final_amount);
            $this->session->set_userdata('member', $data['member']);
            $this->session->set_userdata('total', $data['total']);
            $this->session->set_userdata('product_id', $data['product_id']);
            
       }


      

       if(!$this->session->userdata('isUserLoggedIn'))
       { 
          redirect('users/login');
       }
        
        $this->template->set('title', 'RCM Educator | Revenue Cycle Solutions & Educator');
        // $this->template->load('template', 'contents' , 'paynow', $data);  
      $this->load->view('paynow'); 
    }

    public function create_payment()
    {
       //4788250000028291

        $data = $this->input->post();
        
        $card_holder_name = $this->input->post("name");
        $card_number = $this->input->post("number");
        $card_type = $this->input->post("card_type");
        $card_cvv = $this->input->post("cvc");
        $card_expiry = $this->input->post("expiry");
        $amount = ($this->session->userdata('amount')) ? $this->session->userdata('amount') : 0;
        $card_expiry =   $result = preg_replace(
            array('/\s/', '/\//'),
            array('', ''),
            $card_expiry
        );

         $data = array(
           'card_holder_name' =>  $card_holder_name,
           'card_number' =>str_replace(' ', '', $card_number),
           'card_type' =>  $card_type,
           'card_cvv' =>  $card_cvv,
           'card_expiry' =>  $card_expiry,
           'amount' =>  $amount,

         );
         $this->load->library('payeezy',$data);
         $output = $this->payeezy->payment();
         
         $prod_name = ($this->session->userdata('product_id') == 1) ? 'Telemedicine 2019' : 'E/M 2019';

         if($output['transaction_status'] == 'approved' && $output['validation_status'] == 'success')
         {
             $save = array();
             $save['invoice'] = '';
             $save['trasaction_id'] = $output['transaction_id'];
             
             $this->session->set_userdata('trasaction_id',$save['trasaction_id']);
             
             $save['log_id'] = $this->session->userdata('userId');
             $save['product_id'] = $this->session->userdata('product_id');;
             $save['product_name'] = $prod_name;
             $save['product_type'] =  $this->session->userdata('total');
             $save['product_quantity'] = $this->session->userdata('member');
             $save['product_amount'] = $amount;
             $save['payer_address'] = $this->input->post('billing_address');
             $save['payer_city']  = '';
             $save['payer_state'] = '';
             $save['payer_zip']  = '';
             $save['payer_country'] = '';
             $save['payer_email'] = '';
             if($output['validation_status'] == 'success')
             {
                $save['payment_status'] = 1;
             }
             
             $save['posted_date'] = date('Y-m-d H:i:s'); 
             $this->user->savePayment($save);
             $json = array(
                 'status' => true,
                 'payment_status' => 'success',
                 'message_type' => 'payment success',
                 'message_msg'  => 'Payment Successfully'
             );
             echo json_encode($json);
         }
         else
         {
             $save = array();
             $save['invoice'] = '';
             $save['trasaction_id'] = $output['correlation_id'];
             $save['log_id'] = $this->session->userdata('userId');
             $save['product_id'] = $this->session->userdata('product_id');
             $save['product_name'] = $prod_name;
             $save['product_type'] =  $this->session->userdata('total');
             $save['product_quantity'] = $this->session->userdata('member');
             $save['product_amount'] = $amount;
             $save['payer_address'] = $this->input->post('billing_address');
             $save['payer_city']  = '';
             $save['payer_state'] = '';
             $save['payer_zip']  = '';
             $save['payer_country'] = '';
             $save['payer_email'] = '';
             if($output['validation_status'] != 'success')
             {
                $save['payment_status'] = 0;
             }
             $save['posted_date'] = date('Y-m-d H:i:s'); 
             $this->user->savePayment($save);
              
            $error_type = $output['Error']['messages'][0]['code'];
            $error_msg = $output['Error']['messages'][0]['description']; 
            
            $json = array(
                'status' => false,
                'payment_status' => 'failed',
                'message_type' => $error_type,
                'message_msg'  => $error_msg
            );
            echo json_encode($json);
         }
        
    }
    
    public function payment_success(){
        $data = array();
        $this->template->set('title', 'RCM Educator | Revenue Cycle Solutions & Educator');
        $this->template->load('template', 'contents' , 'success', $data);    
    }
    
    public function email(){
        $this->load->config('email');
        $this->load->library('email');
        
        $data = $this->input->post();
        
        $from = $this->config->item('smtp_user');
        $to = $data['email'];
        $subject = $data['subject'];
        $message = $data['body'];

        $this->email->set_newline("\r\n");
        $this->email->from($from);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);

        if ($this->email->send()) {
            echo 'Your Email has successfully been sent.';
        } else {
            show_error($this->email->print_debugger());
        }
    }

}