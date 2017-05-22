<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of API
 *
 * @author Poxy
 */
class API extends CI_Model {

    function Save($table, $data) {
        $resp = $this->db->insert($table, $data);
        if ($resp):           
        else:
            $error = $this->db->_error_message();
        endif;
    }

    function getWhere($criteria, $lookup, $table) {
        return $this->db->where($criteria, $lookup)->get($table)->result();
    }
    
       function getWherePrems($criteria, $lookup, $table) {
        return $this->db->where($criteria, $lookup)->where('admin_status','1')->order_by('uid','DESC')->get($table)->result();
    }
    
    
  
    
    function getLastLogin($user){
      $query= $this->db->query("SELECT * FROM last_login WHERE user_id='$user' ORDER BY id DESC LIMIT 1,1 ")->result(); 
      return @$query[0]->date_time_login;
    }
                function getData($table) {
        return $this->db->get($table)->result();
    }
    
    function getAdCategries($table) {
        return $this->db->query("SELECT * FROM `$table` WHERE id NOT IN (1,19,20,25,29,30,31)")->result();
    }
     function getObCategries($table) {
        return $this->db->query("SELECT * FROM `$table` WHERE id NOT IN (1,19,20,25)")->result();
    }

    function loadResource($type) {
        return $this->db->where('type', $type)->order_by('id', 'desc')->get('resources')->result();
    }
    
    function loadPoem($id) {
        return $this->db->where('id', $id)->get('resources')->result();
    }

    function Update($id, $table, $data) {
        $this->db->where('id', $id)->update($table, $data);
    }

    function Activate($id, $table, $data) {
        $this->db->where('id', $id)->update($table, $data);
    }

    function Deactivate($id, $table, $data) {
        $this->db->where('id', $id)->update($table, $data);
    }

    function Delete($id, $table) {
        $this->db->where('id', $id)->delete($table);
    }

    function getUsers() {

        return $this->db->get('users')->result();
    }

    function getResource() {

        return $this->db->get('reslookup')->result();
    }

    function getResources() {

        return $this->db->query("SELECT r.*, rt.r_type FROM resources r, reslookup rt WHERE r.type = rt.id")->result();
    }

    function getEResources($id) {

        return $this->db->query("SELECT r.*, rt.r_type FROM resources r, reslookup rt WHERE r.type = rt.id AND r.id='$id'")->result();
    }

    function getUserDetails() {
        $id = $this->session->userdata('user_id');
        return $this->db->where('id', $id)->get('users')->result();
    }

    function getPremiumAds() {
        return $this->db->order_by('id', 'asc')->get('premium_ad')->result();
    }

    function getCategories() {
        return $this->db->get('categories')->result();
    }

    function getAndroidObituaries() {
        $id = $this->uri->segment(3);
        $cat = $this->uri->segment(4);       
        $query = "SELECT * FROM obituary WHERE category='$cat' AND user_status='1' AND admin_status='1' ORDER BY id DESC LIMIT $id, 50";
        $ex = $this->db->query($query)->result();
        header('Content-Type:Application/json');
        echo json_encode($ex);
    }

    function getAndroidObituariesComments($id) {
       
        $query = "SELECT * FROM obituary_comments WHERE approval='1' and obid='$id' ORDER by id DESC";
        $ex = $this->db->query($query)->result();
        header('Content-Type:Application/json');
        echo json_encode($ex);
    }

    function getCategoriesSelection() {
        return $this->db->query("SELECT * FROM categories WHERE id NOT IN(1,19,20,25,29,30,31)")->result();
    }

