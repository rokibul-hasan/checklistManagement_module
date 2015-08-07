<?php

require 'lib/app.php';
require 'vendor/autoload.php';

use Checklist\Manage_Checklist;
if($_POST['title']=='' || $_POST['category_id']==''|| $_POST['created_by']==''){
    echo '<p class="alert alert-danger">Sorry. Please Select option & insert data proberly</p>';
}else{
$ct= new Manage_Checklist();
$ct->insert('checklists',$_POST);

echo '<p class="alert alert-success">Insert data Success</p>';
}