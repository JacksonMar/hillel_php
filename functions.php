<?php

require "index.php";
function logger(string $content, string $type = "alert")
{
    $date =  date("Y-m-d H:i:s");  // date - повертає дату з сервера
    $content = "[$date][$type][$content]\n";
    $result =  file_put_contents("./logs/log.txt", $content, FILE_APPEND);

    if ($result){
        return false;
    }

}

function getTemplate(string $path, array $variables = [])
{
    $filePath = APP_DIR . $path;
    if (!file_exists($filePath)){
        // todo return error;
        throw new Exception("File error");
    }
    if ($variables){
        extract($variables);
    }
    ob_start();
    require $filePath;
    return ob_get_clean();
}

function showPost(Post $post) : void
{
    echo $post->getInfo();
}