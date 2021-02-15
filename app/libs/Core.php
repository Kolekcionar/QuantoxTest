<?php

    // Core App class
    class Core {
        protected $currentController = 'Students';
        protected $currentMethod = 'index';
        protected $params = [];

        public function __construct() {
            $url = $this->getURL();

            // Check if controller exists
            if(file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
                // Set new controller
                $this->currentController = ucwords($url[0]);
                unset($url[0]);
            }

            // Require the controller
            require_once '../app/controllers/' . $this->currentController . '.php';
            $this->currentController = new $this->currentController;

            // Check if method exists
            if (isset($url[1])) {
                if (method_exists($this->currentController, $url[1])) {
                    $this->currentMethod = $url[1];
                }
            }

            // Get parameters if exist
            $this->params = $url ? array_values($url) : [];

            // Call a callback
            call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
        }

        public function getURL() {
            if (isset($_GET['url'])) {
                $url = rtrim($_GET['url'], '/');

                // Filter vars as string/number
                $url = filter_var($url, FILTER_SANITIZE_URL);
                $url = explode('/', $url);
                return $url;
            }
        }
    }