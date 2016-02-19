<?php
namespace Controllers;
use Models\city;

class index {

    public function indexAction() {
        $cities = (new city())->find();
        include_once(VIEW_DIR . 'index.php');
    }


}