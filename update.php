<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.inc.php");

if($_SESSION['id'] == "admin" || $_SESSION['id'] == "office")
{
        //將$_SESSION['id']丟給$id
        //這樣在下SQL語法時才可以給搜尋的值
		$id = $_GET['id'];
        //若以下$id直接用$_SESSION['id']將無法使用
		$sql = "SELECT * FROM member_table where id='$id'";
	
		$result = mysqli_query($con, $sql);
		$row = mysqli_affected_rows($con);
		
		if(!$result){
			echo "error";
			exit();
		}
    
        echo "<form name=\"form\" method=\"post\" action=\"update_finish.php\">";
        echo "帳號：<input type=\"text\" name=\"id\" value=\"$row[0]\" />(此項目無法修改) <br>";
        echo "密碼：<input type=\"password\" name=\"pw\" value=\"$row[1]\" /> <br>";
        echo "姓名：<input type=\"text\" name=\"name\" value=\"$row[2]\" /> <br>";
        echo "實驗室號碼：<input type=\"text\" name=\"lab\" value=\"$row[3]\" /> <br>";
        echo "Email：<input type=\"text\" name=\"email\" value=\"$row[4]\" /> <br>";
		echo "Telephone：<input type=\"text\" name=\"telephone\" value=\"$row[5]\" /> <br>";
        echo "<input type=\"submit\" name=\"button\" value=\"確定\" />";
        echo "</form>";
		
		$sql_a = "SELECT * FROM member_table";
        $res = mysqli_query($con, $sql_a);
		$rows = mysqli_affected_rows($con);//獲取行數
        $colums = mysqli_num_fields($res);//獲取列數
        echo "資料庫的"."$member_name"."表的所有使用者資料如下：<br/>";
        echo "共計".$rows."行 ".$colums."列<br/>";
        
        echo "<table><tr>";
		echo "<td>編號</td><td>帳號</td><td>密碼</td><td>姓名</td><td>實驗室號碼</td><td>Email</td><td>Telephone</td>";
        echo "</tr>";
        while($row = mysqli_fetch_row($res)){
            
            if($_SESSION['id'] == "office" && $row[1] == "admin")
                continue;
            
            echo "<tr>";
            
            for($i=0; $i<$colums; $i++)
                echo "<td>$i $row[$i]</td>";

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
