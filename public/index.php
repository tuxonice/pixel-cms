<?php
use Pixel\Libraries\simple_html_dom;


error_reporting(E_ALL);
require __DIR__ . '/../vendor/autoload.php';

define('HDOM_TYPE_ELEMENT', 1);
define('HDOM_TYPE_COMMENT', 2);
define('HDOM_TYPE_TEXT',    3);
define('HDOM_TYPE_ENDTAG',  4);
define('HDOM_TYPE_ROOT',    5);
define('HDOM_TYPE_UNKNOWN', 6);
define('HDOM_QUOTE_DOUBLE', 0);
define('HDOM_QUOTE_SINGLE', 1);
define('HDOM_QUOTE_NO',     3);
define('HDOM_INFO_BEGIN',   0);
define('HDOM_INFO_END',     1);
define('HDOM_INFO_QUOTE',   2);
define('HDOM_INFO_SPACE',   3);
define('HDOM_INFO_TEXT',    4);
define('HDOM_INFO_INNER',   5);
define('HDOM_INFO_OUTER',   6);
define('HDOM_INFO_ENDSPACE',7);


$client = new \GuzzleHttp\Client();
$res = $client->request('GET', 'http://www.sapo.pt');
$body = (string)$res->getBody();

$dom = new simple_html_dom;
$dom->load($body);

foreach($dom->find('img') as $element) 
       echo $element->src . '<br>';




//var_dump($obj);



