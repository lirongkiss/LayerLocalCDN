<?php

if ( ! defined('BASE_PATH')) exit('No direct script access allowed');

/**
 * 封装SAE storage
 * */
class StorageHandle{
	
	public $instance;
	
	public function __construct(){
		$this->instance = new CEStorage();
	}
	
	public function exists($filename){
		return $this->instance->fileExists($filename);
	}
	public function read($filename){
		return $this->instance->read($filename);
	}
	
	public function write($name,$content){
		$temp = tempnam(sys_get_temp_dir());
		file_put_contents($temp,$content);
		return $this->instance->upload($temp,$name);
	}
	
	public function url($name){
		return $this->instance->getUrl($name);
	}
	
	public function error(){
		return $this->instance->errorno();
	}
	
	public function delete($name){
		return $this->instance->delete($name);
	}
	
}