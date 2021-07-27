<?php
class Portfolio
{

    private $title;
    private $text;


    /**
     * Create a new user upon construction
     * @param [String] $name
     * @param [String] $avatar
     * @param [String] $message
     */
    function __construct($portfolio)
    {
        $this->title = $portfolio['title'];
        $this->text = $portfolio['text'];
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
}
