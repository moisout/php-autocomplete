<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: text/html; charset=UTF-8");
header("Access-Control-Max-Age: 3600");
# header("Content-Security-Policy: default-src 'self' *.unisg.ch  www.google-analytics.com ajax.googleapis.com; script-src 'self' 'unsafe-inline' 'unsafe-eval' *.unisg.ch *.wemlin.com *.youtube.com *.pinterest.com *.ytimg.com www.googletagmanager.com www.google-analytics.com; connect-src 'self'; img-src 'self'  data: *.ytimg.com yimg.com *.yimg.com *.youtube.com www.google-analytics.com *.g.doubleclick.net; style-src 'self' 'unsafe-inline'; frame-src 'self' *.unisg.ch www.google.com www.youtube.com datawrapper.dwcdn.net pos.vbsg.ch pos.wemlin.com;");


header("Content-Security-Policy: default-src 'self' *.unisg.ch www.google-analytics.com ajax.googleapis.com; script-src 'self' 'unsafe-inline' 'unsafe-eval' *.unisg.ch *.wemlin.com *.youtube.com *.pinterest.com *.ytimg.com www.googletagmanager.com www.google-analytics.com; connect-src 'self'; img-src 'self' data: *.ytimg.com yimg.com *.yimg.com *.youtube.com www.google-analytics.com *.g.doubleclick.net; style-src 'self' 'unsafe-inline'; frame-src 'self' *.unisg.ch www.google.com www.youtube.com datawrapper.dwcdn.net pos.vbsg.ch pos.wemlin.com;");
// header("Content-Security-Policy: default-src 'self' *.unisg.ch www.google-analytics.com ajax.googleapis.com fonts.gstatic.com; script-src 'self' 'unsafe-inline' 'unsafe-eval' *.google.com *.floodlight.com *.unisg.ch *.youtube.com *.pinterest.com *.ytimg.com *.googletagmanager.com *.google-analytics.com paper.li *.scoop.it; connect-src 'self'; img-src 'self' data: *.unisg.ch *.euxeinos.info *.uni-sanktgallen.ch *.ytimg.com yimg.com *.yimg.com *.youtube.com *.google.com *.google-analytics.com *.g.doubleclick.net *.googletagmanager.com; style-src 'self' 'unsafe-inline' *.scoop.it; frame-src 'self' *.unisg.ch *.google.com *.youtube.com datawrapper.dwcdn.net forms.nintex.com verdi.unisg.ch *.doubleclick.net paper.li *.scoop.it *.edoobox.com *.taktwerk.ch *.2vizcon.com pos.wemlin.com; frame-ancestors 'self' *.unisg.ch paper.li *.scoop.it *.facebook.com hsg2.stolzweb.ch;");

header("X-Frame-Options: ALLOWALL");
# header("X-Frame-Options: SAMEORIGIN");

include 'simple_html_dom.php';
$query = $_GET["q"];

$query_url = 'https://suggestqueries.google.com/complete/search?client=firefox&ds=yt&q=' . $query;

$html = dlPage($query_url);

echo $html;

function dlPage($href)
{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($curl, CURLOPT_URL, $href);
    curl_setopt($curl, CURLOPT_REFERER, $href);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US) AppleWebKit/533.4 (KHTML, like Gecko) Chrome/5.0.375.125 Safari/533.4");
    $str = curl_exec($curl);
    curl_close($curl);

    // Create a DOM object
    $dom = new simple_html_dom();
    // Load HTML from a string
    $dom->load($str);

    return $dom;
}