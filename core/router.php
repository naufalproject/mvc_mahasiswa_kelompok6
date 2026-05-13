<?php

class Router
{
    
    protected $controller = 'HomeController';
    protected $method = 'index';
    protected $params = [];

    public function parseURL()
    {
        if (isset($_GET['url'])) {

            $url = rtrim($_GET['url'], '/');

            $url = filter_var($url, FILTER_SANITIZE_URL);

            return explode('/', $url);
        }

        return [];
    }

    public function run()
    {
        $url = $this->parseURL();

        if (isset($url[0]) && $url[0] != '') {
            $this->controller = ucfirst($url[0]) . 'Controller';
        }

        $controllerFile = '../app/controllers/' . $this->controller . '.php';

        
        if (file_exists($controllerFile)) {

            require_once $controllerFile;

            
            $controllerObject = new $this->controller;

        } else {

            $this->error404("Controller tidak ditemukan");
            return;
        }

       
        if (isset($url[1]) && method_exists($controllerObject, $url[1])) {

            $this->method = $url[1];

        } elseif (isset($url[1])) {

            $this->error404("Method tidak ditemukan");
            return;
        }

    
        if (count($url) > 2) {

            $this->params = array_slice($url, 2);
        }

        
        call_user_func_array(
            [$controllerObject, $this->method],
            $this->params
        );
    }

    
    public function error404($message = "404 Not Found")
    {
        http_response_code(404);

        echo "<h1>404</h1>";
        echo "<p>$message</p>";

        exit;
    }
}