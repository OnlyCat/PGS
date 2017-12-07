<?php
  
  class DbParser
  {
      public static function select($_sqlId, $_sqlData, $_sqlSeat)
      {
          $ret=SqlParser::select($_sqlId, $_sqlData, $_sqlSeat);
           return $ret;
      }
      public static function update($_sqlId, $_sqlData, $_sqlSeat)
      {
          $ret=SqlParser::update($_sqlId, $_sqlData, $_sqlSeat);
          return $ret;
      }
      public static function delete($_sqlId, $_sqlData, $_sqlSeat)
      {
          $ret=SqlParser::delete($_sqlId, $_sqlData, $_sqlSeat);
          return $ret;
      }
      public static function insert($_sqlId, $_sqlData, $_sqlSeat)
      {
           $ret=SqlParser::insert($_sqlId, $_sqlData, $_sqlSeat);
           return $ret;
      }
  }
  
