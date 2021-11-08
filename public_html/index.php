<?php

    require_once '../vendor/autoload.php';

    if(isset($_GET['url'])){
        $url = explode('/', $_GET['url']);

        if($url[0] === 'api')
        {
            
                array_shift($url);
                $service = 'App\Services\\' . ucfirst($url[0]).'Service';

                array_shift($url);

                $method = strtolower($_SERVER['REQUEST_METHOD']);

            if(!class_exists($service) || !method_exists($service, $method)){    
                echo json_encode(array('status' => 'error', 'data' => 'Operação Inválida'));
            }else{
                try{
                    $response = call_user_func_array(array(new $service, $method), $url);
                    http_response_code(200);
                    echo json_encode(array('status' => 'success', 'data' => $response));
                    exit;
                }catch (\Exception $e) {
                    echo json_encode(array('status' => 'ERROR', 'data' => $e->getMessage()));
                    http_response_code(404);
                    exit;
                }
            }
        }
    }
