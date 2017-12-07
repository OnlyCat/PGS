<?php
	require("web.conf.php");
	defined('PUBLICHOME') ? '' : define('PUBLICHOME', "/".  APPNAME . "/public");
    class ActionParser
    {
           private  static $template=null;
           function __construct()
           {
                if(!self::$template)
                {
                    self::$template= template::getDefaultInstance();
					self::$template->assign('PUBLIC', "/" . APPNAME . "/public/");
                }
                $uri=substr($_SERVER['PATH_INFO'], 1);
                if($uri != '')
                {
                    $curobj=debug_backtrace();
                    if($curobj[1]['function'] != 'redirect')
                    {
                        $this->redirect($uri);
                    }
                }
           }
           
           //设置模板标签
           function assign($_key, $_value)
           {
				self::$template->assign($_key, $_value);
		   }
            
            //显示模板
            function display($_template ='')
            {
                if(!$_template)
                {
                    $trace=debug_backtrace();
                    $obj_name=substr($trace[1]['class'], 0, strrpos($trace[1]['class'],'Action'));
                    $fun_name=$trace[1]['function'];
                    $_template=$obj_name . DIRECTORY_SEPARATOR .$fun_name . "." .WebConfig:: $template_extension ;
                }
                try
                {
                    self::$template->display($_template) ;
                }catch(Exception $e)
                {
                    echo $e->getMessage();
                    echo "模板未找�";
                }
            }
            
            //返回404
            function set404()
            {
                @header("http/1.1 404 Not Found");
                @header("status: 404 Not Found");
                exit(1);
            }
            
            
            //跳转
            function redirect($_url,$_data=null, $_isdomain=false)
            {
                $urlArr = explode('/', $_url);
                $object = $urlArr[0] ."Action";
                $function = $urlArr[1];
                if(class_exists($object) && method_exists($object, $function))
                {
                    $url_obj = new  $object();
                    $url_obj->$function();
                }
                else
                {
                    echo "路由错误了呢!";
                }
                exit(1);
            }
    }
