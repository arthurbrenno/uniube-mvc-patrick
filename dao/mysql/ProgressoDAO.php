<?php
namespace dao\mysql;

use dao\interface\IProgressoDAO;
use generic\MysqlFactory;

class ProgressoDAO extends MysqlFactory implements IProgressoDAO{

    public function listar(){
        $sql = "SELECT * FROM Progresso";
        return $this->banco->executar($sql);
    }

    public function registrarProgresso($usuario_id, $desafio_id, $progresso){
        $sql = "INSERT INTO Progresso (usuario_id, desafio_id, progresso, data_registro) 
        VALUES (:usuario_id, :desafio_id, :progresso, CURRENT_TIMESTAMP)";
        $param = [
            "usuario_id" => $usuario_id,
            "desafio_id" => $desafio_id,
            "progresso" => $progresso
        ];
        $this->banco->executar($sql, $param);
        return ["message" => "Progresso inserido com sucesso"];
    }

    public function atualizarProgresso($usuario_id, $desafio_id, $progresso) {
        $sql = "UPDATE Progresso 
                SET progresso = :progresso, data_registro = CURRENT_TIMESTAMP 
                WHERE usuario_id = :usuario_id AND desafio_id = :desafio_id";
        $param = [
            "progresso" => $progresso,
            "usuario_id" => $usuario_id,
            "desafio_id" => $desafio_id
        ];
        $this->banco->executar($sql, $param);
        return ["message" => "Progresso atualizado com sucesso"];
    }
    
}
?>
