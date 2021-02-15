<?php

    class Students extends Controller {
        public function __construct() {
            $this->modelStudents = $this->model('Student');
        }

        public function index($studentId = null) {

                // Get data - students list
                $students = $this->modelStudents->getStudents();
                $data = [ 'students' => $students ];

                // Show in the View
                $this->view('students/index', $data);
        }
    }
