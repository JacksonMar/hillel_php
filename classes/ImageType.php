<?php

enum ImageType : string  // enum - константи у вигляді обʼєктів || тільки string + int
{
    case JPG = "jpg";  // case JPG = "jpg"; - задаємо обʼект у вигляді строки, шоб зручніше було
    case PNG = "png";
    case WEBP = "webp";
    case JPEG = "jpeg";

    public function testMethod() : void
    {
        echo "<br> current value : " . $this->value . "<br>";
        echo "<br>TEST<br>" . PHP_EOL;
    }

    public static function values() : array
    {
        $cases = self::cases(); // self - як this тільки в контексті классу. Теж саме шо і ImageType::cases().
//        $cases = $this->cases(); // повертає усі обʼєкти які є.
        $values = [];
        foreach ($cases as $case) {
            $values[] = $case->value; // $case->value - отримає "jpeg" "webp" "jpg"
        }
        return $values;
    }

    public static function getImageCreateFunction(string $currentFormat) : string // тут зберігаємо тимчасовий формат. Lesson 8 - 1 час 23 мин.
    {
        return match ($currentFormat){
            "png" => "imagecreatefrompng",
            "webp" => "imagecreatefromwebp",
            default=> "imagecreatefromjpeg"
        };
    }

    public static function getImageSaveFunction(string $newFormat) : string // зберігаємо зображення в новому форматі.
    {
        return match ($newFormat){
            "png" => "imagepng",
            "webp" => "imagewebp",
            default=> "imagejpeg"
        };
    }


}