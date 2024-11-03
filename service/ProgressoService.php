<?php
namespace service;

use dao\mysql\ProgressoDAO;

class ProgressoService extends ProgressoDAO{

    public function listarProgresso(){
        return parent::listar();
    }

    public function registrarProgresso($usuario_id, $desafio_id, $progresso){
        return parent::registrarProgresso($usuario_id, $desafio_id, $progresso);
    }
}
?>
