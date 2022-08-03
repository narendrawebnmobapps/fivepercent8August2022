<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';
class Api extends REST_Controller
{
	function __construct()
	{

	}
	function test_get()
	{
		echo "hii";
	}
}