<?php
	//获得需要删除信息的编号
	$id=$_GET['id'];
	//echo $id;
	//连接数据库
	mysql_connect('localhost','root','') or die(mysql_error());
	mysql_select_db('tradingmall');
	mysql_query('set names gb2312');
	//拼接SQL语句
	$sql="delete from users where StudentID=$id";
	if(mysql_query($sql)){
		header('location:index.php');
		}else{
			die(mysql_error());
			}
?>