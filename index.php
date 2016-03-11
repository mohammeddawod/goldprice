<?php
include("declear.php");

$dt_site['goldprice']               = $db->query_first("select *,date(gp_datetime) as gpdate,DATE_FORMAT(gp_datetime,'%l:%i %p') as gptime from goldprice ORDER BY gp_id DESC limit 0,1");
$dt_site['currencyprice']['SAR']    = $db->query_first("select * from currencyprice where cp_country_code_to = 'SAR' ORDER BY cp_id DESC limit 0,1");
$dt_site['list_goldprice']          = $db->fetch_array("select *,date(gp_datetime) as thedate from goldprice ORDER BY gp_id DESC limit 0,7");
$dt_site['list_countrys']           = $db->fetch_array("select * from countrys");
$sections[] = "two_col.php";
$sections[] = "priceforoneweek.php";
$rightsections[] = "top_gold_boxes.php";
$rightsections[] = "today_gold_price.php";
$smarty->assign($dt_site);              //إسناد متعدد لأكثر من قيمة عن طريق تمرير مصفوفة مع تسمية للمفاتيح والتي ستعتبر كمتغيرات سمارتي , Ex: $smarty->assign(array('city' => 'Lincoln', 'state' => 'Nebraska'))
$smarty->assign("rightsections",$rightsections);  //القطاعات المطلوب فتحها عند زيارة هذه الصفحة
$smarty->assign("sections",$sections);  //القطاعات المطلوب فتحها عند زيارة هذه الصفحة
$smarty->display("fullpage.php");

?>