<?php
	abstract class BaseModel {

    	protected $db;

    	/*
	    * Constructor
	    * Opens the database connection
	    */
	    public function __construct() {
	        $this->db = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
	        if ($this->db->connect_error) {
	            trigger_error('Database connection failed: '  . $this->db->connect_error, E_USER_ERROR);
	        }
	    }

	    /*
	    * Destructor
	    * Closes the database connection
	    */
	    public function __destruct(){
	        $this->db->close();
	    }
	}
?>