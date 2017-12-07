<?php

    function autoLoader($_classname)
    {
        //设定查找路径
        set_include_path(dirname(__FILE__) . "/library" . PATH_SEPARATOR . 
            dirname(__FILE__) . "/library/db" . PATH_SEPARATOR .
            dirname(__FILE__) . "/config" . PATH_SEPARATOR .
            dirname(__FILE__) . "/include" . PATH_SEPARATOR . 
             APPHOME .'/controller' . PATH_SEPARATOR .
            get_include_path());	
                 
            //自动记载类的扩展名
            spl_autoload_extensions('.class.php,.lib.php,.inc.php,.conf.php');
            //设定系统自动查找类文件
            spl_autoload($_classname);
       }
        //加载自己的autoload方法
        spl_autoload_register('autoLoader');
    
        $t=new IndexAction();
        $t->index();
        
