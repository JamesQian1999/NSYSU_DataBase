<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.inc.php");

$rentname = @$_POST['rentname'];
$roomid = @$_POST['roomid'];
$date = date('Y-m-d', strtotime(@$_POST['date']));
$class = @$_POST['class'];
$used = @$_POST['used'];
$devices = @$_POST['devices'];
$returndate = date('Y-m-d', strtotime(@$_POST['returndate']));

//紅色字體為判斷密碼是否填寫正確
if($rentname != null)
{
    $dev="";
    if($devices != null)
    {
        foreach($devices as $dev1)  
        { 
            $dev .= $dev1." ";  
        }  
    }

		//更新資料庫資料語法
        $sql = "update apply_table 
                set roomid = '$roomid', date = '$date', class = '$class', used = '$used', devices = '$dev', returndate = '$returndate' where rentname='$rentname'";
        if(mysqli_query($con, $sql))
        {
                echo '修改成功!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
        }
        else
        {
                echo '修改失敗!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
        }
}
else
{
        echo '修改失敗!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
}
?>