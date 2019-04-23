<?php
/**
 * Created by PhpStorm.
 * User: amirjahangiri
 * Date: 2019-03-03
 * Time: 15:24
 */

$setArray = array("shortText","longText","shortImg","longImg","cat","title");
include "../../class/dataBase.php";
$db = new dataBase();
if(
  $db::issetParams($_POST,$setArray)
  &&
  $db::emptyParams($_POST,$setArray)
){
    $result = $db::RealString($_POST);
    $shortText = $result['shortText'];
    $longText = $result['longText'];
    $shortImg = $result['shortImg'];
    $title = $result['title'];
    $longImg = $result['longImg'];
    $cat = $result['cat'];
    $id = $db::Gid();
    $date = $db::GetDate();
    $time = $db::GetTime();
    if (isset($shortImg)
        && $shortImg != '' &&
        $shortImg != 'undefined'
    ) {
        $nameShort = $db::generateRandomString();
        @$db::saveImage($shortImg,"../../Images/",$nameShort);
    }
    if (isset($longImg)
        && $longImg != '' &&
        $longImg != 'undefined'
    ) {
        $nameLong = $db::generateRandomString();
        @$db::saveImage($longImg,"../../Images/",$nameLong);
    }
    $q= $db::Query("INSERT INTO news (newsId, newsText,
                  newsTitle, newsShortText, newsRegDate, newsRegTime,
                  newsCatId, imgShort, imgLong) VALUES ('$id','$longText','$title','$shortText','$date','$time','$cat','$nameShort','$nameLong')");



    $call = array("error"=>false);
    echo  json_encode($call);
}else{
    $call = array("error"=>true);
}