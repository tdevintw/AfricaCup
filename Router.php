<?php

class Router
{
    private $controller = 'App\Controller\TeamController';
    private $method = 'index';
    private $param = array();

    public function __construct()
    {
        $this->router();
    }

    public function router()
    {
       
            try {
              
            // $uri = $_GET["url"] ?? '';
            $uri= $_SERVER['REQUEST_URI'];
        
            $uri= explode('/',trim(strtolower($uri),'/'));
            $a= array_splice($uri,0,1);

    

        if (!empty($uri[0])) 
        {
         
            $controller = $uri[0];
            unset($uri[0]);
          
            $controller = 'App\Controller\\' . ucwords($controller).'Controller';
            if (class_exists($controller)) {
                $this->controller = $controller;
                
            } else {
                include '../app/View/404/template_01.php';
                die();
            }
        }
        $class = new $this->controller; 
        if (isset($uri[1])) 
        {
            if (method_exists($class, $uri[1])) {
                $this->method = $uri[1];
                unset($uri[1]);
            }
        }
        if (isset($uri[2])) {
            $this->param = $uri;
        }
      
            call_user_func_array([$class,$this->method],$this->param);

         
            
            } catch (Exception $e) {

                echo "failed " . $e->getMessage();
                
            }
            



    }

}