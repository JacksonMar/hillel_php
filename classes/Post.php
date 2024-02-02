<?php

abstract class Post // extends GeneralPost
//    abstract - це визначає абстрактний клас. Від абстрактного класу не можно викликати обʼєкти.
{
    private string $title;

    private string $content;

    private string $type = 'post';

    public function __construct(string $title, string $content)
    {
        $this->setTitle($title);
        $this->setContent($content);
    }

    /**
     * @param string $content
     */
    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public abstract function getInfo(): string;  // abstract - обозначає абстрактний метод, його можно не реалізовувати.
}