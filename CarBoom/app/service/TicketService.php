<?php

    class TicketService {

        private $ticketRepository;

        public function __construct($ticketRepository) {
            $this->ticketRepository = $ticketRepository;
        }

        public function createTable() {
            return $this->ticketRepository->createTable();
        }

        public function addTicket($email, $productid, $date) {
            if($this->ticketRepository->hasTicket($email) == NULL) {
                $this->ticketRepository->addTicket($email, $productid, $date);
                return $this->createJson(NULL);
            }else return $this->createJson(403);
        }

        private function createJson($errore) {
            return json_encode(array(
                'author'=> 'Matteo Salvi',
                'error'=> $errore,
                'URL'=> '/tickets'
            ));
        }
    }

?>