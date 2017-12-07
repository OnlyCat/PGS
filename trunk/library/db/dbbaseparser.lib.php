<?php

	require_once 'dbconfigparser.lib.php';
	require_once('stdlist.lib.php');	
	require_once 'stddata.lib.php';

	class DbBaseParser
	{
		private $_db;
		private $_db_config;
		private static $_db_pool;
	
	
		public function __construct($_key , $_type='')
		{
			$this->_db_config = DbConfigParser::getDbConfig($_key , $_type);
			$_type=!empty($_type)?$_type:$this->_db_config->db_type;
			if(empty($this->_db_config))
			{
        	    throw new Exception('key:' . $_key ." type:" . $_type  .' is not valid');
        	}
        
			if(empty(self::$_db_pool[$_key][$_type]))
			{
				switch(strtolower($_type))
				{
					case 'mysql':
						require_once "mysql.inc.php";
						self::$_db_pool[$_key][$_type]=new Mysql();
						break;
					case 'mariadb':
						require_once "mariadb.inc.php";
						self::$_db_pool[$_key][$_type]=new MariaDB();
						break;
				}
			}	
			$this->_db=&self::$_db_pool[$_key][$_type];
			$this->openConnect();
		}

		public function  __destruct() 
		{
        	if (isset($this->_db))
			{
            	unset($this->_db);
        	}
   		}
		
		/**
		*	开启数据库连接
		*/
		private function openConnect()
		{
			if(!$this->_db->isOpen())
			{
				$this->_db->openConnect($this->_db_config);
			}
		}
		
		/**
		*	开启事物
		*/
		public  function beginTransaction()
		{
			$this->OpenConnect();
			return $this->_db->beginTransaction();
		}
		
		/**
		* 事物提交
		*/
		public function commit()
		{
			if($this->_db->isTransactionBegin())
			{
				$this->_db->commit();
			}
		}
		
		/**
		* 事物回滚
		*/
		public function rollback()
		{
			if($this->_db->isTransactionBegin())
			{
				$this->_db->rollback();
			}
		}
		
		/**
		*	转义SQL中的字符串
		*/
		public function escapeString($sqlStatement) 
		{
			return $this->_db->escapeString($sqlStatement);
		}
		
		#-----------------
		 public /* int */ function queryReturnId(/* string */ $sql,
			/* string */ $parameterTypes = null,
			/* array */ $parameterValues = null) {
			if (empty($sql)) {
				throw new Exception('sql is empty');
			}
			$parameters = $this->_process_parameters($parameterTypes, $parameterValues);
			$id = null;
			if ($this->_db->executeNoSet($sql, $parameters, $id) <= 0) {
				$id = 0;
			}
			return $id;
		}

		public /* int */ function queryNoSet(/* string */ $sql,
			/* string */ $parameterTypes = null,
			/* array */ $parameterValues = null) {
			if (empty($sql)) {
				throw new Exception('sql is empty');
			}

			$parameters = $this->_process_parameters($parameterTypes, $parameterValues);
			$returnValue = $this->_db->executeNoSet($sql, $parameters);
			return $returnValue;
		}
		protected /* array */ function querySet(/* string */ $sql,
			/* string */ $parameterTypes = null,
			/* array */ $parameterValues = null,
			/* int */ $resulttype = MYSQLI_ASSOC) {
			if (empty($sql)) {
				throw new Exception('sql is empty');
			}
			$parameters = $this->_process_parameters($parameterTypes, $parameterValues);
			$returnValue = null;
			if (!$this->_db->executeSet($sql, $returnValue, $parameters, $resulttype)) {
				$returnValue = null;
			}
			return $returnValue;
		}
		private function _process_parameters($parameterTypes, $parameterValues) {
			if (empty($parameterTypes)) {
				$returnValue = null;
			} else {
				if (is_string($parameterTypes) && is_array($parameterValues)
					&& !empty($parameterTypes) && !empty($parameterValues)) {
					array_unshift($parameterValues, $parameterTypes);
					$returnValue = &$parameterValues;
				} else {
					throw new Exception('parameter is not valid');
				}
			}
			return $returnValue;
		}
		/*
		 * 查询获取数据模型
		 *
		 * @param string $sql SQL查询语句
		 * @param string/array $model 数据模型的类名或者数据模型schema
		 * @param string $parameterTypes 查询参数类型串
		 * @param array $parameterValues 查询参数数组
		 *
		 * @return array 查询结果数据模型，结构符合$model所定义
		 */
		public function queryModels($sql,$model, $parameterTypes = null,$parameterValues = null){

			if (empty($sql)) {
				throw new Exception('sql is empty');
			}
			if (empty($model)) {
				throw new Exception('$model is empty');
			}
			$result = $this->querySet($sql,
				$parameterTypes,
				$parameterValues,
				MYSQLI_ASSOC);

			if ($result === null) {
				return null;
			}

			$return_obj_list = new StdList();
			foreach ($result as &$rec_item) {
				$obj = new StdData();
				foreach ($model as $key => $value) {
					$obj->set_value($value, $rec_item[$key]);
				}
				$return_obj_list->add($obj);
			}
			return $return_obj_list;
		}
		#--------------------
	}
