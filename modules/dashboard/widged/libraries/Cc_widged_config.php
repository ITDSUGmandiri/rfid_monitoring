<?php

class Cc_widged_config
{
	public $config = [];

	public function __construct($config = [])
	{
		$this->init($config);
	}

	public function init($config = [])
	{
		foreach ((array)$config as $key => $value) {
			$this->{$key} = $this->config[$key] = $value;
		}

		return $this;
	}

	public function get($key = null, $default = null)
	{
		if (strpos($key, '.') !== false) {
			$keys = explode('.', $key);
			if (isset($this->config[$keys[0]]->config[$keys[1]])) {
				return ($this->config[$keys[0]]->config[$keys[1]]);
			}
		}
		if (isset($this->config[$key])) {
			return $this->config[$key];
		}
		return $default;
	}

	public function set($key = null, $val = null)
	{
		$this->config[$key] = $this->$key = $val;
		return $this;
	}

	public function all()
	{
		return $this->config;
	}

	public function __get($key)
	{
		if (isset($this->{$key})) {
			return $this->{$key};
		}

		return null;
	}

}
