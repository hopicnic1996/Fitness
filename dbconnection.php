<?php
$dbhost = "localhost";
$dbport = 3306;
$dbuser = "root";
$dbpassword = "";
$dbname = "fitness";
$salt1 = "qm&h*";
$salt2 = "!@#$%";
//Connect to the DB
$connection = new mysqli($dbhost, $dbuser, $dbpassword, $dbname, $dbport);
if ($connection->connect_error) {
    die ($connection->connect_error);
}
//else{
//    echo 'connected';
//}

//this is used to execute all SQL queries
function queryMysql($query) {
    global $connection;
    $result = $connection->query($query);
    if (!$result) {
        die ($connection->error);
    }
    return $result;
}

//this is used to create table
function createTable($name, $body){
    $str = "CREATE TABLE IF NOT EXISTS $name($body)";
    queryMysql($str);
    echo "Table $name is created or already exists";
}

//this is for security purpose
function sanitizeString($str) {
    global $connection;
    $str = strip_tags($str); //remove html tags
    $str = htmlentities($str); //encode html (for special characters)
    if (get_magic_quotes_gpc()){
        $str = stripslashes($str); //Don't use the magic quotes
    }
    //Avoid MYSQL Injection
    $str = $connection->real_escape_string($str);
    return $str;
}

function destroySession() {
    $_SESSION = array();
    if (session_id() != "" || isset($_COOKIE[session_name()])){
        setcookie(session_name(), '', time(),"/");
    }
    session_destroy();
}

//Convert password into encrypted form
function passwordToToken($password){
    global $salt1;
    global $salt2;
    $token = hash ("ripemd128", "$salt1$password$salt2");
    return $token;
}

//Add user to the database
function addUser($username, $password, $email, $image, $status){
    //Setup one default user
    $result = queryMysql("SELECT * FROM User where username='$email'");
    $row = mysqli_fetch_assoc($result);
    if (!$row) { //user doesn't exist
        //Add a default user
        $token = passwordToToken($password);
        $query = "INSERT INTO User(username, password, email, status) VALUES('$username', '$token', '$email', '$status')";
        queryMysql($query);
        return 1; //added
    }else {
        return 0; //not added
    }
}
//<?php
//$hostname = 'localhost';
//$username = 'root';
//$password = 'root';
//$dbname = 'webadass2';
//$port = 8889;
//    $conn = new mysqli($hostname, $username, $password, $dbname, $port);
//    if ($conn->connect_error){
//        die("connection failed: " . $conn->connect_error);
//    }
//    
//    function hashAndSalt($password){
//    return hash("sha256", "mysalt123" . $password . "salt321");
//}
//
//function fetch_all_assoc($sql){
//    $result = $this->conn->query($sql);
//
//    if(!$result){
//            die($this->conn->error);
//    }
//    return mysqli_fetch_all($result, MYSQLI_ASSOC);
//}
//
//function fetch_all_num($sql){
//    $result = $this->conn->query($sql);
//
//    if(!$result){
//            die($this->conn->error);
//    }
//    return mysqli_fetch_all($result, MYSQLI_NUM);
//}
//
//function exec_query($sql){
//    $result = $this->conn->query($sql);
//    if(!$result){
//            die($this->conn->error);
//    }
//    return $result;
//}
//?>