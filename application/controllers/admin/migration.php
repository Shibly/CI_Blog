<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Shibly
 * Date: 2/24/13
 * Time: 10:26 PM
 * To change this template use File | Settings | File Templates.
 */

class Migration extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->library('migration');
        if (!$this->migration->current()) {
            show_error($this->migration->error_string());
        } else {
            echo "Migration worked !";
        }

    }
}