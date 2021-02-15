<?php

    class Students extends Controller {
        public function __construct() {
            $this->modelStudents = $this->model('Student');
        }

        public function index($studentId = null) {

            // If there is student id show pass/fail report
            if (isset($studentId) && !is_int($studentId)) {
                $student = $this->modelStudents->getStudent($studentId);

                // Check if student data is empty object
                if (!is_object($student) || count(get_object_vars($student)) === 0)
                    die('There is not enough data for this student.');

                $data = [ 'student' => $student ];
                // Show in the View
                $this->view('students/report', $data);
                // Or show all students list
            } else {
                // Get data - students list
                $students = $this->modelStudents->getStudents();

                // Check if student data is empty object
                if (count(get_object_vars((object)$students)) === 0)
                    die('There is no data.');

                $data = [ 'students' => $students ];
                // Show in the View
                $this->view('students/index', $data);
            }

        }

    }
