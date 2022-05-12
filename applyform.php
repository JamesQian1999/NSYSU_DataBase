<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<form action="applyform_finish.php" method="post">
<h4 class="title toc-ignore">租借申請表</h4>
借用人 <input type="text" name="rentname" /> <br>
教室編號 <input type="text" name="roomid" /> <br>
開始時段 <input type="date" name="dateFrom" />

<select name="classFrom">
<option selected>節次
<option>2. 9:10-10:00
<option>3. 10:10-11:00
<option>4. 11:10-12:00
<option>5. 13:10-14:00
<option>6. 14:10-15:00
<option>7. 15:10-16:00
<option>8. 16:10-17:00
<option>9. 17:10-18:00
</select><br>

結束時段 <input type="date" name="dateTo" />
<select name="classTo">
<option selected>節次
<option>2. 9:10-10:00
<option>3. 10:10-11:00
<option>4. 11:10-12:00
<option>5. 13:10-14:00
<option>6. 14:10-15:00
<option>7. 15:10-16:00
<option>8. 16:10-17:00
<option>9. 17:10-18:00
</select><br>

用途 <input type="text" name="used" /> <br>
附加借用設備代號 <input type="text" name="devices" /> <br>
歸還日期 <input type="date" name="returndate" /> <br>
<input type="submit" name="button" value="確定" /> <br><br>
</form>
