<?php

require APPPATH . 'third_party/AfricasTalkingGateway.php';
require APPPATH . 'third_party/PHPMailerAutoload.php';
require APPPATH . 'third_party/PHPMailer.php';

use TeamTNT\TNTSearch\TNTSearch;

class MY_Controller extends CI_Controller {

    private $_API = '';
    private $_Auth = '';
    private $Mailer = '';
    Private $_SMS = '';
    private $_smsuser = 'Dindi';
    private $_smskey = '4824103407c20a26c3dca5b5888b7fffd5f952060ebc07dd59e57d2fde5b9e2d';
    private $_TNT = '';
    public $fuzzy_prefix_length = 2;
    public $fuzzy_max_expansions = 50;
    public $fuzzy_distance = 2;
    public $ORACOM = "";

    function __construct() {
        $this->allow_get_array = TRUE;
        parent::__construct();
        $this->_API = new API;
        $this->_Auth = new User_authentication;
        $this->_SMS = new AfricasTalkingGateway($this->_smsuser, $this->_smskey);
        $this->Mailer = new PHPMailer;
        $this->_TNT = new TNTSearch;
        $this->Mailer->SMTPDebug = 0;
        $this->Mailer->Debugoutput = 'html';
        $this->Mailer->Host = 'ssl://smtp.gmail.com';
        $this->Mailer->Username = "burianikenya@gmail.com";
        $this->Mailer->Password = "Buriani123";
        $this->Mailer->Port = 465;
        $this->Mailer->SMTPSecure = 'tls';
        $this->Mailer->SMTPAuth = true;
        $this->ORACOM = "http://107.20.199.106/api/v3/sendsms/plain?user=AOyale&password=Jesus123&sender=ORACOM-KE&SMSText=";
        $this->Mailer->IsSMTP();
        $this->Mailer->setFrom('info@buriani.co.ke', 'Buriani Agent');
        $this->Mailer->addReplyTo('info@buriani.co.ke', 'Buriani');
        date_default_timezone_set('Africa/Nairobi');

        $this->_TNT->loadConfig([
            'driver' => 'mysql',
            'host' => 'localhost',
            'database' => 'burianic_oap',
            'username' => 'burianic_oap',
            'password' => 'buriani123',
            'storage' => 'tnt'
        ]);
        $this->_TNT->asYouType = true;
        $this->_TNT->fuzziness = true;
        $indexer = $this->_TNT->createIndex('name.index');
        $indexer->setPrimaryKey('uid');
        $indexer->query('SELECT ad.* ,c.name,u.name user, u.phone 
              FROM normal_ad ad, categories c, users u
              WHERE c.id=ad.category  
              AND u.id = ad.user_id');
        $indexer->run();


        $obindexer = $this->_TNT->createIndex('obituary.index');
        $obindexer->query('SELECT ob.*, c.name , u.name as user,  u.id uid
              FROM obituary ob 
              LEFT JOIN categories c ON c.id=ob.category 
              LEFT JOIN users u ON ob.user_id = u.id');
        $obindexer->run();
    }

    function search() {
        $q = $this->input->get('keyword');
        $this->_TNT->selectIndex("name.index");

        $res = $this->_TNT->search($q, 20);

        $this->processResults($res, $q);
    }

    public function processResults($res, $q) {
        $data = ['hits' => [], 'time' => $res['execution time']];
        if (count($res['ids']) == 0) {
            echo json_encode($data);
            exit;
        }
        $order = "";
        $ids = '';
        foreach ($res['ids'] as $index => $id) {
            $order .= "WHEN $id THEN $index ";
            $ids .= $id . ',';
        }
        $new_ids = rtrim($ids, ",");

        $ads = $this->_API->getAdSearchResults($new_ids, $order);

        foreach ($ads as $ad) {
            $id = $ad->id;
            $title = $ad->title;
            $description = $ad->description;
            $catid = $ad->category;
            $category = $ad->cname;
            $region = $ad->region;
            $price = $ad->price;
            $user = $ad->uname;
            if ($ad->image_path == 'noimage' || $ad->image_path == "" || !$ad->image_path) {
                $ad->image_path = '/assets/images/no_poster.png';
            }
            $data['hits'][] = [
                'id' => $id,
                'title' => $title,
                'image_path' => $ad->image_path,
                'catid' => $catid,
                'description' => $description,
                'category' => $category,
                'price' => $price,
                'region' => $region,
                'user' => $user
            ];
        }
        echo json_encode($data);
    }

    function searchob() {
        $q = $this->input->get('keyword');
        $this->_TNT->selectIndex("obituary.index");

        $res = $this->_TNT->search($q, 12);
        $this->processObResults($res, $q);
    }

    public function processObResults($res, $q) {
        $data = ['hits' => [], 'time' => $res['execution time']];
        if (count($res['ids']) == 0) {
            echo json_encode($data);
            exit;
        }
        $order = "";
        $ids = '';
        foreach ($res['ids'] as $index => $id) {
            $order .= "WHEN $id THEN $index ";
            $ids .= $id . ',';
        }
        $new_ids = rtrim($ids, ",");

        $ads = $this->_API->getObSearchResults($new_ids, $order);

        foreach ($ads as $ad) {
            $id = $ad->id;
            $obtitle = $ad->obtitle;
            $title = $ad->title;
            $description = $ad->description;
            $category = $ad->name;
            $region = $ad->region;
            $dob = $ad->dob;
            $dod = $ad->dod;
            $user = $ad->user;
            if ($ad->image_path == 'noimage' || $ad->image_path == "" || !$ad->image_path) {
                $ad->image_path = '/assets/images/no_poster.png';
            }
            $data['hits'][] = [
                'id' => $id,
                'obtitle' => $obtitle,
                'title' => $title,
                'image_path' => $ad->image_path,
                'description' => $description,
                'category' => $category,
                'region' => $region,
                'user' => $user,
                'dob' => $dob,
                'dod' => $dod
            ];
        }
        echo json_encode($data);
    }

    function setUrl() {
        $url = $this->_POST('url');
        $this->session->set_userdata(array('browsing_cache' => $url));
    }

    function isAuthorized() {
        if ($this->session->userdata('user_id') == TRUE) {
            
        } else {
            redirect('/');
        }
    }

    function sanitizeData($subject) {
        return str_replace(" ", "-", $subject);
    }

    function sendPares($email, $name, $password) {
        $message = "Hello $name,<br> Your New Buriani Account password is <strong>$password</strong>";

        $this->Mailer->addAddress($email, $name);
        $this->Mailer->Subject = 'Buriani User Password Reset';
        $this->Mailer->msgHTML($message);
        $this->Mailer->AltBody = $message;
        if (!$this->Mailer->send()) {
            echo "Mailer Error: " . $this->Mailer->ErrorInfo;
        } else {
            echo "Message sent!";
        }
    }

    function sendMail() {

        $name = $this->input->post('contact-name');
        $email = $this->input->post('contact-email');
        $subject = $this->input->post('contact-subject');
        $message = $this->input->post('contact-message');
        $this->Mailer->setFrom($email, $name);
        $this->Mailer->addReplyTo($email, $name);
        $this->Mailer->addAddress('info@buriani.co.ke', 'Buriani Ltd');
        $this->Mailer->Subject = 'Buriani New User Enquiry - ' . $subject;
        $this->Mailer->msgHTML($message);
        $this->Mailer->AltBody = $message;
        if (!$this->Mailer->send()) {
            echo "Mailer Error: " . $this->Mailer->ErrorInfo;
        } else {
            $this->session->set_flashdata('msg', 'Your Message has been succesfully Received. We shall revert as soon as possible. Thank you');
            redirect('home/contact');
        }
    }

    function sendRegdetails($name, $phone, $email, $password) {
        $check = $this->_POST('sendsms');
        $message = "Hello $name,<br> Your New Buriani Account Has been created<br>"
                . "Username: <strong>$phone</strong> <br>password: <strong>$password</strong>";
        $new = substr($phone, 1);
        $recipients = "254" . $new;
        if ($check == 1) {
            $this->sendtext($name, $recipients, $email, $password);
            /* $this->Mailer->addAddress($email, $name);
              $this->Mailer->Subject = 'Buriani New Account Details';
              $this->Mailer->msgHTML($message);
              $this->Mailer->AltBody = $message;
              if (!$this->Mailer->send()) {
              echo "Mailer Error: " . $this->Mailer->ErrorInfo;
              } else {
              echo "Message sent!";
              } */
        } else {
            $this->sendtext($name, $recipients, $email, $password);
            /* $this->Mailer->addAddress($email, $name);
              $this->Mailer->Subject = 'Buriani New Account Details';
              $this->Mailer->msgHTML($message);
              $this->Mailer->AltBody = $message;
              if (!$this->Mailer->send()) {
              echo "Mailer Error: " . $this->Mailer->ErrorInfo;
              } else {
              echo "Message sent!";
              } */
        }
    }

    function sendtext($name, $phone, $email, $password) {
        $message = "Hello $name, Your new Buriani Account has been created. Username:$email,Password:$password  *END*";

        $url1 = $this->ORACOM . urldecode($message) . "&GSM=" . urldecode($phone) . "";
        $url = str_replace(" ", '%20', $url1);
        $header = array("Accept: application/json");

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_ENCODING, "gzip");
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)');

        curl_exec($ch);
        // $response = json_decode(curl_exec($ch));
        //  $ee = curl_getinfo($ch);
        // print_r($ee);
        //print_r($retValue);
    }
    
