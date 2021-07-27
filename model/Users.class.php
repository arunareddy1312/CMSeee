<?php
class Users
{

    private $title;
    private $text;
    private $picture;

    /**
     * Create a new user upon construction
     * @param [String] $name
     * @param [String] $avatar
     * @param [String] $message
     */
    function __construct($service)
    {
        $this->title = $service['title'];
        $this->text = $service['text'];
        $this->picture = $service['picture'];
    }


    /**
     * @return mixed
     */
    public function gettitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $username
     * @return self
     */
    public function settitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return mixed
     */
    public function gettext()
    {
        return $this->text;
    }

    /**
     * @param mixed $avatar
     * @return self
     */
    public function settext($text)
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getpicture()
    {
        return $this->picture;
    }

    /**
     * @param mixed $title
     * @return self
     */
    public function setpicture($picture)
    {
        $this->picture = $picture;
        return $this;
    }
}
