<?php


define("APP_DIR", __DIR__ . "/");

function generatorFetch(PDOStatement $stmt) // робимо генератор для читання з бази
{
    while ($user = $stmt->fetch(PDO::FETCH_OBJ)){
        yield $user;
    }
}


try {
    $dsn = "mysql:host=mysql;port=3306;dbname=hillel;charset=utf8mb4";
    $database = new PDO($dsn, "root", "root");
    $sql = "INSERT INTO `users` (username, email, password) VALUES ('alice', 'alice2@example.com', 'password')";
    $sql2 = "SELECT * FROM `users`";
//    $database->query($sql);  // query - базове виконаня SQL запиту
    $stmt = $database->query($sql2);
    echo "<pre>";
//    print_r($stmt->fetchAll()); // fetchAll - виводе результат
//    print_r($stmt->fetchAll(PDO::FETCH_OBJ)); //PDO::FETCH_OBJ - результат у вигляді обʼєктів.
//    print_r($stmt->fetch(PDO::FETCH_OBJ)); // fetch - більш оптимізований та видає 1 рядок. Як ітератор.
//    echo "</pre>";
    foreach (generatorFetch($stmt) as $user){
        echo "<pre>";
        print_r($user);
        echo "</pre>";
    }
//    var_dump($database);

    $id = "";
    $username = "";
    $email = "alice2@example.com";
    $password = "7654321";
    $sql3 = "SELECT * FROM `users` WHERE `email` = ?";

    $stmt = $database->prepare($sql3); // Prepare - команда на підготовку запита
    $stmt->execute([$email]);  // execute[параметри по черзі] - команда на виконаня запита.
    print_r($stmt->fetch());


//    $sql4 = "INSERT INTO `users` (username, email, password)
//                VALUES (:username, :email, :password)";
//    $stmt = $database->prepare($sql4); // Prepare - команда на підготовку запита
//    $stmt->execute([
//        "email" => "test@test.com",
//        "username" => "Tester",
//        "password" => "1234567"
//    ]);  // execute[параметри по черзі] - команда на виконаня запита.
//    print_r($stmt->fetch());


    $username = "Testing_php";
    $email = "test@example.com";
    $password = "Test_pass";
    $sql5 = "INSERT INTO `users` (username, email, password) 
                VALUES (:username, :email, :password)";
    $stmt = $database->prepare($sql5); // Prepare - команда на підготовку запита
    $stmt->bindParam("email",$email );
    $stmt->bindParam("username",$username );
    $stmt->bindParam("password",$password );
    $stmt->execute();
    print_r($stmt->fetch());


}catch (PDOException $exception){
    echo $exception->getMessage();

}


