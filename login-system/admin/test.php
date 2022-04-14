<?php 



require "config.php";



$sql = "SELECT count( DISTINCT(ip_address) ) FROM ken_web.visits";

// $stmt = $this->conn->prepare($sql);

// $stmt->execute();

// $result = $stmt->fetch(PDO::FETCH_ASSOC);


echo $sql;