<?php
include 'DBManager.class.php';
class ServiceManager extends DBManager
{
    function __construct()
    {
        parent::__construct();
    }

    function add_Service($service)
    {
        $query = $this->getDb()->prepare("INSERT INTO services VALUES (DEFAULT,:title, :text, :picture)");
        $query->execute(array(
            'title'       =>     $service->gettitle(),
            'text'        =>     $service->gettext(),
            'picture'     =>     $service->getpicture(),
        ));
        $newID = $this->getDb()->lastInsertId();
        $query = $this->getDb()->prepare("SELECT * FROM services where (id=?);");
        $query->execute(array($newID));
        $data = $query->fetch(PDO::FETCH_ASSOC);
        $obj = $data;
        return $obj;
    }
    function edit_Service($service, $id)
    {
        $query = $this->getDb()->prepare("UPDATE services SET title=:title,text=:text,picture=:picture WHERE (id=$id);");
        $query->execute(array(
            'title'       =>     $service->gettitle(),
            'text'        =>     $service->gettext(),
            'picture'     =>     $service->getpicture(),

        ));
        $query = $this->getDb()->prepare("SELECT * FROM services where (id=?);");
        $query->execute(array($id));
        $data = $query->fetch(PDO::FETCH_ASSOC);
        $obj = $data;
        return $obj;
    }
    function delete_Service($id)
    {
        $query = $this->getDb()->prepare("DELETE FROM services WHERE (id=?);");
        $query->execute(array($id));
        if ($query->rowCount()) {
            $obj = "You have successfully deleted the entry.";
            return $obj;
        } else {
            $obj = "Deletion of data failed.Please try again";
            return $obj;
        }
    }

    function fetch_service()
    {
        $query = $this->getDb()->prepare("SELECT * FROM `services` order by ID DESC");
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        $obj = $data;
        return $obj;
    }
    function fetch_serviceById($id)
    {
        $query = $this->getDb()->prepare("SELECT * FROM `services` WHERE (id=?);");
        $query->execute(array($id));
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        $obj = $data;
        return $obj;
    }
}
