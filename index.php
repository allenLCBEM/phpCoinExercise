<?php

use Tac\repos\CoinRepo as CoinRepo;
use Tac\repos\FedRepo as FedRepo;

require_once 'app/start.php';


$coin = new CoinRepo();
$coin->execute();

$fed = new FedRepo();
$fed->execFed();