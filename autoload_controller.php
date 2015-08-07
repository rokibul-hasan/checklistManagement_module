<?php

require 'lib/app.php';
require 'vendor/autoload.php';

use Checklist\Manage_Checklist;

$ck= new Manage_Checklist();

$data = $ck->view();
print_r($data);
//echo $ck->title;

