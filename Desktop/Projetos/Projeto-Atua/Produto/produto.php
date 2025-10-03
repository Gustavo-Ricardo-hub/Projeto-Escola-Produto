<?php

include_once 'conectar.php';

//parte 1 - atributos
class Produto
{
        private $id;
        private $nome;
        private $estoque;
        private $conn;

    // parte 2 - os gettes e settes
        public function getId()
        {
            return $this->id;
        }

        public function setId($id)
        {
            $this->id = $id;
        }

        public function getNome()
        {
            return $this->nome;
        }

        public function setNome($nome)
        {
            $this->nome = $nome;
        }

        public function getEstoque()
        {
            return $this->estoque;
        }

        public function setEstoque($estoque)
        {
            $this->estoque = $estoque; // ou $estoqui
        }

    //parte 3 -  métodos

    function salvar()
    {
        try
        {
            $this-> conn = new Conectar();
            $sql = $this->conn->prepare("Insert into produto values (null,?,?)");
            @$sql-> bindParam(1, $this->getNome(), PDO::PARAM_STR);
            @$sql-> bindParam(2, $this->getEstoque(), PDO::PARAM_STR);
            if ($sql->execute() == 1)
            {
                return "Registro salvo com sucesso!";
            }
            $this->conn = null; 
        }
        catch(PDOException $exc)
        {
            echo "Erro ao salvar o registro.". $exc->getMessage();
        }

    }

    function alterar()
    {
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("select * from produto where id = ?"); // informou o ? (parametro)
            @$sql->bindParam(1, $this->getId(), PDO::PARAM_STR); // inclua esta linha para definir o parâmetro
            $sql->execute();
            return $sql->fetchAll();
            $this->conn = null;
        } catch (PDOException $exc) {
            echo "Erro ao alterar: " . $exc->getMessage();
        }
    }

    function alterar2()
    {
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("update produto set nome = ?, estoque = ? where id = ?");
            @$sql->bindParam(1, $this->getNome(), PDO::PARAM_STR);
            @$sql->bindParam(2, $this->getEstoque(), PDO::PARAM_STR);
            @$sql->bindParam(3, $this->getId(), PDO::PARAM_STR);
            if ($sql->execute() == 1) {
                return "Registro alterado com sucesso!";
            }
            $this->conn = null;
        } catch (PDOException $exc) {
            echo "Erro ao salvar o registro: " . $exc->getMessage();
        }
    }

    function consultar()
    {
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("select * from produto where nome like ?"); // informou o ?
            @$sql->bindParam(1, $this->getNome(), PDO::PARAM_STR); // inclui esta linha para definir o parâmetro
            $sql->execute();
            return $sql->fetchAll();
            $this->conn = null;
        } catch (PDOException $exc) {
            echo "Erro ao executar consulta: " . $exc->getMessage();
        }
    }

    function consultar2()
    {
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("select * from produto where id = ?"); // informou o ?
            @$sql->bindParam(1, $this->getId(), PDO::PARAM_STR); // inclui esta linha para definir o parâmetro
            // $sql->bindParam(1, $this->getNome()."%", PDO::PARAM_STR);
            $sql->execute();
            return $sql->fetchAll();
            $this->conn = null;
        } catch (PDOException $exc) {
            echo "Erro ao executar consulta: " . $exc->getMessage();
        }
    }    

    function exclusao()
    {
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("delete from produto where id = ?"); // informou o ? (parametro)
            @$sql->bindParam(1, $this->getId(), PDO::PARAM_STR); // inclui esta linha para definir o parâmetro

            if ($sql->execute() == 1) {
                return "Excluído com sucesso!";
            } 
            else {
                return "Erro na exclusão!";
            }

            $this->conn = null;
        } catch (PDOException $exc) {
            echo "Erro na exclusão: " . $exc->getMessage();
        }
    }

    function listar()
    {
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->query("select * from produto order by id");
            $sql->execute();
            return $sql->fetchAll();
            $this->conn = null;
        } catch (PDOException $exc) {
            echo "Erro ao executar consulta: " . $exc->getMessage();
        }
    }
}   // encerramento da classe Produto

?>