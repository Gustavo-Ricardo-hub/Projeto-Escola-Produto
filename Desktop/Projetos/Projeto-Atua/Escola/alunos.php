<?php 

include_once 'conectar.php';

class Alunos
{
    private $matricula;
    private $nome;
    private $endereco;
    private $cidade; 
    private $codcurso;

    //GETTERS
    public function getMatricula()
    {
        return $this -> matricula; 
    }

    public function getNome()
    {
        return $this -> nome; 
    }
    public function getEndereco()
    {
        return $this -> endereco; 
    }
    public function getCidade()
    {
        return $this -> cidade; 
    }

    public function getCodCurso()
    {
        return $this -> codcurso; 
    }    

    //SETTERS
    public function setMatricula($matricula)
    {
        $this->matricula = $matricula;
    }

    public function setNome($nome)
    {
        $this->nome = $nome; 
    }
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco; 
    }
    public function setCidade($cidade)
    {
        $this->cidade = $cidade; 
    }

    public function setCodCurso($codcurso)
    {
        $this->codcurso = $codcurso; 
    }        
    

    
    function listar()
    {
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->query("select * from alunos order by matricula");
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
            $sql = $this->conn->prepare("select * from alunos where nome like ?"); // informou o ?
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
            $sql = $this->conn->prepare("select * from alunos where matricula like ?"); // informou o ?
            @$sql->bindParam(1, $this->getMatricula(), PDO::PARAM_STR); // inclui esta linha para definir o parâmetro
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
            $sql = $this->conn->prepare("delete from alunos where matricula = ?"); // informou o ? (parametro)
            @$sql->bindParam(1, $this->getMatricula(), PDO::PARAM_STR); // inclui esta linha para definir o parâmetro

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

    function alterar()
    {
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("select * from alunos where matricula = ?"); // informou o ? (parametro)
            @$sql->bindParam(1, $this->getMatricula(), PDO::PARAM_STR); // inclua esta linha para definir o parâmetro
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
            $sql = $this->conn->prepare("update alunos set nome = ?, endereco = ?, cidade = ?, codcurso = ? where matricula = ?");
            //update alunos set nome = ?, endereco = ?, cidade = ?, codcurso = ? where matricula = ?
            @$sql->bindParam(1, $this->getNome(), PDO::PARAM_STR);
            @$sql->bindParam(2, $this->getEndereco(), PDO::PARAM_STR);
            @$sql->bindParam(3, $this->getCidade(), PDO::PARAM_STR);
            @$sql->bindParam(4, $this->getCodCurso(), PDO::PARAM_STR);
            @$sql->bindParam(5, $this->getMatricula(), PDO::PARAM_STR);

            if ($sql->execute() == 1) {
                return "Registro alterado com sucesso!";
            }
            $this->conn = null;
        } catch (PDOException $exc) {
            echo "Erro ao salvar o registro: " . $exc->getMessage();
        }
    }



    function salvar()
    {
            try
            {
                $this-> conn = new Conectar();
                $sql = $this->conn->prepare("Insert into alunos values (?,?,?,?,?)");
                @$sql-> bindParam(1, $this->getMatricula(), PDO::PARAM_STR);
                @$sql-> bindParam(2, $this->getNome(), PDO::PARAM_STR);
                @$sql-> bindParam(3, $this->getEndereco(), PDO::PARAM_STR);
                @$sql-> bindParam(4, $this->getCidade(), PDO::PARAM_STR);
                @$sql-> bindParam(5, $this->getCodCurso(), PDO::PARAM_STR);
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