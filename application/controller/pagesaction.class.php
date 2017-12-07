<?php
  class PagesAction extends ActionParser
  {
      public function create()
      {
          $this->display();
      }

      
      public function accept()
      {
        $upload = new UploadParser();
        $path = APPHOME . "/" ."public/uploads/";
        $upload->path = $path; 
        $upload->maxsize=400000;
        $upload->allowtype = array('jpg','gif','png');
        if($upload->upload("bgimg"))
        {
            $arr = array('name' => $upload->originname , 'size' => $upload->filesize , 'path'=>$upload->newname);
            echo json_encode($arr);
        }
        else
        {
              echo ($upload->errormsg);
        }
      
        //获取上传失败以后的错误提示
      }

      //预览窗口
      public  function preview()
      {
          $this->display();
      }
  }

