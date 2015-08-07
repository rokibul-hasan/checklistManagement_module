<!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center" id="myModalLabel">Insert New Checklist Item</h4>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <form id="myForm" action="data_process.php" method="post" class="form text-center">
                                <label for="category">Select Category:</label>
                                    <select name="category_id" id="category"  class="form-control">
                                        <option value="">select a cetogery</option>
                                        <?php foreach($categories as $category) { ?>
                                        <option value="<?php echo $category['id'] ?>"><?php echo $category['category_name'] ?></option>
                                       
                                        <?php } ?>
                                    </select>

                                <label for="item">Title:</label>
                                <input type="text" name="title" id="item" class="form-control">
                                
                                <label for="created_by">Created By:</label>
                                <select class="form-control" name="created_by" id="created_by">
                                    <option value="">select a user</option>
                                    <option value="Admin">Admin</option>
                                    <option value="User">User</option>
                                </select>

                                
                                    <br>
                                    <button id="sub" class="btn btn-primary btn-block">Insert</button>
                                
                            </form>
                            <br>
                            <span id="result" class="text-center color-blue"></span>
                            
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                    
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default close_and_relode" data-dismiss="modal">Close</button>
                    
                  </div>
                </div>
              </div>
            </div>
<script>
    $("#sub").click( function() {
 $.post( $("#myForm").attr("action"), 
         $("#myForm :input").serializeArray(), 
         function(info){ $("#result").html(info); 
   });
 clearInput();
});
 
$("#myForm").submit( function() {
  return false;	
});
 
function clearInput() {
	$("#myForm :input").each( function() {
	   $(this).val('');
	});
}
</script>