<?php
$con = mysqli_connect("localhost","root","");
$firstname= $_POST['names'];
$contect =$_POST["contect"];
if(empty($firstname) || empty($contect)){
    echo "树洞想听点东西(写点什么吧)";
    header("content-type:text/html;charset=utf-8");
    echo "<script language='javascript'>;";
    echo "alert('内容不能为空！');";
    echo "</script>";
}else{

date_default_timezone_set("Asia/Shanghai");
$day= date("Y/m/d") ."       ". date("h:ia");
$sql='create databaes my_db';
mysqli_query($con,$sql);

mysqli_select_db( $con,"my_db");
mysqli_query($con,"create table ban(
firstname VARCHAR (15),
CONNECT VARCHAR (500),
times VARCHAR (30)
)");
$ins="insert into ban(firstname,CONNECT,times)
    values('$firstname','$contect','$day')";


if(!mysqli_query($con,$ins)){
            echo "树洞还没打开";
        }else{
            echo "树洞听见了";
        };
        $res=mysqli_query($con,"select * from ban");
WHILE($row=mysqli_fetch_array($res)) {

    echo "藏入时间是" . $row['times'];
    echo "<br />";
    echo "标题:" . $row['firstname'];
    echo "<br />";
    echo "秘密:" . $row['CONNECT'];
    echo "<br />";
    echo "<br />";
}
}; ?>

<html>
<form action="reg.php" method="post">
    标题:<input type="text" name="names"/><br><br>
    还想说更多?<textarea name="contect" rows="3" maxlength="500" >

</textarea>
    <br>
    <input type="submit" name="submit" value="提交"/>


</form>

</html>










