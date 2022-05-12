<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.inc.php");

$id = $_POST['id'];
$pw = $_POST['pw'];
$name = $_POST['name'];
$lab = $_POST['lab'];
$email = $_POST['email'];
$telephone = $_POST['telephone'];

//紅色字體為判斷密碼是否填寫正確
if($id != null && $pw != null)
{
        $id = $_POST['id'];
		//更新資料庫資料語法
        $sql = "update member_table set pw = '$pw', name = '$name', lab = '$lab', email = '$email', telephone = '$telephone' where id='$id'";
        if(mysqli_query($con, $sql))
        {
                echo '修改成功!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=member.php>';
        }
        else
        {
                echo '修改失敗!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=member.php>';
        }
}
else
{
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
}
?>