<?php
/**
 * Created by PhpStorm.
 * User: amirjahangiri
 * Date: 2019-04-12
 * Time: 21:50
 */
include "../class/dataBase.php";
$db = new dataBase();
$GetArray = array("model","id");
if(
    $db::issetParams($_POST,$GetArray)
    &&
    $db::emptyParams($_POST,$GetArray)
){
    $result= $db::RealString($_POST);
    $model =$result['model'];
    $id = $result['id'];

    if($model=='1') {
        $html = '<div class="adslptel">
        <h5 class="tarefehs">
انتخاب
</h5>
      </div>
      <div class="adslpt">
        <h3 class="tarefehs">
سرعت
        </h3>
      </div>
      <div class="adslpt">
        <h5 class="tarefehs">
ترافیک منصفانه‌ی داخلی <br>(گیگ)
</h5>
      </div>
      <div class="adslpt">
        <h5 class="tarefehs">
ترافیک منصفانه‌ی بین‌المللی <br>(گیگ)
</h5>
      </div>
      <div class="adslpt">
        <h3 class="tarefehs">
قیمت (تومان)
        </h3>
      </div>';
        $Q = $db::Query("SELECT * FROM adsl where adslPackModelId='$id'");
        $i=1;
        $cot="'";
        while ($rowModel = mysqli_fetch_assoc($Q)){
            $html .= '
<div class="adslpc" id="adsl_'.$rowModel['adslId'].'" onclick="selectAdsl('.$cot.$rowModel['adslId'].$cot.')">
<i class="fas fa-check"></i>
      </div>
      <div class="adslp" id="adsl_1">
        <h4 class="tarefehs">
'.$rowModel['adslName'].'
</h4>
      </div>
      <div class="adslp">
        <h4 class="tarefehs">
'.$rowModel['adslIn'].'
</h4>
      </div>
      <div class="adslp">

        <h4 class="tarefehs">
'.$rowModel['adslOut'].'
</h4></div>
      <div class="adslp">
        <h4 class="tarefehs">
'.$rowModel['adslPrice'].'
</h4>
      </div>';

            $i++;

        }
    }

    $call = array("error"=>false,"html"=>$html);
    echo json_encode($call);

}