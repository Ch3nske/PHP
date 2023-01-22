<?php
CRUD_Class::Delete();

class CRUD_Class{
    public static function OpenConnection(){
        $user = 'root';
        $password = "root";
        $server = "localhost:3308";
        $database = "crud";
        $conn = mysqli_connect($server, $user, $password, $database);
        if ($conn ==false){
            echo ("Connection error");
            mysqli_connect_error();
        }else{
            echo ("Connection complete");
        }
    }
    public static function Read(){
        /*Функция для получения лейблов*/
        $user = 'root';
        $password = "root";
        $server = "localhost:3308";
        $database = "crud";
        $conn = mysqli_connect($server, $user, $password, $database);
        if ($conn ==false){
            echo ("Connection error");
            mysqli_connect_error();
        }else{
            echo ("Connection complete");
        }
        $read = "Select * from user";
        $result =  $conn-> query($read);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "\nid: " . $row["UID"]. " - Name: " . $row["UName"]. " - Label:  " . $row["label"]. "\n";
            }
        } else {
            echo "0 results";
        }
        $conn->close();
    }
    public static function Update(){
        /*Метод перезаписи лейблов*/
        $user = 'root';
        $password = "root";
        $server = "localhost:3308";
        $database = "crud";
        $conn = mysqli_connect($server, $user, $password, $database);
        if ($conn ==false){
            echo ("Connection error");
            mysqli_connect_error();
        }else{
            echo ("Connection complete");
        }

        $label = "label6";
        $uid = "6";

        $read = "Select * from user where UID = '$uid' && label = '$label'";
        $result =  $conn-> query($read);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "\nid: " . $row["UID"]. ".  Name: " . $row["UName"]. ".  Label:  " . $row["label"]. "\n";
                echo "Идет очистка лейблов с сущности:";
                $update = "update user set label = null where label = '$label'";
                if ($update == false){
                    echo "Ошибка метода перезаписи лейблов";
                }
                $conn -> query($update);
            }
        } else {
            $insert = "insert into labels values ('$uid','$label')";
            $conn -> query($insert);
            echo "\n Данных не было в базе, добавляю их.";
        }
        $conn->close();
    }
    public static function Insert(){
        /*Метод добавления лейблов*/
        $user = 'root';
        $password = "root";
        $server = "localhost:3308";
        $database = "crud";
        $conn = mysqli_connect($server, $user, $password, $database);
        if ($conn ==false){
            echo ("Connection error");
            mysqli_connect_error();
        }else{
            echo ("Connection complete");
        }
        $ins = 'label2';
        $read = "Select * from user where label = '$ins'";
        $result =  $conn-> query($read);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "\nid: " . $row["UID"]. ".  Name: " . $row["UName"]. ".  Label:  " . $row["label"]. "\n";
                $insTo = 'label1';
                $update = "update user set label = '$insTo' where label='$ins'";
                if ($update == false){
                    echo "Ошибка метода добавления лейблов";
                }
                $conn -> query($update);
            }
        } else {
            echo "\n Error";
        }
        $conn->close();
    }
    public static function Delete(){
        /*Метод удаления лейблов*/
        $user = 'root';
        $password = "root";
        $server = "localhost:3308";
        $database = "crud";
        $conn = mysqli_connect($server, $user, $password, $database);
        if ($conn ==false){
            echo ("Connection error");
            mysqli_connect_error();
        }else{
            echo ("Connection complete");
        }
        $del = 'label2';
        $read = "Select * from user where label = '$del'";
        $result =  $conn-> query($read);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "\nid: " . $row["UID"]. ".  Name: " . $row["UName"]. ".  Label:  " . $row["label"]. "\n";
                $delete = "update user set label = null where label = '$del'";
                if ($delete == false){
                    echo "Ошибка метода добавления лейблов";
                }
                $conn -> query($delete);
            }
        } else {
            echo "\n Error";
        }
        $conn->close();
    }
}
