<!DOCTYPE html>
<html>
    <head>
        <meta charset = "UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Setting up...</h1>
        <?php
        require_once './dbconnection.php';

        //setup table User
        createTable("User", "uId INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    username VARCHAR(50),
                    password VARCHAR(50),
                    email VARCHAR(50),
                    image VARCHAR(200),
                    status CHAR(1),
                    INDEX(username(10))");
        echo "<br>";
        //setup table Coach
//        createTable("CoachList", "CoachId INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//        CoachName VARCHAR(50),
//        CoachEmail VARCHAR(50),
//        CoachPassword VARCHAR(50),
//        CoachAddress VARCHAR(50),
//        CoachPhone int,
//        CoachImage VARCHAR(500),
//        CoachInfor VARCHAR(50),
//        INDEX(CoachName(10))"
//        );
        echo "<br>";
        //setup table Class
        createTable("Course", "cId INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                cName VARCHAR(50),
                cDescription VARCHAR(200),
                cImage VARCHAR(200),
                cPrice INT,
                coach INT UNSIGNED,
                FOREIGN KEY (coach) REFERENCES User(uId),
                INDEX (cName(7))");
        echo "<br>";
        //setup table Student
//        createTable("Customer", "csId INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,"
//                . "csName VARCHAR(50),"
//                . "csEmail VARCHAR(50),"
//                . "csPassword VARCHAR(50),"
//                . "csDoB DATE,"
//                . "csPhone VARCHAR(15),"
//                . "csGender CHAR(1),"
//                . "csAddress VARCHAR(200),"
//                . "csImage VARCHAR(200),"
//                . "csClass INT UNSIGNED,"
//                . "FOREIGN KEY (csClass) REFERENCES Course(cId),"
//                . "INDEX(csName(10)),"
//                . "INDEX(csClass)");
//        echo "<br>";
        createTable("Customer", "csId INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,"
                . "csName VARCHAR(50),"
                . "csEmail VARCHAR(50),"
                . "csPassword VARCHAR(50),"
                . "csDoB DATE,"
                . "csPhone VARCHAR(15),"
                . "csGender CHAR(1),"
                . "csAddress VARCHAR(200),"
                . "csImage VARCHAR(200),"
                . "INDEX(csName(10))");
        echo "<br>";
        //setup table order
        createTable("cOrder", "orId INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            orDate DATE,
            orStatus CHAR(1),
            csId INT UNSIGNED,
            cId INT UNSIGNED,
            FOREIGN KEY (csId) REFERENCES Customer(csId),
            FOREIGN KEY (cId) REFERENCES Course(cId),
            INDEX(orId),
            INDEX(csId)
                ");
        echo "<br>";
        //Setting up one default user
        $username = "admin";
        $password = "pass";
        $email = "admin@gmail.com";
        $image = "";
        $status = '1';
        if (addUser($username, $password, $email, $image, $status)) {
            echo "Added user $username, please change the password";
        } else {
            echo "User already exists";
        }
        $username = "admin2";
        $password = "pass2";
        $email = "admin2@gmail.com";
        $image = "";
        $status = '1';
        if (addUser($username, $password, $email, $image, $status)) {
            echo "Added user $username, please change the password";
        } else {
            echo "User already exists";
        }
        ?>
        <h1>...done!</h1>       
    </body>
</html>