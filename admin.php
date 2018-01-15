<!doctype html>
<html>
<head>
<meta charset="gb2312">
<title>后台管理系统登陆页面</title>
</head>

<body>

<?php
if(isset($_POST['button']))
{
	//用户输入的用户名和密码
	$StudentID=$_POST['StudentID'];
	$password=$_POST['password'];
	
	//连接数据库
	mysql_connect('127.0.0.1','root','') or die (mysql_error()); //显示错误信息
	mysql_select_db('tradingmall'); //选择数据库
	mysql_query('set names gb2312'); //设置客户端字符编码
	$sql="select * from users where StudentID='$StudentID' and password='$password'";
	$record=mysql_query($sql);
	//var_dump($record); 无用语句
	//获取结果集的记录数，如果记录数为1，登录成功
	if(mysql_num_rows($record))
	{
		//echo '登录成功';
		//登录成功后跳转到首页，php用header('location:url地址')来跳转
		header('location:admin/index.php');
		}else{
			echo '登录失败';
			}
}
?>

    <form name="form1" method="post" action="">
      <table width="500" border="1" align="center">
        <tr>
          <td colspan="2"><div align="center">登录后台管理系统</div></td>
        </tr>
        <tr>
          <td width="166"><div align="right">学号：</div></td>
          <td width="318"><label for="StudentID"></label>
          <input type="text" name="StudentID" id="StudentID"></td>
        </tr>
        <tr>
          <td><div align="right">密码：</div></td>
          <td><label for="password"></label>
            <label for="textfield4"></label>
            <input name="password" type="password" id="textfield4" maxlength="16">
            <label for="textfield3"></label></td>
        </tr>
        <tr>
          <td colspan="2"><div align="center">
            <input name="button" type="submit" id="button" value="登录">
          </div></td>
        </tr>
      </table>
    </form>
</body>
</html>