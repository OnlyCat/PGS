<?php
	require_once('web.conf.php');
	require_once('db.conf.php');
	require_once('fileparser.lib.php');
	require_once('converparser.lib.php');
	              
	class SqlmapParser
	{
		/**
		*	取得select操作所定义的sql语句
		*/
		public static function get_select_map($select_map_path="")
		{
			$select_map_data = self::get_map_data($select_map_path , 'select');
			return $select_map_data;
		}
		
		/**
		*	取得update操作所定义的sql语句
		*/
		public static function get_update_map($update_map_path="")
		{
			$update_map_data = self::get_map_data($update_map_path , 'update');
			return $update_map_data;
		}
		
		/**
		*	取得insert操作所定义的sql语句
		*/
		public static function get_insert_map($install_map_path="")
		{
			$install_map_data = self::get_map_data($install_map_path , 'insert');
			return $install_map_data;
		}
		
		/**
		*	取得delete操作所定义的sql语句
		*/
		public static function get_delete_map($delete_map_path="")
		{
			$delete_map_data = self::get_map_data($delete_map_path , 'delete');
			return $delete_map_data;
		}
	
		/**
		*	取得map文件的位置，从配置文件中读取
		*/
		private static function get_map_path()
		{
			$sqlmap_dirpath=WebConfig::$sqlmap_dirpath;
			if(!is_dir($sqlmap_dirpath))
			{
				throw new Exception("$sqlmap_dirpath is not exists");
			}
			return $sqlmap_dirpath;
		}		

		/**
		*	取得map文件的路径
		*/
		protected static function get_map_data($_sqlmap , $_type)
		{	
			$map_path=self::get_map_path();
			$map_file='';	
			if(empty($_sqlmap))
			{
				switch(strtolower($_type))
				{
					case 'select':
						$map_file=$map_path  .'/' . 'select_map.json';						
						break;
					case 'update':
						$map_file=$map_path  .'/' . 'update_map.json';		
						break;
					case 'insert':
						$map_file=$map_path  .'/' . 'insert_map.json';						
						break;
					case 'delete':
						$map_file=$map_path  .'/' . 'delete_map.json';
						break;
				}
			}
			else
			{
				$map_file=$map_path . '/' . $_sqlmap .".json";
			}
			if(!file_exists($map_file))
			{
				throw new Exception("$map_file  is not exist");
			}
			$map_data = FileParser::get_file_content($map_file);	
			$res_data = ConverParser::json_to_array($map_data);
			return $res_data;
		}	
	
	}
