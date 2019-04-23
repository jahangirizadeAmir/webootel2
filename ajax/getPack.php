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
'.@$db::toMoney($rowModel['adslPrice']).'
</h4>
      </div>';

            $i++;

        }
    }else if ($model=='2'){
        $html = '<h3 class="mobileRuzane">
      بسته‌های روزانه
    </h3>
    <div class="containertarefe">
      <div class="itema">
<img src="Images/BasteRuzane.svg" class="BasteRuzane">
      </div>
      <div class="item3"></div>
      <div class="item1">
        <h3 class="tarefehs">
        ترافیک (گیگ)
        </h3>
      </div>
      <div class="item2">
        <h3 class="tarefehs">
قیمت (تومان)
        </h3>
      </div>';
        $Q = $db::Query("SELECT * FROM wireless where wirelessPackModelId='$id' AND wirelessDayNight='1'");

        $cot="'";

        while ($rowModel = mysqli_fetch_assoc($Q)){
            $html.='<div class="itemz" id="wire'.$rowModel['wirelessId'].'" onclick="selectItemWireless('.$cot.$rowModel['wirelessId'].$cot.')">
            <i class="fas fa-check"></i>
                  </div>
                  <div class="itemx">
                    <h3 class="tarefehs">
            '.$rowModel['wirelessTrafic'].'
                    </h3>
                  </div>
                  <div class="itemx">
                    <h3 class="tarefehs">
            '.$rowModel['wirelessPrice'].'
                    </h3>
                  </div>';
        }

        $html.='
</div>
    <h3 class="mobileRuzane">
بسته‌های روزانه + شبانه
    </h3>

    <div class="containertarefe">
      <div class="itema">
<img src="Images/BasteShabane.svg" class="BasteRuzane">
      </div>
      <div class="item3"></div>
      <div class="item1">
        <h3 class="tarefehs">
        ترافیک (گیگ)
        </h3>
      </div>
      <div class="item2">
        <h3 class="tarefehs">
قیمت (تومان)
        </h3>
      </div>';


        $Q = $db::Query("SELECT * FROM wireless where wirelessPackModelId='$id' AND wirelessDayNight='0'");

        while ($rowModel = mysqli_fetch_assoc($Q)){
            $html.='<div class="itemz" id="wire'.$rowModel['wirelessId'].'" onclick="selectItemWireless('.$cot.$rowModel['wirelessId'].$cot.')">
            <i class="fas fa-check"></i>
                  </div>
                  <div class="itemx">
                    <h3 class="tarefehs">
            '.$rowModel['wirelessTrafic'].'
                    </h3>
                  </div>
                  <div class="itemx">
                    <h3 class="tarefehs">
            '.@$db::toMoney($rowModel['wirelessPrice']).'
                    </h3>
                  </div>';
        }
        $html.='</div>';

    }
    else if($model=='3'){
        $html = '<h3 class="mobileRuzane">
      بسته‌های روزانه
    </h3>
    <div class="containertarefe">
      <div class="itema">
<img src="Images/BasteRuzane.svg" class="BasteRuzane">
      </div>
      <div class="item3"></div>
      <div class="item1">
        <h3 class="tarefehs">
        ترافیک (گیگ)
        </h3>
      </div>
      <div class="item2">
        <h3 class="tarefehs">
قیمت (تومان)
        </h3>
      </div>'
      ;
        $Q = $db::Query("SELECT * FROM tdlte where tdltePackModelId='$id'");
        $cot="'";
        while ($rowModel = mysqli_fetch_assoc($Q)){
            $html.='<div class="itemz" id="TDLTE'.$rowModel['tdlteId'].'" onclick="selectItemTDLTE('.$cot.$rowModel['tdlteId'].$cot.')">
          <i class="fas fa-check"></i>
      </div>
      <div class="itemx">
        <h3 class="tarefehs">
        '.$rowModel['tdlteTraffic'].'
        </h3>
      </div>
      <div class="itemx">
        <h3 class="tarefehs">
        '.$rowModel['tdltePrice'].'
        </h3>
      </div>';
        }
        $html.='</div>';

    }

    $call = array("error"=>false,"html"=>$html);
    echo json_encode($call);

}