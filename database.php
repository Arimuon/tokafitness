<?php
// Database connection configuration
$host = "CHANGE ME";     
$username = "CHANGE ME";                    
$password = "CHANGE ME";                        
$dbname = "CHANGE ME";                        

// Make connection variable available globally
global $conn;

// Create new MySQL database connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check if connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);     
} elseif (!$conn) {
    die("Database connection failed: " . mysqli_connect_error()); 
}

