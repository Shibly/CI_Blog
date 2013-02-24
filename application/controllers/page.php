<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Shibly
 * Date: 2/25/13
 * Time: 12:53 AM
 * To change this template use File | Settings | File Templates.
 */

class Page extends Frontend_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('page_m');
    }

    public function index()
    {
        $pages = $this->page_m->get();
        echo "<pre>";
        var_dump($pages);
        echo "</pre>";
    }

    public function save()
    {
        $data = array(
            'title' => 'My Page',
            'slug' => 'my-page',
            'order' => '2',
            'body' => 'This is my body'
        );

        $id = $this->page_m->save($data);
        var_dump($id);
    }

}