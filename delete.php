<?php

require 'lib/app.php';
require 'vendor/autoload.php';

use Checklist\Manage_Checklist;
$id=$_GET['id'];
$ck= new Manage_Checklist();

$ck->delete($id);
 echo '<h4 class="alert alert-danger">Data Delete Successfull</h4>';
?>

