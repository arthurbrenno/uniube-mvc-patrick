<?php
namespace controller;

use service\DesafioService;

class DesafiosController {

    private $desafioService;

    public function __construct(){
        $this->desafioService = new DesafioService();
    }

    // GET /desafios/listar
    public function listarDesafios(){
        $desafios = $this->desafioService->listarDesafios();
        echo json_encode($desafios);
    }

    // POST /desafios/criar
    public function criarDesafio($titulo, $descricao, $data_inicio, $data_fim, $criado_por){
        $resultado = $this->desafioService->criarDesafio($titulo, $descricao, $data_inicio, $data_fim, $criado_por);
        echo json_encode($resultado);
    }

    // POST /desafios/participar
    public function participarDesafio($usuario_id, $desafio_id){
        $resultado = $this->desafioService->participarDesafio($usuario_id, $desafio_id);
        echo json_encode($resultado);
    }

    // POST /desafios/progresso
    public function registrarProgresso($usuario_id, $desafio_id, $progresso){
        $resultado = $this->desafioService->registrarProgresso($usuario_id, $desafio_id, $progresso);
        echo json_encode($resultado);
    }
}
?>
