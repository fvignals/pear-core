--TEST--
PEAR_Channelfile->addFunction() (basic)
--SKIPIF--
<?php
if (!getenv('PHP_PEAR_RUNTESTS')) {
    echo 'skip';
}
?>
--FILE--
<?php

require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'setup.php.inc';
$chf->fromXmlString($first = '<?xml version="1.0" encoding="ISO-8859-1" ?>
<channel version="1.0" xmlns="http://pear.php.net/channel-1.0"
  xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
  xsi:schemaLocation="http://pear.php.net/dtd/channel-1.0.xsd">
 <name>pear.php.net</name>
 <suggestedalias>pear</suggestedalias>
 <summary>PHP Extension and Application Repository</summary>
 <validatepackage version="1.0">PEAR_Validate</validatepackage>
 <servers>
  <primary>
   <xmlrpc>
    <function version="1.0">logintest</function>
    <function version="1.0">package.listLatestReleases</function>
    <function version="1.0">package.listAll</function>
    <function version="1.0">package.info</function>
    <function version="1.0">package.getDownloadURL</function>
    <function version="1.0">channel.listAll</function>
    <function version="1.0">channel.update</function>
   </xmlrpc>
  </primary>
 </servers>
</channel>');

$res = $chf->validate();
$phpt->assertTrue($res, 'basic validation failed');
$phpt->assertEquals(array (
  'attribs' => 
  array (
    'version' => '1.0',
    'xmlns' => 'http://pear.php.net/channel-1.0',
    'xmlns:xsi' => 'http://www.w3.org/2001/XMLSchema-instance',
    'xsi:schemaLocation' => 'http://pear.php.net/dtd/channel-1.0.xsd',
  ),
  'name' => 'pear.php.net',
  'suggestedalias' => 'pear',
  'summary' => 'PHP Extension and Application Repository',
  'validatepackage' => 
  array (
    'attribs' => 
    array (
      'version' => '1.0',
    ),
    '_content' => 'PEAR_Validate',
  ),
  'servers' => 
  array (
    'primary' => 
    array (
      'xmlrpc' => 
      array (
        'function' => 
        array (
          0 => 
          array (
            'attribs' => 
            array (
              'version' => '1.0',
            ),
            '_content' => 'logintest',
          ),
          1 => 
          array (
            'attribs' => 
            array (
              'version' => '1.0',
            ),
            '_content' => 'package.listLatestReleases',
          ),
          2 => 
          array (
            'attribs' => 
            array (
              'version' => '1.0',
            ),
            '_content' => 'package.listAll',
          ),
          3 => 
          array (
            'attribs' => 
            array (
              'version' => '1.0',
            ),
            '_content' => 'package.info',
          ),
          4 => 
          array (
            'attribs' => 
            array (
              'version' => '1.0',
            ),
            '_content' => 'package.getDownloadURL',
          ),
          5 => 
          array (
            'attribs' => 
            array (
              'version' => '1.0',
            ),
            '_content' => 'channel.listAll',
          ),
          6 => 
          array (
            'attribs' => 
            array (
              'version' => '1.0',
            ),
            '_content' => 'channel.update',
          ),
        ),
      ),
    ),
  ),
), $chf->toArray(), 'Parsed array of default is not correct');
$chf->addFunction('xmlrpc', '2.0', 'foobar');
$chf->addFunction('soap', '1.0', 'foobar');

$phpt->assertTrue($chf->validate(), 'after add validation failed');
$phpt->assertEquals(array (
  'attribs' => 
  array (
    'version' => '1.0',
    'xmlns' => 'http://pear.php.net/channel-1.0',
    'xmlns:xsi' => 'http://www.w3.org/2001/XMLSchema-instance',
    'xsi:schemaLocation' => 'http://pear.php.net/dtd/channel-1.0.xsd',
  ),
  'name' => 'pear.php.net',
  'suggestedalias' => 'pear',
  'summary' => 'PHP Extension and Application Repository',
  'validatepackage' => 
  array (
    'attribs' => 
    array (
      'version' => '1.0',
    ),
    '_content' => 'PEAR_Validate',
  ),
  'servers' => 
  array (
    'primary' => 
    array (
      'xmlrpc' => 
      array (
        'function' => 
        array (
          0 => 
          array (
            'attribs' => 
            array (
              'version' => '1.0',
            ),
            '_content' => 'logintest',
          ),
          1 => 
          array (
            'attribs' => 
            array (
              'version' => '1.0',
            ),
            '_content' => 'package.listLatestReleases',
          ),
          2 => 
          array (
            'attribs' => 
            array (
              'version' => '1.0',
            ),
            '_content' => 'package.listAll',
          ),
          3 => 
          array (
            'attribs' => 
            array (
              'version' => '1.0',
            ),
            '_content' => 'package.info',
          ),
          4 => 
          array (
            'attribs' => 
            array (
              'version' => '1.0',
            ),
            '_content' => 'package.getDownloadURL',
          ),
          5 => 
          array (
            'attribs' => 
            array (
              'version' => '1.0',
            ),
            '_content' => 'channel.listAll',
          ),
          6 => 
          array (
            'attribs' => 
            array (
              'version' => '1.0',
            ),
            '_content' => 'channel.update',
          ),
          7 => 
          array (
            'attribs' => 
            array (
              'version' => '2.0',
            ),
            '_content' => 'foobar',
          ),
        ),
      ),
      'soap' => 
      array (
        'function' => 
        array (
          'attribs' => 
          array (
            'version' => '1.0',
          ),
          '_content' => 'foobar',
        ),
      ),
    ),
  ),
), $chf->toArray(), 'addFunction() did not work as expected');
$chf->addFunction('soap', '1.0', 'gronfk');

$phpt->assertTrue($chf->validate(), 'after add validation failed');
$phpt->assertEquals(array (
  'attribs' => 
  array (
    'version' => '1.0',
    'xmlns' => 'http://pear.php.net/channel-1.0',
    'xmlns:xsi' => 'http://www.w3.org/2001/XMLSchema-instance',
    'xsi:schemaLocation' => 'http://pear.php.net/dtd/channel-1.0.xsd',
  ),
  'name' => 'pear.php.net',
  'suggestedalias' => 'pear',
  'summary' => 'PHP Extension and Application Repository',
  'validatepackage' => 
  array (
    'attribs' => 
    array (
      'version' => '1.0',
    ),
    '_content' => 'PEAR_Validate',
  ),
  'servers' => 
  array (
    'primary' => 
    array (
      'xmlrpc' => 
      array (
        'function' => 
        array (
          0 => 
          array (
            'attribs' => 
            array (
              'version' => '1.0',
            ),
            '_content' => 'logintest',
          ),
          1 => 
          array (
            'attribs' => 
            array (
              'version' => '1.0',
            ),
            '_content' => 'package.listLatestReleases',
          ),
          2 => 
          array (
            'attribs' => 
            array (
              'version' => '1.0',
            ),
            '_content' => 'package.listAll',
          ),
          3 => 
          array (
            'attribs' => 
            array (
              'version' => '1.0',
            ),
            '_content' => 'package.info',
          ),
          4 => 
          array (
            'attribs' => 
            array (
              'version' => '1.0',
            ),
            '_content' => 'package.getDownloadURL',
          ),
          5 => 
          array (
            'attribs' => 
            array (
              'version' => '1.0',
            ),
            '_content' => 'channel.listAll',
          ),
          6 => 
          array (
            'attribs' => 
            array (
              'version' => '1.0',
            ),
            '_content' => 'channel.update',
          ),
          7 => 
          array (
            'attribs' => 
            array (
              'version' => '2.0',
            ),
            '_content' => 'foobar',
          ),
        ),
      ),
      'soap' => 
      array (
        'function' => 
        array (
          0 => 
          array (
            'attribs' => 
            array (
              'version' => '1.0',
            ),
            '_content' => 'foobar',
          ),
          1 => 
          array (
            'attribs' => 
            array (
              'version' => '1.0',
            ),
            '_content' => 'gronfk',
          ),
        ),
      ),
    ),
  ),
), $chf->toArray(), 'second add failed');
echo 'tests done';
?>
--EXPECT--
tests done
