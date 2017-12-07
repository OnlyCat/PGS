<?php
    function smarty_function_baseurl($_params)
    {
        if(!isset($_params['url']))
        {
           throw new Exception('url parameter not defined');
        }
        //抓取PATH_INFO
        $protocol=strpos(strtolower($_SERVER['SERVER_PROTOCOL']),'https') !== false ? 'https://' : 'http://';
        $script=substr($_SERVER['SCRIPT_NAME'], 0, strrpos( $_SERVER['SCRIPT_NAME'],$_SERVER['PATH_INFO']));
        $script=$script==''?$_SERVER['SCRIPT_NAME']:$script;
        
        //组合返回路径
        echo $protocol . $_SERVER['HTTP_HOST'] . $script  . '/' . $_params['url'];
    }