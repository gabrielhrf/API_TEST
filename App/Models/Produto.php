<?php

    namespace App\Models;

    class Produto
    {
        private static $table = 'produto';

        public static function select(int $id){
            $connPDO = new \PDO(DBDRIVE.': host='.DBHOST.'; dbname='.DBNAME, \DBUSER, DBPASS);

            $sql = 'SELECT * FROM ' . self::$table.' WHERE id = :id';

            $stmt = $connPDO->prepare($sql);

            $stmt->bindValue(':id', $id);

            $stmt->execute();

            if($stmt->rowCount() > 0)
            {
                return $stmt->fetch(\PDO::FETCH_ASSOC);
            }else{
                throw new \Exception ("Nenhum Usuário Encontrado!");
            }
        }

        public static function selectAll(){
            $connPDO = new \PDO(DBDRIVE.': host='.DBHOST.'; dbname='.DBNAME, \DBUSER, DBPASS);

            $sql = 'SELECT * FROM ' . self::$table;

            $stmt = $connPDO->prepare($sql);


            $stmt->execute();

            if($stmt->rowCount() > 0)
            {
                return $stmt->fetchAll(\PDO::FETCH_ASSOC);
            }else{
                throw new \Exception ("Nenhum Usuário Encontrado!");
            }
        }

        public static function insert($data){
            $connPDO = new \PDO(DBDRIVE.': host='.DBHOST.'; dbname='.DBNAME, \DBUSER, DBPASS);

            $sql = 'INSERT INTO '. self::$table . ' (nome, valor) VALUES (:no, :va)';

            $stmt = $connPDO->prepare($sql);

            $stmt->bindValue(':no', $data['nome']);
            $stmt->bindValue(':va', $data['valor']);

            
            $stmt->execute();

            if($stmt->rowCount() > 0)
            {
                return 'Usuário(a) inserido com sucesso!';
            }else{
                throw new \Exception ("Falha ao inserir usuário(a)!");
            }
        }
    }