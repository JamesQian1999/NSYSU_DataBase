<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<center>
<h4 class="title toc-ignore">教室與設備借用系統</h4>

<!-- <?php
    echo '<a href="logout.php">登出</a>  <br><br>';
?> -->

<?php
    include("mysql_connect.inc.php");

    $applyid = @$_POST['applyid'];
    $rentname = @$_POST['rentname'];
    $roomid = @$_POST['roomid'];
    $date = date('Y-m-d', strtotime(@$_POST['date']));
    $class = @$_POST['class'];
    $used = @$_POST['used'];
    $devices = @$_POST['devices'];
    $returndate = date('Y-m-d', strtotime(@$_POST['returndate']));

    $sql = "SELECT * FROM apply_table";
    $result = mysqli_query($con, $sql);
            
    if(!$result){
        echo "error";
        exit();
    }
            
    $rows = mysqli_affected_rows($con);//獲取行數
    $colums = mysqli_num_fields($result);//獲取列數
    echo "目前教室使用狀況<br/>";
            
    echo "<table><tr>";
            echo "<td>租借人</td><td>教室編號</td><td>時段</td><td>節次</td><td>用途</td><td>附加借用設備</td><td>歸還日期</td>";
            echo "</tr>";
            while($row = mysqli_fetch_row($result)){
                echo "<tr>";
                for($i=1; $i<$colums; $i++){
                    echo "<td>$row[$i]</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
            echo "<br><br>";

?>

<form action="applyform_finish.php" method="post">
    <h4 class="title toc-ignore">租借申請表</h4>
    申請姓名 <input type="text" name="rentname" /> <br>
    教室編號 <input type="text" name="roomid" /> <br>
    時段 <input type="date" name="date" />
    <select name="class">
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
    用途 <input type="text" name="used" /> <br>
    附加借用設備 :
    <input type ="checkbox" name="devices[]" value="電腦">電腦
    <input type ="checkbox" name="devices[]" value="麥克風">麥克風
    <input type ="checkbox" name="devices[]" value="投影機">投影機
    <input type ="checkbox" name="devices[]" value="雷射筆">雷射筆<br>
    歸還日期 <input type="date" name="returndate" /> <br>
    <br><input type="submit" name="button" value="確定" style="height:50px; width:100px"/> <br>
</form>

<form action="logout.php" method="post">
<br><input type="submit" name="button" value="登出" style="height:35px; width:85px; background-color:rgb(232,106,192);"/> 
</form>