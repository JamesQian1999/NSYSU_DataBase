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
		
		$sql_a = "SELECT * FROM member_table";
        $res = mysqli_query($con, $sql_a);
		$rows = mysqli_affected_rows($con);//獲取行數
        $colums = mysqli_num_fields($res);//獲取列數
        echo "<h4 class=\"title toc-ignore\">資料庫的所有使用者資料<br/></h4>";
        
        
        echo "<table><tr>";
		echo "<td>編號</td><td>帳號</td><td>密碼</td><td>姓名</td><td>實驗室號碼</td><td>Email</td><td>Telephone</td>";
        echo "</tr>";
        $offset = 0;
        while($row = mysqli_fetch_assoc($res)){
            
            if($_SESSION['id'] == "office" && $row['id'] == "admin")
            {
                $offset = -1;
                continue;
            }
            
            echo "<tr>";
            
                echo "<td>";echo $row['memberid']+$offset;echo "</td>";
                echo "<td>";echo $row['id'];echo "</td>";
                echo "<td>";echo $row['pw'];echo "</td>";
                echo "<td>";echo $row['name'];echo "</td>";
                echo "<td>";echo $row['lab'];echo "</td>";
                echo "<td>";echo $row['email'];echo "</td>";
                echo "<td>";echo $row['telephone'];echo "</td>";
                echo "</tr>";

            echo "</tr>";
        }
        echo "</table>";
		
        echo "<form name=\"form\" method=\"post\" action=\"update_finish.php\">";
        echo " <br> <br>帳號：<input type=\"text\" name=\"id\" /> <br>";
        echo "密碼：<input type=\"password\" name=\"pw\" /> <br>";
        echo "姓名：<input type=\"text\" name=\"name\" /> <br>";
        echo "實驗室編號：<input type=\"text\" name=\"lab\"  /> <br>";
        echo "Email：<input type=\"text\" name=\"email\"  /> <br>";
		echo "電話<input type=\"text\" name=\"telephone\"  /> <br> <br>";
        echo "<input type=\"submit\" name=\"button\" value=\"確定\" style=\"height:50px; width:100px\"/>";
        echo "</form>";

        echo "</form>";
}
else
{
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
}
?>
