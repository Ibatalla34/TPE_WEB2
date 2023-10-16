<?php 
require_once '.app/models/LeagueModel.php';
require_once '.app/views/LeagueView.php';

class LeagueController{
    private $model;
    private $view;
 
    public function __construct() {
        $this->model = new LeagueModel();
        $this->view = new LeagueView();
    }
    function showFutbolistasbyClubes() {
        if (!isset($_GET['clubes']) || empty($_GET['clubes'])) {
            $this->view->renderError();
            return;
        }

        $clubes = $_GET['clubes'];
        $futbolistas = $this->model->getFutbolistasbyClubes($clubes);
        $this->view->renderFutbolistasbyClubes($clubes, $futbolistas);
    }    
}
