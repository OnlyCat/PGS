<?php
/**
 * @author Waden
 * @filesource src/lib/ET_ObjectList.php
 *
 * @copyright Easytech Ltd Co.
 *
 * @abstract 对象的基类
 * @version 1.0.0.0
 * 2010-04-11 星期一 15:02:00
 */
require_once 'stddata.lib.php';
class StdList{
    protected $_list = array();
    protected $_count = 0;
    protected $_index = 0;
    public function add(&$value){
        $this->_list[$this->_count] = $value;
        $this->_count ++;
    }
    public function set_header(){
        $this->_index = 0;
    }
    public function to_string(){
        return 'ObjectList';
    }
    public function count(){
        return $this->_count;
    }
    public function get($index){
        if($index >= $this->_count) return false;
        return $this->_list[$index];
    }
    public function next(){
        return $this->_list[$this->_index ++];
    }
    public function is_end(){
        return $this->_index == $this->_count;
    }
    public function set_data(&$data){
        $this->_count = count($data);
        for($i = 0; $i < $this->_count; $i ++){
            $obj = new ET_Object();
            $obj->set_data($data[$i]);
            array_push($this->_list, $obj);
        }
        $this->_index = 0;
    }
    public function get_data(){
        return $this->_list;
    }
    public function convert_to_array_data(){
        $ret = array();
        $this->_index = 0;
        while(!$this->is_end()){
            $item = $this->next();            
            array_push($ret, $item->get_data());
        }
        return $ret;
    }

}

