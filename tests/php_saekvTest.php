<?php
namespace php_saekvTest;

use php_saekv;
use php_saekv\SaeKV;
use PHPUnit\Framework\TestCase;

class php_saekvTest extends TestCase{

  public function testInit(){
    $kv = new SaeKV(3000);
    $kv->kvfile = __DIR__.'\Saekv.txt';
    $ret = $kv->init("accesskey");
    $is_init = $kv->init("accesskey");
    $this->assertTrue($ret);
    $this->assertTrue($is_init);
    return $kv;
  }

  /**
  * @depends testInit
  */
  public function testSet($kv){
    $add = $kv->add('kev','0');
    $is_add = $kv->add('kev','0');
    $set = $kv->set('kev','1');
    $is_set_value = $kv->set('kev2',array());
    $is_set_name  = $kv->set(false, 0);
    $replace = $kv->replace('kev','2');
    $is_replace = $kv->replace('kev2','2');
    $this->assertTrue($add);
    $this->assertFalse($is_add);
    $this->assertTrue($set);
    $this->assertFalse($is_set_value);
    $this->assertTrue($is_set_name);
    $this->assertTrue($replace);
    $this->assertFalse($is_replace);
    return $kv;
  }

  /**
  * @depends testSet
  */
  public function testGet($kv){
    $get = $kv->get('kev');
    $pkrget = $kv->pkrget('k', 101);
    $is_pkrget = $kv->pkrget('v');
    $mget = $kv->mget(array('key', 'v'));
    $is_mget = $kv->mget('v');
    $del = $kv->delete('kev');
    $is_del = $kv->delete('v');
    $this->assertEquals($get, '2');
    $this->assertTrue(is_array($pkrget));
    $this->assertFalse($is_pkrget);
    $this->assertTrue(is_array($mget));
    $this->assertFalse($is_mget);
    $this->assertTrue($del);
    $this->assertFalse($is_del);
    $kv->__destruct();
  }

}
