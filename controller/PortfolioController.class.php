<?php
require_once("./model/Portfolio.class.php");
require_once("./model/PortfolioManager.class.php");
class ServicesController
{

    function addPortfolioToDb()
    {
        $title = $_POST['title-portfolio'];
        $text = $_POST['text-portfolio'];
        $portfolioObject = array();
        $portfolioObject['title'] = $title;
        $portfolioObject['text'] = $text;
        $portfolio = new Portfolio($portfolioObject);
        $portfoliomanager = new PortfolioManager();
        $data = $portfoliomanager->add_Portfolio($portfolio);
        echo json_encode($data);
    }

    function updatePortfolioToDb()
    {
        $id = $_POST['id'];
        $title = $_POST['title-portfolio'];
        $text = $_POST['text-portfolio'];
        $portfolioObject = array();
        $portfolioObject['title'] = $title;
        $portfolioObject['text'] = $text;
        $portfolio = new Portfolio($portfolioObject);
        $portfoliomanager = new PortfolioManager();
        $data = $portfoliomanager->edit_Portfolio($portfolio, $id);
        echo json_encode($data);
    }
    function deletePortfolio()
    {
        $id = $_POST['id'];
        $portfoliomanager = new PortfolioManager();
        $data = $portfoliomanager->delete_Portfolio($id);
        echo json_encode($data);
    }

    function fetchPortfolio()
    {
        $portfoliomanager = new ServiceManager();
        $data = $portfoliomanager->fetch_Portfolio();
        echo json_encode($data);
    }
}
