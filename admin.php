<!doctype html>
<html>
<head>
<meta charset="gb2312">
<title>��̨����ϵͳ��½ҳ��</title>
</head>

<body>

<?php
if(isset($_POST['button']))
{
	//�û�������û���������
	$StudentID=$_POST['StudentID'];
	$password=$_POST['password'];
	
	//�������ݿ�
	mysql_connect('127.0.0.1','root','') or die (mysql_error()); //��ʾ������Ϣ
	mysql_select_db('tradingmall'); //ѡ�����ݿ�
	mysql_query('set names gb2312'); //���ÿͻ����ַ�����
	$sql="select * from users where StudentID='$StudentID' and password='$password'";
	$record=mysql_query($sql);
	//var_dump($record); �������
	//��ȡ������ļ�¼���������¼��Ϊ1����¼�ɹ�
	if(mysql_num_rows($record))
	{
		//echo '��¼�ɹ�';
		//��¼�ɹ�����ת����ҳ��php��header('location:url��ַ')����ת
		header('location:admin/index.php');
		}else{
			echo '��¼ʧ��';
			}
}
?>

    <form name="form1" method="post" action="">
      <table width="500" border="1" align="center">
        <tr>
          <td colspan="2"><div align="center">��¼��̨����ϵͳ</div></td>
        </tr>
        <tr>
          <td width="166"><div align="right">ѧ�ţ�</div></td>
          <td width="318"><label for="StudentID"></label>
          <input type="text" name="StudentID" id="StudentID"></td>
        </tr>
        <tr>
          <td><div align="right">���룺</div></td>
          <td><label for="password"></label>
            <label for="textfield4"></label>
            <input name="password" type="password" id="textfield4" maxlength="16">
            <label for="textfield3"></label></td>
        </tr>
        <tr>
          <td colspan="2"><div align="center">
            <input name="button" type="submit" id="button" value="��¼">
          </div></td>
        </tr>
      </table>
    </form>
</body>
</html>