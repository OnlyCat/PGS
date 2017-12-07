<?php
	class FileParser
	{
	/*
		public static function get_file_content($_file_path)
		{
			if(!$fp=fopen($_file_path , 'rb'))
			{
				throw new Exception("fail to open $file_path");
			}
			$file_content=fread($fp, filesize($_file_path));
			fclose($fp);
			return $file_content;
		}
		*/
		
		//ȡ���ļ�����
		public static function get_file_content($_file_path)
		{
         $file = new SplFileInfo($_file_path);
         $obj = $file->openFile('r');
         $file_content = $obj->fread($file->getSize());
         $obj =null;
         $file =null;
         return $file_content;
		}
		
		//ȡ���ļ���С
		public static function get_file_size($_file_path)
		{
         $file = new SplFileInfo($_file_path);
         $file_size = $file->getSize();
         $file =null;
         return $file_size;
		}
		
		//ȡ���ļ�����ʱ��
		public static function get_file_ctime($_file_path ,$_is_standard)
		{
         $file = new SplFileInfo($_file_path);
         $file_ctime = $file->getCtime();
         $file =null;
         return !$_is_standard?date('Y-m-d G:i:s', $file_ctime):$file_ctime;
		}
		
		//ȡ���ļ��޸�ʱ��
		public static function get_file_mtime($_file_path ,$_is_standard)
		{
         $file = new SplFileInfo($_file_path);
         $file_mtime = $file->getMtime();
         $file =null;
         return !$_is_standard?date('Y-m-d G:i:s', $file_mtime):$file_mtime;
		}
		
		//ȡ���ļ�����ʱ��
		public static function get_file_atime($_file_path ,$_is_standard)
		{
         $file = new SplFileInfo($_file_path);
         $file_atime = $file->getAtime();
         $file =null;
         return !$_is_standard?date('Y-m-d G:i:s', $file_atime):$file_atime;
		}
	}
