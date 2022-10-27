<?php

    class ProductService {

        private $productRepository;

        public function __construct($productRepository) {
            $this->productRepository = $productRepository;
        }

        public function createTable() {
            return $this->productRepository->createTable();
        }

        public function getProducts() {
            return $this->productRepository->getProducts();
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