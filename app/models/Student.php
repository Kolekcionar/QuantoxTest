<?php
    class Student {
        private $db;

        public function __construct() {
            $this->db = new Database();
        }

        /**
         * GET All Students data
         * @return mixed
         */
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

        /**
         * GET Student data by ID
         * @param $studentId
         * @return mixed
         */
        public function getStudent($studentId) {

            // GET Student by ID QUERY
            $this->db->query("SELECT students.id,
                                         students.name,
                                         students.surname,
                                         school_boards.school_board,
                                         ROUND(AVG(grades.grade), 2) AS grades_average,
                                         COUNT(grades.grade) AS grades_count,   
                                         MAX(grades.grade) AS biggest_grade
                                  FROM students
                                  LEFT JOIN school_boards ON school_boards.id = students.id_school_board   
                                  LEFT JOIN grades ON grades.id_student = students.id   
                                  WHERE students.id=" . $studentId);
            $result = $this->db->single();

            // Check grades average if school board is CSM
            $status = "FAILED";
            if ( $result->school_board == "CSM" ) {
                if ($result->grades_average >= 7)
                    $status = "PASSED";
            // Otherwise check grades if it is CSMB
            } elseif ( $result->school_board == "CSMB" ) {
                if ($result->grades_count > 2) {
                    if ($result->biggest_grade > 8)
                        $status = "PASSED";
                }
            // Return null if school board is not CSM or CSMB
            } else {
                return new stdClass();
            }

            // Add student status to dataset
            $result->status = $status;

            // Return dataset
            return $result;
        }

    }