<?php

	class StdData
	{
		protected $_data = array();

		public function  __set($name,  $value)
		{
			$this->_data[$name] = $value;
		}
		
		public function __get($name){
			if (array_key_exists($name, $this->_data)) 
			{
				return $this->_data[$name];
			}
			else return null;        
		}
		public function obj_empty(){
			return empty($this->_data);
		}
		public function __isset($name){
			return isset($this->_data[$name]);
		}
		public function __unset($name){
			unset($this->_data[$name]);
		}
		public function to_string(){
			return 'BaseObject';
		}
		public function set_value($name, $value){
			$this->_data[$name] = $value;
		}
		public function get_value($name){        
			return $this->_data[$name];
		}
		public function get_data(){
			return $this->_data;
		}
		public function set_data(&$data){
			$this->_data = $data;
		}
		public function serialize_obj($type = 'json'){
			switch($type){
				case 'json':
					return $this->_serialize_json();
				case 'common':
					return $this->_serialize_common();
				default:
					return $this->_serialize_json();
			}
		}
		protected function _serialize_json(){
			return json_encode($this->_data);
		}
		protected function _serialize_common(){
			return serialize($this->_data);
		}
	}