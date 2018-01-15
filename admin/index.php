<!doctype html>
<html>
<head>
<meta charset="gb2312">
<title>后台管理系统</title>

</head>
<body>
<script type="text/javascript">
function Confirm(id){
	if(confirm('确定要删除此信息吗'))
	{
		location.href='delete.php?id='+id}
	}
</script>
<?php
	//连接数据库
	mysql_connect('127.0.0.1','root','') or die (mysql_error()); //显示错误信息
	mysql_select_db('tradingmall'); //选择数据库
	mysql_query('set names gb2312'); //设置客户端字符编码
	$record=mysql_query('select * from users limit 100');
?>
    <a href="add.php">添加信息</a>
    
 <?php
	
	//定义页面大小
	$pagesize=50;
	
	//求总记录数
	$record=mysql_query('select count(*) from users');
	$rows=mysql_fetch_row($record); //将资源匹配成索引数组
	$recordcount=$rows[0];	//总记录数
	//echo $recordcount;
	
	//求总页数
	$pagecount=ceil($recordcount/$pagesize);//向上取整
	//echo $pagecount;
	
	//获得传递的当前页码
	$pageno=isset($_GET['pageno'])?$_GET['pageno']:1;
	if($pageno<1){$pageno=1;}
	if($pageno>$pagecount){$pageno=$pagecount;}
	//echo $pageno;
	
	//求当前页的起始位置
	$startno=($pageno-1)*$pagesize;
	
	//获取当前页面的内容
	$sql="select * from users limit $startno,$pagesize";
	$record=mysql_query($sql);
	
?>
    
<form name="form1" method="post" action="">
<table width="980" border="#000" align="center";>
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
        echo '<td><input type="button" value="修改" onClick="location.href=\'modify.php?id='.$rows['StudentID'].'\'"/></td>';
        echo '<td><input type="button" value="删除" onClick="Confirm('.$rows['StudentID'].')"/></td>';
        echo '</tr>';
     }
 ?>
</table>
</form>
	<p>&nbsp;</p>
    
<!--循环输出页码-->
<table width="580" border="#000" align="center";>
<tr>
	<td align="right">
    【<a href="?pageno=1">首页</a>】
    【<a href="?pageno=<?php echo $pageno-1?>">上一页</a>】
    </td>
	<td width="17">
    <?php
    for($i=$pageno;$i<=$pageno+10;$i++)
	{
		echo '<a href="pagination.php?pageno='.$i.'">'.$i.'</a>&nbsp;';
		}
	?>
    </td>
    <td align="left">    
    【<a href="?pageno=<?php echo $pageno+1?>">下一页</a>】
    【<a href="?pageno=<?php echo $pagecount?>">末页</a>】
    </td>
</tr>
</table>

    
</body>
</html>