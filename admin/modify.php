<!doctype html>
<html>
<head>
<meta charset="gb2312">
<title>�޸���Ϣ</title>
<script type="text/javascript">
	//������һ��ҳ��
	function Retrun()
	{
		location.href='index.php';
	}
	//�ύ��֮ǰ����Ƿ�Ϸ�
	function Check()
	{
		//����궨λ�ڲ��Ϸ���λ��
		var Focus=document.getElementById('StudentID');
		if(Focus.value==''){
			alert('ѧ�Ų���Ϊ��');
			Focus.focus();//��ù�꽹��
			return false;
			}
		//���ѡ�в��Ϸ����ַ�
		var Focus=document.getElementById('StudentID');
		if(isNaN(Focus.value)||Focus.value.indexOf('.')!=-1){//NaNӢ��ȫ��ΪNot A Number��indexOf�ж��Ƿ��и��ַ�
			alert('ѧ��Ϊ������');
			Focus.select();//ѡ��
			return false;
			}
		}
</script>
</head>
<body>

<?php
	//��ȡ��Ҫ�޸���Ϣ�ı��
	$id=$_GET['id']; 
	//echo $id;
	//�������ݿ�
	mysql_connect('localhost','root','') or die(mysql_error());
	mysql_select_db('tradingmall');
	mysql_query('set names gb2312');
	
	//�޸���Ϣ
	if(isset($_POST['button']))
	{
		//��ȡ�ύ������
		$College=$_POST['College'];
		$StudentID=$_POST['StudentID'];
		$Class=$_POST['Class'];
		$Name=$_POST['Name'];
		$Sex=$_POST['Sex'];
		$Major=$_POST['Major'];
		$District=$_POST['District'];
		
		//ƴ��SQL���
		$sql="update users set College='$College',StudentID='$id',Class='$Class',Name='$Name',Sex='$Sex',Major='$Major',District='$District',password='NULL' where StudentID=$id";
		//echo $sql,'<br/>',var_dump(mysql_query($sql));
		if(mysql_query($sql))
		{
			header('location:index.php');
			}else{
					echo '�޸�ʧ��';
					exit();
				}
	}
				
	//��ȡID��Ӧ����Ϣ
	$sql="select * from users where StudentID=$id";
	//echo $sql;
	$record=mysql_query($sql);
	//echo $sql,'<br/>',var_dump(mysql_query($sql));
	$rows=mysql_fetch_assoc($record); //��Ϊ��һ�����ݣ�����Ҫѭ��
	
?>

<form name="form1" method="post" action="" onSubmit="return Check()">
  <table width="249" border="1" align="center">
    <tr>
      <td colspan="2" align="center"><h1>�޸���Ϣ</h1></td>
    </tr>
    <tr>
      <td width="69" align="right"><strong>ѧԺ��</strong></td>
      <td width="168"><label for="College"></label>
      <input type="text" name="College" id="College" value="<?php echo $rows['College']?>"></td>
    </tr>
    <tr>
      <td align="right"><strong>ѧ�ţ�</strong></td>
      <td><label for="StudentID"></label>
      <input type="text" name="StudentID" id="StudentID" value="<?php echo $rows['StudentID']?>"></td>
    </tr>
    <tr>
      <td align="right"><strong>�༶��</strong></td>
      <td><label for="Class"></label>
      <input type="text" name="Class" id="Class" value="<?php echo $rows['Class']?>"></td>
    </tr>
    <tr>
      <td align="right"><strong>������</strong></td>
      <td><label for="Name"></label>
      <input type="text" name="Name" id="Name" value="<?php echo $rows['Name']?>"></td>
    </tr>
    <tr>
      <td align="right"><strong>�Ա�</strong></td>
      <td><label for="Sex"></label>
      <input type="text" name="Sex" id="Sex" value="<?php echo $rows['Sex']?>"></td>
    </tr>
    <tr>
      <td align="right"><strong>רҵ��</strong></td>
      <td><label for="Major"></label>
      <input type="text" name="Major" id="Major" value="<?php echo $rows['Major']?>"></td>
    </tr>
    <tr>
      <td align="right"><strong>������</strong></td>
      <td><label for="District"></label>
      <input type="text" name="District" id="District" value="<?php echo $rows['District']?>"></td>
    </tr>
    <tr>
      <td align="right"><strong>���룺</strong></td>
      <td><label for="password"></label>
      <input type="text" name="password" id="password" value="******"></td>
    </tr>
    <tr>
      <td colspan="2" align="center" valign="middle"><input type="submit" name="button" id="button" value="�޸�">
      <input type="button" name="button2" id="button2" value="����" onClick="Retrun()"></td>
    </tr>
  </table>
</form>
</body>
</html>