<?php
define('G5_MYSQL_HOST', 'gawon2021.cafe24.com');
define('G5_MYSQL_USER', 'gawon2021');
define('G5_MYSQL_PASSWORD', 'korea8988@@');
define('G5_MYSQL_DB', 'gawon2021');
define('G5_MYSQL_SET_MODE', true);
define('G5_DATA_PATH', '');
define('G5_DBCONFIG_FILE',  'dbconfig.php');
define('G5_DOMAIN', 'C:\Apache24\gawon\data');
$dbChar = "utf8";
$dbName = G5_MYSQL_DB;
$host = G5_MYSQL_HOST;
$user = G5_MYSQL_USER;
$pass = G5_MYSQL_PASSWORD;

$dsn = "mysql:host={$host};dbname={$dbName};charset={$dbChar}";

$pdo = new PDO($dsn, $user, $pass);
// $sql = "SELECT * FROM test;";
// $sql = "INSERT INTO test (VALUE1, VALUE2, VALUE3) VALUES (1,2,3)";
$a = '"';    
$sql = "SELECT *
        INTO OUTFILE 'C:/Users/com/Desktop/test.csv'
        FIELDS TERMINATED BY ','
        ENCLOSED BY '$a'
        ESCAPED BY '\\'
        LINES TERMINATED BY '\n'
        FROM test";
$stmt = $pdo->prepare($sql);
$result = $stmt->execute();

// $row = $stmt->fetch();

// print_r($row);

if($result){
    echo "추출성공";
}

?>
