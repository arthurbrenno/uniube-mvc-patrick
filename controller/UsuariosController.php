<?php
namespace controller;

use service\UsuarioService;

class UsuariosController {

    private $usuarioService;

    public function __construct(){
        $this->usuarioService = new UsuarioService();
    }

    // GET /usuarios/listar
    public function listarUsuarios(){
        $usuarios = $this->usuarioService->listarUsuarios();
        echo json_encode($usuarios);
    }

    // POST /usuarios/criar
    public function criarUsuario($nome, $email, $senha){
        $resultado = $this->usuarioService->criarUsuario($nome, $email, $senha);
        echo json_encode($resultado);
    }

    // POST /usuarios/login
    public function login($email, $senha){
        $resultado = $this->usuarioService->login($email, $senha);
        echo json_encode($resultado);
    }
}
?>
