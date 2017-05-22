<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Inbox extends MY_Controller {

    private $_Auth = '';
    private $_API = '';

    public function __construct() {
        parent::__construct();
        $this->_Auth = new User_authentication;
        $this->_API = new API;
    }

      public function read($id) {
        if ($this->session->userdata('user_id') == TRUE) {
            $data = array('read'=>1);
            $this->_API->setStatus('id', $id, 'inbox', $data);
            $data['content'] = 'pages/inbox';
            $data['ptitle'] = "User &#187 Dashboard &#187 Inbox &#187 Message";
            $data['title'] = "My Message";

            $data['ads'] = $this->_API->loadUnread($id);

            $data['messages'] = $this->_API->loadMessages();
            $data['mcount'] = $this->_API->unreadMessages();
            $data['udet'] = $this->_API->getUserDetails();
            $this->load->view('pages/inbox', $data);
        } else {
            redirect('auth/authorize/');
        }
    }
  

}
