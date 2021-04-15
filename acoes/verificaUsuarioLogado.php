<?php

include_once __DIR__ . '/../config.php';
include_once PATH_ROOT . "/db/bancoDados.php";


verificaQuemEstaLogado($_SESSION['email']);