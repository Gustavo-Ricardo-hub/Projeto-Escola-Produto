<?php 

include_once 'conectar.php';
class Disciplinas
{
    private $coddisciplina;
    private $nomedisciplina;

    //GETTERS
    public function getCodDisciplina()
    {
        return $this -> coddisciplina;
    }
    public function getNomeDisciplina()
    {
        return $this -> nomedisciplina;
    } 

    //SETTERS
    public function setCodDisciplina($coddisciplina)
    {
        $this -> coddisciplina = $coddisciplina;
    }
    public function setNomeDisciplina($nomedisciplina)
    {
        $this -> nomedisciplina = $nomedisciplina;
    }

    function listar()
    {
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->query("select * from disciplinas order by CodDisciplina");
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
            $sql = $this->conn->prepare("select * from disciplinas where NomeDisciplina like ?"); // informou o ?
            @$sql->bindParam(1, $this->getNomeDisciplina(), PDO::PARAM_STR); // inclui esta linha para definir o parâmetro
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
            $sql = $this->conn->prepare("select * from disciplinas where CodDisciplina like ?"); // informou o ?
            @$sql->bindParam(1, $this->getCodDisciplina(), PDO::PARAM_STR); // inclui esta linha para definir o parâmetro
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
            $sql = $this->conn->prepare("select * from disciplinas where CodDisciplina = ?"); // informou o ? (parametro)
            @$sql->bindParam(1, $this->getCodDisciplina(), PDO::PARAM_STR); // inclua esta linha para definir o parâmetro
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
            $sql = $this->conn->prepare("update disciplinas set NomeDisciplina = ? where CodDisciplina = ?");
            @$sql->bindParam(1, $this->getNomeDisciplina(), PDO::PARAM_STR);
            @$sql->bindParam(2, $this->getCodDisciplina(), PDO::PARAM_STR);

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
            $sql = $this->conn->prepare("delete from disciplinas where CodDisciplina = ?"); // informou o ? (parametro)
            @$sql->bindParam(1, $this->getCodDisciplina(), PDO::PARAM_STR); // inclui esta linha para definir o parâmetro

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
                $sql = $this->conn->prepare("Insert into disciplinas values (?,?)");
                @$sql-> bindParam(1, $this->getCodDisciplina(), PDO::PARAM_STR);
                @$sql-> bindParam(2, $this->getNomeDisciplina(), PDO::PARAM_STR);
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