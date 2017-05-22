<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

    private $_Auth = '';
    private $_API = '';

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('user_id') == TRUE && $this->session->userdata('type') > 0) {
            
        } else {
            redirect('/');
        }
        $this->_Auth = new User_authentication;
        $this->_API = new API;
    }

    public function AdminDashboard() {
        $data['content'] = 'pages/admindashboard';
        $data['ptitle'] = "Admin -> Dashboard";
        $data['title'] = "Admin Dashboard";
        $data['ads'] = $this->_API->getUsers();
        $data['last_login'] = $this->_API->getLastLogin($this->session->userdata('user_id'));
        $data['messages'] = $this->_API->loadMessages();
        $data['mcount'] = $this->_API->unSolved();
        $this->load->view('pages/admin/admindashboard', $data);
    }

    public function resources() {
        $data['content'] = 'pages/resources';
        $data['ptitle'] = "Admin -> Resources";
        $data['title'] = "Admin Dashboard";
        $data['ads'] = $this->_API->getResources();
        $data['messages'] = $this->_API->loadMessages();
        $data['mcount'] = $this->_API->unSolved();
        $this->load->view('pages/admin/resources', $data);
    }

    public function setResources() {
        $data['content'] = 'pages/setresources';
        $data['ptitle'] = "Admin -> Set Resources";
        $data['title'] = "Admin Dashboard";
        $data['ads'] = $this->_API->getResource();
        $data['messages'] = $this->_API->loadMessages();
        $data['mcount'] = $this->_API->unSolved();
        $this->load->view('pages/admin/setresources', $data);
    }

    public function editResources($id) {
        $data['id'] = $id;
        $data['content'] = 'pages/editresources';
        $data['ptitle'] = "Admin -> Edit Resources";
        $data['title'] = "Admin Dashboard";
        $data['ads'] = $this->_API->getResource();
        $data['eads'] = $this->_API->getEResources($id);
        $data['messages'] = $this->_API->loadMessages();
        $data['mcount'] = $this->_API->unSolved();
        $this->load->view('pages/admin/editresources', $data);
    }

    public function reports() {
        $data['ptitle'] = "Admin -> Dashboard -> Reported Ads";
        $data['title'] = "Admin Dashboard - Reports";
        $data['ads'] = $this->_API->getReportedAds();
        $data['messages'] = $this->_API->loadMessages();
        $data['mcount'] = $this->_API->unSolved();
        $this->load->view('pages/admin/reports', $data);
    }

    public function settings() {
        $data['ptitle'] = "Admin -> Dashboard -> Category Settings";
        $data['title'] = "Admin Dashboard - Settings";
        $data['ads'] = $this->_API->getCategories();
        $data['messages'] = $this->_API->loadMessages();
        $data['mcount'] = $this->_API->unSolved();
        $this->load->view('pages/admin/cat_settings', $data);
    }

    public function ads() {
        $data['ptitle'] = "Admin -> Dashboard ->Normal Ads";
        $data['title'] = "Admin Dashboard -> Normal Ads";
        $data['ads'] = $this->_API->getAllUserAdsAdmin();
        $data['messages'] = $this->_API->loadMessages();
        $data['mcount'] = $this->_API->unSolved();
        $this->load->view('pages/admin/normal_ads', $data);
    }

    public function obituaries() {
        $data['ptitle'] = "Admin -> Dashboard ->Obituaries";
        $data['title'] = "Admin Dashboard - Obituaries";
        $data['ads'] = $this->_API->getAllUserObsAdmin();
        $data['messages'] = $this->_API->loadMessages();
        $data['mcount'] = $this->_API->unSolved();
        $this->load->view('pages/admin/obituaries', $data);
    }

    public function premium() {
        $data['ptitle'] = "Admin -> Dashboard -> Premium Ads";
        $data['title'] = "Admin Dashboard - Premium Ads";
        $data['ads'] = $this->_API->getPremiumAds();
        $data['messages'] = $this->_API->loadMessages();
        $data['mcount'] = $this->_API->unSolved();
        $this->load->view('pages/admin/premium_ads', $data);
    }

    public function payments() {
        $data['ptitle'] = "Admin -> Dashboard -> Payments";
        $data['title'] = "Admin Dashboard - Payments";
        $data['ads'] = $this->_API->getPayments();
        $data['messages'] = $this->_API->loadMessages();
        $data['mcount'] = $this->_API->unSolved();
        $this->load->view('pages/admin/payments', $data);
    }

    public function comments() {
        $data['ptitle'] = "Admin -> Dashboard -> Obituary Comments";
        $data['title'] = "Admin Dashboard - Obituary Comments";
        $data['ads'] = $this->_API->loadComments();
        $data['messages'] = $this->_API->loadMessages();
        $data['mcount'] = $this->_API->unSolved();
        $this->load->view('pages/admin/comments', $data);
    }

    function savecategory() {
        $data = array('name' => $this->_POST('category'));
        $this->saveData('categories', $data);
    }

    function saveCategoryAssignment() {
        $parent = $this->_POST('category');
        $child = $this->_POST('sub');
        $data = array('parent' => $parent);
        $this->_API->setStatus('id', $child, 'categories', $data);
    }

    function adactivate($id) {
        $this->adminAdActivate($id, 'normal_ad');
    }

    function adeactivate($id) {
        $this->adminAdDeactivate($id, 'normal_ad');
    }

    function adelete($id) {
        $this->adminAdDelete($id, 'normal_ad');
    }

    function obactivate($id) {
        $this->adminObActivate($id, 'obituary');
    }

    function obdeactivate($id) {
        $this->adminObDeactivate($id, 'obituary');
    }

    function obdelete($id) {
        $this->adminObDelete($id, 'obituary');
    }

    function delcat($id) {
        $this->_API->Delete($id, 'categories');
    }

    function delresource($id) {
        $this->_API->Delete($id, 'resources');
    }

    function catedit($id) {
        $name = $this->_POST('name');
        $this->_API->Update($id, 'categories', array('name' => $name));
    }

    function preactivate($id) {
        $this->db->where('id', $id)->update('normal_ad', array('premium' => '1'));
        redirect('admin/ads');
    }

    function predeactivate($id) {
        $this->db->where('id', $id)->update('normal_ad', array('premium' => '0'));
        redirect('admin/ads');
    }

    public function addresource() {

        if ($_FILES['file']['tmp_name'] == '') {
            $addata = array(
                'link' => $this->_POST('title'),
                'type' => $this->_POST('type'),
                'body' => $this->_POST('description'),
            );
            $this->saveData('resources', $addata);
            redirect('admin/resources/');
        } else {

            $config['upload_path'] = 'uploads';
            $config['allowed_types'] = '*';
            $config['max_size'] = 1024;
            $config['file_name'] = 'resource' . date('YdmHis');
            $config['max_width'] = 1024;
            $config['max_height'] = 1024;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('file')) {


                $data['content'] = 'pages/resources';
                $data['ptitle'] = "Admin -> Resources";
                $data['title'] = "Admin Dashboard";
                $data['ads'] = $this->_API->getResources();
                $data['messages'] = $this->_API->loadMessages();
                $data['mcount'] = $this->_API->unSolved();
                $data['error'] = $this->upload->display_errors();

                $this->TemplateBuilder($data);
            } else {

                $filedata = $this->upload->data();



                $addata = array(
                    'link' => $this->_POST('title'),
                    'type' => $this->_POST('type'),
                    'body' => $this->_POST('description'),
                    'link' => 'uploads/' . $filedata['orig_name']
                );

                $this->saveData('resources', $addata);
                redirect('admin/resources/');
            }
        }
    }

    public function editresource($id) {

        if ($_FILES['file']['tmp_name'] == '') {
            $addata = array(
                'link' => $this->_POST('title'),
                'type' => $this->_POST('type'),
                'body' => $this->_POST('description'),
            );
            $this->_API->Update($id, 'resources', $addata);
            redirect('admin/editresources/' . $id);
        } else {

            $config['upload_path'] = 'uploads';
            $config['allowed_types'] = '*';
            $config['max_size'] = 1024;
            $config['file_name'] = 'resource' . date('YdmHis');
            $config['max_width'] = 1024;
            $config['max_height'] = 1024;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('file')) {


                $data['content'] = 'pages/editresources';
                $data['ptitle'] = "Admin -> Edit Resources";
                $data['title'] = "Admin Dashboard";
                $data['ads'] = $this->_API->getResources();
                $data['messages'] = $this->_API->loadMessages();
                $data['mcount'] = $this->_API->unSolved();
                $data['error'] = $this->upload->display_errors();

                $this->TemplateBuilder($data);
            } else {

                $filedata = $this->upload->data();



                $addata = array(
                    'link' => $this->_POST('title'),
                    'type' => $this->_POST('type'),
                    'body' => $this->_POST('description'),
                    'link' => 'uploads/' . $filedata['orig_name']
                );

                $this->_API->Update($id, 'resources', $addata);
                redirect('admin/editresources/' . $id);
            }
        }
    }

    function approvec($id) {
        $data = array('approval' => 1);
        $this->_API->setStatus('id', $id, 'obituary_comments', $data);
        $this->session->set_flashdata('message_success', 'Comment Successfully Approved!');
        redirect('admin/comments');
    }

    function rejectc($id) {
        $data = array('approval' => 2);
        $this->_API->setStatus('id', $id, 'obituary_comments', $data);
        $this->session->set_flashdata('message_reject', 'Comment Successfully Rejected!');
        redirect('admin/comments');
    }

    function solved($id) {
        $data = array('solved' => 1);
        $this->_API->setStatus('id', $id, 'reports', $data);
        $this->session->set_flashdata('message_success', 'Report reviewed and removed from this list!');
        redirect('admin/reports');
    }

    function confirmPayment($id, $amount) {

        //echo $this->session->userdata('user_id');

        $this->isAuthorized();
       // $user_det = $this->db->query("SELECT o.*,u.name user_name,u.email,u.phone FROM obituary o INNER JOIN users u ON u.id = o.user_id WHERE o.id='$id'")->result();
        $data_array = array(           
            'amount' => $amount
        );

      
      //  $new = substr($user_det[0]->phone, 1);
       // $recipients = "254" . $new;
        $this->Update($id, 'obituary', array('sms_pay' => '1'));
        $this->db->where('add_id',$id)->update('payments', $data_array);
        $this->obactivate($id);
        $this->sendMessages2($id);
        $this->session->set_flashdata('message_success', 'Report reviewed and removed from this list!');
        redirect('admin/obituaries');
    }
    
       function sendMessages2($oid) {
        $sample = "BUR".$oid;   
        $this->db->where('oid',$oid)->update('obit_code',array('status'=>'1'));
        $obituary = $this->db->where('id', $oid)->get('obituary')->result();
        $this->sendCondolence2($sample, $obituary[0]->obtitle, $obituary[0]->title, $obituary[0]->category, $obituary[0]->dod, $oid);
    }

}
