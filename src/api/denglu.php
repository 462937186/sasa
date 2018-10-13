<?php
    $Yname =isset($_POST['Yname'])? $_POST['Yname']:"";
    $mima =isset($_POST['mima'])? $_POST['mima']:"";
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = 'h5-1806';
    
    // 1.创建连接,生成了conn对象
    $conn = new mysqli($servername, $username, $password, $dbname);
    // 2.0 查询前设置编码，防止输出乱码
    $conn->set_charset('utf8');
   //遍历拿到的表，是否用户名和密码符合
    $result = $conn->query('select * from zucebiao');
    
    $userlist = $result->fetch_all(MYSQLI_ASSOC);
    // var_dump($userlist);
    foreach ($userlist as  $item) {
        if($item['uname'] ==$Yname){
           echo $item['password']==$mima?  $Yname : "flase";
        }
    }  
    // 4.拿到查询结果集数据，关闭查询结果集
    $result->close();
    //5.关闭与数据库的连接
    $conn->close();



?>