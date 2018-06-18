<?php

////////////////////////////////////////////
////// rogez.design mysqli framework ///////
////////////////////////////////////////////
////////////// v1.05 // 2018 ///////////////
////////////////////////////////////////////

//SELECT: db_read($string) => $result ($object);
function db_read($sql){
    //vars
    $host = $_SESSION['db_host'];
    $username = $_SESSION['db_user'];
    $password = $_SESSION['db_pass'];
    $charset = $_SESSION['db_charset'];
    $dbname = $_SESSION['db_name'];
    $feedback = '';
    
    //nieuw msqli object in variabele $conn
    $conn = new mysqli($host, $username, $password, $dbname);
    
    //check connection en geef feedback
    if($conn->connect_error){
        $feedback .= "Connection failed: ".$conn->connect_error;
        return $feedback;
    }
    
    //change character set to utf8 (europe)
    $conn->set_charset($charset);
    
    //voer de query uit en krijg het resultaat terug in een object
    $result = $conn->query($sql);
    
    //connectie terug sluiten
    $conn->close();
    
    //geef het resultaat object terug
    return $result;
}

function db_write($sql){
    //vars
    $host = $_SESSION['db_host'];
    $username = $_SESSION['db_user'];
    $password = $_SESSION['db_pass'];
    $charset = $_SESSION['db_charset'];
    $dbname = $_SESSION['db_name'];
    $feedback = '';
    
    //nieuw msqli object in variabele $db
    $mysqli = new mysqli($host, $username, $password, $dbname);
    
    //check connection en geef feedback
    if ($mysqli->connect_error) { $feedback .= "Connection failed: ".$mysqli->connect_error; $feedback .= "<br>"; }
    
    //change character set to utf8 (europe)
    $mysqli->set_charset($charset);
    
    //voer de query uit en sla het resultaat op
    $result = $mysqli->query($sql);
    
    //controleer dat query goed is uitgeverd (true) en geef eventuele fout indien niet (false)
    if($result === true){ $feedback = true;	}
    else{ $feedback .= "Error: ".$mysqli->error; }
    
    //connectie terug sluiten
    $mysqli->close();
    
    //return de feedback
    return $feedback;
}


//INSERT: db_insert($tablename:string, $columns:array, $data:array) => $feedback
function db_insert($tablename, $columns, $data){
    //vars
    $host = $_SESSION['db_host'];
    $username = $_SESSION['db_user'];
    $password = $_SESSION['db_pass'];
    $charset = $_SESSION['db_charset'];
    $dbname = $_SESSION['db_name'];
    $feedback = '';
    
    //nieuw msqli object in variabele $db
    $conn = new mysqli($host, $username, $password, $dbname);
    
    //check connection en geef feedback
    if ($conn->connect_error){
        $feedback .= "Connection failed: ".$conn->connect_error;
        $feedback .= "<br>";
    }
    
    //change character set to utf8 (europe)
    $conn->set_charset($charset);
    
    //escape variables for security
    foreach($data as $key=>$value){
        $data[$key] = mysqli_real_escape_string($conn, $value);
    }
    
    //zet arrays om naar strings
    $columnsstring = implode(", ",$columns);
    $datastring = implode("', '",$data);
    
    //maak de sql string
    $sql = "INSERT INTO $tablename ($columnsstring) VALUES ('$datastring')";
    
    //voer de query uit en sla het resultaat op
    $result = $conn->query($sql);
    
    //controleer dat query goed is uitgeverd (true) en geef eventuele fout indien niet (false)
    if($result === true){ $feedback .= true;	}
    else{ $feedback .= "Error: ".$conn->error; }
    
    //connectie terug sluiten
    $conn->close();
    
    //return de feedback
    return $feedback;
}

//UPDATE: db_update($string, $array, $array) => $feedback
function db_update($tablename, $columns, $data){
    //vars
    $host = $_SESSION['db_host'];
    $username = $_SESSION['db_user'];
    $password = $_SESSION['db_pass'];
    $charset = $_SESSION['db_charset'];
    $dbname = $_SESSION['db_name'];
    $feedback = '';
    
    //nieuw msqli object in variabele $db
    $conn = new mysqli($host, $username, $password, $dbname);
    
    //check connection en geef feedback
    if ($conn->connect_error){
        $feedback .= "Connection failed: ".$conn->connect_error."<br>";
        $feedback .= "<br>";
    }
    
    //change character set to utf8 (europe)
    $conn->set_charset($charset);
    
    //escape variables for security
    foreach($data as $key=>$value){
        $data[$key] = mysqli_real_escape_string($conn, $value);
    }
    
    //zet arrays om naar strings
    $columnsstring = implode(", ",$columns);
    $datastring = implode("', '",$data);
    
    //maak de sql string
    $sql = "UPDATE $tablename ($columnsstring) VALUES ('$datastring')";
    
    //voer de query uit en sla het resultaat op
    $result = $conn->query($sql);
    
    //controleer dat query goed is uitgeverd (true) en geef eventuele fout indien niet (false)
    if($result === true){ $feedback .= $conn->insert_id;	}
    else{ $feedback .= "Error: ".$conn->error."<br>"; }
    
    //connectie terug sluiten
    $conn->close();
    
    //return de feedback
    return $feedback;
}

