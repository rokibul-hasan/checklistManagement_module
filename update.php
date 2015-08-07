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
foreach ($checklists as $item){
?>

        <form id="myForm2" action="update_checklist.php" method="post" class="form text-center">
                                <label for="category">Select Category:</label>
                                    <select name="category_id" id="category"  class="form-control">
                                        <?php                                        
                                        foreach($crnt_cat as $crnt_category) { ?>
                                        <option value="<?php echo $crnt_category['category_id'] ?>"><?php echo $crnt_category['category_name'] ?></option>
                                       <?php } ?>
                                       <?php foreach($categories as $category){ ?>
                                        <option value="<?php echo $category['id'] ?>"><?php echo $category['category_name'] ?></option>
                                       <?php } ?>
                                    </select>

                                <label for="item">Title:</label>
                                <input value="<?php echo $item['title'] ?>" type="text" name="title" id="item" class="form-control">
                                
                                <label for="modified_by">Created By:</label>
                                <select class="form-control" name="modified_by" id="modified_by">
                                    <option value="<?php echo $item['created_by']?>"><?php echo $item['created_by']?></option>
                                    <option value="Admin">Admin</option>
                                    <option value="User">User</option>
                                </select>
                                <input type="hidden" value="<?php echo $item['id']?>" name="id">

                                
                                    <br>
                                    <button id="sub2" class="btn btn-primary btn-block">UPDATE</button>
                                
                            </form>
                            <br>
                            <span id="result2" class="text-center color-blue"></span>
     <script src="src/js/jquery.min.js" type="text/javascript"></script>
      <script src="src/js/bootstrap.min.js" type="text/javascript"></script>
 <script>
 $("#sub2").click( function() {
 $.post( $("#myForm2").attr("action"), 
         $("#myForm2 :input").serializeArray(), 
         function(info){ $("#result2").html(info); 
   });
 clearInput();
});
 
$("#myForm2").submit( function() {
  return false;	
});
 
function clearInput() {
	$("#myForm2 :input").each( function() {
	   $(this).val('');
	});
}



</script>


<?php } ?>
