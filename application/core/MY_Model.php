<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Shibly
 * Date: 2/24/13
 * Time: 11:07 PM
 * To change this template use File | Settings | File Templates.
 */

class MY_Model extends CI_Model
{
    protected $_table_name = '';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = '';
    public $rules = array();
    protected $_timestamps = FALSE;


    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param null $id
     * @param bool $single
     * @return mixed
     */
    public function get($id = NULL, $single = false)
    {
        if ($id != NULL) {
            $filter = $this->_primary_filter;
            $id = $filter($id);
            $this->db->where($this->_primary_key, $id);
            $method = 'row';
        } else if ($single == true) {
            $method = 'row';
        } else {
            $method = 'result';
        }
        if (!count($this->db->ar_orderby)) {
            $this->db->order_by($this->_order_by);

        }
        return $this->db->get($this->_table_name)->$method();
    }

    public function get_by($where, $single = FALSE)
    {
        $this->db->where($where);
        return $this->get(NULL, $single);
    }

    /**
     * @param $data
     * @param null $id
     *
     * an array of data will be passed. If they have an id, means the data will be updated,
     * if no id , means that will be an insert
     */

    public function save($data, $id = null)
    {
        // set timespamps

        if ($this->_timestamps == true) {
            $now = date('Y-m-d H:i:s');
            $id || $data['created'] = $now;
            $data['modified'] = $now;
        }

        // Insert
        if ($id === null) {
            !isset($data[$this->_primary_key]) || $data[$this->_primary_key] = null;
            $this->db->set($data);
            $this->db->insert($this->_table_name);
            $id = $this->db->insert_id();
        } // Update
        else {
            $filter = $this->_primary_filter;
            $id = $filter($id);
            $this->db->set($data)->where($this->_primary_key, $id);
            $this->db->update($this->_table_name);
        }

        return $id;

    }

    /**
     * @param $id
     * @return bool
     */
    public function delete($id)
    {
        $filter = $this->_primary_filter;
        $id = $filter($id);
        if ($id) {
            return false;
        } else {
            $this->db->where($this->_primary_key, $id)->limit(1)->delete($this->_table_name);
        }
    }


}