//UPDATE: db_updatewhere($string, $array, $array, array[$column, $data]) => $feedback
function db_updatewhere($tablename, $columns, $data, $where){
    //vars
    $host = $_SESSION['db_host'];
    $username = $_SESSION['db_user'];
    $password = $_SESSION['db_pass'];
    $charset = $_SESSION['db_charset'];
    $dbname = $_SESSION['db_name'];
    $feedback = '';
    
    //nieuw msqli object in variabele $db
    $conn = new mysqli($host, $username, $password, $dbname);
    
    //check connection en geef feedback
    if ($conn->connect_error){
        $feedback .= "Connection failed: ".$conn->connect_error."<br>";
        $feedback .= "<br>";
    }
    
    //change character set to utf8 (europe)
    $conn->set_charset($charset);
    
    //escape variables for security
    foreach($data as $key=>$value){
        $data[$key] = mysqli_real_escape_string($conn, $value);
    }
    
    //zet arrays om naar strings
    $columnsstring = implode(", ",$columns);
    $datastring = implode("', '",$data);
    
    //maak de sql string
    $sql = "UPDATE $tablename SET $columnsstring='$datastring'";
    $sql .= " WHERE $where[0]='$where[1]';";
    
    
    //voer de query uit en sla het resultaat op
    $result = $conn->query($sql);
    
    //controleer dat query goed is uitgeverd (true) en geef eventuele fout indien niet (false)
    if($result === true){ $feedback .= $conn->insert_id;	}
    else{ $feedback .= "Error: ".$conn->error."<br>"; }
    
    //connectie terug sluiten
    $conn->close();
    
    //return de feedback
    return $feedback;
}


//DELETE_WHERE: db_delete($string, $string, $string) => $feedback
function db_delete_where($tablename, $column, $search){
    //vars
    $host = $_SESSION['db_host'];
    $username = $_SESSION['db_user'];
    $password = $_SESSION['db_pass'];
    $charset = $_SESSION['db_charset'];
    $dbname = $_SESSION['db_name'];
    $feedback = '';
    
    //nieuw msqli object in variabele $db
    $conn = new mysqli($host, $username, $password, $dbname);
    
    //check connection en geef feedback
    if ($conn->connect_error){
        $feedback .= "Connection failed: ".$conn->connect_error."<br>";
        $feedback .= "<br>";
    }
    
    //change character set to utf8 (europe)
    $conn->set_charset($charset);
    
    //escape variables for security
    $tablename = mysqli_real_escape_string($conn, $tablename);
    $column = mysqli_real_escape_string($conn, $column);
    $search = mysqli_real_escape_string($conn, $search);
    
    //maak de sql string
    if(!is_numeric($search)) {$sql = "DELETE FROM $tablename WHERE $column = '$search'";}
    else{ $sql = "DELETE FROM $tablename WHERE $column = $search"; };
    
    //voer de query uit en sla het resultaat op
    $result = $conn->query($sql);
    
    //controleer dat query goed is uitgeverd (true) en geef eventuele fout indien niet (false)
    if($result === true){ $feedback = true; }
    else{ $feedback .= "Error: ".$conn->error."<br>"; }
    
    //connectie terug sluiten
    $conn->close();
    
    //return de feedback
    return $feedback;
}

//DELETE_ID: db_delete_id($string, $string) => $feedback
function db_delete_id($tablename, $id){
    //vars
    $host = $_SESSION['db_host'];
    $username = $_SESSION['db_user'];
    $password = $_SESSION['db_pass'];
    $charset = $_SESSION['db_charset'];
    $dbname = $_SESSION['db_name'];
    $feedback = '';
    
    //nieuw msqli object in variabele $db
    $conn = new mysqli($host, $username, $password, $dbname);
    
    //check connection en geef feedback
    if ($conn->connect_error){
        $feedback .= "Connection failed: ".$conn->connect_error."<br>";
        $feedback .= "<br>";
    }
    
    //change character set to utf8 (europe)
    $conn->set_charset($charset);
    
    //escape variables for security
    $id = mysqli_real_escape_string($conn, $id);
    
    //maak de sql string
    $sql = "DELETE FROM $tablename WHERE id=$id";
    
    //voer de query uit en sla het resultaat op
    $result = $conn->query($sql);
    
    //controleer dat query goed is uitgeverd (true) en geef eventuele fout indien niet (false)
    if($result === true){ $feedback .= $id.' succesfully deleted';	}
    else{ $feedback .= "Error: ".$conn->error."<br>"; }
    
    //connectie terug sluiten
    $conn->close();
    
    //return de feedback
    return $feedback;
}

?>