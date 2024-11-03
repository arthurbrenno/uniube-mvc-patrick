<?php
namespace service;

use dao\mysql\UsuarioDAO;

class UsuarioService extends UsuarioDAO{

    public function listarUsuarios(){
        return parent::listar();
    }

    public function criarUsuario($nome, $email, $senha){
        return parent::criar($nome, $email, $senha);
    }

    public function login($email, $senha){
        return parent::login($email, $senha);
    }
}
?>
