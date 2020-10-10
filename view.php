<?php

include "inc/header.php";
include "insert.php";
$table=new CRUD();

$table_name=$_REQUEST['tab'];

$rows=$table->fetch($table_name);

?>



<body style="p">


<nav style="background: blueviolet;" class="navbar navbar-default navbar-fixed-top">
    <div class="navbar-brand" >
        <p class="navbar navbar-light" style="color: white; margin-bottom: 5%">
            <img src="src/world.png" width="30" height="30"  class="d-inline-block align-top" >
            MehediHassan
        </p>
    </div>

    <ul class="nav navbar-nav navbar-right">
        <li ><a href="Home.php"  style="color: white; right:20% " >
                Home</a></li>

    </ul>



</nav>




<div class="container" style=" padding-left: 7%; padding-bottom: 30%; padding-top: 8%">
    <div class="card">
        <h3 class="card-header text-center font-weight-bold text-uppercase py-4"><?php echo $table_name ; ?> Information Table</h3>
        <div class="card-body">
            <div id="table" class="table-editable">
      <span class="table-add float-right mb-3 mr-2"><a href="#!" class="text-success"><i
                      class="fas fa-plus fa-2x" aria-hidden="true"> </i></a></span>


                <table class="table table-bordered table-responsive-md table-striped text-center">
                    <thead>
                    <tr>
                        <th class="text-center">id</th>
                        <th class="text-center">Person Name</th>
                        <th class="text-center">Father's Name</th>
                        <th class="text-center">Mother's Name</th>
                        <th class="text-center">Phone No.</th>
                        <th class="text-center">Gender</th>
                        <th class="text-center">Images</th>
                        <th class="text-center">Action</th>

                    </tr>
                    </thead>


                    <?php
                    if (!empty($rows)) {
                    foreach ($rows as $row) {

                    ?>


                    <tbody>


                    <tr>

                        <td class="pt-3-half" contenteditable="true"><?php echo $row['id']; ?></td>
                        <td class="pt-3-half" contenteditable="true"><?php echo $row['name']; ?></td>
                        <td class="pt-3-half" contenteditable="true"><?php echo $row['fname']; ?></td>
                        <td class="pt-3-half" contenteditable="true"><?php echo $row['mname']; ?></td>
                        <td class="pt-3-half" contenteditable="true"><?php echo $row['mobile']; ?></td>
                        <td class="pt-3-half" contenteditable="true"><?php echo $row['gender']; ?></td>

                        <td class="pt-3-half" contenteditable="true"><img style=" height: 50px; width: 50 px;"
                                                                          src="   <?php echo $row['img']; ?>"></td>


                        <td>

                        <span class="table-remove"><a href="specView.php?id=<?php echo $row['id']; ?>&tab=<?php echo $table_name ;?> " type="button"
                                                           class="btn btn-danger btn-rounded btn-sm my-0">View</a></span>

                            <span class="table-remove"><a href="update.php?id=<?php echo $row['id']; ?>&tab=<?php echo $table_name ;?> " type="button"
                                                               class="btn btn-danger btn-rounded btn-sm my-0">Edit</a></span>


                            <button type="button" data-toggle="modal" title="delete" data-target="#myModal<?php echo $row['id']; ?>"
                                                                class="btn btn-danger btn-rounded btn-sm my-0">Remove</button>




                        </td>


                    </tr>

                    <?php
                    }
                    }
                    ?>


                    </tbody>
                </table>





                <?php

                $table = new CRUD();
                $rows = $table->fetch($table_name);

                if (!empty($rows)) {
                foreach ($rows as $row) {

                if (isset($_POST['delete'])) {

                $id = $_POST['id'];

                $filepath_img = $row['img'];
                $filepath_pdf = $row['filepdf'];

                $table->delete($table_name,$id,$filepath_img, $filepath_pdf);
                }

                ?>





                <!-- Modal -->
                <div id="myModal<?php echo $row['id']; ?>" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->

                        <form action="" method="post">

                            <div class="modal-content">

                                <div class="modal-header">
                                    <button type="button" class="close"
                                            data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Are you sure ?</h4>
                                </div>
                                <div class="modal-body">

                                    <input type="hidden" id="id" name="id" value="<?php echo $row['id']; ?>" class="form-control">

                                    <label>ID number:</label>
                                    </h3><?php echo $row['id']; ?>


                                    <p>If you press this button data will be delete permanently</p>
                                </div>
                                <div class="modal-footer">

                                    <button type="submit" class="btn btn-primary" name="delete" >Delete
                                    </button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                        Close
                                    </button>

                                </div>
                            </div>

                        </form>



                    </div>

                </div>




                    <?php
                }
                }
                ?>



        </div>
        </div>
    </div>



</div>


<?php
include "inc/footer.php";
?>

</body>