<?php
	class converParser
	{
		public static function xml_to_array($_xmldata)
		{
			$xml_parser=xml_parser_create('UTF-8');
			xml_parser_set_option($xml_parser , XML_OPTION_CASE_FOLDING , 0);
			xml_parser_set_option($xml_parser , XML_OPTION_SKIP_WHITE , 1 );
			
			$result=array();
			$ret = xml_parse_into_struct($xml_parser , $file_content , $result);
			$error_code = xml_get_error_code($xml_parser);
			xml_parser_free($xml_parser);
			if($ret == 0) return false;
			return  $result;
		}



		public static function json_to_array($_jsondata)
		{
			$result = json_decode($_jsondata , true);
			return $result;
		}
	}
