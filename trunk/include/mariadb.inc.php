<?php
	class MariaDB
	{
		private $_connect;
		private $_is_transaction_begin = False;
		
		public function __destruct()
		{
			$this->closeConnect();
		}
		
		/**
		*	取得上次允许中产生的错误
		*/
		public function getLastError()
		{
			if(isset($this->_connect))
			{
				return $this->_connect->error;
			}
			else
			{
				return mysqli_connect_error();
			}
		}
		
		/**
		*	打开连接
		*/
		public function openConnect($config = null)
		{
			if(!isset($config))
			{
				$config = DbConfig::GetDbConfig('', 'mysql');
			}
			$this->_connect=new mysqli($config->db_hostname, $config->db_user, $config->db_password, $config->db_name);
			if(mysqli_connect_errno())
			{
				unset($this->connect);
				throw Exception(mysql_connect_error());
			}
			$this->_connect->query('SET NAMES ' . $config->db_charset);
			$this->_connect->query("set time_zone='+8:00'") or die('时区设置失败，请联系管理�?');			
		}
		
		/**
		*	判断连接状态
		*/
		public function isOpen()
		{
			return isset($this->_connect);
		}
   
		/**
		*	关闭当前连接
		*/
		
		public /* void */ function closeConnect() 
		{
			if (isset($this->_connect)) {
				if ($this->_is_transaction_begin) {
					$this->commit();
				}
				$this->_connect->close();
				unset($this->_connect);
			}
		}
		
		/*
		*	开始事物
		*/
		public /* bool */ function beginTransaction() 
		{
			if (!isset($this->_connect)) {
				return false;
			}
			if (!$this->_is_transaction_begin) {
				$this->_is_transaction_begin = $this->_connect->autocommit(false);
			}
			return $this->_is_transaction_begin;
		}
		
		/*
		*	事物处理-提交数据
		*/
		public /* void */ function commit() 
		{
			if (!isset($this->_connect)) {
				throw new Exception('connect is not intialized');
			}
			if ($this->_is_transaction_begin) {            
				$result = $this->_connect->commit();
				$this->_is_transaction_begin = false;
				$this->_connect->autocommit(true);            
				if (!$result) {
					throw new Exception('commit failed');
				}
			}
		}
		
		
		/*
		*	事物处理-回滚数据
		*/
		public /* void */ function rollback() 
		{
			if (!isset($this->_connect)) {
				throw new Exception('connect is not intialized');
			}
			if ($this->_is_transaction_begin) {            
				$result = $this->_connect->rollback();
				$this->_is_transaction_begin = false;
				$this->_connect->autocommit(true);            
				if (!$result) {
					throw new Exception('commit failed');
				}
			}
		}
		
		/**
		*	事物处理-判断事物状态
		*/
		public /* bool */ function isTransactionBegin() 
		{
			return $this->_is_transaction_begin;
		}
		
		/*
		*	预处理操作相关
		*/
		public /* int */ function executeNoSet(/* string */ $sql, /* array */ $parameters = null, /* int */ &$insertId = null) 
		{
			if (!isset($this->_connect)) {
				throw new Exception('connect is not intialized');
			}
			$stmt = $this->_connect->prepare($sql);
			if (!$stmt) {
				throw new Exception('prepare stmt failed');
			}
			if (!empty($parameters)) {
				$result = call_user_func_array(array(&$stmt, 'bind_param'), $this->refValues($parameters));
				if (!$result) {
					$stmt->close();
					throw new Exception('bind_param failed');
				}
			}
			$stmt->execute();
			$returnValue = $stmt->affected_rows;
			$insertId = $this->_connect->insert_id;
			$stmt->close();
			return $returnValue;
		}
		
		/**
		*	预处理相关函数
		*/
		public /* bool */ function executeSet(/* string */$sql, /* array */ &$result, 
			/* array */ $parameters = null, /* int */ $resulttype = MYSQLI_ASSOC) {
			if (!isset($this->_connect)) {
				throw new Exception('connect is not intialized');
			}
			if ($resulttype == MYSQLI_ASSOC) {
				$bind = 'bind_assoc';
			} else if ($resulttype == MYSQLI_NUM){
				$bind = 'bind_row';
			} else {
				throw new Exception('$resulttype is not valid');
			}
			
			$stmt = $this->_connect->prepare($sql);
			
			if (!$stmt) {
				return false;
			}
			
			if (!empty($parameters)) {
				$result = call_user_func_array(array(&$stmt, 'bind_param'), $this->refValues($parameters));
				if (!$result) {
					$stmt->close();
					return false;
				}
			}
			
			$result = $stmt->execute();
			if (!$result) {
				$stmt->close();
				return false;
			}        
			$row = null;
			$this->$bind($stmt, $row);
			$result = array();
			for ($i = 0; $stmt->fetch(); ++$i) {
				foreach ($row as $key => $value) {
					$result[$i][$key] = $value;
				}
			}
			$stmt->close();
			return true;
		}

		#-----------------------
		public function escapeString($sqlStatement) 
		{
			return $this->_connect->real_escape_string($sqlStatement);
		}

		private /* bool */ function bind_assoc(/* mysqli_stmt */ &$stmt, /* array */ &$result) {
			$metadate = $stmt->result_metadata();
			$result = array();
			$parameters = array();
			while ($field = $metadate->fetch_field()) {
				$parameters[] = &$result[$field->name];
			}
			$metadate->close();
			return call_user_func_array(array(&$stmt, 'bind_result'), $parameters);        
		}
		private /* bool */ function bind_row(/* mysqli_stmt */ &$stmt, /* array */ &$result) 
		{
			$metadate = $stmt->result_metadata();
			$count = $metadate->field_count;
			$metadate->close();
			
			$result = array();
			$parameters = array();
			for ($i = 0; $i < $count; ++$i) {
				$parameters[] = &$result[$i];
			}        
			return call_user_func_array(array(&$stmt, 'bind_result'), $parameters);
		}
		private function refValues($arr){ 
			if (strnatcmp(phpversion(),'5.3') >= 0) //Reference is required for PHP 5.3+ 
			{ 
				$refs = array(); 
				foreach($arr as $key => $value) 
					$refs[$key] = &$arr[$key]; 
				return $refs; 
			} 
			return $arr; 
		} 
		#------
	}
	
