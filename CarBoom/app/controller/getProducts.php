<?php
    
    include '../service/ProductService.php';
    include '../repository/ProductRepository.php';
    include '../repository/Config.php';
    $config = new Config();
    $productRepository = new ProductRepository($config->connect());
    $productService = new ProductService($productRepository);
    $productService->createTable();
    print_r(json_encode($productService->getProducts()));

?>