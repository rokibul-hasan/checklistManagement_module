<?php



/*
function create(){
    
    $query = "INSERT INTO `crud`.`profiles` (`id`, `email`, `fullname`) VALUES (NULL, '".$_POST['email']."', '".$_POST['fullname']."')";
    mysql_query($query);
    
    redirect();
}

function get(){
    
    $query = "SELECT * FROM profiles WHERE id = ".$_GET['id'];
    $result = mysql_query($query);
    
    $row = mysql_fetch_assoc($result);
    
    return $row;
}

function all(){
        
    $query = "SELECT * FROM profiles";
    $result = mysql_query($query);
    
    $data = array();
    while($row = mysql_fetch_assoc($result)){        
        $data[] = $row;
    }
    return $data;
}

function store(){
    
    $query = "UPDATE `crud`.`profiles` SET `email` = '".$_POST['email']."', `fullname` = '".$_POST['fullname']."' WHERE `profiles`.`id` =".$_POST['id'];
    mysql_query($query);
    
    redirect();
}

function delete(){
    
    $query = "DELETE FROM `crud`.`profiles` WHERE `profiles`.`id` = ".$_GET['id'];
    mysql_query($query);
    
    redirect('http://yahoo.com');       
}

