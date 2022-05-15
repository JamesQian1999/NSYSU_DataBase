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

//此判斷為判定觀看此頁有沒有權限
//說不定是路人或不相關的使用者
//因此要給予排除
if($_SESSION['id'] == "office")
{
		$sql = "SELECT * FROM member_table";
        $result = mysqli_query($con, $sql);
		
		$sql_o = "SELECT * FROM member_table";
        $res = mysqli_query($con, $sql_o);
		
		$rows = mysqli_affected_rows($con);//獲取行數
		$colums = mysqli_num_fields($result);//獲取列數
		
        echo "<center>";  
		echo "<h4 class=\"title toc-ignore\">系辦及使用者資料基本資料<br/></h4>";     
        echo "<table><tr>";
		echo "<td>編號</td><td>帳號</td><td>密碼</td><td>姓名</td><td>實驗室號碼</td><td>Email</td><td>Telephone</td>";
        echo "</tr>";
		$offset = 0;
		while($row = mysqli_fetch_assoc($res)){
			
			if($row['id'] == "admin")
			{
				$offset = -1;
				continue;
			}
			echo "<td>";echo $row['memberid']+$offset;echo "</td>";
			echo "<td>";echo $row['id'];echo "</td>";
			echo "<td>";echo $row['pw'];echo "</td>";
			echo "<td>";echo $row['name'];echo "</td>";
			echo "<td>";echo $row['lab'];echo "</td>";
			echo "<td>";echo $row['email'];echo "</td>";
			echo "<td>";echo $row['telephone'];echo "</td>";
			echo "</tr>";
		}
        echo "</table>";

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
}
else
{
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
}
?>

<form action="update.php" method="post">
    <center>
	<br><br><input type="submit" name="button" value="修改基本資料" style="height:50px; width:120px"/>
    </center>
</form>

<form action="update_apply.php" method="post">
    <center>
	<input type="submit" name="button" value="修改教室使用狀況" style="height:50px; width:120px"/>
    </center>
</form>

<form action="logout.php" method="post">
    <center>
        <br><br><input type="submit" name="button" value="登出" style="height:35x; width:85px; background-color:rgb(232,106,192);"/> 
    </center>
</form>