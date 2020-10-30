<?php
/*
 * imitate sina cloud SaeKV class
 * Author weibo.com/yakeing
 * version 6.1
 * Using json and not by string to store data
 * $kvfile absolute path dirname(__FILE__)
*/
namespace php_saekv;
class SaeKV{
    public $kvfile = '.\Saekv.txt';
    public $variable = array();
    public function __construct($timeout=3000){}
    public function errno(){}
    public function errmsg(){}
    public function get_options(){return array();}
    public function set_options($arr){return true;}

    // init SaeKV
    public function init($accesskey=''){
        if(is_file($this->kvfile)){
            $this->variable = json_decode(file_get_contents($this->kvfile), true);
            return is_array($this->variable);
        }else{
            return (false == is_bool(file_put_contents($this->kvfile, '[]')));
        }
    }

    // replace key-value
    public function replace($name, $value){
        if(!isset($this->variable[$name])){
            return false;
        }
        return $this->set($name, $value);
    }

    // add key-value
    public function add($name, $value){
        if(isset($this->variable[$name])){
            return false;
        }
        return $this->set($name, $value);
    }

    // update key-value
    public function set($name, $value){
        if(!is_scalar($value)) return false;
        if($name === false){
            $this->variable[] =$value;
        }else{
            $this->variable[$name] =$value;
        }
        return true;
    }

    // get key-value
    public function get($k){
        return empty($this->variable[$k]) ? false : $this->variable[$k];
    }

    // Prefix range search key-values
    public function pkrget($k, $max=100){
        //if($k === '') $this->variable; //Nonexistent
        if($max<100) $max=100;
        $arr = array();
        $i=0;
        foreach($this->variable as $key => $value){
            if(preg_match('/^'.$k.'/', $key)){
                $arr[$key] = $value;
                ++$i;
            }
            if($max <= $i) break;
        }
        return empty($arr) ? false : $arr;
    }

    // get all key-values
    public function mget($arr){
        if(!is_array($arr)){
            return false;
        }
        $ret = array();
        foreach($arr as $k){
            $ret[$k] = isset($this->variable[$k]) ? $this->variable[$k] : false;
        }
        return $ret;
    }
    // delete key-value
    public function delete($k){
        if(array_key_exists($k, $this->variable)){
            unset($this->variable[$k]);
            return true;
        }else{
            return false;
        }
    }

    // destruct
    public function __destruct(){
        $varr = array_merge($this->variable);
        if(0 == count($varr)){
            $varr = array();
        }
        file_put_contents($this->kvfile,  json_encode($varr));
    }
}
