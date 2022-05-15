<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.inc.php");

$memberid = @$_POST['memberid'];
$id = @$_POST['id'];
$pw = @$_POST['pw'];
$name = @$_POST['name'];
$lab = @$_POST['lab'];
$email = @$_POST['email'];
$telephone = @$_POST['telephone'];

//判斷帳號密碼是否為空值
//確認密碼輸入的正確性
if($id != null && $pw != null && $name != null)
{
        //新增資料進資料庫語法
		$sql = "insert into member_table (memberid, id, pw, name, lab, email, telephone) 
                        SELECT MAX(memberid)+1,'$id', '$pw', '$name', '$lab', '$email', '$telephone' 
                        FROM member_table
                        ";
		if(mysqli_query($con, $sql))
        {
                echo '新增成功!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
        }
        else
        {
                echo '新增失敗!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
        }	
}
else
{
        echo '新增失敗!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
}
?>