<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Shibly
 * Date: 2/23/13
 * Time: 3:47 PM
 * To change this template use File | Settings | File Templates.
 */

class Admin_Controller extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->data['meta_title'] = 'My awesome CMS';
        $this->load->model('user_m');
    }
}