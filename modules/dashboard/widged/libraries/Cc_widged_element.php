<?php

class Cc_widged_element
{

	public function __construct()
	{
	}

	public function el(string $tag, $attributes = null, $content = null)
	{
		return \Spatie\HtmlElement\HtmlElement::render(...func_get_args());
	}

}
