<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.inc.php");

$rentname = $_POST['rentname'];
$roomid = $_POST['roomid'];
$date = date('Y-m-d', strtotime($_POST['date']));
$class = $_POST['class'];
$used = $_POST['used'];
$devices=$_POST['devices']; 
$returndate = date('Y-m-d', strtotime($_POST['returndate']));

if($rentname != null && $roomid != null && $date != null && $class != null && $returndate != null)
{
        //新增資料進資料庫語法
		$dev="";
		foreach($devices as $dev1)  
		{ 
			$dev .= $dev1." ";  
		}  

        // echo "roomid:".$roomid."  date:".$date."  class:".$class."  cla:".$cla;


		$sql = "insert into apply_table (rentname, roomid, date, class, used, devices, returndate) values ('$rentname', '$roomid', '$date', '$class', '$used', '$dev', '$returndate')";
		$sql_r = "  SELECT * 
                    FROM    apply_table 
                    WHERE   roomid = '".$roomid."' AND 
                            date   = '".$date."'   AND 
                            class =  '".$class."'
                ";
        echo "sql_r:".$sql_r;
        $result = mysqli_query($con, $sql_r);
        
		//$sql_d = "SELECT * FROM apply_table WHERE roomid = '".$roomid."' AND date = '".$date."' AND class = '".$class."'";

		if(mysqli_num_rows($result) != '0')
		{
			echo '此教室和時段已被借用!';
            echo '<meta http-equiv=REFRESH CONTENT=2;url=login.php>';
		}
		else if(mysqli_query($con, $sql))
        {
            echo '租借成功!';
            echo '<meta http-equiv=REFRESH CONTENT=2;url=login.php>';
        }
        else
        {
            echo '租借失敗!';
            echo '<meta http-equiv=REFRESH CONTENT=2;url=login.php>';
        }	
       
}
else
{
        echo '您無權限觀看此頁面!';
        //echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
}
?>