# SaeKV
imitate sina cloud SaeKV class

### Travis CI

[![Travis-ci](https://api.travis-ci.com/yakeing/php_saekv.svg)](https://travis-ci.com/yakeing/php_saekv)

### codecov

[![codecov](https://codecov.io/gh/yakeing/php_saekv/branch/master/graph/badge.svg)](https://codecov.io/gh/yakeing/php_saekv)

### Github badge

[![Downloads](https://raw.githubusercontent.com/yakeing/Documentation/master/Icon/download-0.1K.png)](../../)
[![Size](https://raw.githubusercontent.com/yakeing/Documentation/master/Icon/size-1KB.png)](src/SaeKV.php)
[![tag](https://raw.githubusercontent.com/yakeing/Documentation/master/Icon/tag-v6.png)](../../releases)
[![license](https://raw.githubusercontent.com/yakeing/Documentation/master/Icon/license-MPL-2.0.png)](LICENSE)
[![languages](https://raw.githubusercontent.com/yakeing/Documentation/master/Icon/languages-php.png)](../../search?l=php)

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

[![Sponsor](https://raw.githubusercontent.com/yakeing/Documentation/master/Icon/Sponsor.png)](https://github.com/yakeing/Documentation/blob/master/Sponsor/README.md)

Author
---

weibo: [yakeing](https://weibo.com/yakeing)

twitter: [yakeing](https://twitter.com/yakeing)
