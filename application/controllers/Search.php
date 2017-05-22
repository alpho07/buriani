<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Search
 *
 * @author Poxy
 */
class Search extends MY_Controller {

    public $_Input = '';
    public $_API = '';
    public $_Home = '';

    function __construct() {
        parent::__construct();
        $this->load->library('My_Input');
        $this->_Input = new My_Input;
        $this->_API = new API;
        parse_str(substr(strrchr($_SERVER['REQUEST_URI'], "?"), 1), $_GET);
    }

    function display($id) {

        $view = $this->_Input->get('view', TRUE);
        if ($this->_Input->get('page', TRUE)) {
            $page = $this->_Input->get('page', TRUE);
        } else {
            $page = 0;
        }


        $this->_Input->load_query($id);

        $query = array(
            'keyword' => $this->input->get('keyword'),
            'category' => $this->input->get('category'),
        );



        if ($view == 'list') {
            $data['content'] = 'pages/adslist';
            $data['ptitle'] = "Obituary -> List View";
            $data['title'] = "OOP The best obituary classifieds";
            $data['listview'] = 'display/' . $id . '/?view=list&page=' . $page;
            $data['gridview'] = 'display/' . $id . '/?view=grid&page=' . $page;
            $data['region_count'] = $this->getRegionCount();
            $data['flist'] = $this->_API->getSearchResults($query, 20, $page);
            $data['pages'] = $this->spagination(get_class(), 'display', $id, $view = 'list', '20', 'normal_ad', $query, $page);
        } else {
            $data['content'] = 'pages/adsgrid';
            $data['ptitle'] = "Obituary -> Grid View";
            $data['title'] = "OOP The best obituary classifieds";
            $data['listview'] = 'display/' . $id . '/?view=list&page=' . $this->input->get('page');
            $data['gridview'] = 'display/' . $id . '/?view=grid&page=' . $this->input->get('page');
            $data['region_count'] = $this->getRegionCount();
            $data['flist'] = $this->_API->getSearchResults($query, 20, $page);
            $data['pages'] = $this->spagination(get_class(), 'display', $id, $view = 'list', '20', 'normal_ad', $query, $page);
        }
        $this->TemplateBuilder($data);
    }

