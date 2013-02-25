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


        /**
         *  The login check will be performed in each controller if the controller extends the Admin_Controller.
         * The login check will not be performed if the user is already in the login/logout page
         */
        /*
         $exception_uris = array(
             'admin/user/login',
             'admin/user/logout'
         );
         if (in_array(uri_string(), $exception_uris) == FALSE) {
             if ($this->user_m->loggedin() == FALSE) {
                 redirect('admin/user/login');
             }
         }
        */
    }
}