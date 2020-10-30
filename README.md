# SaeKV
imitate sina cloud SaeKV class

### Travis CI

[![Travis-ci](https://api.travis-ci.com/yakeing/php_saekv.svg?branch=master)](https://travis-ci.com/yakeing/php_saekv)

### codecov

[![codecov](https://codecov.io/gh/yakeing/php_saekv/branch/master/graph/badge.svg)](https://codecov.io/gh/yakeing/php_saekv)

### Github badge

[![Downloads](https://img.shields.io/github/downloads/yakeing/php_saekv/total?color=dfb317&logo=github)](../../)
[![Size](https://img.shields.io/github/size/yakeing/php_saekv/src/SaeKV.php?color=b36d41&logo=github)](src/SaeKV.php)
[![tag](https://img.shields.io/github/v/tag/yakeing/php_saekv?color=28a745&logo=github)](../../releases)
[![license](https://img.shields.io/github/license/yakeing/php_saekv?color=FE7D37&logo=github)](LICENSE)
[![languages](https://img.shields.io/badge/languages-php-007EC6?logo=github)](../../search?l=php)

### Installation

Use [Composer](https://getcomposer.org) to install the library.
Of course, You can go to [Packagist](https://packagist.org/packages/yakeing/php_saekv) to view.

```
    $ composer require yakeing/php_saekv
```

### KV init

```php
    $kv = new SaeKV(3000);
    $ret = $kv->init("accesskey");
```

### KV set data

```php
      $kv->set('kev','value');
```

### KV add data

```php
    $kv->add('kev','value');
```

### KV get data

```php
    $kv->get('kev');
```

## KV delete data

```php
    $kv->delete('kev');
```

### replace data

```php
    $ret = $kv->replace('abc', 'cccccc');
```

### Get multiple groups of data

```php
    $keys = array();
    array_push($keys, 'abc1');
    array_push($keys, 'abc2');
    array_push($keys, 'abc3');
    $ret = $kv->mget($keys);
```

### Get prefix range data

```php
    $ret = $kv->pkrget('abc', 3);
```

### Get all data

```php
    $ret = $kv->pkrget('');
```

Invalid

  ~~$ret = $kv->pkrget('', 100);~~
  
  ~~while(true){~~
  
  ~~var_dump($ret);~~
  
  ~~end($ret);~~
  
  ~~$start_key = key($ret);~~
  
  ~~$i = count($ret);~~
  
  ~~if ($i < 100) break;~~
  
~~$ret = $kv->pkrget('', 100, $start_key);~~

~~}~~


### get options list

```php
    $opts = $kv->get_options();
```

### set options

```php
    $opts = array('encodekey' => 0);
    $ret = $kv->set_options($opts);
```

### Local file

```
    kvdb.txt (json)
    {
        kev1:value1,
        kev2:[
            kev2:value2,
            kev3:value3
        ],.....
    }
```

Original document
---

Documents: [SaeKV-code](http://apidoc.sinaapp.com/class-SaeKV.html)

[Sponsor](https://github.com/yakeing/Documentation/blob/master/Sponsor/README.md)
---
If you've got value from any of the content which I have created, then I would very much appreciate your support by payment donate.

[![Sponsor](https://img.shields.io/badge/-Sponsor-EA4AAA?logo=google%20fit&logoColor=FFFFFF)](https://github.com/yakeing/Documentation/blob/master/Sponsor/README.md)

Author
---

weibo: [yakeing](https://weibo.com/yakeing)

twitter: [yakeing](https://twitter.com/yakeing)
