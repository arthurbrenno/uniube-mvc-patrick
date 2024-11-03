<?php
namespace dao\interface;

interface IDesafioDAO{
    public function listar();
    public function criar($titulo, $descricao, $data_inicio, $data_fim, $criado_por);
    public function participar($usuario_id, $desafio_id);
    public function registrarProgresso($usuario_id, $desafio_id, $progresso);
}
?>