    public function category($id) {
        $category = $id;
        $view = $this->input->get('view');
        $down = $this->input->get('down');
        $up = $this->input->get('up');
        if ($this->input->get('page')) {
            $page = $this->input->get('page');
        } else {
            $page = 0;
        }
        if ($id !== '29' && $id !== '30' && $id !== '31') {
            if (!$down && !$up) {
                if ($view == 'list') {
                    $data['content'] = 'pages/list';
                    $data['ptitle'] = $this->findParent($id) . " &#187 " . $this->uri->segment(4) . '/' . $this->uri->segment(5);
                    $data['title'] = "OOP The best obituary classifieds";
                    $data['url'] = 'search/catlocpri/' . $id . '/' . $this->uri->segment(4) . '/';
                    $data['listview'] = 'search/category/' . $id . '/' . $this->uri->segment(4) . '?view=list&page=' . $this->input->get('page');
                    $data['gridview'] = 'search/category/' . $id . '/' . $this->uri->segment(4) . '?view=grid&page=' . $this->input->get('page');
                    $data['region_count'] = $this->_API->getRegionCount('normal_ad', $id);
                    $data['flist'] = $this->_API->getNormalAdsListByCategory(20, $page, $id);
                    $data['pages'] = $this->cpagination('Search', 'category', $view, $page, 20, 'normal_ad', $category);
                } else {
                    $data['content'] = 'pages/adgrid';
                    $data['ptitle'] = $this->findParent($id) . " &#187 " . $this->uri->segment(4) . '/' . $this->uri->segment(5);
                    $data['title'] = "OOP The best obituary classifieds";
                    $data['url'] = 'search/catlocpri/' . $id . '/' . $this->uri->segment(4) . '/';
                    $data['listview'] = 'search/category/' . $id . '/' . $this->uri->segment(4) . '?view=list&page=' . $this->input->get('page');
                    $data['gridview'] = 'search/category/' . $id . '/' . $this->uri->segment(4) . '?view=grid&page=' . $this->input->get('page');
                    $data['region_count'] = $this->_API->getRegionCount('normal_ad', $id);
                    $data['flist'] = $this->_API->getNormalAdsListByCategory(20, $page, $id);
                    $data['pages'] = $this->cpagination('Search', 'category', $view, $page, 20, 'normal_ad', $category);
                }
            } else {
                if ($view == 'list') {
                    $data['content'] = 'pages/list';
                    $data['ptitle'] = $this->findParent($id) . " &#187 " . $this->uri->segment(4) . '/' . $this->uri->segment(5);
                    $data['title'] = "OOP The best obituary classifieds";
                    $data['url'] = 'search/catlocpri/' . $id . '/' . $this->uri->segment(4) . '/';
                    $data['down'] = $down;
                    $data['up'] = $up;
                    $data['listview'] = 'search/category/' . $id . '/' . $this->uri->segment(4) . '?down=' . $down . '&up=' . $up . '&view=list&page=' . $this->input->get('page');
                    $data['gridview'] = 'search/category/' . $id . '/' . $this->uri->segment(4) . '?down=' . $down . '&up=' . $up . '&view=grid&page=' . $this->input->get('page');
                    $data['region_count'] = $this->_API->getRegionCount('normal_ad', $id);
                    $data['flist'] = $this->_API->getNormalAdsListByCategoryByPrice(20, $page, $id);
                    $data['pages'] = $this->cpagination('Search', 'category', $view, $page, 20, 'normal_ad', $category);
                } else {
                    $data['content'] = 'pages/adgrid';
                    $data['ptitle'] = $this->findParent($id) . " &#187 " . $this->uri->segment(4) . '/' . $this->uri->segment(5);
                    $data['title'] = "OOP The best obituary classifieds";
                    $data['down'] = $down;
                    $data['up'] = $up;
                    $data['url'] = 'search/catlocpri/' . $id . '/' . $this->uri->segment(4) . '/';
                    $data['listview'] = 'search/category/' . $id . '/' . $this->uri->segment(4) . '?down=' . $down . '&up=' . $up . '&view=list&page=' . $this->input->get('page');
                    $data['gridview'] = 'search/category/' . $id . '/' . $this->uri->segment(4) . '?down=' . $down . '&up=' . $up . '&view=grid&page=' . $this->input->get('page');
                    $data['region_count'] = $this->_API->getRegionCount('normal_ad', $id);
                    $data['flist'] = $this->_API->getNormalAdsListByCategoryByPrice(20, $page, $id);
                    $data['pages'] = $this->cpagination('Search', 'category', $view, $page, 20, 'normal_ad', $category);
                }
            }
        } else {

            if ($view == 'list') {
                $data['content'] = 'pages/obituarylist';
                $data['ptitle'] = $this->findParent($id) . " &#187 " . $this->uri->segment(4) . '/' . $this->uri->segment(5);
                $data['title'] = "OOP The best obituary classifieds";
                $data['url'] = 'search/catlocpri/' . $id . '/' . $this->uri->segment(4) . '/';
                $data['listview'] = 'search/category/' . $id . '/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '?view=list&page=' . $this->input->get('page');
                $data['gridview'] = 'search/category/' . $id . '/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '?view=grid&page=' . $this->input->get('page');
                $data['region_count'] = $this->_API->getRegionCount('obituary', $id);
                $data['flist'] = $this->_API->getObituary($id, 18, $page);
                $data['pages'] = $this->cpagination('Search', 'category', $view, $page, 18, 'obituary', $category);
            } else {
                $data['content'] = 'pages/obgrid';
                $data['ptitle'] = $this->findParent($id) . " &#187 " . $this->uri->segment(4) . '/' . $this->uri->segment(5);
                $data['title'] = "OOP The best obituary classifieds";
                $data['url'] = 'search/catlocpri/' . $id . '/' . $this->uri->segment(4) . '/';
                $data['listview'] = 'search/category/' . $id . '/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '?view=list&page=' . $this->input->get('page');
                $data['gridview'] = 'search/category/' . $id . '/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '?view=grid&page=' . $this->input->get('page');
                $data['region_count'] = $this->_API->getRegionCount('obituary', $id);
                $data['flist'] = $this->_API->getObituary($id, 20, $page);
                $data['pages'] = $this->cpagination('Search', 'category', $view, $page, 20, 'obituary', $category);
            }
        }

        $this->TemplateBuilder($data);
    }

