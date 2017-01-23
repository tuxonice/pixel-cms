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
$res = $client->request('GET', 'http://pixel-cms.dev/web/blog-post.html');
$body = (string)$res->getBody();

$dom = new simple_html_dom;
$dom->load($body);


$linkList = $dom->find('link');

foreach($linkList as $idx=>$link){
    $href = $link->href;
    $href = 'http://pixel-cms.dev/web/'.$href;
    $linkList[$idx]->href = $href;
}


$scriptList = $dom->find('script');

foreach($scriptList as $idx=>$script){
    $src = $script->src;
    $src = 'http://pixel-cms.dev/web/'.$src;
    $scriptList[$idx]->src = $src;
}


$head = $dom->find('head',0);
$innerHeadHtml = $head->innertext;
$innerHeadHtml .= '<link href="/css/style.css" rel="stylesheet">
<link rel="stylesheet" href="/css/jquery.jspanel.min.css">
<script src="http://cdn.ckeditor.com/4.5.11/standard-all/ckeditor.js"></script>
';
$head->innertext = $innerHeadHtml;


$body = $dom->find('body',0);
$innerBodyHtml = $body->innertext;
$innerBodyHtml .= "

	<script src='/js/jquery-3.1.1.min.js'></script>
    <script src='/js/jquery.jspanel-compiled.min.js'></script>
    <script src='/js/javascript.js'></script>
	
	";
$body->innertext = $innerBodyHtml;

$str = $dom->save();
echo($str);




