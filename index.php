<?php


define("APP_DIR", __DIR__ . "/");

echo APP_DIR . PHP_EOL;


echo "<br>" . 1 . "<br>";
echo 2 . "<br>";
echo 3 . "<br>";

for ($i = 1; $i <= 3; $i ++){
    flush();                         // flush - очищає буфер та виводить данні. Викидує все шо є на даний момент.
    echo "Step " . $i . "<br>";
    sleep(1);               // чекає 0.5 сек

}
echo "Finished" . "<br>";

ob_start(); // ob_start - початок буферізацій. Буферізачія почалась .

echo "<h2>Hello world<h2> <br>";


//ob_get_clean(); // повертає буферізацію виводу і ЗУПИНЯЄ буферізацію
//ob_end_clean(); // зупиняє буферізацію і видяляє все що є в буфері.
//ob_get_contents(); // повертає все що є в буфері без його очистки.
//ob_flush(); // відправляє в буфер клієнта.

//$content = ob_get_clean(); // нічого не виведется
//$content = ob_end_clean(); // нічого не виводить но весь контент зберігаєтся в змінній $content.


$blogs = [
    ["title" => "Blog 1", "content" => "My first blog 1"],
    ["title" => "Blog 2", "content" => "My first blog 2"],
    ["title" => "Blog 3", "content" => "My first blog 3"]
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
    <?php if ($blogs) {
        foreach ($blogs as $blog) {
            $title = $blog["title"];
            $content = $blog["content"];
            include APP_DIR . "views/blog_html.php";
        }
    }
    ?>

</body>
</html>

<?php

