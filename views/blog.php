<?php

include "../functions.php";

$blogs = [
["title" => "Blog 1", "content" => "My first blog"],
["title" => "Blog 2", "content" => "My first blog"],
["title" => "Blog 3", "content" => "My first blog"]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Мій перший HTML-документ</title>
</head>
<body>
<br>
<h2>BLOG.PHP</h2><br>
    <?php if($blogs)
        foreach ($blogs as $blog){
            echo getTemplate("views/blog_html.php", ["title" => $blog["title"], "content" => $blog["content"]]);
        }
        ?>


</body>
</html>
