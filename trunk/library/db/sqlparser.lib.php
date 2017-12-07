<?php

	require_once 'sqlmapparser.lib.php';
	require_once('dbbaseparser.lib.php');

	class SqlParser
	{
		private static $_select_sql_map;
		private static $_update_sql_map;
    	private static $_delete_sql_map;
    	private static $_insert_sql_map;
		
		private static $_injection_text_list = array('#', '--', '/*', 'select ','update ', 'delete ', 'insert ',	'where ', 'union ', 'into ','from ');
	

		/**
		*	Sql处理交换类	
		*	@param	$_sqlid		sql模版的key
		*	@param	$_param		参数列表
		*	@param	$_config	链接配置
		*	@param	$_proc_type	操作类型
		*	@param	$_sqlmap	指定sqlmap文件
		*/
		public static function select($_sqlid, $_param = null, $_config='default', $_sqlmap = null)
		{                                                                               
			$ret=self::sqlSwitch($_sqlid, $_param, $_config, 'select', $_sqlmap);
			return $ret;
		}                                                                               
		public static function update($_sqlid, $_param = null, $_config='default', $_sqlmap = null)
		{                                                                               
			$ret=self::sqlSwitch($_sqlid, $_param, $_config, 'update', $_sqlmap);
			return $ret;
		}                                                                               
		public static function insert($_sqlid, $_param = null, $_config='default', $_sqlmap = null)
		{                                                                               
			$ret=self::sqlSwitch($_sqlid, $_param, $_config, 'insert', $_sqlmap);
			return $ret;
		}                                                                               
		public static function delete($_sqlid, $_param = null, $_config='default', $_sqlmap = null)
		{
			$ret=self::sqlSwitch($_sqlid, $_param, $_config, 'delete', $_sqlmap);
			return $ret;
		}
		
		/**
		*	获取sql模版文件
		*	@param	$type sql	模版类型
		*	@param	$sql_map	模版文件名	
		*/
		protected static function getSqlmap($_type, $_sql_map)
		{
			if(empty($_sql_map) || is_string($_sql_map) || is_string($_sql_map))
			{
				switch(strtolower($_type))
				{
					case 'select':
						if(empty(self::$_select_sql_map[$_sql_map]))
						{
							self::$_select_sql_map[$_sql_map] = SqlmapParser::get_select_map($_sql_map);
						}
						return self::$_select_sql_map[$_sql_map];
					case 'update':
						if(empty(self::$_update_sql_map[$_sql_map]))
						{
							self::$_update_sql_map[$_sql_map] = SqlmapParser::get_update_map($_sql_map);
						}
						return self::$_update_sql_map[$_sql_map];
					case 'delete':
						if(empty(self::$_delete_sql_map[$_sql_map]))
						{
							self::$_delete_sql_map[$_sql_map] = ET_SqlmapParser::get_delete_map($_sql_map);
						}
						return self::$_delete_sql_map[$_sql_map];
					case 'insert':
						if(empty(self::$_insert_sql_map[$_sql_map]))
						{
							self::$_insert_sql_map[$_sql_map] = SqlmapParser::get_insert_map($_sql_map);
						}
						return self::$_insert_sql_map[$_sql_map];
					default:
						return null;
				}
			}
			else
			{
				return $_sql_map;
			}
		}
		
		/**
		*	获取数据库对象	
		*	@param	$_config	配置名称	
		*/
		private static function getDbObj($_config)
		{
			return new DbBaseParser($_config);
		}
		
		/**
		*	Sql处理交换类	
		*	@param	$_sqlid		sql模版的key
		*	@param	$_param		参数列表
		*	@param	$_config	链接配置
		*	@param	$_proc_type	操作类型
		*	@param	$_sqlmap	指定sqlmap文件
		*/
		protected static function sqlSwitch($_sqlid, $_param, $_config, $_proc_type, $_sqlmap=null)
		{
			
			$sql_map_data=self::getSqlmap($_proc_type, $_sqlmap);
			$sql_map_data=$sql_map_data[$_sqlid];
			$DbObj=self::getDbObj($_config);
			
			if(empty($sql_map_data))
			{
				throw new Exception($_sqlid . ' has no data');
			}
			self::sqlmapProc($sql_map_data, $_param, $paramvalue);
			
			switch($_proc_type)
			{
				case 'select':
					$sql = self::replaceSelectAsterisk($sql_map_data['sql'], $sql_map_data['fieldmaps']);
					$ret_value = $DbObj->queryModels($sql, $sql_map_data['fieldmaps'], $sql_map_data['paramtype'], $paramvalue);
					break;
				case 'insert':
					$ret_value = $DbObj->queryReturnId($sql_map_data['sql'], $sql_map_data['paramtype'], $paramvalue);
					break;
				case 'update':
					$ret_value = $DbObj->queryNoSet($sql_map_data['sql'], $sql_map_data['paramtype'], $paramvalue);
					break;
				case 'delete':
					$ret_value = $DbObj->queryNoSet($sql_map_data['sql'], $sql_map_data['paramtype'], $paramvalue);
					break;
			}
			return $ret_value ;
		}
		
		/*
		*	对sql进行修正，修正成为标准预处理sql
		*/
		private static function sqlmapProc(&$_mapdata, $_param, &$_paramvalue)
		{
			switch($_mapdata['maptype'])
			{
				case 1:
					return self::maptype_1($_mapdata, $_param, $_paramvalue);
					break;
				default:
					return self::maptype_0($_mapdata, $_param, $_paramvalue);
					break;
			}
		}
		
		
		
		
		private static function maptype_0(&$_mapdata,$_param, &$_paramvalue)
		{        
			if(!empty($_param))
			{
				$_paramvalue = self::convertMap($_param, $_mapdata['parammaps']);
			}
			else
			{
				$_paramvalue = $_param;
			}
		}
		
		
		/*
		*	
		*/
		private static function maptype_1(&$_mapdata, $_param, &$_paramvalue)
		{
			self::convertSql($_mapdata);
			$_mapdata['sql'] = preg_replace('/\([dsi]:\w+\)/', '?', $_mapdata['sql']);
			if(!empty($_param))
			{
				self::replaceParamValue($_mapdata,$_param);
				$_paramvalue = self::convertMap($_param, $_mapdata['parammaps']);   
			}
			else
			{
				  $_paramvalue = $_param;
			}
		}
		
		/**
		*	将sql语句中的参数剥离！
		*/
		private static function convertSql(&$_mapdata)
		{
            $_mapdata['parammaps'] = "";
			$_mapdata['paramtype'] = "";
			$sql = $_mapdata['sql'];        
			preg_match_all('/([dsi]):(\w+)/', $sql, $match,PREG_SET_ORDER);
			if(empty($match)) return false;
			$param_type = '';
			$param_maps = array();
			for($i = 0; $i < count($match); $i ++){
				$param_type .= $match[$i][1];
				$param_maps[$match[$i][2]] = $i;
			}
			$_mapdata['parammaps'] = $param_maps;
			$_mapdata['paramtype'] = $param_type;
			return true;
		}
		
		/*
		*	字符串匹配处理
		*/
		private static function replaceParamValue(&$map_data, &$param)
		{
			preg_match_all('/([alr]):(\w+)/', $map_data['sql'], $match,PREG_SET_ORDER);
			for($i = 0; $i < count($match); $i++){
				$key = $match[$i][2];
				$tag = $match[$i][1];
				switch($tag){
					case 'a':
						if (self::find_sql_injection($param->$key)) {
							// sql条件中可能有sql注入风险
							throw new UnexpectedValueException('sql condition has injection: ' . $param->$key);
						}
						$map_data['sql'] = preg_replace('/\([a]:\w+\)/', $param->$key, $map_data['sql'],1);
						break;
					case 'l':
						$map_data['sql'] = preg_replace('/\([l]:\w+\)/', '\''. $param->$key . '%\'' , $map_data['sql'],1);
						break;
					case 'r':
						$map_data['sql'] = preg_replace('/\([r]:\w+\)/', '\'%' . $param->$key . '\'', $map_data['sql'],1);
						break;
				}
				$param->$key = null;
			}
		}
		
		
		/*
		*	将对象或数组转换为索引数组
		*/
		 protected static function convertMap($param ,$parammaps)
		 {
			$type = gettype($param);
			$ret = array();

			switch($type)
			{
				case 'array':
						if(self::is_assoc($param))
						{
							$ret = self::assoc_to_index($param, $parammaps);
						}
						else
						{
							$ret= $param;
						}
					break;
				case 'object':
					$data = $param->get_data();
					if(self::is_assoc($data))
					{
						$ret = self::assoc_to_index($data, $parammaps);
					}
					break;
			}
			return $ret;
		}
		
		/*
		*	处理非关联数组.1
		*/
		private static function is_assoc($arr)
		{
			return array_keys($arr) !== range(0, count($arr) - 1);
		}
		/*
		*	处理非关联数组.2
		*/
		private static function assoc_to_index($arr, $map)
		{
			$ret = array();
			if (empty($map))
				return null;
			for ($i = 0; $i < count($arr); $i++) {
				$find = false;
				foreach ($map as $key => $value) {
					if ($i === $value) {
						$find = true;
						break;
					}
				}
				if ($find === true && isset($arr[$key])) {
					array_push($ret, $arr[$key]);
				}
			}
			return $ret;
		}
		
		
		/*
		*	处理字段映射
		*/
		private static function replaceSelectAsterisk($_sql, &$_fieldmaps)
		{
			preg_match('/^SELECT\s+\*\s+FROM/is', $_sql, $match);
			
			if(empty($match)) return $_sql;
			$replace_sql = 'SELECT ';
			$i = 0;
			$count = count($_fieldmaps);
			foreach($_fieldmaps as $key => $value){
				$replace_sql .= $key;
				if($i != $count - 1)
					$replace_sql .= ',';
				else
					$replace_sql .= ' FROM';
				$i ++;
			}
			return preg_replace('/^SELECT\s+\*\s+FROM/is', $replace_sql, $_sql);
		}
		
	}
