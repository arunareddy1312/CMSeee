<?php
class Team
{


    private $name;
    private $title;
    private $shortBio;
    private $picture;

    /**
     * Create a new user upon construction
     * @param [String] $name
     * @param [String] $avatar
     * @param [String] $message
     */
    function __construct($team)
    {
        $this->name = $team['name'];
        $this->title = $team['title'];
        $this->shortBio = $team['shortBio'];
        $this->picture = $team['picture'];
    }


    /**
     * @return mixed
     */
    public function getname()
    {
        return $this->name;
    }

    /**
     * @param mixed $username
     * @return self
     */
    public function setname($name)
    {
        $this->name = $name;
        return $this;
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
    public function getshortBio()
    {
        return $this->shortBio;
    }

    /**
     * @param mixed $avatar
     * @return self
     */
    public function setshortBio($shortBio)
    {
        $this->shortBio = $shortBio;
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
