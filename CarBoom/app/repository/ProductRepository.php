<?php

    class ProductRepository{

        private $connection;

        public function __construct($connection) {
            $this->connection = $connection;
        }

        public function createTable() {

            try {
                $query = 'create table if not exists products (id int auto_increment primary key, name text(20), price int, image varchar(30))';
                $statement = $this->connection->prepare($query);
                $statement->execute();
            } catch (PDOException $error) {
                echo $error->getMessage();

            }

        }

        public function getProducts() {

            try {
                $query = 'select * from products';
                $statement = $this->connection->prepare($query);
                $statement->execute();
                $row = $statement->fetchAll();
                return $row;
            } catch (PDOException $error) {
                echo $error->getMessage();

            }

        }

    }


?>