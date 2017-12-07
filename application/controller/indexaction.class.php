<?php
  class IndexAction extends ActionParser
  {
      public function index()
      {
           // $this->redirect('Login/mdzz');
           // $this->set404();
           
            $obj = new StdData();
            $obj->id=2;
          //  $obj->name="eeee";
            
           // $ret=TK_DbParser::insert('insert_user_info', $obj, 'slave');
         //   $ret=TK_DbParser::update('update_user', $obj, 'slave');
         //   $ret=TK_DbParser::delete('delete_user', $obj, 'slave');
//            $ret=DbParser::select('get_user_info', $obj, 'slave');
          $this->display();
      }
  }