    public function catlocpri($id) {
        $category = $id;
        $down = $this->input->get('down');
        $up = $this->input->get('up');
        $view = $this->input->get('view');
        if ($this->input->get('page')) {
            $page = $this->input->get('page');
        } else {
            $page = 0;
        }
        if ($id !== '29' && $id !== '30' && $id !== '31') {
            if (!$down && !$up) {
                if ($view == 'list') {
                    $data['content'] = 'pages/list';
                    $data['ptitle'] = $this->findParent($id) . " &#187 " . $this->uri->segment(4) . '&#187' . $this->uri->segment(5);
                    $data['title'] = "OOP The best obituary classifieds";
                    $data['url'] = 'search/catlocpri/' . $id . '/' . $this->uri->segment(4) . '/';
                    $data['listview'] = 'search/catlocpri/' . $id . '/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '?view=list&page=' . $this->input->get('page');
                    $data['gridview'] = 'search/catlocpri/' . $id . '/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '?view=grid&page=' . $this->input->get('page');
                    $data['region_count'] = $this->_API->getRegionCount('normal_ad', $id);
                    $data['flist'] = $this->_API->getNormalAdsListByCategoryLocation(20, $page, $id);
                    $data['pages'] = $this->locpagination('Search', 'catlocpri', $view, $page, 20, 'normal_ad');
                } else {
                    $data['content'] = 'pages/adgrid';
                    $data['ptitle'] = $this->findParent($id) . " &#187 " . $this->uri->segment(4) . '&#187' . $this->uri->segment(5);
                    $data['title'] = "OOP The best obituary classifieds";
                    $data['url'] = 'search/catlocpri/' . $id . '/' . $this->uri->segment(4) . '/';
                    $data['listview'] = 'search/catlocpri/' . $id . '/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '?view=list&page=' . $this->input->get('page');
                    $data['gridview'] = 'search/catlocpri/' . $id . '/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '?view=grid&page=' . $this->input->get('page');
                    $data['region_count'] = $this->_API->getRegionCount('normal_ad', $id);
                    $data['flist'] = $this->_API->getNormalAdsListByCategoryLocation(20, $page, $id);
                    $data['pages'] = $this->locpagination('Search', 'catlocpri', $view, $page, 20, 'normal_ad');
                }
            } else {
                if ($view == 'list') {
                    $data['content'] = 'pages/list';
                    $data['ptitle'] = $this->findParent($id) . " &#187 " . $this->uri->segment(4) . '&#187' . $this->uri->segment(5);
                    $data['title'] = "OOP The best obituary classifieds";
                    $data['url'] = 'search/catlocpri/' . $id . '/' . $this->uri->segment(4) . '/';
                    $data['down'] = $down;
                    $data['up'] = $up;
                    $data['listview'] = 'search/catlocpri/' . $id . '/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '?down=' . $down . '&up=' . $up . '&view=list&page=' . $this->input->get('page');
                    $data['gridview'] = 'search/catlocpri/' . $id . '/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '?down=' . $down . '&up=' . $up . '&view=grid&page=' . $this->input->get('page');
                    $data['region_count'] = $this->_API->getRegionCount('normal_ad', $id);
                    $data['flist'] = $this->_API->getNormalAdsListByCategoryLocationPrice(20, $page, $id);
                    $data['pages'] = $this->locpagination('Search', 'catlocpri', $view, $page, 20, 'normal_ad');
                } else {
                    $data['content'] = 'pages/adgrid';
                    $data['ptitle'] = $this->findParent($id) . " &#187 " . $this->uri->segment(4) . '&#187' . $this->uri->segment(5);
                    $data['title'] = "OOP The best obituary classifieds";
                    $data['down'] = $down;
                    $data['up'] = $up;
                    $data['url'] = 'search/catlocpri/' . $id . '/' . $this->uri->segment(4) . '/';
                    $data['listview'] = 'search/catlocpri/' . $id . '/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '?down=' . $down . '&up=' . $up . '&view=list&page=' . $this->input->get('page');
                    $data['gridview'] = 'search/catlocpri/' . $id . '/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '?down=' . $down . '&up=' . $up . '&view=grid&page=' . $this->input->get('page');
                    $data['region_count'] = $this->_API->getRegionCount('normal_ad', $id);
                    $data['flist'] = $this->_API->getNormalAdsListByCategoryLocationPrice(20, $page, $id);
                    $data['pages'] = $this->locpagination('Search', 'catlocpri', $view, $page, 20, 'normal_ad');
                }
            }
        } else {

            if ($view == 'list') {
                $data['content'] = 'pages/obituarylist';
                $data['ptitle'] = $this->findParent($id) . " &#187 " . $this->uri->segment(4) . '&#187' . $this->uri->segment(5);
                $data['title'] = "OOP The best obituary classifieds";
                $data['url'] = 'search/catlocpri/' . $id . '/' . $this->uri->segment(4) . '/';
                $data['listview'] = 'search/catlocpri/' . $id . '/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '?view=list&page=' . $this->input->get('page');
                $data['gridview'] = 'search/catlocpri/' . $id . '/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '?view=grid&page=' . $this->input->get('page');
                $data['region_count'] = $this->_API->getRegionCount('obituary', $id);
                $data['flist'] = $this->_API->getNormalObssListByCategoryLocation(18, $page, $id);
                $data['pages'] = $this->locpagination('Search', 'catlocpri', $view, $page, 18, 'obituary', $category);
            } else {
                $data['content'] = 'pages/obgrid';
                $data['ptitle'] = $this->findParent($id) . " &#187 " . $this->uri->segment(4) . '&#187' . $this->uri->segment(5);
                $data['title'] = "OOP The best obituary classifieds";
                $data['url'] = 'search/catlocpri/' . $id . '/' . $this->uri->segment(4) . '/';
                $data['listview'] = 'search/catlocpri/' . $id . '/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '?view=list&page=' . $this->input->get('page');
                $data['gridview'] = 'search/catlocpri/' . $id . '/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '?view=grid&page=' . $this->input->get('page');
                $data['region_count'] = $this->_API->getRegionCount('obituary', $id);
                $data['flist'] = $this->_API->getNormalObssListByCategoryLocation(20, $page, $id);
                $data['pages'] = $this->locpagination('Search', 'catlocpri', $view, $page, 20, 'obituary', $category);
            }
        }

        $this->TemplateBuilder($data);
    }

