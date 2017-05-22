<?php

class Auth extends MY_Controller {

    private $Auth = '';

    function __construct() {
        parent::__construct();
        $this->Auth = new User_authentication;
    }

    function index() {
        $data['page'] = 'content/_login_default';
        $this->TemplateBuilder($data);
    }

    function login() {

        $data['page'] = 'content/_login';
        $this->TemplateBuilder($data);
    }

    function forgot() {

        $this->load->view('pages/forgot');
    }

    function changepass() {
        $email = $this->_POST('email');
        $check = $this->_POST('sendsms');

        $res = $this->db->where('email', $email)->get('users')->result();

        if (count($res) > 0):
            $password = rand(1000, 10000);
            $name = $res[0]->name;
            $new = substr($res[0]->phone, 1);
            $recipients = "254" . $new;
            if ($check == 1) {
               // $this->sendPares($email, $name, $password);
                $this->sendTextPass($name, $recipients, $password);
                $this->session->set_flashdata('msg', "We have sent you an new password in your phone and email.");
            } else {
                //$this->sendPares($email, $name, $password);
                 $this->sendTextPass($name, $recipients, $password);
                $this->session->set_flashdata('msg', "We have sent you an new password in your  email.");
            }
            $this->db->where('email', $email)->update('users', array('password' => $this->Auth->cryptPass($password),'rawpass'=>$password));

            redirect('auth/authorize');
        else:
            $this->session->set_flashdata('msg', "Email Address could not be found");
            redirect('auth/forgot');
        endif;
    }

    function authorize() {
        $this->load->view('pages/login');
    }

    function register() {
        $this->load->view('pages/register');
    }

  

    function loginCheckout($mode) {
        $data['check'] = $mode;
        $data['page'] = 'content/_login';
        $this->builtIctShopTemplate($data);
    }

    function authenticate() {
        $this->Auth->Authenticate_user_ck($this->_POST('username'), $this->_POST('password'));
    }

    function verify($criteria, $data) {
        $this->Auth->check_user_details($criteria, $data);
    }

    function authPhone($phone) {
        $this->Auth->findUser($phone);
    }

    function authCode($email, $code) {
        $this->Auth->findCode($email, $code);
    }

    function authReset($email) {
        $this->Auth->Reset($email, $this->post('pass'));
    }

    function logout() {
        $this->Auth->kill_session();
    }

}
