<?php
namespace controller;

use service\ProgressoService;

class ProgressosController {

    private $progressoService;

    public function __construct(){
        $this->progressoService = new ProgressoService();
    }

    // GET /progresso/listar
    public function listarProgresso(){
        $progresso = $this->progressoService->listarProgresso();
        echo json_encode($progresso);
    }

    // POST /progresso/registrar
    public function registrarProgresso($usuario_id, $desafio_id, $progresso){
        $resultado = $this->progressoService->registrarProgresso($usuario_id, $desafio_id, $progresso);
        echo json_encode($resultado);
    }
    
    // POST /progresso/atualizar
    public function atualizarProgresso($usuario_id, $desafio_id, $progresso){
        $resultado = $this->progressoService->atualizarProgresso($usuario_id, $desafio_id, $progresso);
        echo json_encode($resultado);
    }
}
?>
