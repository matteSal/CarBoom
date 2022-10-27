<?php

    class TicketRepository {

        private $connection;

        public function __construct($connection) {
            $this->connection = $connection;
        }

        public function createTable() {

            try {
                $query = 'create table if not exists tickets (id int auto_increment primary key, email varchar(100), productid int, date date)';
                $statement = $this->connection->prepare($query);
                $statement->execute();
            } catch (PDOException $error) {
                echo $error->getMessage();

            }

        }

        public function addTicket($email, $productid, $date) {

            try {
                $query = 'insert into tickets values(?,?,?,?)';
                $statement = $this->connection->prepare($query);
                $statement->execute([null, $email, $productid, $date]);
            } catch (PDOException $error) {
                echo $error->getMessage();

            }

        }

        public function hasTicket($email) {
            try {
                $query = 'select * from tickets where email = ?';
                $statement = $this->connection->prepare($query);
                $statement->execute([$email]);
                $row = $statement->fetch();
                return $row;
            } catch (PDOException $error) {
                echo $error->getMessage();

            }

        }

    }


?>