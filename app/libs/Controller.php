<?php
    // Load the model and the view
    class Controller {
        public function model($model) {
            require_once '../app/models/' . $model . '.php';
            return new $model();
        }

        public function view($view, $data = []) {
            // Show the View if exists
            if (file_exists('../app/views/' . $view . '.php')) {
                require_once '../app/views/' . $view . '.php';
            } else {
                die("There is nothing I can show to You.");
            }
        }
    }