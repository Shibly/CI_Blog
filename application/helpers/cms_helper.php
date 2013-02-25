<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Shibly
 * Date: 2/25/13
 * Time: 7:41 PM
 * To change this template use File | Settings | File Templates.
 */

/**
 * @param $uri
 * @return string
 */

function btn_edit($uri)
{
    return anchor($uri, '<i class="icon-edit"></i>');
}

/**
 * @param $uri
 * @return string
 */

function btn_delete($uri)
{
    return anchor($uri, '<i class="icon-remove"></i>', array('onclick'
    => "return confirm('You are about to delete a record. This Can not be undone. Are you sure ?')"));
}