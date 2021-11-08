<?php

    namespace App\Models;

    class Compra
    {
        private static $table = 'compra';

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

            $sql = 'INSERT INTO '. self::$table . ' (link_pdf, id_boleto, telefone_comprador) VALUES (:pdf, :id_bo, :tel)';

            $stmt = $connPDO->prepare($sql);

            $stmt->bindValue(':pdf', $data['pdf']);
            $stmt->bindValue(':id_bo', $data['id_bo']);
            $stmt->bindValue(':tel', $data['tel']);

            
            $stmt->execute();

            if($stmt->rowCount() > 0)
            {
                return 'Compra inserida com sucesso!';
            }else{
                throw new \Exception ("Falha ao inserir compra!");
            }
        }
    }