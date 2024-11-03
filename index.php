<?php

use generic\Controller;

include_once "generic/AutoLoad.php";


if(isset($_GET['param'])){
    $controller = new Controller();

    $controller->verificarCaminho($_GET['param']);

}