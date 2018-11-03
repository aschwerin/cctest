<?php
/**
 * Created by PhpStorm.
 * User: Genesis
 * Date: 9/30/2016
 * Time: 1:14 PM
 */

function flash($message, $type = 'success')
{
        session()->flash('flash_message', $message);
        session()->flash('flash_message_type', $type);
}