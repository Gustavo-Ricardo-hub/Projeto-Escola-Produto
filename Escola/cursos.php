<?php
include_once 'conectar.php';

class Cursos
{
    private $codcurso;
    private $nome;
    private $coddisc1;
    private $coddisc2;
    private $coddisc3;

    //GETTERS
    public function getCodCurso()
    {
        return $this-> codcurso;
    }
    public function getNome()
    {
        return $this-> nome;
    }
    public function getCodDisc1()
    {
        return $this-> coddisc1;
    }
    public function getCodDisc2()
    {
        return $this-> coddisc2;
    }
    public function getCodDisc3()
    {
        return $this-> coddisc3;
    }

    //SETTERS
    public function setCodCurso($codcurso)
    {
        $this->codcurso = $codcurso;
    }
    public function setNome($nome)
    {
        $this->nome = $nome;
    }
    public function setCodDisc1($coddisc1)
    {
        $this->coddisc1 = $coddisc1;
    }
    public function setCodDisc2($coddisc2)
    {
        $this->coddisc2 = $coddisc2;
    }
    public function setCodDisc3($coddisc3)
    {
        $this->coddisc3 = $coddisc3;
    }

    function listar()
    {
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->query("select * from cursos order by codcurso");
            $sql->execute();
            return $sql->fetchAll();
            $this->conn = null;
        } catch (PDOException $exc) {
            echo "Erro ao executar consulta: " . $exc->getMessage();
        }
    }

    function consultar()
    {
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("select * from cursos where nome like ?"); // informou o ?
            @$sql->bindParam(1, $this->getNome(), PDO::PARAM_STR); // inclui esta linha para definir o parâmetro
            // $sql->bindParam(1, $this->getNome()."%", PDO::PARAM_STR);
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
            $sql = $this->conn->prepare("select * from cursos where codcurso like ?"); // informou o ?
            @$sql->bindParam(1, $this->getCodcurso(), PDO::PARAM_STR); // inclui esta linha para definir o parâmetro
            // $sql->bindParam(1, $this->getNome()."%", PDO::PARAM_STR);
            $sql->execute();
            return $sql->fetchAll();
            $this->conn = null;
        } catch (PDOException $exc) {
            echo "Erro ao executar consulta: " . $exc->getMessage();
        }
    }    

    function alterar()
    {
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("select * from cursos where codcurso = ?"); // informou o ? (parametro)
            @$sql->bindParam(1, $this->getCodCurso(), PDO::PARAM_STR); // inclua esta linha para definir o parâmetro
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
            $sql = $this->conn->prepare("update cursos set nome = ?, coddisc1 = ?, coddisc2 = ?, coddisc3 = ? where codcurso = ?");
            @$sql->bindParam(1, $this->getNome(), PDO::PARAM_STR);
            @$sql->bindParam(2, $this->getCodDisc1(), PDO::PARAM_STR);
            @$sql->bindParam(3, $this->getCodDisc2(), PDO::PARAM_STR);
            @$sql->bindParam(4, $this->getCodDisc3(), PDO::PARAM_STR);
            @$sql->bindParam(5, $this->getCodCurso(), PDO::PARAM_STR);
            if ($sql->execute() == 1) {
                return "Registro alterado com sucesso!";
            }
            $this->conn = null;
        } catch (PDOException $exc) {
            echo "Erro ao salvar o registro: " . $exc->getMessage();
        }
    }




















    function exclusao()
    {
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("delete from cursos where codcurso = ?"); // informou o ? (parametro)
            @$sql->bindParam(1, $this->getCodCurso(), PDO::PARAM_STR); // inclui esta linha para definir o parâmetro

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
    
    function salvar()
    {
            try
            {
                $this-> conn = new Conectar();
                $sql = $this->conn->prepare("Insert into cursos values (?,?,?,?,?)");
                @$sql-> bindParam(1, $this->getCodCurso(), PDO::PARAM_STR);
                @$sql-> bindParam(2, $this->getNome(), PDO::PARAM_STR);
                @$sql-> bindParam(3, $this->getCodDisc1(), PDO::PARAM_STR);
                @$sql-> bindParam(4, $this->getCodDisc2(), PDO::PARAM_STR);
                @$sql-> bindParam(5, $this->getCodDisc3(), PDO::PARAM_STR);
                if($sql->execute() == 1)
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


}

?>