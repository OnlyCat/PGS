<?php
    require_once(BASEPATH ."trunk/extend/Smarty/Smarty.class.php");
    class template extends Smarty
    {
      private static $__default_instance;
      public static function getDefaultInstance() {
          if (!isset(self::$__default_instance)) {
              self::$__default_instance = new template();
          }
          return self::$__default_instance;
      }
       public function __construct() 
       {
            parent::__construct();
            $this->template_dir = APPHOME . '/view';
            $this->compile_dir = APPHOME . '/runtime/compile';
            $this->cache_dir = APPHOME . '/runtime/cache';
            $this->left_delimiter = '{-';
            $this->right_delimiter = '-}';
            
       }
    }