    function getAllUserAdsAdmin() {
        return $this->db->query("SELECT ad.*, c.name , u.name as user, u.id uid
              FROM normal_ad ad 
              LEFT JOIN categories c ON c.id=ad.category 
              LEFT JOIN users u ON ad.user_id = u.id
              ORDER BY ad.uid DESC")->result();
    }

    function getFullAds() {
        return $this->db->query("SELECT ad.*, c.name , u.name as user, u.id uid
              FROM normal_ad ad 
              LEFT JOIN categories c ON c.id=ad.category 
              LEFT JOIN users u ON ad.user_id = u.id
              ORDER BY ad.id DESC")->result_array();
    }

    function getAllUserObsAdmin() {
        return $this->db->query("SELECT ad.*, c.name , u.name as user,  u.id uid
              FROM obituary ad 
              LEFT JOIN categories c ON c.id=ad.category 
              LEFT JOIN users u ON ad.user_id = u.id
              ORDER BY ad.id DESC
              ")->result();
    }

    function setStatus($criteria, $id, $table, $data) {
        $this->db->where($criteria, $id)->update($table, $data);
    }

    function getReportedAds() {
        return $this->db->where('solved', '0')->get('reports')->result();
    }

    function getPayments() {
        return $this->db->query("SELECT * 
              FROM payments p, users u 
              WHERE u.id=p.user_id 
              ORDER BY p.id DESC
              ")->result();
    }

    function loadMessages() {
        $id = $this->session->userdata('user_id');
        return $this->db->where('user_id', $id)->get('inbox')->result();
    }

    function unreadMessages() {
        $id = $this->session->userdata('user_id');
        return $this->db->where('user_id', $id)->where('read', '0')->get('inbox')->num_rows();
    }

    function unSolved() {
        return $this->db->where('solved', '0')->order_by('id', 'desc')->get('reports')->num_rows();
    }

    function getUserAds($uid) {
        return $this->db->query(" SELECT * FROM( SELECT ad.id,ad.title,ad.image_path,ad.date_posted,ad.user_status,ad.admin_status,c.name 
              FROM normal_ad ad, categories c 
              WHERE user_id=$uid 
              AND c.id=ad.category  
              UNION SELECT ad.id,ad.title,ad.image_path,ad.date_posted,ad.user_status,ad.admin_status,c.name 
              FROM obituary ad, categories c 
              WHERE user_id=$uid 
              AND c.id=ad.category  )res ORDER BY id DESC")->result();
    }

    function loadComments() {
        return $this->db->query("SELECT oc.*,ob.obtitle FROM obituary_comments oc INNER JOIN obituary ob ON oc.obid = ob.id AND oc.approval ='0' ORDER BY oc.id DESC ")->result();
    }

    function getAllUserAds() {
        $id = $this->session->userdata('user_id');
        return $this->db->query("
             SELECT * FROM( SELECT ad.id,ad.category,ad.title,ad.image_path,ad.date_posted,ad.user_status,ad.admin_status,c.name 
              FROM normal_ad ad, categories c 
              WHERE c.id=ad.category 
              AND user_id ='$id'
              UNION SELECT ad.id,ad.category,ad.title,ad.image_path,ad.date_posted,ad.user_status,ad.admin_status,c.name 
              FROM obituary ad, categories c 
              WHERE  c.id=ad.category
              AND user_id ='$id' )res ORDER BY res.id DESC ")->result();
    }

    function loadUnread($id) {
        return $this->db->where('id', $id)->get('inbox')->result();
    }

    function loadPopular() {
        $string = '';
        $query = $this->db->where('parent', 0)->get('categories')->result();
        foreach ($query as $q):
            $string .= "<a href='" . site_url('search/category/' . $q->id . '/' . $q->name) . "'>" . $q->name . "</a>, ";
        endforeach;
        return rtrim($string, ", ");
    }

    function getNormalAdsFeatured() {
       // $categories = $this->getCategoriesSelection();
        $query = " SELECT * FROM normal_ad res WHERE res.user_status='1' AND res.admin_status='1' AND res.premium='0' ORDER BY  res.uid DESC LIMIT 8";


        return $this->db->query($query)->result();
    }
    
     function getNormalAdsFeaturedBack() {
        $categories = $this->getCategoriesSelection();
        $query = " SELECT * FROM( ";
        $query .= "    (select * from normal_ad where category = '1'  order by uid desc ) ";
        foreach ($categories as $id):
            $query .= " union all (select * from normal_ad where category = '$id->id' order by uid desc limit 2) ";
        endforeach;
        $query .= " ) res WHERE res.user_status='1' AND res.admin_status='1' AND res.premium='0' ORDER BY  res.uid DESC LIMIT 8";


        return $this->db->query($query)->result();
    }

    function getNormalAds() {
        $res = $this->db->where('parent', $parent_id)->get('categories')->result();
        $query = " SELECT * FROM( ";
        $query .= "    (select * from normal_ad where category = '1'  order by id desc ) ";
        foreach ($categories as $id):
            $query .= " union all (select * from normal_ad where category = '$id->id' order by id desc limit 2) ";
        endforeach;
        $query .= " ) res WHERE res.user_status='1' AND res.admin_status='1' ORDER BY res.id DESC";


        return $this->db->query($query)->result();
    }

    function getNormalAdsList($limit, $offset) {

        $categories = $this->getCategoriesSelection();
        $query = " SELECT * FROM( ";
        $query .= "    (select * from normal_ad where category = '1'  order by id desc ) ";
        foreach ($categories as $id):
            $query .= " union all (select * from normal_ad where category = '$id->id') ";
        endforeach;
        $query .= " ) res WHERE res.user_status='1' AND res.admin_status='1' ORDER BY res.premium DESC, res.uid DESC LIMIT $limit OFFSET $offset ";


        return $this->db->query($query)->result();
    }
    
    
    
     function getUsersNormalAdsList($uid, $limit, $offset) {

        $categories = $this->getCategoriesSelection();
        $query = " SELECT * FROM( ";
        $query .= "    (select * from normal_ad where category = '1'  order by id desc ) ";
        foreach ($categories as $id):
            $query .= " union all (select * from normal_ad where category = '$id->id') ";
        endforeach;
        $query .= " ) res WHERE res.user_status='1' AND res.admin_status='1' AND user_id='$uid' ORDER BY res.premium DESC, res.uid DESC LIMIT $limit OFFSET $offset ";


       return $this->db->query($query)->result();
    }

    function getNormalAdsListByParent($limit, $offset) {

        $categories = $this->getCategoriesSelection();
        $query = " SELECT * FROM( ";
        $query .= "    (select * from normal_ad where category = '1'  order by id desc ) ";
        foreach ($categories as $id):
            $query .= " union all (select * from normal_ad where category = '$id->id') ";
        endforeach;
        $query .= " ) res WHERE res.user_status='1' AND res.admin_status='1' ORDER BY res.id DESC LIMIT $limit OFFSET $offset ";


        return $this->db->query($query)->result();
    }

    function getNormalAdsListByCategory($limit, $offset, $category) {
        $query = $this->db->query("
            SELECT * FROM normal_ad res WHERE res.user_status='1' AND res.admin_status='1' AND res.category='$category' ORDER BY res.id DESC LIMIT $limit OFFSET $offset               
           ")->result();

        return $query;
    }

    function getNormalAdsListByCategoryByPrice($limit, $offset, $category) {
        $down = $this->input->get('down');
        $up = $this->input->get('up');
        $query = $this->db->query("
            SELECT * FROM normal_ad res WHERE res.user_status='1' AND res.admin_status='1' AND res.category='$category' AND price BETWEEN $down AND $up ORDER BY res.id DESC LIMIT $limit OFFSET $offset               
           ")->result();

        return $query;
    }

    function getNormalAdsListByCategoryLocation($limit, $offset, $category) {
        $loc = $this->uri->segment(5);
        $newloc = str_replace('%20', " ", $loc);
        $query = $this->db->query("
            SELECT * FROM normal_ad res WHERE res.user_status='1' AND res.admin_status='1' AND res.category='$category' AND region='$newloc' ORDER BY res.id DESC LIMIT $limit OFFSET $offset               
           ")->result();

        return $query;
    }

    function getNormalAdsListByCategoryLocationPrice($limit, $offset, $category) {
        $loc = $this->uri->segment(5);
        $newloc = str_replace('%20', " ", $loc);
        $down = $this->input->get('down');
        $up = $this->input->get('up');
        $query = $this->db->query("
            SELECT * FROM normal_ad res WHERE res.user_status='1' AND res.admin_status='1' AND res.category='$category' AND region='$newloc' AND price BETWEEN $down AND $up ORDER BY res.id DESC LIMIT $limit OFFSET $offset               
           ")->result();

        return $query;
    }

    function getNormalObssListByCategoryLocation($limit, $offset, $category) {
        $loc = $this->uri->segment(5);
        $newloc = str_replace('%20', " ", $loc);
        $query = $this->db->query("
            SELECT * FROM obituary res WHERE res.user_status='1' AND res.admin_status='1' AND res.category='$category' AND region='$newloc' ORDER BY res.id DESC LIMIT $limit OFFSET $offset               
           ")->result();

        return $query;
    }

    function getNormalAdsByParent($limit, $offset, $category) {
        $query = $this->db->query("
            SELECT * FROM normal_ad res WHERE res.user_status='1' AND res.admin_status='1' AND res.category='$category' ORDER BY res.id DESC LIMIT $limit OFFSET $offset               
           ")->result();

        return $query;
    }

    function findChildren($limit, $offset, $parent_id) {
        $v = '';
        $res = $this->db->where('parent', $parent_id)->get('categories')->result();
        foreach ($res as $i) {
            $v .= "'$i->id'" . ',';
        }
        $ids = rtrim($v, ',');
        $query = $this->db->query("
            SELECT * FROM normal_ad res WHERE res.user_status='1' AND res.admin_status='1' AND res.category IN ($ids) ORDER BY res.id DESC LIMIT $limit OFFSET $offset               
           ")->result();

        return $query;
    }

    function findChildrenCosts($limit, $offset, $parent_id) {
        $down = $this->input->get('down');
        $up = $this->input->get('up');
        $v = '';
        $res = $this->db->where('parent', $parent_id)->get('categories')->result();
        foreach ($res as $i) {
            $v .= "'$i->id'" . ',';
        }
        $ids = rtrim($v, ',');
        $query = $this->db->query("
            SELECT * FROM normal_ad res WHERE res.user_status='1' AND res.admin_status='1' AND res.category IN ($ids) AND price BETWEEN $down AND $up ORDER BY res.id DESC LIMIT $limit OFFSET $offset               
           ")->result();

        return $query;
    }

    function getObituary($id, $limit, $offset) {
        $query = $this->db->query("
            SELECT * FROM obituary WHERE user_status='1' AND admin_status='1' and category='$id'
             ORDER BY id DESC LIMIT $limit OFFSET $offset               
           ")->result();

        return $query;
    }

    function getAllObituary($limit, $offset) {
        $query = $this->db->query("
            SELECT * FROM obituary WHERE user_status='1' AND admin_status='1' 
             ORDER BY id DESC LIMIT $limit OFFSET $offset               
           ")->result();

        return $query;
    }

    function getNormalAdRandom($cid, $table, $limit) {
        return $this->db->query("SELECT ad.*, c.name 
FROM $table ad
JOIN categories c ON c.id = ad.category 
AND ad.category ='$cid'
 LIMIT $limit;")->result();
    }

    function getTotal($table) {
        return $this->db->where('user_status', '1')->where('admin_status', '1')->get($table)->num_rows();
    }
    function getUserTotal($table,$user) {
        return $this->db->where('user_status', '1')->where('admin_status', '1')->where('user_id',$user)->get($table)->num_rows();
    }

    function getTotalByCategory($table, $category) {
        return $this->db->where('user_status', '1')->where('admin_status', '1')->where('category', $category)->get($table)->num_rows();
    }

    function getTotalByChildrenCategories($table, $category) {

        if ($this->uri->segment(2) == 'category') {
            return $this->db->where('user_status', '1')->where('admin_status', '1')->where('category', $category)->get($table)->num_rows();
        } else {
            $v = '';
            $res = $this->db->where('parent', $category)->get('categories')->result();
            foreach ($res as $i) {
                $v .= "'$i->id'" . ',';
            }
            $ids = rtrim($v, ',');
            $query = $this->db->query("
            SELECT COUNT(*) c FROM $table res WHERE res.user_status='1' AND res.admin_status='1' AND res.category IN ($ids)                
           ")->result();

            return $query[0]->c;
        }
    }

    function getTotalByChildrenCostCount($table, $category) {
        $down = $this->input->get('down');
        $up = $this->input->get('up');
        if ($this->uri->segment(2) == 'category') {
            return $this->db->where('user_status', '1')->where('admin_status', '1')->where('category', $category)->where("price BETWEEN $down AND $up")->get($table)->num_rows();
        } else {
            $v = '';
            $res = $this->db->where('parent', $category)->get('categories')->result();
            foreach ($res as $i) {
                $v .= "'$i->id'" . ',';
            }
            $ids = rtrim($v, ',');
            $query = $this->db->query("
            SELECT COUNT(*) c FROM $table res WHERE res.user_status='1' AND res.admin_status='1' AND price BETWEEN $down AND $up AND res.category IN ($ids)                
           ")->result();

            return $query[0]->c;
        }
        //return $this->db->where('user_status', '1')->where('admin_status', '1')->where('categor', $category)->where("price BETWEEN $down AND $up")->get($table)->num_rows();
    }

    function getTotalByCategoryLoction($table, $category, $location) {
        return $this->db->where('user_status', '1')->where('admin_status', '1')->where('category', $category)->where('region', $location)->get($table)->num_rows();
    }

    function getTotalByCategoryLoctionByPrice($table, $category, $location) {
        $down = $this->input->get('down');
        $up = $this->input->get('up');
        $loc = $this->uri->segment(5);
        $newloc = str_replace('%20', " ", $loc);

        return $this->db->where('user_status', '1')->where('admin_status', '1')->where('category', $category)->where('region', $newloc)->where("price BETWEEN $down AND $up")->get('normal_ad')->num_rows();
    }

    function getObituaryTotals($table, $category) {
        return $this->db->where('user_status', '1')->where('admin_status', '1')->order_by('id', 'desc')->get($table)->num_rows();
    }

    function getAllObs() {
        return $this->db->where('user_status', '1')->where('admin_status', '1')->order_by('id', 'desc')->limit(5)->get('obituary')->result();
    }

    function checkArticle($table, $aid) {
        $id = $this->session->userdata('user_id');
        return $this->db->where('user_id', $id)->where('id', $aid)->get($table)->num_rows();
    }

    function getSingleOb($id) {
        return $this->db->where('id', $id)->get('obituary')->result();
    }

    function getObComments($id) {
        return $this->db->where('obid', $id)->where('approval', '1')->get('obituary_comments')->result();
    }

    function getSingleAd($id) {
        return $this->db->query("SELECT ad.* ,c.name,u.name user, u.phone 
              FROM normal_ad ad, categories c, users u
              WHERE c.id=ad.category  
              AND u.id = ad.user_id
              AND ad.id='$id'")->result();
    }

    function getAdSearchResults($ids, $order) {
        $location = explode(",",$this->input->get('thelocation'));
        $min = $this->input->get('min');
        $max = $this->input->get('max');
      
        $qe=''; 
       
        if(!empty($location)){
            $loc= str_replace("%20", " ", $location[0]);
           $qe .= " AND ad.region LIKE '%$loc%' "; 
        }else{
            $qe.='';
        }
        
         if (!empty ($min) && empty ($max)) {
            $qe .= " AND ad.price < $max ";
        }else {
           $qe.=''; 
        }
        
         if (empty ($min) && !empty ($max)) {
            $qe .= " AND ad.price > $min  ";
        }else {
           $qe.=''; 
        }        
        
        if (!empty ($min) && !empty ($max)) {
            $qe .= " AND ad.price BETWEEN $min AND $max ";
        }else {
           $qe.=''; 
        }         
        
        
        return $this->db->query("SELECT ad.* ,c.name cname ,u.name uname, u.phone "
                        . "FROM normal_ad ad LEFT JOIN categories c ON c.id=ad.category "
                        . "LEFT JOIN users u ON u.id = ad.user_id WHERE ad.uid IN ($ids) "
                        . "AND c.id=ad.category "
                        . "AND u.id = ad.user_id "
                        . $qe 
                        . " ORDER BY CASE ad.uid $order END")->result();
    }
    
       function getObSearchResults($ids, $order) {
           
           
        $location = explode(",",$this->input->get('thelocation'));
      
      
        $qe=''; 
       
        if(!empty($location)){
            $loc= str_replace("%20", " ", $location[0]);
           $qe .= " AND ad.region LIKE '%$loc%' "; 
        }else{
            $qe.='';
        }
        return $this->db->query("SELECT ad.*, c.name , u.name as user,  u.id uid 
                           FROM obituary ad  "
                        . "LEFT JOIN users u ON u.id = ad.user_id LEFT JOIN categories c ON c.id = ad.category WHERE ad.id IN ($ids) "
                        . "AND c.id=ad.category "
                        . "AND u.id = ad.user_id "
                        . $qe
                        . " ORDER BY CASE ad.id $order END")->result();
    }

    function getUserIP() {
        return $_SERVER['REMOTE_ADDR'];
    }

    function setVisitorCount($id) {
        $check = $this->db->where('page', $id)->where('userip', $this->getUserIP())->get('pageview')->num_rows();
        if ($check > 0):

        else:
            $this->Save('pageview ', array('page' => $id, 'userip' => $this->getUserIP()));

        endif;
    }

    function getCount($id) {
        return $this->db->where('page', $id)->get('pageview')->num_rows();
    }

    function setVisitorCountAd($id) {
        $check = $this->db->where('page', $id)->where('userip', $this->getUserIP())->get('adviews')->num_rows();
        if ($check > 0):

        else:
            $this->Save('adviews', array('page' => $id, 'userip' => $this->getUserIP()));

        endif;
    }

    function getCountAd($id) {
        return $this->db->where('page', $id)->get('adviews')->num_rows();
    }

    function getSearchResults($query, $limit, $offset) {


        if (strlen($query['keyword'])) {
            $kw = $query['keyword'];
        }
        if (strlen($query['category'])) {
            $ca = $query['category'];
        }
        $q = $this->db->query("SELECT * FROM `normal_ad` WHERE `title` LIKE '%$kw%' ESCAPE '!' AND `category` = '$ca' ORDER BY `id` DESC LIMIT $limit OFFSET $offset")->result();
        return $q;
    }

    function getSearchCount($query) {

        $q = $this->db->select('COUNT(*) count')
                ->from('normal_ad');
        if (strlen($query['keyword'])) {
            $q->like('title', $query['keyword']);
        }
        if (strlen($query['category'])) {
            $q->where('category', $query['category']);
        }
        $res = $q->get()->result();

        if (!empty($res)):
            return $res[0]->count;
        else:
            return 0;
        endif;
    }

    function getRegionCount($table, $category) {
        return $this->db->query("SELECT region, COUNT(*) as number FROM $table WHERE category='$category' AND user_status='1' AND admin_status='1'  GROUP BY region ORDER BY COUNT(*) DESC ")->result();
    }

}
