<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once __DIR__ . '/ImageResize.php';
require_once __DIR__ . '/ImageResizeException.php';

class Image_resize extends \Gumlet\ImageResize
{

	function __construct($file)
	{
		parent::__construct($file);
	}
}
