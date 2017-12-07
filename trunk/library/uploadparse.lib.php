<?php
    class UploadParse
    {

        private $path;  //保存路径
        private $allowtype; //接收类型
        private $maxsize='10000'; //最大允许上传大小(字节)
        private $israndname=true; //设置是否随机重命名文件， false不随机
        private $originname;  //源文件名
        private $tmpname;   //临时文件名
        private $newname;   //新文件名
        private $filetype;  //文件类型
        private $filesize;  //文件大小
        private $errornum;  //错误号
        private $errormsg;  //错误新消息

        public function __set($_key, $_value)
        {
            if ($_key == 'path' || $_key == 'allowtype' || $_key == 'maxsize') {
                $this->$_key = $_value;
            }
            die("属性只读");
        }

        public function __get($_key)
        {
            return $this->$_key;
        }

        public function upload($_field)
        {
            $return = true;
            if(!$this->checkfilepath())
            {
                $this->errormsg = $this->geterror();
                return false;
            }
            $name = $_FILES[$_field]['name'];
            $tmpname = $_FILES[$_field]['tmp_name'];
            $size = $_FILES[$_field]['size'];
            $error = $_FILES[$_field]['error'];

            //多文件上传$file['name']为一个数组
            if(is_array($name))
            {
                $errors = array();
                for($i=0; $i < count($name); $i++) {
                    if ($this->setfiles($name[$i], $tmpname[$i], $size[$i], $error[$i])) {
                        if (!$this->checkfilesize() || !$this->checkfiletype()) {
                            $errors[] = $this->geterror();
                            $return = false;
                        }
                    } else {
                        $errors[] = $this->geterror();
                        $return = false;
                    }

                    //若出现问题重新初始化
                    if (!$return) {
                        $this->setfiles();
                    }
                }
                if($return)
                {
                    //存放所有上传后文件名的变量数组
                    $filenames = array();

                    //若上传的多个文件都是合法的，则通过循环向服务器上传文件
                    for($i = 0; $i < count($name); $i++)
                    {
                        if($this->setfiles($name[i], $tmpname[$i], $size[$i], $error[$i]))
                        {
                            $this->setnewname();
                            if(!$this->movefile())
                            {
                                $errors[] = $this->geterror();
                                $return = false;
                            }
                            $filenames[] = $this->newname;
                        }
                    }
                    $this->newname = $filenames;
                }
                $this->errormsg = $errors;
                return $return;
            }
            else //上传单个文件
            {
                if ($this->setfiles($name, $tmpname, $size, $error)) {
                    if ($this->checkfilesize() && $this->checkfiletype()) {
                        $this->setnewname();
                        if ($this->movefile()) {
                            return true;
                        } else {
                            $return = false;
                        }
                    } else {
                        $return = false;
                    }
                } else {
                    $return = false;
                }
                //如果$return为false, 则出错，将错误信息保存在属性errorMess中
                if (!$return) {
                    $this->errorMess = $this->getError();
                }
                return $return;
            }
        }

        //设置新文件名
        private function setnewname()
        {
            $this->newname = $this->originname;
            if($this->israndname)
            {
                $this->newname = $this->getreadname();
            }
        }

        //设置字段值
        private function setfiles($_name = "", $_tmpname = "", $_size = 0, $_error=0)
        {
            $this->errornum = $_error;
            if($_error)
            {
                return false;
            }
            $this->originname = $_name;
            $this->tmpname = $_tmpname;
            $aryStr = explode(".", $_name);
            $this->filetype = strtolower($aryStr[count($aryStr)-1]);
            $this->filesize = $_size;
        }
        //获取错误信息
        private function geterror()
        {
            $msgstr = "";
            switch ($this->errornum)
            {
                case 100:
                    $msgstr = "文件上传路径不存在,请检查上上传路径是否存在！";
                    break;
                case 101:
                    $msgstr = "建立存放上传文件目录失败，请重新指定上传目录！";
                    break;
                case 102:
                    $msgstr = "上传文件超过最大上传限制";
                    break;
                case 103:
                    $msgstr = "未允许类型";
                    break;
            }
            return $msgstr;
        }

        //检查是否有存文房间上传的目录
        private  function checkfilepath()
        {
            if(empety($this->path))
            {
                $this->errornum = 100;
                return false;
            }
            if(!file_exists($this->path) || !is_writable($this->path))
            {
                if(!@mkdir($this->path,0755))
                {
                    $this->errornum = 101;
                }
                return false;
            }
            return true;
        }

        //检查上传的文件是否超过允许的大小
        private function checkfilesize()
        {
            if($this->filesize > $this->maxsize)
            {
                $this->errornum = 102;
                return false;
            }
            return true;
        }

        //检查上传的文件是否是合法的类型
        private function checkfiletype()
        {
                if(!in_array(strtolower($this->filetype), $this->allowtype))
                {
                    $this->errornum = 103;
                    return false;
                }
                return true;
        }

        //设置随机文件名
        private function getreadname()
        {
            $filename = date('YmdHis') . "_" . rand(100,999);
            return $filename . "." . $this->filetype;
        }

        //复制文件到指定的位置
        private function movefile()
        {
            if(!$this->errornum)
            {
                $path = rtrim($this->path, '/') . '/';
                $path .= $this->newname;
                if(!@move_uploaded_file($this->tmpname, $path))
                {
                    $this->errornum = 104;
                    return false;
                }

            }
            else
            {
                return false;
            }
            return true;
        }

    }