<?php
require_once("./model/Services.class.php");
require_once("./model/ServiceManager.class.php");
class ServicesController
{

    function addServicesToDb()
    {
        $title = $_POST['title'];
        $text = $_POST['text'];
        $picture = $_POST['icon'];
        $serviceObject = array();
        $serviceObject['title'] = $title;
        $serviceObject['text'] = $text;
        $serviceObject['picture'] = $picture;
        $services = new Services($serviceObject);
        $servicemanager = new ServiceManager();
        $data = $servicemanager->add_Service($services);
        echo json_encode($data);
    }

    function updateServicesToDb()
    {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $text = $_POST['text'];
        $picture = $_POST['icon'];
        $serviceObject = array();
        $serviceObject['title'] = $title;
        $serviceObject['text'] = $text;
        $serviceObject['picture'] = $picture;
        $services = new Services($serviceObject);
        $servicemanager = new ServiceManager();
        $data = $servicemanager->edit_Service($services, $id);
        echo json_encode($data);
    }
    function deleteServices()
    {
        $id = $_POST['id'];
        $servicemanager = new ServiceManager();
        $data = $servicemanager->delete_Service($id);
        echo json_encode($data);
    }

    function fetchServices()
    {
        $servicemanager = new ServiceManager();
        $data = $servicemanager->fetch_service();
        echo json_encode($data);
    }
    function fetchServicesByID()
    {
        $id = $_POST['id'];
        $servicemanager = new ServiceManager();
        $data = $servicemanager->fetch_serviceById($id);
        echo json_encode($data);
    }
}
