<?php
include 'DBManager.class.php';
class TeamManager extends DBManager
{
    function __construct()
    {
        parent::__construct();
    }

    function add_Team($team)
    {
        $query = $this->getDb()->prepare("INSERT INTO team VALUES (DEFAULT,:name, :title, :shortBio,:picture)");
        $query->execute(array(
            'name'        =>     $team->getname(),
            'title'       =>     $team->gettitle(),
            'shortBio'    =>     $team->getshortBio(),
            'picture'     =>     $team->getpicture(),
        ));
        $newID = $this->getDb()->lastInsertId();
        $query = $this->getDb()->prepare("SELECT * FROM team where (id=?);");
        $query->execute(array($newID));
        $data = $query->fetch(PDO::FETCH_ASSOC);
        $obj = $data;
        return $obj;
    }
    function edit_Team($team, $id)
    {
        $query = $this->getDb()->prepare("UPDATE team SET name=:name, title=:title, shortBio=:shortBio, picture=:picture WHERE (id=$id);");
        $query->execute(array(
            'name'        =>     $team->getname(),
            'title'       =>     $team->gettitle(),
            'shortBio'    =>     $team->getshortBio(),
            'picture'     =>     $team->getpicture(),

        ));
        $query = $this->getDb()->prepare("SELECT * FROM team where (id=?);");
        $query->execute(array($id));
        $data = $query->fetch(PDO::FETCH_ASSOC);
        $obj = $data;
        return $obj;
    }
    function delete_Team($id)
    {
        $query = $this->getDb()->prepare("DELETE FROM team WHERE (id=?);");
        $query->execute(array($id));
        if ($query->rowCount()) {
            $obj = "You have successfully deleted the entry.";
            return $obj;
        } else {
            $obj = "Deletion of data failed.Please try again";
            return $obj;
        }
    }

    function fetch_Team()
    {
        $query = $this->getDb()->prepare("SELECT * FROM `team` order by ID DESC");
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        $obj = $data;
        return $obj;
    }
}
