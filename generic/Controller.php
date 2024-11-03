<?php
namespace generic;

use ReflectionMethod;

class Controller{
   
    private $arrChamadas=[];
    
    public function __construct(){
        $this->arrChamadas = [
            // Clientes (Existente)
            "cliente/lista" => [
                "controller\ClienteController",
                "listarClientes",
                ["GET"]
            ],
            "cliente/alterar" => [
                "controller\ClienteController",
                "alterarCliente",
                ["GET"]
            ],
            "cliente/salvarAlterar" => [
                "controller\ClienteController",
                "salvarAlterarCliente",
                ["POST"]
            ],
            
            // Desafios (Novo)
            "desafios/listar" => [
                "controller\DesafiosController",
                "listarDesafios",
                ["GET"]
            ],
            "desafios/criar" => [
                "controller\DesafiosController",
                "criarDesafio",
                ["POST"]
            ],
            "desafios/participar" => [
                "controller\DesafiosController",
                "participarDesafio",
                ["POST"]
            ],
            "desafios/progresso" => [
                "controller\DesafiosController",
                "registrarProgresso",
                ["POST"]
            ],
            
            // Usuários (Novo)
            "usuarios/listar" => [
                "controller\UsuariosController",
                "listarUsuarios",
                ["GET"]
            ],
            "usuarios/criar" => [
                "controller\UsuariosController",
                "criarUsuario",
                ["POST"]
            ],
            "usuarios/login" => [
                "controller\UsuariosController",
                "login",
                ["POST"]
            ],
            
            // Progresso (Novo)
            "progresso/listar" => [
                "controller\ProgressosController",
                "listarProgresso",
                ["GET"]
            ],
            "progresso/registrar" => [
                "controller\ProgressosController",
                "registrarProgresso",
                ["POST"]
            ],
        ];
    }

    public function verificarCaminho($rota){
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        
        if(isset($this->arrChamadas[$rota])){
            list($controllerClass, $method, $allowedMethods) = $this->arrChamadas[$rota];
            
            if(!in_array($requestMethod, $allowedMethods)){
                http_response_code(405);
                echo json_encode(["error" => "Método não permitido"]);
                return;
            }

            if(class_exists($controllerClass)){
                $controller = new $controllerClass();
                
                if(method_exists($controller, $method)){
                    $reflection = new ReflectionMethod($controller, $method);
                    $params = $this->getParams($reflection);
                    $reflection->invokeArgs($controller, $params);
                    return;
                }
            }

            // Caso a classe ou método não exista
            http_response_code(404);
            echo json_encode(["error" => "Endpoint não existe"]);
            return;
        }

        // Rota não encontrada
        http_response_code(404);
        echo json_encode(["error" => "Endpoint não existe"]);
    }

    private function getParams(ReflectionMethod $method){
        $params = [];
        foreach($method->getParameters() as $param){
            $name = $param->getName();
            $params[] = match($_SERVER['REQUEST_METHOD']) {
                'GET' => $_GET[$name] ?? null,
                'POST' => $_POST[$name] ?? null,
                default => null,
            };
        }
        return $params;
    }
}
?>