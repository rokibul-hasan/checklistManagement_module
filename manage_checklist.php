<?php

require 'lib/app.php';
require 'vendor/autoload.php';

use Checklist\Manage_Checklist;

$cat= new Manage_Checklist();
$ck = new Manage_Checklist();
$cc = new Manage_Checklist();
$categories=$cat->view('categories');
$page_title='MANAGE CHECKLIST';
$cat_count = $cc->countChecklistByCategory();

?>

<?php include 'src/header.php' ?>
        <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
<?php include 'src/top_nav.php' ?>
        <!-- END HEADER -->
<?php include 'src/profile_sidebar.php' ?>


        <div class="col-md-9">
                            <!--main body part -->
                            <div class="profile-content"  >
                              <h4 class="page-header"><?php echo $page_title ?></h4>
                                <div class="row">

                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Insert New Check list item</button>

                                </div>

                                <br/>
                                <div class="row">
                                    <div class="col-md-8">

                             <!-- end main body part -->
        <?php
        if(!empty($categories)){
            foreach($categories as $key=>$category){
                //var_dump($categories);
        //echo current($categories);
            ?>

                       <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                          <div class="panel panel-info">
                            <div class="panel-heading" role="tab" id="headingOne">

                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#<?php echo $category['category_name'] ?>" aria-expanded="true" aria-controls="collapseOne">
                                   <h4 class="panel-title"><strong>
                                    <?php echo $category['category_name'] ?>
                                  </strong></h4>
                                </a>

                            </div>
                            <div id="<?php echo $category['category_name'] ?>" class="panel-collapse collapse<?php if($key==0){echo ' in';}else{echo '';} ?>" role="tabpanel" aria-labelledby="headingOne">
                              <div class="panel-body">

                                          <table class="table table-striped table-bordered table-hover">
                                            <tr class="danger text-center">
                                                <th class="text-center">SL</th>

                                                <th class="text-center">Checklist Title</th>
                                                <th class="text-center">Edit</th>
                                                <th class="text-center">View</th>
                                                <th class="text-center">Delete</th>
                                            </tr>
                                            <?php 
                                            $cat=$category['id'];
                                            $checklists = $ck->viewByCategory('checklists',$cat);
                                            $count=1;  
                                            if(!empty($checklists)){
                                                foreach($checklists as $item)

                                            { ?>
                                            <tr>
                                                <td><?php echo $count++ ?></td>
                                                <td><?php echo $item['title'] ?></td>

                                                <td class="text-center">
                                                <a class="btn btn-primary btn-xs" data-toggle="modal" data-target="#update_qc" data-whatever="<?php echo $item['id'] ?>"><i class="fa fa-edit"></i></a>
                                                </td>
                                                <td class="text-center">
                                                <a  class="btn btn-success btn-xs" data-toggle="modal" data-target="#qc_view" data-whatever="<?php echo $item['id'] ?>"><i class="fa fa-search"></i></a>
                                                </td>
                                                <td class="text-center">
                                                <a class="btn btn-danger btn-xs" data-toggle="modal" data-target="#qc_delete" data-whatever="<?php echo $item['id'] ?>"><i class="fa fa-remove"></i></a>
                                                </td>

                                            </tr>
                                            <?php }} ?>


                                        </table>
                                  <!--
                                        <ul class="pagination pagination-sm">
                                            <li>
                                              <a href="#" aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                              </a>
                                            </li>
                                            <li><a href="#">1</a></li>
                                            <li><a href="#">2</a></li>
                                            <li><a href="#">3</a></li>
                                            <li><a href="#">4</a></li>
                                            <li><a href="#">5</a></li>
                                            <li>
                                              <a href="#" aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                              </a>
                                            </li>   
                                        </ul>

                                                                  <!--end catagory -->
                                </div> 
                            </div>
                          </div>
                       </div>
        <!--end foreach -->
        <?php    } } ?>

                                        <!--category list -->
                                        </div>
                                        <div class="col-md-4">

                                            <div class="panel panel-primary">
                                              <div class="panel-heading"><strong>Checklist Category</strong></div>
                                              <div class="panel-body">
                                                  <a href="" class="btn btn-danger">Add new category</a>
                                                 <div class="profile-usermenu">

                                                     <ul class="nav">
                                                        <?php 
                                                        
                                                        if(!empty($cat_count)){    foreach($cat_count as $row) {  ?>
                                                         <li><a href="#<?php echo $row['category'] ?>"><?php echo $row['category'] ?>&nbsp;<span class="badge"><?php echo $row['item'] ?></span></a></li>
                                                        <?php    }} ?>
                                                     </ul>
                                                </div>
                                              </div>
                                            </div>


                                        </div>
                                        </div>



                            </div>

                        </div>

                
            </div>
        </div>
        <br/>
        <br/>

        <div class="footer navbar-fixed-bottom">
            <footer class="copyright navbar navbar-default navbar-bottom">
                <span>2015 © CHECKLIST TEAM. ALL RIGHT RESERVE.</span>
            </footer>
        </div>

        <!-- END LOGIN -->
        <!-- BEGIN CORE PLUGINS -->
        <!--[if lt IE 9]>
        <script src="../../assets/global/plugins/respond.min.js"></script>
        <script src="../../assets/global/plugins/excanvas.min.js"></script> 
        <![endif]-->
        <script src="src/js/jquery.min.js" type="text/javascript"></script>
        <script src="src/js/bootstrap.min.js" type="text/javascript"></script>
        <script>
            $(document).ready(function () {
                $('[id^=detail-]').hide();
                $('.toggle').click(function () {
                    $input = $(this);
                    $target = $('#' + $input.attr('data-toggle'));
                    $target.slideToggle();
                });
            });
            $('.selectpicker').selectpicker();
            $('.selectpicker').selectpicker({
                style: 'btn-info',
                size: 4
            });
        </script>
        <script>
            $(document).ready(function () {
                $("#mytable #checkall").click(function () {
                    if ($("#mytable #checkall").is(':checked')) {
                        $("#mytable input[type=checkbox]").each(function () {
                            $(this).prop("checked", true);
                        });

                    } else {
                        $("#mytable input[type=checkbox]").each(function () {
                            $(this).prop("checked", false);
                        });
                    }
                });

                $("[data-toggle=tooltip]").tooltip();
            });
        </script>

        <!-- add project javascript popover start here-->
        <!-- Modal -->

        <div class="modal fade" id="myModal12" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Add Project</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Project name</label>
                                <div class="col-sm-7">
                                    <input type="text" name="project_name" class="form-control" id="inputEmail3" placeholder="enter project name">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- add project javascript popover end here-->
        <!-- suggest QC javascript popover start here-->
        <!-- Modal -->
        <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Suggest QC</h4>
                    </div>
                    <div class="modal-body">
                            <label>Select Your QC Category</label>
                        <select class="form-control">
                            <option>body</option>
                            <option>footer</option>
                            <option>header</option>
                            <option>menu</option>
                            <option>content</option>
                        </select>
                              <br/>
                        <form class="form-horizontal">
                         
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">YOUR QC</label>
                                <div class="col-sm-7">
                                    <input type="text" name="user_qc" class="form-control" id="inputEmail3" placeholder="enter your qc">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
        <!--suggest QC javascript popover end here-->

        <!-- insert item modal -->
