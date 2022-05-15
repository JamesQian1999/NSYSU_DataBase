<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.inc.php");

if($_SESSION['id'] == "admin")
{
        echo "<form name=\"form\" method=\"post\" action=\"delete_finish.php\">";
		
		$sql = "SELECT * FROM member_table";
        $result = mysqli_query($con, $sql);
		
		if(!$result){
			echo "error";
			exit();
		}
		
		$rows = mysqli_affected_rows($con);//獲取行數
        $colums = mysqli_num_fields($result);//獲取列數
        echo "<center>";
        echo "<h4 class=\"title toc-ignore\">資料庫的所有使用者資料<br/></h4>";

        echo "<table><tr>";
		echo "<td>編號</td><td>帳號</td><td>密碼</td><td>姓名</td><td>實驗室號碼</td><td>Email</td><td>電話</td>";
        echo "</tr>";
        while($row = mysqli_fetch_row($result)){
            echo "<tr>";
            for($i=0; $i<$colums; $i++){
                echo "<td>$row[$i]</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
		
        echo "<br><br>擬刪除帳號：<input type=\"text\" name=\"id\" /> <br> <br>";
        echo "<input type=\"submit\" name=\"button\" value=\"刪除\" style=\"height:40px; width:85px; background-color:rgb(232,106,192);\" /><br><br><br>";

        echo "</form>";
}
else
{
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
}
?>