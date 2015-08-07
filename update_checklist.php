<?php
require 'lib/app.php';
require 'vendor/autoload.php';
use Checklist\Manage_Checklist;

if($_POST['title']=='' || $_POST['category_id']==''|| $_POST['modified_by']==''){
    echo '<p class="alert alert-danger">Sorry. Please Select option & insert data proberly</p>';
}else{
$id=$_POST['id'];
$ct= new Manage_Checklist();
$ct->update($id,$_POST);


echo '<p class="alert alert-success">update data Successfull</p>';
}
