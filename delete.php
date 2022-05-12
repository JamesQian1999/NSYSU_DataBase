<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.inc.php");

if($_SESSION['id'] == "admin")
{
        echo "<form name=\"form\" method=\"post\" action=\"delete_finish.php\">";
        echo "要刪除的帳號：<input type=\"text\" name=\"id\" /> <br>";
        echo "<input type=\"submit\" name=\"button\" value=\"刪除\" /><br><br><br>";
		
		$sql = "SELECT * FROM member_table";
        $result = mysqli_query($con, $sql);
		
		if(!$result){
			echo "error";
			exit();
		}
		
		$rows = mysqli_affected_rows($con);//獲取行數
        $colums = mysqli_num_fields($result);//獲取列數
        echo "資料庫的"."$member_name"."表的所有使用者資料如下：<br/>";
        echo "共計".$rows."行 ".$colums."列<br/>";
        
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
		
        echo "</form>";
}
else
{
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
}
?>