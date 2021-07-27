<?php
require_once("./model/Team.class.php");
require_once("./model/TeamManager.class.php");
class TeamController
{

    function addTeamToDb()
    {
        $name = $_POST['name'];
        $title = $_POST['title'];
        $shortbio = $_POST['shortBio'];
        $picture = ("001.png"); //$_FILES['avatar-uploaded']['name']);
        $teamObject = array();
        $teamObject['name'] = $name;
        $teamObject['title'] = $title;
        $teamObject['shortBio'] = $shortbio;
        $teamObject['picture'] = $picture;
        $team = new Team($teamObject);
        $teammanager = new TeamManager();
        $data = $teammanager->add_Team($team);
        echo json_encode($data);
    }

    function updateTeamToDb()
    {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $title = $_POST['title'];
        $shortbio = $_POST['shortBio'];
        $picture = ("001.png"); //$_FILES['avatar-uploaded']['name']);
        $teamObject = array();
        $teamObject['name'] = $name;
        $teamObject['title'] = $title;
        $teamObject['shortBio'] = $shortbio;
        $teamObject['picture'] = $picture;
        $team = new Team($teamObject);
        $teammanager = new TeamManager();
        $data = $teammanager->edit_Team($team, $id);
        echo json_encode($data);
    }
    function deleteTeam()
    {
        $id = $_POST['id'];
        $teammanager = new TeamManager();
        $data = $teammanager->delete_Team($id);
        echo json_encode($data);
    }

    function fetchTeam()
    {
        $teammanager = new TeamManager();
        $data = $teammanager->fetch_Team();
        echo json_encode($data);
    }
}
