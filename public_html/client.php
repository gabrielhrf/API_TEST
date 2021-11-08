<?php

    $url = 'http://localhost/API_TEST/public_html/api';
    

    $class = '/user';
    $param = '/1';

    $response = file_get_contents($url.$class.$param);

    echo $response;


    $response = json_decode($response, 1);

    
