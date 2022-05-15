<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.inc.php");

if($_SESSION['id'] == "admin" || $_SESSION['id'] == "office")
{
        //將$_SESSION['id']丟給$id
        //這樣在下SQL語法時才可以給搜尋的值
		$id = @$_GET['id'];
        //若以下$id直接用$_SESSION['id']將無法使用
		$sql = "SELECT * FROM member_table where id='$id'";
	
		$result = mysqli_query($con, $sql);
		$row = mysqli_affected_rows($con);
		
		if(!$result){
			echo "error";
			exit();
		}
    
        echo "<center>";
		
		$sql_a = "SELECT * FROM apply_table";
    	$sql_a_result = mysqli_query($con, $sql_a);
		if(!$sql_a_result){
			echo "error";
			exit();
		}
				
		$rows = mysqli_affected_rows($con);//獲取行數
		$colums = mysqli_num_fields($sql_a_result);//獲取列數

		echo "<br/><br/>";
		echo "<h4 class=\"title toc-ignore\">目前教室使用狀況<br/></h4>";		
		echo "<table><tr>";
				echo "<td>租借人</td><td>教室編號</td><td>時段</td><td>節次</td><td>用途</td><td>附加借用設備</td><td>歸還日期</td>";
				echo "</tr>";
				while($row = mysqli_fetch_row($sql_a_result)){
					echo "<tr>";
					for($i=1; $i<$colums; $i++){
						echo "<td>$row[$i]</td>";
					}
					echo "</tr>";
				}
				echo "</table>";
				echo "<br><br>";
		
                echo "<form name=\"form\" method=\"post\" action=\"update_apply_finish.php\">";
                echo "
                申請姓名 <input type=\"text\" name=\"rentname\" /> <br>
                教室編號 <input type=\"text\" name=\"roomid\" /> <br>
                時段 <input type=\"date\" name=\"date\" />
                <select name=\"class\">
                <option selected>節次
                <option>8:10-9:00
                <option>9:10-10:00
                <option>10:10-11:00
                <option>11:10-12:00
                <option>13:10-14:00
                <option>14:10-15:00
                <option>15:10-16:00
                <option>16:10-17:00
                <option>17:10-18:00
                </select><br>
                用途 <input type=\"text\" name=\"used\" /> <br>
                附加借用設備 :
                <input type =\"checkbox\" name=\"devices[]\" value=\"電腦\">電腦
                <input type =\"checkbox\" name=\"devices[]\" value=\"麥克風\">麥克風
                <input type =\"checkbox\" name=\"devices[]\" value=\"投影機\">投影機
                <input type =\"checkbox\" name=\"devices[]\" value=\"雷射筆\">雷射筆<br>
                歸還日期 <input type=\"date\" name=\"returndate\" /> <br>
                <br><input type=\"submit\" name=\"button\" value=\"確定\" style=\"height:50px; width:100px\"/> <br>
                ";

        echo "</form>";

        echo "</form>";
}
else
{
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
}
?>
