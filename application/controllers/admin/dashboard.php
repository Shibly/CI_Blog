<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Shibly
 * Date: 2/23/13
 * Time: 3:38 PM
 * To change this template use File | Settings | File Templates.
 */

Class Dashboard extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->data['meta_title'] = 'My awesome CMS';
        $this->data['title'] = 'Please Log in';
    }

    public function index()
    {
        $this->load->view('admin/_layout_main', $this->data);
    }

    public function modal()
    {
        $this->load->view('admin/_layout_modal', $this->data);
    }
}