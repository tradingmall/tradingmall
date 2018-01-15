<!doctype html>
<html>
<head>
<meta charset="gb2312">
<title>修改信息</title>
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
	//获取需要修改信息的编号
	$id=$_GET['id']; 
	//echo $id;
	//连接数据库
	mysql_connect('localhost','root','') or die(mysql_error());
	mysql_select_db('tradingmall');
	mysql_query('set names gb2312');
	
	//修改信息
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
		
		//拼接SQL语句
		$sql="update users set College='$College',StudentID='$id',Class='$Class',Name='$Name',Sex='$Sex',Major='$Major',District='$District',password='NULL' where StudentID=$id";
		//echo $sql,'<br/>',var_dump(mysql_query($sql));
		if(mysql_query($sql))
		{
			header('location:index.php');
			}else{
					echo '修改失败';
					exit();
				}
	}
				
	//提取ID对应的信息
	$sql="select * from users where StudentID=$id";
	//echo $sql;
	$record=mysql_query($sql);
	//echo $sql,'<br/>',var_dump(mysql_query($sql));
	$rows=mysql_fetch_assoc($record); //因为就一条数据，不需要循环
	
?>

<form name="form1" method="post" action="" onSubmit="return Check()">
  <table width="249" border="1" align="center">
    <tr>
      <td colspan="2" align="center"><h1>修改信息</h1></td>
    </tr>
    <tr>
      <td width="69" align="right"><strong>学院：</strong></td>
      <td width="168"><label for="College"></label>
      <input type="text" name="College" id="College" value="<?php echo $rows['College']?>"></td>
    </tr>
    <tr>
      <td align="right"><strong>学号：</strong></td>
      <td><label for="StudentID"></label>
      <input type="text" name="StudentID" id="StudentID" value="<?php echo $rows['StudentID']?>"></td>
    </tr>
    <tr>
      <td align="right"><strong>班级：</strong></td>
      <td><label for="Class"></label>
      <input type="text" name="Class" id="Class" value="<?php echo $rows['Class']?>"></td>
    </tr>
    <tr>
      <td align="right"><strong>姓名：</strong></td>
      <td><label for="Name"></label>
      <input type="text" name="Name" id="Name" value="<?php echo $rows['Name']?>"></td>
    </tr>
    <tr>
      <td align="right"><strong>性别：</strong></td>
      <td><label for="Sex"></label>
      <input type="text" name="Sex" id="Sex" value="<?php echo $rows['Sex']?>"></td>
    </tr>
    <tr>
      <td align="right"><strong>专业：</strong></td>
      <td><label for="Major"></label>
      <input type="text" name="Major" id="Major" value="<?php echo $rows['Major']?>"></td>
    </tr>
    <tr>
      <td align="right"><strong>地区：</strong></td>
      <td><label for="District"></label>
      <input type="text" name="District" id="District" value="<?php echo $rows['District']?>"></td>
    </tr>
    <tr>
      <td align="right"><strong>密码：</strong></td>
      <td><label for="password"></label>
      <input type="text" name="password" id="password" value="******"></td>
    </tr>
    <tr>
      <td colspan="2" align="center" valign="middle"><input type="submit" name="button" id="button" value="修改">
      <input type="button" name="button2" id="button2" value="返回" onClick="Retrun()"></td>
    </tr>
  </table>
</form>
</body>
</html>