<?php

require 'lib/app.php';
require 'vendor/autoload.php';

use Checklist\Manage_Checklist;
$id=$_GET['id'];

$cat= new Manage_Checklist();
$crnt_cat=$cat->viewCategoryByChecklist($id);

$categories=$cat->view('categories');

$ck = new Manage_Checklist();
$checklists=$ck->view('checklists',$id);
foreach ($checklists as $row){
?>
                                <table class="table table-condensed">
                                    <tr>
                                        <td><strong>Category:</strong></td>
                                        <?php                                        
                                        foreach($crnt_cat as $crnt_category) { ?>
                                        <td><?php echo $crnt_category['category_name'] ?></td>
                                       <?php } ?>
                                        
                                    </tr>
                                    <tr>
                                        <td><strong>Title:</strong></td>
                                        <td><?php echo $row['title'] ?> </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Created by:</strong></td>
                                        <td><?php echo $row['created_by'] ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Update by:</strong></td>
                                        <td><?php echo $row['modified_by'] ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Created date:</strong></td>
                                        <td><?php echo $row['created'] ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Update date:</strong></td>
                                        <td><?php echo $row['modified'] ?></td>
                                    </tr>
                                </table>
<?php } ?>    
