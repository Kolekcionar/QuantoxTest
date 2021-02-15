<?php

// XML serializer
use Ivory\Serializer\Format;
use Ivory\Serializer\Serializer;

    class Outputs extends Controller {

        public function __construct() {
            $this->modelStudents = $this->model('Student');
        }

        public function getJSON() {
            $studentId = $_GET['id'];

            // Check if student id is valid
            if (!isset($studentId) && !is_int($studentId))
                exit;

            // Get dataset
            $student = $this->modelStudents->getStudent($studentId);

            // Check if student data is empty object
            if (!is_object($student) || count(get_object_vars($student)) === 0)
                exit;

            // Prepare JSON
            $json = json_encode($student);

            // Download JSON
            header('Content-disposition: attachment; filename=student.json');
            header('Content-type: application/json');
            echo $json;
            exit;
        }

        public function getXML() {

            $studentId = $_GET['id'];

            // Check if student id is valid
            if (!isset($studentId) && !is_int($studentId))
                exit;

            // Get dataset
            $student = $this->modelStudents->getStudent($studentId);

            // Check if student data is empty object
            if (!is_object($student) || count(get_object_vars($student)) === 0)
                exit;

            // Prepare XML
            $serializer = new Serializer();
            $xml = $serializer->serialize($student, Format::XML);

            // Download XML
            header('Content-type: text/xml');
            header('Content-Disposition: attachment; filename="student.xml"');
            echo $xml;
            exit;
        }

}