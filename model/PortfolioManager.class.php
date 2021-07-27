<?php
include 'DBManager.class.php';
class PortfolioManager extends DBManager
{
    function __construct()
    {
        parent::__construct();
    }

    function add_Portfolio($portfolio)
    {
        $query = $this->getDb()->prepare("INSERT INTO portfolio VALUES (DEFAULT,:title, :text)");
        $query->execute(array(
            'title'       =>     $portfolio->gettitle(),
            'text'        =>     $portfolio->gettext(),

        ));
        $newID = $this->getDb()->lastInsertId();
        $query = $this->getDb()->prepare("SELECT * FROM portfolio where (id=?);");
        $query->execute(array($newID));
        $data = $query->fetch(PDO::FETCH_ASSOC);
        $obj = $data;
        return $obj;
    }
    function edit_Portfolio($portfolio, $id)
    {
        $query = $this->getDb()->prepare("UPDATE portfolio SET title=:title,text=:text WHERE (id=$id);");
        $query->execute(array(
            'title'       =>     $portfolio->gettitle(),
            'text'        =>     $portfolio->gettext(),


        ));
        $query = $this->getDb()->prepare("SELECT * FROM portfolio where (id=?);");
        $query->execute(array($id));
        $data = $query->fetch(PDO::FETCH_ASSOC);
        $obj = $data;
        return $obj;
    }
    function delete_Portfolio($id)
    {
        $query = $this->getDb()->prepare("DELETE FROM portfolio WHERE (id=?);");
        $query->execute(array($id));
        if ($query->rowCount()) {
            $obj = "You have successfully deleted the entry.";
            return $obj;
        } else {
            $obj = "Deletion of data failed.Please try again";
            return $obj;
        }
    }

    function fetch_Portfolio()
    {
        $query = $this->getDb()->prepare("SELECT * FROM `portfolio` order by ID DESC");
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        $obj = $data;
        return $obj;
    }
}
