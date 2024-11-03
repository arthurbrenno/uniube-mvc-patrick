<?php
namespace dao\interface;

interface IUsuarioDAO{
    public function listar();
    public function criar($nome, $email, $senha);
    public function login($email, $senha);
}
?>
