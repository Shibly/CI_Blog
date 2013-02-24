<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Shibly
 * Date: 2/25/13
 * Time: 12:52 AM
 * To change this template use File | Settings | File Templates.
 */

class Page_m  extends MY_Model{
    protected $_table_name = 'pages';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'order';
    protected $_rules = array();
    protected $_timestamps = FALSE;

}