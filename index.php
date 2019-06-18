<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Max-Age: 3600");

header("Content-Security-Policy: default-src *");

header("X-Frame-Options: ALLOWALL");

include "simple_html_dom.php";
$query = $_GET["q"];
$client = $_GET["cl"];

$query_string = str_replace(" ", "%20", $query);

if ($client == "youtube") {
    $query_url = "https://suggestqueries.google.com/complete/search?client=youtube&ds=yt&q=" . $query_string;
} else if ($client == "google") {
    $query_url = "https://suggestqueries.google.com/complete/search?client=firefox&ds=yt&q=" . $query_string;
} else {
    $query_url = "https://suggestqueries.google.com/complete/search?client=firefox&ds=yt&q=" . $query_string;
}

$html = dlPage($query_url);

$resultPage = str_ireplace("window.google.ac.h(", "", $html);

if ($client == "youtube") {
    $editedResult = substr($resultPage, 0, -1);
    $editedResultArray = json_decode($editedResult);
    $resultArray = array();
    foreach ($editedResultArray[1] as $key => $value) {
        array_push($resultArray, $value[0]);
    }
    $resultPage = json_encode($resultArray);
} else {
    $editedResultArray = json_decode($resultPage);
    $resultArray = array();
    foreach ($editedResultArray[1] as $key => $value) {
        array_push($resultArray, $value);
    }
    $resultPage = json_encode($resultArray);
}

echo $resultPage;

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
    $dom->load($str, false, true);

    return $dom;
}
