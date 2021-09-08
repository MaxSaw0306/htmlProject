<?php

    $servername = "localhost";
    $username = "Master";
    $password = "8vOCmO7GYNgiovSH";
    $dbname ="maxwels";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    class User {
        public $id;
        public $username;
        public $email;
        public $password;
        public $is;
        public $dateOfCreation;

        function __construct($id, $username, $email, $password, $is, $dateOfCreation) {
            $this->id = $id;
            $this->username = $username;
            $this->email = $email;
            $this->password = $password;
            $this->is = $is;
            $this->dateOfCreation = $dateOfCreation;
        }

        public function getId() {
            return $this->cid;
        }

        public function getUsername() {
            return $this->username;
        }

        public function getEmail() {
            return $this->cid;
        }

        public function getPassword() {
            return $this->password;
        }

        public function getIs() {
            return $this->is;
        }

        public function getDateOfCreation() {
            return $this->dateOfCreation;
        }
    }


    class Programmer  extends User{
        public $pid;
        public $firstName;
        public $lastName;
        public $doneRequests;
        public $status;

        function __construct($pid, $firstName, $lastName, $doneRequests, $status) {
            $this->pid = $pid;
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->doneRequests = $doneRequests;
            $this->status = $status;
        }


    }


    class Custommer extends User {
        public $cid;
        public $firstName;
        public $lastName;
        public $phone;
        public $corp;
        public $dateOfCreation;

        function __construct($cid, $firstName, $lastName, $phone, $corp) {
            $this->cid = $cid;
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->phone = $phone;
            $this->corp = $corp;
        }

        public function createRequest($topic1, $type1, $deadline1) {
            $rid = Null;
            $requestedBy =  Null;
            $workingOn = "NONE";
            $topic = $topic1;
            $type = $type1;
            $requestedOn = Null;
            $deadline = $deadline1;
            $request = new Request();
            $status = "REQUESTED";
        }
    }


    class Request {
        public $rid;
        public $requestedBy;
        public $workingOn;
        public $topic;
        public $type;
        public $requestedOn;
        public $deadline;
        public $status;

        function __construct($rid, $requestedBy, $workingOn, $topic, $type, $requestedOn, $deadline, $status) {
            $this->rid = $rid;
            $this->requestedBy = $requestedBy;
            $this->workingOn = $workingOn;
            $this->topic = $topic;
            $this->type = $type;
            $this->requestedOn = $requestedOn;
            $this->deadline = $deadline;
            $this->status = $status;
        }
    }
?>