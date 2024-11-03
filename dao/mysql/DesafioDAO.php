<?php
namespace dao\mysql;

use dao\interface\IDesafioDAO;
use generic\MysqlFactory;

class DesafioDAO extends MysqlFactory implements IDesafioDAO{

    public function listar(){
        $sql = "SELECT * FROM Desafios";
        return $this->banco->executar($sql);
    }

    public function criar($titulo, $descricao, $data_inicio, $data_fim, $criado_por){
        $sql = "INSERT INTO Desafios (titulo, descricao, data_inicio, data_fim, criado_por) VALUES (:titulo, :descricao, :data_inicio, :data_fim, :criado_por)";
        $param = [
            "titulo" => $titulo,
            "descricao" => $descricao,
            "data_inicio" => $data_inicio,
            "data_fim" => $data_fim,
            "criado_por" => $criado_por
        ];
        $this->banco->executar($sql, $param);
        return ["message" => "Desafio criado com sucesso"];
    }

    public function participar($usuario_id, $desafio_id){
        $sql = "INSERT INTO Progresso (usuario_id, desafio_id) VALUES (:usuario_id, :desafio_id)";
        $param = [
            "usuario_id" => $usuario_id,
            "desafio_id" => $desafio_id
        ];
        $this->banco->executar($sql, $param);
        return ["message" => "Participação registrada com sucesso"];
    }

    public function registrarProgresso($usuario_id, $desafio_id, $progresso){
        $sql = "UPDATE Progresso SET progresso = :progresso, data_registro = CURRENT_TIMESTAMP WHERE usuario_id = :usuario_id AND desafio_id = :desafio_id";
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