    public function main($id) {
        $category = $id;
        $view = $this->input->get('view');
        $down = $this->input->get('down');
        $up = $this->input->get('up');

        if ($this->input->get('page')) {
            $page = $this->input->get('page');
        } else {
            $page = 0;
        }

        if ($id !== '1') {

            if (!$down && !$up) {
                if ($view == 'list') {
                    $data['content'] = 'pages/list';
                    $data['ptitle'] = "ALL " . $this->uri->segment(4);
                    $data['title'] = "OOP The best obituary classifieds";
                    $data['listview'] = 'search/main/' . $id . '/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '?view=list&page=' . $this->input->get('page');
                    $data['gridview'] = 'search/main/' . $id . '/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '?view=grid&page=' . $this->input->get('page');
                    $data['region_count'] = $this->_API->getRegionCount('normal_ad', $id);
                    $data['flist'] = $this->_API->findChildren(20, $page, $id);
                    $data['pages'] = $this->cpagination('Search', 'main', $view, $page, 20, 'normal_ad', $category);
                } else {
                    $data['content'] = 'pages/adgrid';
                    $data['ptitle'] = "ALL " . $this->uri->segment(4);
                    $data['title'] = "OOP The best obituary classifieds";
                    $data['listview'] = 'search/main/' . $id . '/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '?view=list&page=' . $this->input->get('page');
                    $data['gridview'] = 'search/main/' . $id . '/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '?view=grid&page=' . $this->input->get('page');
                    $data['region_count'] = $this->_API->getRegionCount('normal_ad', $id);
                    $data['flist'] = $this->_API->findChildren(20, $page, $id);
                    $data['pages'] = $this->cpagination('Search', 'main', $view, $page, 20, 'normal_ad', $category);
                }
            } else {
                if ($view == 'list') {
                    $data['content'] = 'pages/list';
                    $data['ptitle'] = "ALL " . $this->uri->segment(4);
                    $data['title'] = "OOP The best obituary classifieds";
                    $data['down'] = $down;
                    $data['up'] = $up;
                    $data['listview'] = 'search/main/' . $id . '/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '?down=' . $down . '&up=' . $up . '&view=list&page=' . $this->input->get('page');
                    $data['gridview'] = 'search/main/' . $id . '/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '?down=' . $down . '&up=' . $up . '&view=grid&page=' . $this->input->get('page');
                    $data['region_count'] = $this->_API->getRegionCount('normal_ad', $id);
                    $data['flist'] = $this->_API->findChildrenCosts(20, $page, $id);
                    $data['pages'] = $this->cpagination('Search', 'main', $view, $page, 20, 'normal_ad', $category);
                } else {
                    $data['content'] = 'pages/adgrid';
                    $data['ptitle'] = "ALL " . $this->uri->segment(4);
                    $data['title'] = "OOP The best obituary classifieds";
                    $data['down'] = $down;
                    $data['up'] = $up;
                    $data['listview'] = 'search/main/' . $id . '/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '?down=' . $down . '&up=' . $up . '&view=list&page=' . $this->input->get('page');
                    $data['gridview'] = 'search/main/' . $id . '/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '?down=' . $down . '&up=' . $up . '&view=grid&page=' . $this->input->get('page');
                    $data['region_count'] = $this->_API->getRegionCount('normal_ad', $id);
                    $data['flist'] = $this->_API->findChildrenCosts(20, $page, $id);
                    $data['pages'] = $this->cpagination('Search', 'main', $view, $page, 20, 'normal_ad', $category);
                }
            }
        } else {

            if ($view == 'list') {
                $data['content'] = 'pages/obituarylist';
                $data['ptitle'] = "All Obituaries -> List View";
                $data['title'] = "OOP The best obituary classifieds";
                $data['listview'] = 'search/main/' . $id . '/' . $this->uri->segment(4) . '?view=list&page=' . $this->input->get('page');
                $data['gridview'] = 'search/main/' . $id . '/' . $this->uri->segment(4) . '?view=grid&page=' . $this->input->get('page');
                $data['region_count'] = $this->_API->getRegionCount('obituary', $id);
                $data['flist'] = $this->_API->getAllObituary(18, $page);
                $data['pages'] = $this->opagination('Search', 'main', $view, $page, 18, 'obituary', $category);
            } else {
                $data['content'] = 'pages/obgrid';
                $data['ptitle'] = "All Obituaries -> Grid View";
                $data['title'] = "OOP The best obituary classifieds";
                $data['listview'] = 'search/main/' . $id . '/' . $this->uri->segment(4) . '?view=list&page=' . $this->input->get('page');
                $data['gridview'] = 'search/main/' . $id . '/' . $this->uri->segment(4) . '?view=grid&page=' . $this->input->get('page');
                $data['region_count'] = $this->_API->getRegionCount('obituary', $id);
                $data['flist'] = $this->_API->getAllObituary(20, $page);
                $data['pages'] = $this->opagination('Search', 'main', $view, $page, 20, 'obituary', $category);
            }
        }

        $this->TemplateBuilder($data);
    }

    function query() {
        $query = array(
            'keyword' => $this->_POST('keyword'),
            'category' => $this->_POST('category'),
        );


        $id = $this->_Input->save_query($query);

        redirect('search/display/' . $id);
    }

    function result($query, $limit, $offset, $orderby) {
        $page = 0;
        $data['slist'] = $this->_API->getObituary(18, $page);
        $data['pages'] = $this->pagination(get_class(), 'display', $view = 'grid', $page, 20, 'obituary');
    }
    
    function loadpartial(){
          $this->load->view('partials/productloader');
              
    }

}
