<!doctype html>
<html>
<head>
<meta charset="gb2312">
<title>后台管理系统</title>
</head>
<body>

	<?php
        //连接数据库
        mysql_connect('127.0.0.1','root','') or die (mysql_error()); //显示错误信息
        mysql_select_db('tradingmall'); //选择数据库
        mysql_query('set names gb2312'); //设置客户端字符编码
        $record=mysql_query('select * from users');
    ?>
    <a href="add.php">添加信息</a>
<form name="form1" method="post" action="">
  <table width="980" border="1" align="center">
        <tr>
            <th width="228" align="center" valign="middle">学院</th>
            <th width="156" align="center" valign="middle">学号</th>
            <th width="104" align="center" valign="middle">班级</th>
            <th width="80" align="center" valign="middle">姓名</th>
            <th width="79" align="center" valign="middle">性别</th>
            <th width="210" align="center" valign="middle">专业</th>
            <th width="77" align="center" valign="middle">地区</th>
    </tr>
     <?php
		//循环匹配成关联数组
		while($rows=mysql_fetch_assoc($record))
		{
			echo '<tr>';
			echo '<td width="228" align="center" valign="middle">'.$rows['College'].'</td>';
			echo '<td width="156" align="center" valign="middle">'.$rows['StudentID'].'</td>';
			echo '<td width="104" align="center" valign="middle">'.$rows['Class'].'</td>';
			echo '<td width="80" align="center" valign="middle">'.$rows['Name'].'</td>';
			echo '<td width="79" align="center" valign="middle">'.$rows['Sex'].'</td>';
			echo '<td width="210" align="center" valign="middle">'.$rows['Major'].'</td>';
			echo '<td width="77" align="center" valign="middle">'.$rows['District'].'</td>';
			echo '<td><input type="button" value="修改" /></td>';
			echo '<td><input type="button" value="删除" /></td>';
			echo '</tr>';
		 }
   	 ?>
  </table>
</form>
<p>&nbsp;</p>

    
    
</body>
</html>
