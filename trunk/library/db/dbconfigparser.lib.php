<?php
	require_once('db.conf.php'); 
	class DbConfigParser
	{
		private $db_type;
		private $db_hostname;
		private $db_name;
		private $db_user;
		private $db_password;
		private $db_charset;

		private static $db_config=[];
		
		
		/**
		*	取得数据库配置
		*/
		public static function GetDbConfig($_key='default' , $_type='')
		{
			$ConfigGroup=self::$db_config[$_key];
			if(empty($ConfigGroup))
			{
				return null;
			}
			if($_type != '')
			{
				while(count($ConfigGroup)>0)
				{
					$ConfigIndex=array_rand($ConfigGroup, 1);
					if($ConfigGroup[$ConfigIndex]->db_type == $_type)
					{
						break;
					}
					unset($ConfigGroup[$ConfigIndex]);
				}
				if(count($ConfigGroup)==0)
				{
					return false;
				}	
				return $ConfigGroup[$ConfigIndex];
			}
			return $ConfigGroup[rand(0,count($ConfigGroup)-1)];
		}
		
		/*
		*	设置数据库配置，用于数据库配置文件
		*/
		public static function SetDbConfig($_key='default', $_config='' )
		{
				if(isset($_config) && !empty($_key))
				{
					if(!isset(self::$db_config[$_key]))
					{	
						self::$db_config[$_key]=[];
					}
					self::$db_config[$_key][]=$_config;
					return true;
				}
				return false;
		}

		public function __construct($_dbtype, $_dbhostname, $_dbname, $_dbuser, $_dbpassword, $_dbcharset = 'utf-8')	
		{
				$this->db_type=$_dbtype;
				$this->db_hostname=$_dbhostname;
				$this->db_name=$_dbname;
				$this->db_user=$_dbuser;
				$this->db_password=$_dbpassword;
				$this->db_charset=$_dbcharset;
		}	
		
		public function __get($_key)
		{
			return $this->$_key;
		}

	}
