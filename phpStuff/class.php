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
            return $this->id;
        }

        public function getUsername() {
            return $this->username;
        }

        public function getEmail() {
            return $this->email;
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

        function __construct($pid, $firstName, $lastName, $doneRequests, $status, $id, $username, $email, $password, $is, $dateOfCreation) {
            parent::__construct($id, $username, $email, $password, $is, $dateOfCreation);
            $this->pid = $pid;
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->doneRequests = $doneRequests;
            $this->status = $status;
            $this->id = $id;
            $this->username = $username;
            $this->email = $email;
            $this->password = $password;
            $this->is = $is;
            $this->dateOfCreation = $dateOfCreation;

        }

        public function getPid() {
            return $this->pid;
        }

        public function getFirstName() {
            return $this->firstName;
        }

        public function getLastName() {
            return $this->lastName;
        }

        public function getDoneRequests() {
            return $this->doneRequests;
        }

        public function getStatus() {
            return $this->status;
        }

        
    }


    class Customer extends User {
        public $cid;
        public $firstName;
        public $lastName;
        public $phone;
        public $corp;

        function __construct($cid, $firstName, $lastName, $phone, $corp, $id, $username, $email, $password, $is, $dateOfCreation) {
            parent::__construct($id, $username, $email, $password, $is, $dateOfCreation);
            $this->cid = $cid;
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->phone = $phone;
            $this->corp = $corp;
            $this->id = $id;
            $this->username = $username;
            $this->email = $email;
            $this->password = $password;
            $this->is = $is;
            $this->dateOfCreation = $dateOfCreation;

        }

        public function getCid() {
            return $this->cid;
        }

        public function getFirstName() {
            return $this->firstName;
        }

        public function getLastName() {
            return $this->lastName;
        }

        public function getPhone() {
            return $this->phone;
        }

        public function getCorp() {
            return $this->corp;
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

        public function getRid() {
            return $this->rid;
        }

        public function getRequestedBy() {
            return $this->requestedBy;
        }

        public function getWorkingOn() {
            return $this->workingOn;
        }

        public function getTopic() {
            return $this->topic;
        }

        public function getType() {
            return $this->type;
        }

        public function getRequestedOn() {
            return $this->requestedOn;
        }

        public function getDeadline() {
            return $this->deadline;
        }

        public function getStatus() {
            return $this->status;
        }
    }
?>