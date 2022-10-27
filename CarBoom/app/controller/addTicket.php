<?php
    
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Headers: *');

    include '../repository/TicketRepository.php';
    include '../repository/Config.php';
    include '../service/TicketService.php';

    $config = new Config();
    $ticketRepository = new TicketRepository($config->connect());
    $ticketService = new TicketService($ticketRepository);
    $ticketService->createTable();
    $dataFrontEnd = json_decode(file_get_contents("php://input"));
    $date = new DateTime();
    $array = explode("/", $dataFrontEnd->date);
    print_r($ticketService->addTicket($dataFrontEnd->email, $dataFrontEnd->productId, $date->format($array[2]."-".$array[1]."-".$array[0])));
    
    
?>