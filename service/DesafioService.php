<?php
namespace service;

use dao\mysql\DesafioDAO;

class DesafioService extends DesafioDAO{

    public function listarDesafios(){
        return parent::listar();
    }

    public function criarDesafio($titulo, $descricao, $data_inicio, $data_fim, $criado_por){
        return parent::criar($titulo, $descricao, $data_inicio, $data_fim, $criado_por);
    }

    public function participarDesafio($usuario_id, $desafio_id){
        return parent::participar($usuario_id, $desafio_id);
    }

    public function registrarProgresso($usuario_id, $desafio_id, $progresso){
        return parent::registrarProgresso($usuario_id, $desafio_id, $progresso);
    }
}
?>