<?php include 'src/manage_checklist/insert.php' ?>

        <!-- end insert item modal -->

        <!-- update item modal -->
<?php include 'src/manage_checklist/update.php' ?>
       

        <!-- end update item modal -->


        <!-- View item modal -->
<?php include 'src/manage_checklist/view.php' ?>

        
        <!-- end View item modal -->
<?php include 'src/manage_checklist/delete.php' ?>
<script>
    $('#update_qc').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipient = button.data('whatever') // Extract info from data-* attributes
          var modal = $(this);
          var dataString = 'id=' + recipient;

            $.ajax({
                type: "GET",
                url: "update.php",
                data: dataString,
                cache: false,
                success: function (data) {
                    console.log(data);
                    modal.find('.ct').html(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });  
    });
    $('#qc_view').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipient = button.data('whatever') // Extract info from data-* attributes
          var modal = $(this);
          var dataString = 'id=' + recipient;

            $.ajax({
                type: "GET",
                url: "show.php",
                data: dataString,
                cache: false,
                success: function (data) {
                    console.log(data);
                    modal.find('.view').html(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });  
    });
        $('#qc_delete').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var recipient = button.data('whatever') // Extract info from data-* attributes
          var modal = $(this);
          var dataString = 'id=' + recipient;

            $.ajax({
                type: "GET",
                url: "delete.php",
                data: dataString,
                cache: false,
                success: function (data) {
                    console.log(data);
                    modal.find('.delete').html(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });  
    });
    
       $(".close_and_relode").click(function(){
            location.reload();
       });
  
    </script>
    </body>
    <!-- END BODY -->
</html>
