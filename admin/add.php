<!doctype html>
<html>
<head>
<meta charset="gb2312">
<title>用户注册</title>
<script type="text/javascript">
	//返回上一个页面
	function Retrun()
	{
		location.href='index.php';
	}
	//提交表单之前检查是否合法
	function Check()
	{
		//将光标定位在不合法的位置
		var Focus=document.getElementById('StudentID');
		if(Focus.value==''){
			alert('学号不能为空');
			Focus.focus();//获得光标焦点
			return false;
			}
		//光标选中不合法的字符
		var Focus=document.getElementById('StudentID');
		if(isNaN(Focus.value)||Focus.value.indexOf('.')!=-1){//NaN英文全称为Not A Number；indexOf判断是否含有该字符
			alert('学号为纯数字');
			Focus.select();//选中
			return false;
			}
		}
</script>
</head>
<body>
<?php
	if(isset($_POST['button']))
	{
		//获取提交的数据
		$College=$_POST['College'];
		$StudentID=$_POST['StudentID'];
		$Class=$_POST['Class'];
		$Name=$_POST['Name'];
		$Sex=$_POST['Sex'];
		$Major=$_POST['Major'];
		$District=$_POST['District'];
		
	//连接数据库
	mysql_connect('localhost','root','') or die(mysql_error());
	mysql_select_db('tradingmall');
	mysql_query('set names gb2312');
	//拼接一个SQL语句
	$sql="insert into users values('$College','$StudentID','$Class','$Name','$Sex','$Major','$District','NULL')";
	//echo $sql;
	//执行SQL语句
	if(mysql_query($sql)){
		//echo '插入成功';
		header('location:index.php');
		}else{
			echo '插入失败';
			}
	}
?>

<form name="form1" method="post" action="" onSubmit="return Check()">
  <table width="249" border="1" align="center">
    <tr>
      <td colspan="2" align="center"><h1>注册</h1></td>
    </tr>
    <tr>
      <td width="69" align="right"><strong>学院：</strong></td>
      <td width="168"><label for="College"></label>
      <input type="text" name="College" id="College"></td>
    </tr>
    <tr>
      <td align="right"><strong>学号：</strong></td>
      <td><label for="StudentID"></label>
      <input type="text" name="StudentID" id="StudentID"></td>
    </tr>
    <tr>
      <td align="right"><strong>班级：</strong></td>
      <td><label for="Class"></label>
      <input type="text" name="Class" id="Class"></td>
    </tr>
    <tr>
      <td align="right"><strong>姓名：</strong></td>
      <td><label for="Name"></label>
      <input type="text" name="Name" id="Name"></td>
    </tr>
    <tr>
      <td align="right"><strong>性别：</strong></td>
      <td><label for="Sex"></label>
      <input type="text" name="Sex" id="Sex"></td>
    </tr>
    <tr>
      <td align="right"><strong>专业：</strong></td>
      <td><label for="Major"></label>
      <input type="text" name="Major" id="Major"></td>
    </tr>
    <tr>
      <td align="right"><strong>地区：</strong></td>
      <td><label for="District"></label>
      <input type="text" name="District" id="District"></td>
    </tr>
    <tr>
      <td align="right"><strong>密码：</strong></td>
      <td><label for="password"></label>
      <input type="text" name="password" id="password"></td>
    </tr>
    <tr>
      <td colspan="2" align="center" valign="middle"><input type="submit" name="button" id="button" value="提交">
         <input type="button" name="button2" id="button2" value="返回" onClick="Retrun()"></td>
    </tr>
  </table>
</form>
</body>
</html>