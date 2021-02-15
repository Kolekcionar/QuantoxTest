<?php
    class Student {
        private $db;

        public function __construct() {
            $this->db = new Database();
        }

        public function getStudents() {

            // GET All Students QUERY
            $this->db->query("SELECT students.id,
                                         students.name,
                                         students.surname,
                                         school_boards.school_board
                                  FROM students
                                  LEFT JOIN school_boards ON school_boards.id = students.id_school_board   
                                  ORDER BY students.id ASC");
            $result = $this->db->resultSet();

            // Return dataset
            return $result;
        }

    }