<!doctype html>
<html>
<head>
<meta charset="gb2312">
<title>��̨����ϵͳ</title>

</head>
<body>
<script type="text/javascript">
function Confirm(id){
	if(confirm('ȷ��Ҫɾ������Ϣ��'))
	{
		location.href='delete.php?id='+id}
	}
</script>
<?php
	//�������ݿ�
	mysql_connect('127.0.0.1','root','') or die (mysql_error()); //��ʾ������Ϣ
	mysql_select_db('tradingmall'); //ѡ�����ݿ�
	mysql_query('set names gb2312'); //���ÿͻ����ַ�����
	$record=mysql_query('select * from users limit 100');
?>
    <a href="add.php">�����Ϣ</a>
    
 <?php
	
	//����ҳ���С
	$pagesize=50;
	
	//���ܼ�¼��
	$record=mysql_query('select count(*) from users');
	$rows=mysql_fetch_row($record); //����Դƥ�����������
	$recordcount=$rows[0];	//�ܼ�¼��
	//echo $recordcount;
	
	//����ҳ��
	$pagecount=ceil($recordcount/$pagesize);//����ȡ��
	//echo $pagecount;
	
	//��ô��ݵĵ�ǰҳ��
	$pageno=isset($_GET['pageno'])?$_GET['pageno']:1;
	if($pageno<1){$pageno=1;}
	if($pageno>$pagecount){$pageno=$pagecount;}
	//echo $pageno;
	
	//��ǰҳ����ʼλ��
	$startno=($pageno-1)*$pagesize;
	
	//��ȡ��ǰҳ�������
	$sql="select * from users limit $startno,$pagesize";
	$record=mysql_query($sql);
	
?>
    
<form name="form1" method="post" action="">
<table width="980" border="#000" align="center";>
<tr>
    <th width="228" align="center" valign="middle">ѧԺ</th>
    <th width="156" align="center" valign="middle">ѧ��</th>
    <th width="104" align="center" valign="middle">�༶</th>
    <th width="80" align="center" valign="middle">����</th>
    <th width="79" align="center" valign="middle">�Ա�</th>
    <th width="210" align="center" valign="middle">רҵ</th>
    <th width="77" align="center" valign="middle">����</th>
</tr>
 <?php
    //ѭ��ƥ��ɹ�������
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
        echo '<td><input type="button" value="�޸�" onClick="location.href=\'modify.php?id='.$rows['StudentID'].'\'"/></td>';
        echo '<td><input type="button" value="ɾ��" onClick="Confirm('.$rows['StudentID'].')"/></td>';
        echo '</tr>';
     }
 ?>
</table>
</form>
	<p>&nbsp;</p>
    
<!--ѭ�����ҳ��-->
<table width="580" border="#000" align="center";>
<tr>
	<td align="right">
    ��<a href="?pageno=1">��ҳ</a>��
    ��<a href="?pageno=<?php echo $pageno-1?>">��һҳ</a>��
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
    ��<a href="?pageno=<?php echo $pageno+1?>">��һҳ</a>��
    ��<a href="?pageno=<?php echo $pagecount?>">ĩҳ</a>��
    </td>
</tr>
</table>

    
</body>
</html>