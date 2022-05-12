<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.inc.php");
echo '<a href="logout.php">登出</a>  <br><br>';

$memberid = $_POST['memberid'];
$id = $_POST['id'];
$pw = $_POST['pw'];
$name = $_POST['name'];
$lab = $_POST['lab'];
$email = $_POST['email'];
$telephone = $_POST['telephone'];

//此判斷為判定觀看此頁有沒有權限
//說不定是路人或不相關的使用者
//因此要給予排除
if($_SESSION['id'] == "admin")
{
        echo '<a href="register.php">新增</a>    ';
        echo '<a href="update.php">修改</a>    ';
        echo '<a href="delete.php">刪除</a>  <br><br>';
		
		$sql = "SELECT * FROM member_table";
        $result = mysqli_query($con, $sql);
		
		if(!$result){
			echo "error";
			exit();
		}
		
		$rows = mysqli_affected_rows($con);//獲取行數
        $colums = mysqli_num_fields($result);//獲取列數
        echo "使用者資料如下：<br/>";
        echo "共計".$rows."行 ".$colums."列<br/><br>";
        
        echo "<table><tr>";
		echo "<td>編號</td><td>帳號</td><td>密碼</td><td>姓名</td><td>實驗室號碼</td><td>Email</td><td>Telephone</td>";
        echo "</tr>";
        while($row = mysqli_fetch_row($result)){
            echo "<tr>";
            for($i=0; $i<$colums; $i++){
                echo "<td>$row[$i]</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
}
else
{
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
}
?>