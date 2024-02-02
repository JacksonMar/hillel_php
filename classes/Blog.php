<?php

final class Blog extends Post   // клас Blog наслідуєтся від Post. Post - батьківський клас.
// final class Blog extends Post - final забороняє наслідування від класу Blog.
// Також за допамогою final можно заборонити окремі методи.
{
    private string $type = 'blog';

    /**
     * @return string
     */
    #[\Override] public function getInfo(): string
    {
        $title = $this->getTitle();
        $content = $this->getContent();
        return parent::getType() . "<p>$content</p>";  // parent::getType() - викликаємо метод в батьківському класі.
    }
}