<?php
namespace dao\mysql;

use dao\interface\IUsuarioDAO;
use generic\MysqlFactory;

class UsuarioDAO extends MysqlFactory implements IUsuarioDAO{

    public function listar(){
        $sql = "SELECT id, nome, email, criado_em FROM Usuarios";
        return $this->banco->executar($sql);
    }

    public function criar($nome, $email, $senha){
        $sql = "INSERT INTO Usuarios (nome, email, senha) VALUES (:nome, :email, :senha)";
        $param = [
            "nome" => $nome,
            "email" => $email,
            "senha" => password_hash($senha, PASSWORD_BCRYPT)
        ];
        $this->banco->executar($sql, $param);
        return ["message" => "Usuário criado com sucesso"];
    }

    public function login($email, $senha){
        $sql = "SELECT * FROM Usuarios WHERE email = :email";
        $param = ["email" => $email];
        $resultado = $this->banco->executar($sql, $param);
        if(count($resultado) > 0 && password_verify($senha, $resultado[0]['senha'])){
            // Aqui você pode implementar a geração de tokens ou sessões
            return ["message" => "Login bem-sucedido", "usuario_id" => $resultado[0]['id']];
        }
        return ["error" => "Credenciais inválidas"];
    }
}
?>
