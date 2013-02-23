<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Shibly
 * Date: 2/23/13
 * Time: 3:41 PM
 * To change this template use File | Settings | File Templates.
 */

class MY_Controller extends CI_Controller
{
    public $data = array();

    function __construct()
    {
        parent::__construct();
        $this->data['errors'] = array();
        $this->data['site_name'] = config_item('site_name');
    }
}