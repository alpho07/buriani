<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

    private $_Auth = '';
    private $_API = '';

    public function __construct() {
        parent::__construct();
        $this->_Auth = new User_authentication;
        $this->_API = new API;
    }

    function numbering() {
        $lastid = $this->db->query("SELECT MAX(uid) muid FROM normal_ad")->result();
        (int) $int = $lastid[0]->muid + 1;
        return 'B' . date('ymd') . sprintf("%06s", $int);
    }

    function getPremiumAds() {
        echo json_encode($this->_API->getWherePrems('premium', '1', 'normal_ad'));
    }

    function t() {
        $this->_API->getNormalAdsFeatured();
    }

    function MobileOb() {
        $this->_API->getAndroidObituaries();
    }

    function MobileComm($id) {
        $this->_API->getAndroidObituariesComments($id);
    }

    function getUserData() {
        $user = $this->_POST('name');
        $data['success'] = 1;
        $data['message'] = "Successfully posted the data";
        echo json_encode($data);
    }

    public function index() {

        $data['content'] = 'pages/featured';
        $data['ptitle'] = "Latest Adds -> Grid View";
        $data['title'] = "Buriani The best obituary classifieds";
        $data['featured'] = $this->_API->getNormalAdsFeatured();
        $data['obituaries'] = $this->_API->getAllObs();
        $this->TemplateBuilder($data);
    }

    public function Resources() {

        $data['content'] = 'pages/resources';
        $data['ptitle'] = "ALL Resources";
        $data['title'] = "Buriani The best obituary classifieds";
        $data['featured'] = $this->_API->getNormalAdsFeatured();
        $data['obituaries'] = $this->_API->getAllObs();
        $this->TemplateBuilder($data);
    }

    public function digres() {
        $link = base_url() . 'home/resources';
        $data['content'] = 'pages/digres';
        $data['ptitle'] = "<a href=" . $link . ">Resources</a> &#187 Digres";
        $data['title'] = "Buriani The best obituary classifieds";
        $data['featured'] = $this->_API->loadResource(2);
        $this->TemplateBuilder($data);
    }

    public function fpt() {
        $link = base_url() . 'home/resources';
        $data['content'] = 'pages/fpt';
        $data['ptitle'] = "<a href=" . $link . ">Resources</a> &#187 Funeral Program Templates";
        $data['title'] = "Buriani The best obituary classifieds";
        $data['featured'] = $this->_API->loadResource(1);
        $this->TemplateBuilder($data);
    }

    public function verses() {
        $link = base_url() . 'home/resources';
        $data['content'] = 'pages/verses';
        $data['ptitle'] = "<a href=" . $link . ">Resources</a> &#187 Verses";
        $data['title'] = "Buriani The best obituary classifieds";
        $data['featured'] = $this->_API->loadResource(3);

        $this->TemplateBuilder($data);
    }

    public function poems() {
        $link = base_url() . 'home/resources';
        $data['content'] = 'pages/poems';
        $data['ptitle'] = "<a href=" . $link . ">Resources</a> &#187 Poems";
        $data['title'] = "Buriani The best obituary classifieds";
        $data['featured'] = $this->_API->loadResource(4);

        $this->TemplateBuilder($data);
    }

    public function poem($id) {
        $link = base_url() . 'home/resources';
        $link2 = base_url() . 'home/poems';
        $data['content'] = 'pages/poem';
        $data['ptitle'] = "<a href=" . $link . ">Resources</a> &#187 <a href=" . $link2 . ">Poems</a> &#187 Poem";
        $data['title'] = "Resource - Poem";
        $data['featured'] = $this->_API->loadPoem($id);

        $this->TemplateBuilder($data);
    }

    public function all() {
        $view = $this->input->get('view');
        if ($this->input->get('page')) {
            $page = $this->input->get('page');
        } else {
            $page = 0;
        }
        if ($view == 'list') {
            $data['content'] = 'pages/list';
            $this->session->set_userdata('BACK', current_url());
            $data['ptitle'] = "<a href=" . base_url() . 'home/all/?view=list&page=' . $this->input->get('page') . ">Listings</a> &#187; List View";
            $data['title'] = "Buriani The best obituary classifieds";
            $data['listview'] = 'home/all/?view=list&page=' . $this->input->get('page');
            $data['gridview'] = 'home/all/?view=grid&page=' . $this->input->get('page');
            $data['flist'] = $this->_API->getNormalAdsList(20, $page);
            $data['pages'] = $this->pagination('Home', 'all', $view, $page, 20, 'normal_ad');
        } else {
            $data['content'] = 'pages/adgrid';
            $this->session->set_userdata('BACK', base_url(uri_string()));

            $data['ptitle'] = "Listing &#187; Grid View";
            $data['title'] = "Buriani The best obituary classifieds";
            $data['listview'] = 'home/all/?view=list&page=' . $this->input->get('page');
            $data['gridview'] = 'home/all/?view=grid&page=' . $this->input->get('page');
            $data['flist'] = $this->_API->getNormalAdsList(20, $page);
            $data['pages'] = $this->pagination('Home', 'all', $view, $page, 20, 'normal_ad');
        }
        $this->TemplateBuilder($data);
    }

    public function allobs() {
        $view = $this->input->get('view');
        if ($this->input->get('page')) {
            $page = $this->input->get('page');
        } else {
            $page = 0;
        }
        if ($view == 'list') {
            $data['content'] = 'pages/obituarylist';
            $data['ptitle'] = "Obituary -> List View";
            $data['title'] = "Buriani The best obituary classifieds";
            $data['listview'] = 'home/allobs/?view=list&page=' . $this->input->get('page');
            $data['gridview'] = 'home/allobs/?view=grid&page=' . $this->input->get('page');
            $data['flist'] = $this->_API->getAllObituary(18, $page);
            $data['pages'] = $this->pagination('Home', 'allobs', $view, $page, 18, 'obituary');
        } else {
            $data['content'] = 'pages/obgrid';
            $data['ptitle'] = "Obituary -> Grid View";
            $data['title'] = "Buriani The best obituary classifieds";
            $data['listview'] = 'home/allobs/?view=list&page=' . $this->input->get('page');
            $data['gridview'] = 'home/allobs/?view=grid&page=' . $this->input->get('page');
            $data['flist'] = $this->_API->getAllObituary(20, $page);
            $data['pages'] = $this->pagination('Home', 'allobs', $view, $page, 20, 'obituary');
        }
        $this->TemplateBuilder($data);
    }

    public function user($uid) {
        $view = $this->input->get('view');
        if ($this->input->get('page')) {
            $page = $this->input->get('page');
        } else {
            $page = 0;
        }
        if ($view == 'list') {
            $data['content'] = 'pages/list_u';
            $data['ptitle'] = "<a href=" . $this->session->userdata('LOADSINGLE') . ">Back</a> | " . $this->getUser($uid) . "'s Listings &#187; List View";
            $data['title'] = "Buriani The best obituary classifieds";
            $data['listview'] = 'home/user/' . $uid . '/?view=list&page=' . $this->input->get('page');
            $data['gridview'] = 'home/user/' . $uid . '/?view=grid&page=' . $this->input->get('page');
            $data['flist'] = $this->_API->getUsersNormalAdsList($uid, 20, $page);
            $data['pages'] = $this->upagination('Home', 'user', $view, $page, 20, 'normal_ad');
        } else {
            $data['content'] = 'pages/adgrid_u';
            $data['ptitle'] = "<a href=" . $this->session->userdata('LOADSINGLE') . ">Back</a> | " . $this->getUser($uid) . "'s Listings &#187; Grid View";
            $data['title'] = "Buriani The best obituary classifieds";
            $data['listview'] = 'home/user/' . $uid . '/?view=list&page=' . $this->input->get('page');
            $data['gridview'] = 'home/user/' . $uid . '/?view=grid&page=' . $this->input->get('page');
            $data['flist'] = $this->_API->getUsersNormalAdsList($uid, 20, $page);
            $data['pages'] = $this->upagination('Home', 'user', $view, $page, 20, 'normal_ad');
        }
        $this->TemplateBuilder($data);
    }

    function getUser($uid) {
        $user = $this->_API->getWhere('id', $uid, 'users');
        return $user[0]->name;
    }

    public function UserDashboard() {
        if ($this->session->userdata('user_id') == TRUE) {
            $data['content'] = 'pages/userdashboard';
            $data['ptitle'] = "User -> Dashboard";
            $data['title'] = "My Dashboard";

            $data['ads'] = $this->_API->getAllUserAds();
            $data['last_login'] = $this->_API->getLastLogin($this->session->userdata('user_id'));
            $data['messages'] = $this->_API->loadMessages();
            $data['mcount'] = $this->_API->unreadMessages();
            $data['udet'] = $this->_API->getUserDetails();
            $this->load->view('pages/userdashboard', $data);
        } else {
            redirect('auth/authorize/');
        }
    }

    public function listview() {
        $data['content'] = 'pages/list';
        $data['ptitle'] = "Obituaries -> List View";
        $data['title'] = "Obituaries List";
        $this->TemplateBuilder($data);
    }

    function loadSingle($id, $pe) {

        $this->_API->setVisitorCountAd($id);
        $data['ptitle'] = "Single Listing";
        $data['title'] = "Listing Highlight";
        $data['popular'] = $this->_API->loadPopular();
        $data['listing'] = $this->session->userdata('BACK');
        $data['back'] = $this->session->set_userdata('LOADSINGLE', base_url(uri_string()));
        $data['pe'] = $pe;
        $data['ver'] = $this->_API->checkArticle('normal_ad', $id);
        $data['info'] = $this->_API->getSingleAd($id);
        $data['similar'] = $this->_API->getNormalAdRandom($data['info'][0]->category, 'normal_ad', 7);
        $data['views'] = $this->_API->getCountAd($id);
        $this->load->view('pages/singleview_ad', $data);
    }

    function loadprofile($id, $pe) {
        $this->_API->setVisitorCount($id);
        $data['content'] = 'pages/singleview';
        $data['ptitle'] = "Obituaries Single";
        $data['title'] = "Obituaries Highlight";
        $data['popular'] = $this->_API->loadPopular();
        $data['blogid'] = $id;
        $data['pe'] = $pe;
        $data['ver'] = $this->_API->checkArticle('obituary', $id);
        $data['info'] = $this->_API->getSingleOb($id);
        $data['comments'] = $this->_API->getObComments($id);
        $data['views'] = $this->_API->getCount($id);
        $data['similar'] = $this->_API->getNormalAdRandom(1, 'obituary', 6);

        $this->TemplateBuilder($data);
    }

    function register() {
        $data['content'] = 'pages/register';
        $data['ptitle'] = "Obituaries Single";
        $data['title'] = "Register";
        $this->TemplateBuilder($data);
    }

    function postad() {
        $data['content'] = 'pages/postad';
        $data['ptitle'] = "Post Ad";
        $data['title'] = "Post Ad";
        $data['categories'] = $this->_API->getCategoriesSelection();
        $this->TemplateBuilder($data);
    }

    function postobituary() {
        $data['content'] = 'pages/obituary';
        $data['ptitle'] = "Post Obituary";
        $data['title'] = "Post Obituary";
        $this->TemplateBuilder($data);
    }

    function postada() {
        $this->isAuthorized();
        $data['content'] = 'pages/postad_1';
        $data['ptitle'] = "Post Ad";
        $data['title'] = "Post Ad";
        $data['categories'] = $this->_API->getCategoriesSelection();

        $this->TemplateBuilder($data);
    }

    function postobituarya() {
        $this->isAuthorized();
        $data['content'] = 'pages/obituary_1';
        $data['ptitle'] = "Post Obituary";
        $data['title'] = "Post Obituary";
        $this->TemplateBuilder($data);
    }

    function mobileobpost() {
        //$this->isAuthorized();

        $this->load->view('pages/obituary_1_1');
    }

    function edits($id, $pe) {
        $this->isAuthorized();
        $data['content'] = 'pages/postad_edit';
        $data['ptitle'] = "Edit Ad";
        $data['title'] = "Edit Ad";
        $data['id'] = $id;
        $data['pe'] = $pe;
        $data['categories'] = $this->_API->getCategoriesSelection();

        $data['info'] = $this->_API->getSingleAd($id);
        $this->TemplateBuilder($data);
    }

    function editpf($id, $pe) {
        $this->isAuthorized();
        $data['content'] = 'pages/obituary_edit';
        $data['ptitle'] = "Edit Obituary";
        $data['title'] = "Edit Obituary";
        $data['id'] = $id;
        $data['pe'] = $pe;
        $data['info'] = $this->_API->getSingleOb($id);
        $this->TemplateBuilder($data);
    }

    function CreateNewAd() {
        $this->do_upload();
    }

    //create new obituary
    function CreateNewOb() {
        $this->do_Obupload();
    }

    public function do_uploaad() {

        $fn = array();



        if ($this->input->post()) {
            // retrieve the number of images uploaded;
            $number_of_files = sizeof($_FILES['file']['tmp_name']);
            // considering that do_upload() accepts single files, we will have to do a small hack so that we can upload multiple files. For this we will have to keep the data of uploaded files in a variable, and redo the $_FILE.
            $files = $_FILES['file'];
            $errors = array();

            // first make sure that there is no error in uploading the files
            for ($i = 0; $i < $number_of_files; $i++) {
                if ($_FILES['file']['error'][$i] != 0) {
                    $data['content'] = 'pages/postad_1';
                    $data['ptitle'] = "Post Bormal Listing";
                    $data['error'] = $_FILES['file']['name'][$i];
                    $data['title'] = "Post Listing";
                    $this->TemplateBuilder($data);
                }
            }
            if (sizeof($errors) == 0) {
                // now, taking into account that there can be more than one file, for each file we will have to do the upload
                // we first load the upload library
                $this->load->library('upload');
                // next we pass the upload path for the images
                $config['upload_path'] = FCPATH . 'uploads';
                // also, we make sure we allow only certain type of images
                $config['file_name'] = 'ad' . date('dmYHis');
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                for ($i = 0; $i < $number_of_files; $i++) {
                    $_FILES['file']['name'] = $files['name'][$i];
                    $_FILES['file']['type'] = $files['type'][$i];
                    $_FILES['file']['tmp_name'] = $files['tmp_name'][$i];
                    $_FILES['file']['error'] = $files['error'][$i];
                    $_FILES['file']['size'] = $files['size'][$i];
                    //now we initialize the upload library
                    $this->upload->initialize($config);
                    // we retrieve the number of files that were uploaded
                    if ($this->upload->do_upload('file')) {
                        $udata['uploads'][$i] = $this->upload->data();
                        array_push($fn, $udata['uploads'][$i]['file_name']);
                    } else {

                        $data['content'] = 'pages/postad_1';
                        $data['ptitle'] = "Post Bormal Listing";
                        $data['error'] = $this->upload->display_errors();
                        $data['title'] = "Post Listing";
                        $this->TemplateBuilder($data);
                    }
                }
            } else {
                $data['content'] = 'pages/postad_1';
                $data['ptitle'] = "Post Bormal Listing";
                $data['error'] = $errors;
                $data['title'] = "Post Ad";
                $this->TemplateBuilder($data);
            }

            $names = '';
            foreach ($fn as $k) {
                $names .= 'uploads/' . $k . ',';
            }
            $fuploads = rtrim($names, ",");


            $nego = $this->_POST('negotaible');
            if (empty($nego)) {
                $nego = 'no';
            }
            $ad_id = $this->numbering();
            $reg = explode(",", $this->_POST('region'));
            //$region = $reg[0];
            $region = $this->_POST('region');
            $addata = array(
                'id' => $ad_id,
                'title' => $this->_POST('addtitle'),
                'category' => $this->_POST('category'),
                'price' => $this->_POST('price'),
                'nego' => $nego,
                'description' => $this->_POST('description'),
                'image_path' => $fuploads,
                'region' => $region,
                'date_posted' => date('d-m-Y'),
                'biz_type' => $this->_POST('business'),
                'premium_type' => $this->_POST('premType'),
                'user_id' => $this->session->userdata('user_id'),
            );

            $name = $this->session->userdata('username');
            $phone = $this->session->userdata('phone');
            $user_id = $this->session->userdata('email');
            $message = "Hello $name, Your listing will go live shortly after moderation. www.buriani.co.ke.";

            $this->saveData('normal_ad', $addata);
            //$this->sendPText($phone,$name,$code=0, $message);
            $this->session->set_flashdata('msg', 'Your listing will go live shortly after moderation Process. Thank you for choosing Buriani.');
            redirect('home/userdashboard');
        } else {
            echo 'Let us save';
        }
    }

    public function do_upload() {
        $config['upload_path'] = 'uploads';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 1024;
        $config['file_name'] = 'ad' . date('YdmHis');
        $config['max_width'] = 1024;
        $config['max_height'] = 1024;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file')) {


            $data['content'] = 'pages/postad';
            $data['ptitle'] = "Post Ad";
            $data['error'] = $this->upload->display_errors();
            $data['title'] = "Post Ad";
            $this->TemplateBuilder($data);
        } else {

            $filedata = $this->upload->data();

            $uid = 'USR' . date('YdmHis');

            $nego = $this->_POST('negotaible');
            $nego = $this->_POST('negotaible');
            if (empty($nego)) {
                $nego = 'no';
            }

            $addata = array(
                'title' => $this->_POST('addtitle'),
                'category' => $this->_POST('category'),
                'price' => $this->_POST('price'),
                'nego' => $nego,
                'description' => $this->_POST('description'),
                'image_path' => 'uploads/' . $filedata['orig_name'],
                'region' => $this->_POST('region'),
                'date_posted' => date('d-m-Y'),
                'user_id' => $uid,
            );




            $user = array(
                'id' => $uid,
                'name' => $this->_POST('fullname'),
                'phone' => $this->_POST('phone'),
                'email' => $this->_POST('email'),
                'password' => $this->_Auth->cryptPass($this->_POST('password')),
                'code' => rand(0, 5) . date('Hs'),
            );



            // $this->sendNotification();

            $this->saveData('users', $user);
            $this->saveData('normal_ad', $addata);
            $this->_Auth->Authenticate_user($this->_POST('email'), $this->_POST('password'));
        }
    }

    function login() {
        $username = $this->_POST('username');
        $password = $this->_POST('password');
        $this->_Auth->Authenticate_user_ck($username, $password);
    }

    function report() {
        $data = array(
            'name' => $this->_POST('rname'),
            'email' => $this->_POST('remail'),
            'phone' => $this->_POST('rphone'),
            'message' => $this->_POST('rmessage'),
            'subject' => $this->_POST('rsubject'),
            'ad_id' => $this->_POST('ad_id'),
        );

        $this->saveData('reports', $data);
    }

    function message() {
        $data = array(
            'name' => $this->_POST('name'),
            'email' => $this->_POST('email'),
            'message' => $this->_POST('message'),
            'subject' => $this->_POST('subject'),
            'ad_id' => $this->_POST('ad_id'),
            'user_id' => $this->get_user(),
        );

        $this->saveData('inbox', $data);
    }

    function get_user() {
        $ad = $this->_POST('ad_id');
        $query = $this->db->select('user_id')->where('id', $ad)->get('normal_ad')->result();
        return $query[0]->user_id;
    }

    function logout() {
        $this->_Auth->kill_session();
    }

    function uploadMobile() {


        $target_dir = "idcopy/";
        $target_file = $target_dir . basename($_FILES["idcopy"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["idcopy"]["tmp_name"]);
            if ($check !== false) {

                $uploadOk = 1;
            } else {
                $uploadOk = 0;
                echo 'The Image field left empty';
            }
        }

// Check file size
        if ($_FILES["idcopy"]["size"] > 500000) {
            echo 'Invalid file type uploaded';
            $uploadOk = 0;
        }
// Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {

            echo 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.';


            $uploadOk = 0;
        }
// Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            //   echo "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($_FILES["idcopy"]["tmp_name"], $target_file)) {
                $name = basename($_FILES["idcopy"]["name"]);
                $this->mobileObituary($name);
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }

    public function mobileObituary($name) {

        $config['upload_path'] = 'uploads';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['file_name'] = 'ad' . date('YdmHis');


        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file')) {
            $data['error'] = $this->upload->display_errors();
            echo json_encode($data['error']);
        } else {
            $cat = $this->_POST('category');
            if ($cat == 'Death/Burial') {
                $category = 29;
            } else if ($cat == 'Appreciation') {
                $category = 30;
            } else if ($cat == 'Memorials') {
                $category = 31;
            }
            $email = $this->_POST('email');

            $user = $this->db->where('email', $email)->get('users')->result();

            $filedata = $this->upload->data();

            $uid = date('YdmHis');
            $addata = array(
                'oid' => $uid,
                'title' => $this->_POST('title'),
                'obtitle' => $this->_POST('decname'),
                'category' => $category,
                'more_info' => $this->_POST('moreinfo'),
                'dob' => $this->_POST('dob'),
                'dod' => $this->_POST('dod'),
                'contact_persons' => $this->_POST('cont1') . ',' . $this->_POST('cont2'),
                'description' => $this->_POST('bio'),
                'image_path' => 'uploads/' . $filedata['orig_name'],
                'date_posted' => date('d-m-Y'),
                'region' => $this->_POST('region'),
                'idcopy' => 'idcopy/' . $name,
                'user_id' => $user[0]->id,
            );

            /// print_r($addata);
            //$this->db->insert('users', $user);
            $this->db->insert('obituary', $addata);
            $this->registerOBCodeMo($user[0]->id, $user[0]->phone, $user[0]->name, $user[0]->email);
        }
    }

    public function do_Obupload() {
        $config['upload_path'] = 'uploads';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 1024;
        $config['file_name'] = 'ad' . date('YdmHis');
        $config['max_width'] = 1024;
        $config['max_height'] = 1024;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file')) {


            $data['content'] = 'pages/obituary';
            $data['ptitle'] = "Post Obituary";
            $data['error'] = $this->upload->display_errors();
            $data['title'] = "Post Obituary";
            $this->TemplateBuilder($data);
        } else {

            $filedata = $this->upload->data();

            $uid = 'USR' . date('YdmHis');
            $addata = array(
                'title' => $this->_POST('obtitle'),
                'obtitle' => $this->_POST('addtitle'),
                'category' => $this->_POST('category'),
                'more_info' => $this->_POST('more_info'),
                'dob' => $this->_POST('dob'),
                'dod' => $this->_POST('dod'),
                'contact_persons' => $this->_POST('con1') . ',' . $this->_POST('con2'),
                'description' => $this->_POST('description'),
                'image_path' => 'uploads/' . $filedata['orig_name'],
                'date_posted' => date('d-m-Y'),
                'region' => $this->_POST('region'),
                'user_id' => $uid,
            );



            $user = array(
                'id' => $uid,
                'name' => $this->_POST('fullname'),
                'phone' => $this->_POST('phone'),
                'email' => $this->_POST('email'),
                'password' => $this->_Auth->cryptPass($this->_POST('password')),
                'code' => rand(0, 5) . date('Hs'),
            );


            // $this->_Auth->Authenticate_user($this->post('email'), $this->post('password'));
            // $this->sendNotification();

            $this->saveData('users', $user);
            $this->saveData('obituary', $addata);
            $this->registerOBCode($uid);
            $this->_Auth->Authenticate_user($this->_POST('email'), $this->_POST('password'));
        }
    }

    function getOBID() {

        $user_id = $this->session->userdata('user_id');

        $res = $this->db
                ->where('user_id', $user_id)
                ->order_by('id', 'desc')
                ->limit(1)
                ->get('obituary')
                ->result();


        return $res[0]->id;
    }

    function getOBIDMob($user_id) {



        $res = $this->db
                ->where('user_id', $user_id)
                ->order_by('id', 'desc')
                ->limit(1)
                ->get('obituary')
                ->result();


        return $res[0]->id;
    }

    function registerOBCodeMo($uid, $phone, $name, $email) {

        $code = 'BUR' . $this->getOBIDMob($uid);

        $message = "Hello $name, Your listing will be live shortly after moderation. Use this code $code in our app to sych contacts";

        $data = array(
            'user_id' => $email,
            'code' => $code,
            'oid' => $this->getOBIDMob($uid)
        );
        $this->db->insert('obit_code', $data);
        $this->sendPText($phone, $name, $code, $message);
    }

    function registerOBCode() {

        $code = 'BUR' . $this->getOBID();

        $name = $this->session->userdata('username');
        $phone = $this->session->userdata('phone');
        $user_id = $this->session->userdata('email');
        $message = "Hello $name, Your Obituary posting will go live shortly after moderation. Use this code $code to synch contacts from our App. www.buriani.co.ke.";


        $data = array(
            'user_id' => $user_id,
            'code' => $code,
            'oid' => $this->getOBID()
        );
        $this->saveData('obit_code', $data);
        $this->sendPText($phone, $name, $code, $message);
    }

    public function obedit($id, $pe) {

        if ($_FILES['file']['tmp_name'] == '') {
            $addata = array(
                'title' => $this->_POST('obtitle'),
                'obtitle' => $this->_POST('addtitle'),
                'category' => $this->_POST('category'),
                'more_info' => $this->_POST('more_info'),
                'dob' => $this->_POST('dob'),
                'dod' => $this->_POST('dod'),
                'contact_persons' => $this->_POST('con1') . ',' . $this->_POST('con2'),
                'description' => $this->_POST('description'),
                'region' => $this->_POST('region'),
            );
            $this->Update($id, 'obituary', $addata);
            redirect('home/editpf/' . $id . '/' . $pe);
        } else {

            $config['upload_path'] = 'uploads';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 1024;
            $config['file_name'] = 'ad' . date('YdmHis');
            $config['max_width'] = 1024;
            $config['max_height'] = 1024;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('file')) {


                $data['content'] = 'pages/obituary_edit';
                $data['ptitle'] = "Edit Obituary";
                $data['error'] = $this->upload->display_errors();
                $data['title'] = "Edit Obituary";
                $this->TemplateBuilder($data);
            } else {

                $filedata = $this->upload->data();



                $addata = array(
                    'title' => $this->_POST('obtitle'),
                    'obtitle' => $this->_POST('addtitle'),
                    'category' => $this->_POST('category'),
                    'dob' => $this->_POST('dob'),
                    'dod' => $this->_POST('dod'),
                    'contact_persons' => $this->_POST('con1') . ',' . $this->_POST('con2'),
                    'more_info' => $this->_POST('more_info'),
                    'description' => $this->_POST('description'),
                    'image_path' => 'uploads/' . $filedata['orig_name'],
                    'region' => $this->_POST('region'),
                );

                $this->Update($id, 'obituary', $addata);
                redirect('home/editpf/' . $id . '/' . $pe);
            }
        }
    }

    function updateUserPassword() {
        $addata = array(
            'password' => $this->_Auth->cryptPass($this->_POST('npass')),
            'rawpass' => $this->_POST('npass')
        );
        $this->Update($this->session->userdata('user_id'), 'users', $addata);
    }

    function updateUserDetails() {
        $addata = array(
            'name' => $this->_POST('name'),
            'email' => $this->_POST('email'),
            'phone' => $this->_POST('phone'),
        );
        $this->Update($this->session->userdata('user_id'), 'users', $addata);
    }

    function removeUserAccounts() {
        $this->DeleteAccount($this->session->userdata('user_id'), 'users');
    }

    public function adedit($id, $pe) {

        $nego = $this->_POST('negotaible');
        if (empty($nego)) {
            $nego = 'no';
        }

        if ($_FILES['file']['tmp_name'] == '') {
            $addata = array(
                'title' => $this->_POST('addtitle'),
                'category' => $this->_POST('category'),
                'price' => $this->_POST('price'),
                'nego' => $nego,
                'description' => $this->_POST('description'),
                'region' => $this->_POST('region'),
                'biz_type' => $this->_POST('business'),
                'premium_type' => $this->_POST('premType'),
            );


            $this->Update($id, 'normal_ad', $addata);
            redirect('home/edits/' . $id . '/' . $pe);
        } else {

            $config['upload_path'] = 'uploads';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 1024;
            $config['file_name'] = 'ad' . date('YdmHis');
            $config['max_width'] = 1024;
            $config['max_height'] = 1024;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('file')) {


                $data['content'] = 'pages/obituary_edit';
                $data['ptitle'] = "Edit Obituary";
                $data['error'] = $this->upload->display_errors();
                $data['title'] = "Edit Obituary";
                $this->TemplateBuilder($data);
            } else {

                $filedata = $this->upload->data();



                $addata = array(
                    'title' => $this->_POST('addtitle'),
                    'category' => $this->_POST('category'),
                    'price' => $this->_POST('price'),
                    'nego' => $nego,
                    'description' => $this->_POST('description'),
                    'region' => $this->_POST('region'),
                    'image_path' => 'uploads/' . $filedata['orig_name'],
                    'region' => $this->_POST('region'),
                    'biz_type' => $this->_POST('business'),
                    'premium_type' => $this->_POST('premType'),
                );

                $this->Update($id, 'normal_ad', $addata);
                redirect('home/edits/' . $id . '/' . $pe);
            }
        }
    }

    function uploadIdScan() {


        $target_dir = "idcopy/";
        $target_file = $target_dir . basename($_FILES["idcopy"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["idcopy"]["tmp_name"]);
            if ($check !== false) {

                $uploadOk = 1;
            } else {
                $data['content'] = 'pages/obituary_1';
                $data['ptitle'] = "Post Obituary";
                $data['error1'] = 'File is not an image';
                $data['title'] = "Post Obituary";
                $this->TemplateBuilder($data);
                $uploadOk = 0;
            }
        }

// Check file size
        if ($_FILES["idcopy"]["size"] > 500000) {
            $data['content'] = 'pages/obituary_1';
            $data['ptitle'] = "Post Obituary";
            $data['error1'] = 'File is too large';
            $data['title'] = "Post Obituary";
            $this->TemplateBuilder($data);
            $uploadOk = 0;
        }
// Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            $data['content'] = 'pages/obituary_1';
            $data['ptitle'] = "Post Obituary";
            $data['error1'] = 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.';
            $data['title'] = "Post Obituary";
            $this->TemplateBuilder($data);

            $uploadOk = 0;
        }
// Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            //   echo "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($_FILES["idcopy"]["tmp_name"], $target_file)) {
                $name = basename($_FILES["idcopy"]["name"]);
                $this->do_Obuploada($name);
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }

    public function do_Obuploada($idname) {
        $config['upload_path'] = 'uploads';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 1024;
        $config['file_name'] = 'ad' . date('YdmHis');
        $config['max_width'] = 1024;
        $config['max_height'] = 1024;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file')) {


            $data['content'] = 'pages/obituary_1';
            $data['ptitle'] = "Post Obituary";
            $data['error'] = $this->upload->display_errors();
            $data['title'] = "Post Obituary";
            $this->TemplateBuilder($data);
        } else {

            $filedata = $this->upload->data();

            $reg = explode(",", $this->_POST('region'));
            $region = $reg[0];
            $adid = date('dmYHis');
            $addata = array(
                'oid' => $adid,
                'title' => $this->_POST('obtitle'),
                'obtitle' => $this->_POST('addtitle'),
                'category' => $this->_POST('category'),
                'dob' => $this->_POST('dob'),
                'dod' => $this->_POST('dod'),
                'contact_persons' => $this->_POST('con1') . ',' . $this->_POST('con2'),
                'description' => $this->_POST('description'),
                'image_path' => 'uploads/' . $filedata['orig_name'],
                'idcopy' => 'idcopy/' . $idname,
                'date_posted' => date('d-m-Y'),
                'more_info' => $this->_POST('more_info'),
                'region' => $region,
                'user_id' => $this->session->userdata('user_id'),
            );

            $this->saveData('obituary', $addata);
            $this->registerOBCode();
            $this->session->set_flashdata('msg', 'Your Obituary Posting will go live shortly after Moderation Process. Thank you for choosing Buriani.');
            redirect('home/userdashboard');
        }
    }

    function getLastId() {
        $q = $this->db->query("SELECT MAX(id) AS id FROM users ")->result();
        return $q[0]->id + 1;
    }

    function addcomment($id, $pe) {
        $name = $this->input->post('name');
        $comment = $this->input->post('comment');
        $data = array(
            'obid' => $id,
            'author' => $name,
            'body' => $comment,
            'date' => date('d-m-Y H:i:s')
        );
        $this->saveData('obituary_comments', $data);
        $this->session->set_flashdata('message_success', 'Your Condolence message has been received and is currently under review and will appear below shortly after the review');
        redirect('home/loadProfile/' . $id . '/' . $pe);
    }

    public function Wow() {
        echo 'Wow';
    }

    function SynchContacts() {
        $inputJSON = file_get_contents('php://input');
        $input = json_decode($inputJSON, TRUE);
        print_r($input);
        echo 'Data 123';
        exit;

        $name = $this->input->post('name');
        $phone = $this->input->post('phone');




        $new_name = explode(",", $name);
        $new_phone = explode(",", $phone);
        for ($i = 0; $i < count($new_phone); $i++) {
            $data = array('name' => $new_name[$i], 'phone' => $new_phone[$i]);
            $this->saveData('phonebook', $data);
        }
        echo 'Success';
        exit();


        $inputJSON = file_get_contents('php://input');
        $input = json_decode($inputJSON, TRUE);

        $nameArray = array($input['name']);
        $phoneNumArray = array($input['phone']);
        for ($i = 0; i < count($nameArray); $i++) {
            $data = array(
                'name' => $nameArray[$i],
                'phone' => $phoneNumArray[$i],
            );
            $this->saveData('phonebook', $data);
        }
    }

    function delob($id) {
        $this->Delete($id, 'obituary');
    }

    function delad($id) {
        $this->Delete($id, 'normal_ad');
    }

    function adactivate($id) {
        $this->Activate($id, 'normal_ad');
    }

    function adeactivate($id) {
        $this->Deactivate($id, 'normal_ad');
    }

    function codeverify($id) {
        $result = $this->db->where('code', $id)->where('status', '0')->get('obit_code')->num_rows();
        if ($result > 0) {
            $this->db->where('code', $id)->update('obit_code', array('status' => 1));
            echo "Yes";
        } else {
            echo "No";
        }
    }

    //============================================OTHER==============================//


    public function pricing() {
        $link = base_url() . 'home/pricing';
        $data['content'] = 'pages/pricing';
        $data['ptitle'] = "<a href=" . $link . ">Pricing</a> ";
        $data['title'] = "Buriani The best obituary classifieds";
        $this->TemplateBuilder($data);
    }

    public function about() {
        $link = base_url() . 'home/about';
        $data['content'] = 'pages/about';
        $data['ptitle'] = "<a href=" . $link . ">About</a> ";
        $data['title'] = "Buriani The best obituary classifieds";
        $this->TemplateBuilder($data);
    }

    public function contact() {
        $link = base_url() . 'home/contact';
        $data['content'] = 'pages/contact';
        $data['ptitle'] = "<a href=" . $link . ">Contact Us</a> ";
        $data['title'] = "Buriani The best obituary classifieds";
        $this->TemplateBuilder($data);
    }

    public function products() {
        $link = base_url() . 'home/products';
        $data['content'] = 'pages/products';
        $data['ptitle'] = "<a href=" . $link . ">Products</a> ";
        $data['title'] = "Buriani The best obituary classifieds";
        $this->TemplateBuilder($data);
    }

    public function faqs() {
        $link = base_url() . 'home/faqs';
        $data['content'] = 'pages/faqs';
        $data['ptitle'] = "<a href=" . $link . ">FAQs</a> ";
        $data['title'] = "Buriani The best obituary classifieds";
        $this->TemplateBuilder($data);
    }

    public function policy() {
        $link = base_url() . 'home/policy';
        $data['content'] = 'pages/policy';
        $data['ptitle'] = "<a href=" . $link . ">Privacy Policy</a> ";
        $data['title'] = "Buriani The best obituary classifieds";
        $this->TemplateBuilder($data);
    }

    public function tandc() {
        $link = base_url() . 'home/tandc';
        $data['content'] = 'pages/tandc';
        $data['ptitle'] = "<a href=" . $link . ">Terms and Conditions</a> ";
        $data['title'] = "Buriani The best obituary classifieds";
        $this->TemplateBuilder($data);
    }

    function lipanampesa() {
        echo 'Lipa na mpesa callback';
    }

    function success_test() {
        echo 'Payment Successful';
    }

    function fail_test() {
        echo 'Payment Failed please contact websystems admin';
    }

}
