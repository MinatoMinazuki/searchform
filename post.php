<?php

$dsn = 'mysql:dbname=sousaku;host=localhost;charset=utf8';
$user='root';
$pass='root';

$dbh=new PDO($dsn,$user,$pass);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$searchName=$_POST['search_name'];

$sql=sprintf("SELECT * FROM select_car_style WHERE car_name like '%%%s%%'",$searchName);
$rec = $dbh->prepare($sql);
$rec->execute();
$result = $rec->fetchAll(PDO::FETCH_ASSOC);

var_dump($result);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>検索フォーム</title>
</head>
<body>
    <div>
        <form action="post.php" method="POST">
            <input type="text" name="search_name" value="<?php if(!empty($searchName)){echo $searchName;} ?>">
            <input type="submit" name="search" value="検索">
        </form>
    </div>
    <div>
        <table>
            <tr></tr>
        </table>
    </div>
</body>
</html>