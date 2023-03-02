<?php

require_once 'database.php';

class DAO {
    public $table;
    private $conn;

    public function __construct(string $tableName) {
        $this->table = $tableName;
        $this->conn = DBClass::connect();
    }

    public function insert(string $nome, string $cpf, string $rg, string $dataNascimento, string $nomeMae, string $sexo, string $camposPolo) {
        $query = "INSERT INTO importacao 
        (
            convocacao_id, 
            lista_espera_id, 
            ori_cpf, 
            cpf, 
            ori_polo, 
            polo, 
            ori_nome, 
            nome, 
            ori_modalidade_concorrencia, 
            modalidade_concorrencia, 
            ori_classificacao, 
            classificacao, 
            ori_media_calculada, 
            media_calculada, 
            ori_nascimento, 
            nascimento, 
            ori_concorrencia_original, 
            concorrencia_original, 
            ori_situacao, 
            situacao, 
            ori_email, 
            email, 
            curso, 
            ativo, 
            cadastro_usuario, 
            cadastro_data
        )
        VALUES
        (
            29, 
            NULL, 
            '".$cpf."', 
            '".$cpf."', 
            '".$camposPolo."', 
            9, 
            '".$nome."', 
            '".$nome."', 
            '".$nome_modalidade."', 
            ".$modalidade.", 
            ".$data[2].", 
            ".$data[2].", 
            ".$data[1].", 
            ".$data[1].", 
            '".$nascimento_com_barras."', 
            '".date("Y-m-d", strtotime($data[6]) )."', 
            '".$nome_modalidade."', 
            ".$modalidade.", 
            'A', 'A', '".$data[3]."', 
            '".$data[3]."', 
            2, 
            'S', 
            15, 
            NOW()
        );";
    }
}

?>