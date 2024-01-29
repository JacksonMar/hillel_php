<?php


class Image
{
    private string $imagePath;
    private int $newWidth;
    private int $newHeight;
    private ImageType $newImageType; // тип enum

    public function __construct(string $imagePath)
    {
        // jpg, png, webp, jpeg
        $this->setImagePath($imagePath);
    }

    private function checkImageType($imagePath)
    {
        $imageType = $this->getCurrentExt($imagePath);
        $allowedTypes = ImageType::values(); // отримуєм усі обєкти з ImageType
        if (!in_array($imageType, $allowedTypes)) { // !in_array - якшо $imageType не в $allowedTypes то ... in_array - входить лі значення в масив.
            throw new Exception("Type not invalid.");
        }
    }

    public function resize(int $width, int $height) : void
    {
        $this->setNewWidth($width);
        $this->setNewHeight($height);
    }


    public function convert(ImageType $newImageType) : void
    {
        $this->setNewImageType($newImageType);
    }


    public function save(?string $newName = null)
    {
        // get current width and height
        [$oldWidth, $oldHeight] = getimagesize($this->getImagePath()); // записуємо зміннні $oldWidth, $oldHeight через
        // функцію getimagesize в яку передаємо шлях до файла.

        // get current extension
        $format = $this->getCurrentExt($this->getImagePath());

        // detekt new format
        $getNewImageFormat = $this->getNewImageType();
        $newFormat = isset($getNewImageFormat) ? $this->getNewImageType()->value : $format;
        // Знак питання ?в PHP — це тернарний оператор. Це скорочений спосіб написання if-elseзаяви.
        // Вираз перед двокрапкою обчислюється, і якщо він істинний, виконується ?вираз перед двокрапкою ;
        // :інакше виконується вираз після двокрапки.

        echo "<br>" . $newFormat . "<br>" . PHP_EOL;

        // detekt new width and height
        $newWidth = $this->getNewWidth() ?? $oldWidth;
        $newHeight = $this->getNewHeight() ?? $oldHeight;

        echo "<br>" . $newWidth, $newHeight ;


        $functionName = ImageType::getImageCreateFunction($format); // В $functionName буде GD обʼєкт.
        $functionSaveName = ImageType::getImageSaveFunction($newFormat); // викликаємо функцію та зерігаємо.
        $newImage = $functionName($this->getImagePath());

        $tmp = imagecreatetruecolor($newWidth, $newHeight); // imagecreatetruecolor - створюємо полотно для зображення.

        imagecopyresampled($tmp, $newImage, 0,0,0,0, $newWidth, $newHeight, $oldWidth, $oldHeight);  // imagecopyresampled - зеднуємо нове та старе зображення.
        // 0,0,0,0, - це сдвіг по осі. Та передаем новий розмір ($newWidth, $newHeight) та сторий розмір($oldWidth, $oldHeight).

        //$fileName = isset($newName) ? $newName . "." . $newFormat : $this->getImagePath(); //
        //  isset($newName) - якшо імʼя встановлено, то до імені додаємо "." та нове розширення.
        // Якшо нове імʼя НЕ встановленно то $this->getImagePath() то ми перезаписуємо стару кортинку.
        $fileName = $this->getNewName($newFormat, $newName); // змінили на цю фунцію.

        $functionSaveName($tmp, $fileName); // зберігаемо все шо нахімічили.

        imagedestroy($tmp); // imagedestroy - видаляємо з памʼяті зображення.

    }

    private function getNewName(string $newFormat, ?string $newName = null, ) : string
    {
        $fileName = $newName ?? pathinfo($this->getImagePath(), PATHINFO_FILENAME);

        return $fileName . "." . $newFormat;
    }



    private function getCurrentExt(string $imagePath): string // Виносимо в окремий метод достовання розширеня файла.
    {
        return pathinfo($imagePath, PATHINFO_EXTENSION);
    }


    /**
     * @param string $imagePath
     */
    public function setImagePath(string $imagePath): void
    {
        if (!file_exists($imagePath)) {
            throw new Exception("File not found.");
        }
        $this->checkImageType($imagePath); //

        $this->imagePath = $imagePath;
    }

    /**
     * @return string  // /** + enter - генерує комент до властивості.
     */
    public function getImagePath(): string
    {
        return $this->imagePath;
    }

    /**
     * @param int $newWidth
     */
    public function setNewWidth(int $newWidth): void
    {
        if ($newWidth <=0 ){
            throw new Exception("newWidth invalid <=0 ");
        }
        $this->newWidth = $newWidth;
    }

    /**
     * @return int
     */
    public function getNewWidth(): int|null
    {
        return $this->newWidth ?? null;
    }

    /**
     * @param int $newHeight
     */
    public function setNewHeight(int $newHeight): void
    {
        if ($newHeight <=0 ){
            throw new Exception("newHeight invalid <=0 ");
        }
        $this->newHeight = $newHeight;
    }

    /**
     * @return int
     */
    public function getNewHeight(): int|null
    {
        return $this->newHeight ?? null;
    }

    /**
     * @param ImageType $newImageType
     */
    public function setNewImageType(ImageType $newImageType): void
    {
        $this->newImageType = $newImageType;
    }

    /**
     * @return ImageType
     */
    public function getNewImageType(): ImageType|null
    {
        return $this->newImageType ?? null;
    }

}