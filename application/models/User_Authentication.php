<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class User_authentication extends CI_Model {

   
                function __construct() {
        parent::__construct();
    }

    function Customer($email) {
        echo $this->db->where('email', $email)->get('client_accounts')->num_rows();
    }

    function check_client_details($username) {
        $u_avail = $this->db->where('client_username', $username)->get('client_user_details')->num_rows();
        if ($u_avail > 0) {
            $query = $this->db->select('uuid_status')->where('uuid_username', $username)->get('client_applications')->result();
            if ($query[0]->uuid_status === '0') {
                return 'status_default';
            } else {
                return 'status_activated';
            }
        } else {
            return 'username_na';
        }
    }

    function check_user_details($criteria,$data) {
        $u_avail = $this->db->where($criteria, $data)->get('users')->num_rows();
        if ($u_avail > 0) {
            $return = 'success';
        } else {
            $return = 'fail';
        }
        echo $return;
    }


    function cryptPass($input, $rounds = 9) {
        $salt = "";
        $saltChars = array_merge(range('A', 'Z'), range('a', 'z'), range(0, 9));
        for ($i = 0; $i < 22; $i++):
            $salt.=$saltChars[array_rand($saltChars)];
        endfor;
        return crypt($input, sprintf("$2y$%02d$", $rounds) . $salt);
    }

    function keySalt($sv) {
        return sha1('`^@345=-)97b~!' . $sv);
    }

    function Authenticate_user($username, $password) {
        $u_avail = $this->db->query("SELECT * FROM users WHERE email='$username' LIMIT 1")->result();
            if (crypt($password, $u_avail[0]->password) === $u_avail[0]->password):

                $session_db = array(
                    'username' => $u_avail[0]->name,
                    'user_id' => $u_avail[0]->id,                   
                    'phone' => $u_avail[0]->phone,
                    'email' => $u_avail[0]->email,
                    'status' => $u_avail[0]->status, 
                    'type'=>$u_avail[0]->user_type
                );
                $this->session->set_userdata($session_db);

                redirect('home/userdashboard');
            else :
            echo 'Fail';
            endif;
        
      
      
    }

    function Authenticate_user_ck($username, $password) {
        $u_avail = $this->db->query("SELECT * FROM users WHERE email='$username' OR phone='$username' LIMIT 1")->result();

            

            if (crypt($password, $u_avail[0]->password) === $u_avail[0]->password) :

                   $session_db = array(
                    'username' => $u_avail[0]->name,
                    'user_id' => $u_avail[0]->id,                   
                    'phone' => $u_avail[0]->phone,
                    'email' => $u_avail[0]->email,
                    'status' => $u_avail[0]->status, 
                     'type'=>$u_avail[0]->user_type
                );
                $this->session->set_userdata($session_db);
                $this->db->insert('last_login',array('date_time_login'=>date('d-m-Y H:i:s'),'user_id'=>$u_avail[0]->id));
                echo 'success';
            else :
               echo 'fail';
              
            endif;
           
        
    }
    
    function findUser($email) {

        $u_avail = $this->db->query("SELECT fname,alias,email,phone FROM client_accounts  WHERE email='$email'")->result();
          $token = 'PFP'.rand(0,10).date('Hs');
          if (!empty($u_avail)) : 
               
            $this->session->set_userdata(array('db'=> strtolower($u_avail[0]->alias)));
              $return = 'success';
            else :
                $return = 'fail';
              
            endif;
            echo $return;
        
    }
    
    function findCode($email,$token) {

        $u_avail = $this->db->query("SELECT ptoken FROM client_accounts  WHERE email='$email'")->result();
          if (!empty($u_avail)) : 
              
              if($u_avail[0]->ptoken===$token):              
            
              $return = 'success';
              else:
                $return = 'fail';

              endif;
            else :
                $return = 'fail';
              
            endif;
            echo $return;
        
    }

    function getAccountDetails($company) {
        $this->db->where('company', $company)->update('package', array('todate' => date('Y-m-d')));
        return $this->db->query("SELECT DATEDIFF(`todate`,`start_date`) as days_used, `days`, `package`,`current_users`,`total_users` FROM `package` WHERE company ='$company'")->result();
    }
    
    function getUsers($company){
        return $this->db->where('db',$company)->get('api_table')->num_rows();
    }

    function activate_account($username, $code_1) {
        $u_avail = $this->db->where('uuid_username', $username)->get('client_applications')->result();
        $code = substr($code_1, 4);
        foreach ($u_avail as $u_d):
            $hasedPass = $this->keySalt($code);
            if ($u_d->uuid_hash == $hasedPass) {
                $this->db->where('company_uuid', $code_1)->update('client_applications', array('uuid_status' => '1'));
                return 'success';
            } else {
                return 'fail';
            }
        endforeach;
    }

    function kill_session() {
        $CI = &get_instance();
        $session_items = array(
            'username' => '',
            'user_id' => '',
            'phone' => '',
            'email' => '',
            'type' => '',
            'status' => '',
            'alias' => '',
          
        );
        $CI->session->unset_userdata($session_items);
        $this->session->sess_destroy();
        unset($session_items);
        redirect('/');
    }

    function getLoginDetails($u) {
        $details = $this->db->where('client_username', $u)->get('client_user_details')->result();
    }

}