     function sendMobReg($name, $phone, $email, $password) {
         
         $new = substr($phone, 1);

        $recipients = "254" . $new;
        
        $message = "Hello $name, Buriani account setup complete. Username $phone &  Password is :$password   www.buriani.co.ke *END*";

        $url1 = $this->ORACOM . urldecode($message) . "&GSM=" . urldecode($recipients) . "";
        $url = str_replace(" ", '%20', $url1);
        $header = array("Accept: application/json");

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_ENCODING, "gzip");
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)');

        curl_exec($ch);
        // $response = json_decode(curl_exec($ch));
        //  $ee = curl_getinfo($ch);
        // print_r($ee);
        //print_r($retValue);
    }

    function sendTextPass($name, $phone, $password) {
        $message = "Hello $name, Your new Buriani Account Password is :$password   www.buriani.co.ke *END*";

        $url1 = $this->ORACOM . urldecode($message) . "&GSM=" . urldecode($phone) . "";
        $url = str_replace(" ", '%20', $url1);
        $header = array("Accept: application/json");

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_ENCODING, "gzip");
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)');

        curl_exec($ch);
        // $response = json_decode(curl_exec($ch));
        //  $ee = curl_getinfo($ch);
        // print_r($ee);
        //print_r($retValue);
    }

    function sendUserCode($name, $phone, $adid, $code) {
        $message = "Hello $name, Your payment for bulk sms for obituary AD_ID ($adid) is complete. Your Activation Code is:$code. - www.buriani.co.ke  *END*";

        $url1 = $this->ORACOM . urldecode($message) . "&GSM=" . urldecode($phone) . "";
        $url = str_replace(" ", '%20', $url1);
        $header = array("Accept: application/json");

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_ENCODING, "gzip");
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)');

        curl_exec($ch);
        // $response = json_decode(curl_exec($ch));
        //  $ee = curl_getinfo($ch);
        // print_r($ee);
        //print_r($retValue);
    }
    
    
    

    function sendPText($phone, $name, $code, $message) {

        $new = substr($phone, 1);

        $recipients = "254" . $new;

        $url1 = $this->ORACOM . urldecode($message) . "&GSM=" . urldecode($recipients) . "";
        $url = str_replace(" ", '%20', $url1);
        $header = array("Accept: application/json");

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_ENCODING, "gzip");
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)');

        curl_exec($ch);
    }

    function sendCondolence2($oid, $obtitle, $title, $category, $dod, $id) {
        if ($category == 31) {
            $message = urlencode($title . " of " . $obtitle . " visit https://buriani.co.ke/home/loadprofile/" . $id . "/" . str_replace(" ", "-", $obtitle)) . " www.buriani.co.ke";
        } else if ($category == 30) {
            $message = urlencode($title . " of " . $obtitle . " visit https://buriani.co.ke/home/loadprofile/" . $id . "/" . str_replace(" ", "-", $obtitle)) . " www.buriani.co.ke";
        } else {
            $message = urlencode("We regret to announce the demise of " . $obtitle . " which occured on " . $dod . " visit https://buriani.co.ke/home/loadprofile/" . $id . "/" . str_replace(" ", "-", $title)) . " www.buriani.co.ke";
        }
        $url1 = $this->ORACOM . urldecode($message) . "&GSM=" . urldecode($this->getContactsData2($oid, $id)) . "";
        $url = str_replace(" ", '%20', $url1);
        $header = array("Accept: application/json");
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_ENCODING, "gzip");
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)');

        curl_exec($ch);

        $this->finish($oid);
    }

    function finish($oid) {
        $this->db->where('oid', $oid)->update('dispatch_directory', array('dispatch_status' => '1'));
        $this->db->where('code', $oid)->update('obit_code', array('status' => '1'));
      //  echo 'Success';
    }

    function sendCondolence($oid, $sms) {

        $message = $sms;
        $from = '20880';
        $gateway = $this->_SMS;

        try {
            $results = $gateway->sendMessage($this->getContactsData($oid), $message, $from);
            $status = '';
            foreach ($results as $result) {
                // Note that only the Status "Success" means the message was sent              
                $status = $result->status;
            }
            echo $status;
        } catch (AfricasTalkingGatewayException $e) {
            echo "Encountered an error while sending: " . $e->getMessage();
        }
    }

    function getContactsData($oid) {
        $string = "";
        $result = $this->db->where('oid', $oid)->get('temp_dispatch')->result();
        foreach ($result as $s):
            $string .= $s->phone . ",";
        endforeach;
        return rtrim($string, ",");
    }

    function getContactsData2($oid, $id) {

        $string = "";
        $amount = $this->db->where('add_id', $id)->select('amount')->get('payments')->result();
        $smscost = 5.80;
        $determiner = $amount[0]->amount;
        $noOfSMS = $determiner / $smscost;
        $counter = (int) $noOfSMS;

        $result = $this->db->where('oid', $oid)->get('temp_dispatch')->result();

        $res = array_slice($result, 0, $counter);


        foreach ($res as $s):
            $string .= substr($s->phone, 1) . ",";
        endforeach;
        return rtrim($string, ",");
    }

    function pagination($controller, $method, $id, $view = 'grid', $per_page, $table) {
        if ($this->input->get('view')) {
            $view = $this->input->get('view');
        } else {
            $view = 'grid';
        }
        $config['base_url'] = base_url() . '/' . $controller . '/' . $method . "/?view=$view";
        $config['total_rows'] = $this->_API->getTotal($table);
        $config['per_page'] = $per_page;
        $config['use_page_numbers'] = TRUE;
        $config['uri_segment'] = 3;
        $config['num_links'] = 6;
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'page';
        $config['full_tag_open'] = '<div><ul class="pagination">';
        $config['full_tag_close'] = '</ul></div><!--pagination-->';
        $config['first_link'] = '&laquo; First';
        $config['first_tag_open'] = '<li class="prev page">';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = 'Last &raquo;';
        $config['last_tag_open'] = '<li class="next page">';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = 'Next &rarr;';
        $config['next_tag_open'] = '<li class="next page">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '&larr; Previous';
        $config['prev_tag_open'] = '<li class="prev page">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page">';
        $config['num_tag_close'] = '</li>';

        $config['anchor_class'] = 'follow_link';

        $this->pagination->initialize($config);
        return $this->pagination->create_links();
    }
    function upagination($controller, $method, $id, $view = 'grid', $per_page, $table) {
        if ($this->input->get('view')) {
            $view = $this->input->get('view');
        } else {
            $view = 'grid';
        }
        $config['base_url'] = base_url() . '/' . $controller . '/' . $method . "/?view=$view";
        $config['total_rows'] = $this->_API->getUserTotal($table, $this->uri->segment(3));
        $config['per_page'] = $per_page;
        $config['use_page_numbers'] = TRUE;
        $config['uri_segment'] = 3;
        $config['num_links'] = 6;
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'page';
        $config['full_tag_open'] = '<div><ul class="pagination">';
        $config['full_tag_close'] = '</ul></div><!--pagination-->';
        $config['first_link'] = '&laquo; First';
        $config['first_tag_open'] = '<li class="prev page">';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = 'Last &raquo;';
        $config['last_tag_open'] = '<li class="next page">';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = 'Next &rarr;';
        $config['next_tag_open'] = '<li class="next page">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '&larr; Previous';
        $config['prev_tag_open'] = '<li class="prev page">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page">';
        $config['num_tag_close'] = '</li>';

        $config['anchor_class'] = 'follow_link';

        $this->pagination->initialize($config);
        return $this->pagination->create_links();
    }

    function cpagination($controller, $method, $id, $view = 'grid', $per_page, $table, $category) {

        $down = $this->input->get('down');
        $up = $this->input->get('up');

        if ($this->input->get('view')) {
            $view = $this->input->get('view');
        } else {
            $view = 'grid';
        }
        if (!$down && !$up) {
            $config['base_url'] = base_url() . '/' . $controller . '/' . $method . '/' . $category . '/' . $this->uri->segment(4) . "/?view=$view";
            $config['total_rows'] = $this->_API->getTotalByChildrenCategories($table, $category);
        } else {
            $config['base_url'] = base_url() . '/' . $controller . '/' . $method . '/' . $category . '/' . $this->uri->segment(4) . "/?down=$down&up=$up&view=$view";
            $config['total_rows'] = $this->_API->getTotalByChildrenCostCount($table, $category);
        }
        $config['per_page'] = $per_page;
        $config['use_page_numbers'] = TRUE;
        $config['uri_segment'] = 3;
        $config['num_links'] = 6;
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'page';
        $config['full_tag_open'] = '<div><ul class="pagination">';
        $config['full_tag_close'] = '</ul></div><!--pagination-->';
        $config['first_link'] = '&laquo; First';
        $config['first_tag_open'] = '<li class="prev page">';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = 'Last &raquo;';
        $config['last_tag_open'] = '<li class="next page">';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = 'Next &rarr;';
        $config['next_tag_open'] = '<li class="next page">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '&larr; Previous';
        $config['prev_tag_open'] = '<li class="prev page">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page">';
        $config['num_tag_close'] = '</li>';

        $config['anchor_class'] = 'follow_link';

        $this->pagination->initialize($config);
        return $this->pagination->create_links();
    }

    function locpagination($controller, $method, $id, $view = 'grid', $per_page, $table) {

        $down = $this->input->get('down');
        $up = $this->input->get('up');


        $loc = $this->uri->segment(5);
        $two = $this->uri->segment(4) . '/';
        $one = $this->uri->segment(3) . '/';
        $newloc = str_replace('%20', " ", $loc);


        if ($this->input->get('view')) {
            $view = $this->input->get('view');
        } else {
            $view = 'grid';
        }

        if (!$down && !$up) {
            $config['base_url'] = base_url() . '/' . $controller . '/' . $method . '/' . $one . $two . $newloc . "/?view=$view";
            $config['total_rows'] = $this->_API->getTotalByCategoryLoction($table, $this->uri->segment(3), $newloc);
        } else {
            $config['base_url'] = base_url() . '/' . $controller . '/' . $method . '/' . $one . $two . $newloc . "/?down=$down&up=$up&view=$view";
            $config['total_rows'] = $this->_API->getTotalByCategoryLoctionByPrice($table, $this->uri->segment(3), $newloc);
        }
        $config['per_page'] = $per_page;
        $config['use_page_numbers'] = TRUE;
        $config['uri_segment'] = 3;
        $config['num_links'] = 6;
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'page';
        $config['full_tag_open'] = '<div><ul class="pagination">';
        $config['full_tag_close'] = '</ul></div><!--pagination-->';
        $config['first_link'] = '&laquo; First';
        $config['first_tag_open'] = '<li class="prev page">';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = 'Last &raquo;';
        $config['last_tag_open'] = '<li class="next page">';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = 'Next &rarr;';
        $config['next_tag_open'] = '<li class="next page">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '&larr; Previous';
        $config['prev_tag_open'] = '<li class="prev page">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page">';
        $config['num_tag_close'] = '</li>';

        $config['anchor_class'] = 'follow_link';

        $this->pagination->initialize($config);
        return $this->pagination->create_links();
    }

    function opagination($controller, $method, $id, $view = 'grid', $per_page, $table, $category) {

        if ($this->input->get('view')) {
            $view = $this->input->get('view');
        } else {
            $view = 'grid';
        }
        $config['base_url'] = base_url() . '/' . $controller . '/' . $method . '/' . $category . "/?view=$view";
        $config['total_rows'] = $this->_API->getObituaryTotals($table, $category = '1');
        $config['per_page'] = $per_page;
        $config['use_page_numbers'] = TRUE;
        $config['uri_segment'] = 3;
        $config['num_links'] = 6;
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'page';
        $config['full_tag_open'] = '<div><ul class="pagination">';
        $config['full_tag_close'] = '</ul></div><!--pagination-->';
        $config['first_link'] = '&laquo; First';
        $config['first_tag_open'] = '<li class="prev page">';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = 'Last &raquo;';
        $config['last_tag_open'] = '<li class="next page">';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = 'Next &rarr;';
        $config['next_tag_open'] = '<li class="next page">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '&larr; Previous';
        $config['prev_tag_open'] = '<li class="prev page">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page">';
        $config['num_tag_close'] = '</li>';

        $config['anchor_class'] = 'follow_link';

        $this->pagination->initialize($config);
        return $this->pagination->create_links();
    }

    function spagination($controller, $method, $id, $view = 'grid', $per_page, $table, $query, $offset) {
        if ($this->input->get('view', TRUE)) {
            $view = $this->input->get('view', TRUE);
        } else {
            $view = 'grid';
        }
        $config['base_url'] = base_url() . '/' . $controller . '/' . $method . "/" . $id . "/?view=$view";
        $config['total_rows'] = $this->_API->getSearchCount($query);
        $config['per_page'] = $per_page;
        $config['use_page_numbers'] = TRUE;
        $config['uri_segment'] = 3;
        $config['num_links'] = 6;
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'page';
        $config['full_tag_open'] = '<div><ul class="pagination">';
        $config['full_tag_close'] = '</ul></div><!--pagination-->';
        $config['first_link'] = '&laquo; First';
        $config['first_tag_open'] = '<li class="prev page">';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = 'Last &raquo;';
        $config['last_tag_open'] = '<li class="next page">';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = 'Next &rarr;';
        $config['next_tag_open'] = '<li class="next page">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '&larr; Previous';
        $config['prev_tag_open'] = '<li class="prev page">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page">';
        $config['num_tag_close'] = '</li>';

        $config['anchor_class'] = 'follow_link';

        $this->pagination->initialize($config);
        return $this->pagination->create_links();
    }

    function saveData($table, $data) {
        $this->_API->Save($table, $data);
    }

    function Update($id, $table, $data) {
        $this->_API->Update($id, $table, $data);
    }

    function Activate($id, $table) {
        $data = array('user_status' => '1');
        $this->_API->Activate($id, $table, $data);
        redirect('home/userdashboard');
    }

    function Deactivate($id, $table) {
        $data = array('user_status' => '0');
        $this->_API->Deactivate($id, $table, $data);
        redirect('home/userdashboard');
    }

    function Delete($id, $table) {
        $this->_API->Delete($id, $table);
        redirect('home/userdashboard');
    }

    function adminAdActivate($id, $table) {
        $user = $this->db->query("SELECT u.*,na.id adid,na.title FROM normal_ad na INNER JOIN users u ON u.id = na.user_id WHERE na.id ='$id'")->result();
        $name = $user[0]->name;
        $adid = $user[0]->adid;
        $title = str_replace(" ", "-", $user[0]->title);
        $code = '';
        $sms = "Hello $name, Your Ad has passed our moderation and is now live see https://buriani.co.ke/home/loadsingle/$adid/$title. www.buriani.co.ke ";
        $this->sendPText($user[0]->phone, $name, $code, $sms);
        $data = array('admin_status' => '1');
        $this->_API->Activate($id, $table, $data);
        redirect('admin/ads');
    }

    function adminAdDeactivate($id, $table) {
        $user = $this->db->query("SELECT u.*,na.id adid,na.title FROM normal_ad na INNER JOIN users u ON u.id = na.user_id WHERE na.id ='$id'")->result();
        $name = $user[0]->name;
        $adid = $user[0]->adid;
        $code = '';
        $sms = "Hello $name, Your Ad (AD ID:$adid) has been Revoked and will not go live. For more information contact us as info@buriani.co.ke. www.buriani.co.ke ";
        $this->sendPText($user[0]->phone, $name, $code, $sms);
        $data = array('admin_status' => '2');
        $this->_API->Deactivate($id, $table, $data);
        redirect('admin/ads');
    }

    function adminAdDelete($id, $table) {
        $this->_API->Delete($id, $table);
        redirect('admin/ads');
    }

    function adminObActivate($id, $table) {
        $data = array('admin_status' => '1');
        $user = $this->db->query("SELECT u.*,oc.code,o.id,o.obtitle FROM obituary o INNER JOIN users u ON u.id = o.user_id INNER JOIN obit_code oc ON oc.oid = o.id WHERE o.id='$id' ")->result();
        $name = str_replace(" ", "-", $user[0]->obtitle);
        $poster = $user[0]->name;
        $oid = $user[0]->id;
        $code = $user[0]->code;
        $sms = "Hi $poster, Obituary listing has passed moderation and is now live https://buriani.co.ke/home/loadprofile/$oid/$name . SMS notifications dispatched.";        
        $this->sendPText($user[0]->phone, $poster, $code, $sms);
        $this->_API->Activate($id, $table, $data);
       
    }

    function adminObDeactivate($id, $table) {
        $data = array('admin_status' => '2');
        $user = $this->db->query("SELECT u.*,oc.code,o.id,o.obtitle FROM obituary o INNER JOIN users u ON u.id = o.user_id INNER JOIN obit_code oc ON oc.oid = o.id WHERE o.id='$id' ")->result();
        $name = str_replace(" ", "-", $user[0]->obtitle);
        $oid = $user[0]->id;
        $poster = $user[0]->name;
        $code = $user[0]->code;
        $sms = "Hi $poster, Your Obituary Posting (OBID $oid, Deceased name: $name) is revoked . For more information contact us at info@buriani.co.ke. www.buriani.co.ke ";
        $this->sendPText($user[0]->phone, $poster, $code, $sms);
        $this->_API->Deactivate($id, $table, $data);
        redirect('admin/obituaries');
    }

    function adminObDelete($id, $table) {
        $this->_API->Delete($id, $table);
        redirect('admin/obituaries');
    }

    function DeleteAccount($id, $table) {
        $this->_API->Delete($id, $table);
        $this->_Auth->kill_session();
    }

    function _POST($name) {
        return $this->input->post($name);
    }

    function _SESSION() {
        return $this->session->userdata('user_id');
    }

    function menuBuilder() {
        $tree = $this->_API->getData('categories');

        $node_id = '';

        echo '<ul>';
        foreach ($tree as $node):
            if ($node->parent == 0):

                echo '<li style="color:black;"><a href="' . base_url() . 'search/main/' . $node->id . '/' . $node->name . '">' . $this->sanitizeData($node->name) . '<i class="icons icon-right-dir"></i></a> ';
                $node_id = $node->id;

                echo '<ul class="sidebar-dropdown"><li><ul>';
                $this->subMenuBuilder($tree, $node_id);
                echo '</ul><li></ul></li>';
            endif;

        endforeach;
        echo '</ul>';
    }

    function subMenuBuilder($tree, $node_id) {

        foreach ($tree as $branch):

            if ($branch->parent == $node_id):

                echo '<li ><a href="' . base_url() . 'search/category/' . $branch->id . '/' . $this->sanitizeData($branch->name) . '">';
                echo $branch->name;
                $this->subMenuBuilder($tree, $branch->id);
                echo '</a></li>';

            endif;

        endforeach;
    }

    function base() {
        return base_url();
    }

    function getFrontPageCategories() {
        $html = ' <div class="col-xs-3">';

        $parent = $this->db->where('parent', '0')->get('categories')->result();

        foreach ($parent as $p) {
            $html .= '<div class="">
                                                            <div class="panel-heading">
                                                                <h3 class="panel-title"><strong>' . $p->name . '</strong></h3>
                                                                <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
                                                            </div>';

            $children = $this->db->where('parent', $p->id)->get('categories')->result();
            foreach ($children as $ch) {
                $html .= '<div class="panel-body"><ul>';
                $html .= '<li>' . $ch->name . '</li>';
                $html .= '</ul></div>';
            }
        }
        $html .= '</div>';
        echo $html;
    }

    function categoryBuilder() {
        $tree = $this->db->get('categories')->result();

        $node_id = '';


        foreach ($tree as $node):

            if ($node->parent == 0):
                echo ' <div class="row flex ">
    <div class="col-md-3">
      <div class="panel panel-default" style="width:290px;">
       <div class="panel-heading" style="background:black; color:white; font-weight:bold; ">' . $node->name . '<div class="pull-right icon">' . $node->icon . '</div></div>';
                $node_id = $node->id;

                echo '<div class="panel-body" style="padding:1px !important;"><ul>';
                $this->subCategoryBuilder($tree, $node_id);
                echo '</ul></div>';
                echo '</div>';

                echo '</div>';

            endif;

        endforeach;
    }

    function subCategoryBuilder($tree, $node_id) {

        foreach ($tree as $branch):

            if ($branch->parent == $node_id):

                echo '<li><a href="' . base_url() . 'search/category/' . $branch->id . '/' . $this->sanitizeData($branch->name) . '">';
                echo $branch->name;
                $this->subCategoryBuilder($tree, $branch->id);
                echo '</a></li>';

            endif;

        endforeach;
    }

    function findParent($child_id) {
        $res = $this->db->where('id', $child_id)->get('categories')->result();
        $parent = $this->db->select('name')->where('id', $res[0]->parent)->get('categories')->result();
        return $parent[0]->name;
    }

    function getLocations() {
        return $this->db->query("SELECT * FROM( SELECT region FROM normal_ad UNION SELECT region FROM obituary )res GROUP BY res.region ORDER BY res.region ASC ")->result();
    }

    function TemplateBuilder($data) {

        $data['categoriesad'] = $this->_API->getAdCategries('categories');
        $data['categories'] = $this->_API->getObCategries('categories');
        $data['last_login'] = $this->_API->getLastLogin($this->session->userdata('user_id'));
        $data['popular'] = $this->_API->loadPopular();
        $data['locations'] = $this->getLocations();
        $data['obs'] = $this->_API->getWhere('parent', '1', 'categories');
        $data['pro'] = $this->_API->getWhere('parent', '19', 'categories');
        $data['cs'] = $this->_API->getWhere('parent', '20', 'categories');
        $data['cos'] = $this->_API->getWhere('parent', '25', 'categories');
        $data['premium']=$this->_API->getWherePrems('premium', '1', 'normal_ad');
        $data['b'] = &get_instance();
        $data['base'] = $this->base();

        $this->load->view('_layout', $data);
    }

}
