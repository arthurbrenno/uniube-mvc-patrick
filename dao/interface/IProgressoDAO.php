<?php
namespace dao\interface;

interface IProgressoDAO{
    public function listar();
    public function registrarProgresso($usuario_id, $desafio_id, $progresso);
}
?>
