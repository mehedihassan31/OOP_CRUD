<?php
/**
 * Created by PhpStorm.
 * User: radid
 * Date: 10/7/2020
 * Time: 6:03 PM
 */
?>





<?php
include "inc/header.php"
?>

<body >
<nav style="background: blueviolet;" class="navbar navbar-default navbar-fixed-top">
    <div class="navbar-brand" >
        <p class="navbar navbar-light" style="color: white; margin-bottom: 5%">
            <img src="src/world.png" width="30" height="30"  class="d-inline-block align-top" >
            MehediHassan
        </p>
    </div>


    <ul class="nav navbar-nav navbar-right">
        <li><a href="view.php" style="color: white; right:20% "><span >VIEW</span></a></li>

    </ul>
    <ul class="nav navbar-nav navbar-right">
        <li><a href="Home.php" style="color: white; right:20% "><span >HOME</span></a></li>

    </ul>





</nav>


<div>

    <?php
    include "insert.php";



    ?>

</div>



<form>
    <?php

    $model = new CRUD();
    $id = $_REQUEST['id'];
    $table_name =$_GET['tab'];

    $row = $model->viewId($id,$table_name);
    ?>




<div class="container"style=" padding: 10%">
    <h2> Student Information</h2>




    <div class="form-group">

        <div class="form-group">
            <label for="exampleFormControlFile1">Your photo:</label>

            <img   class="form-control-file"   style=" height: 200px; width: 200px;" src="<?php echo $row['img']; ?>">
        </div>

        <div class="form-group">
            <label for="name">Name:</label>

            <input type="text" class="form-control" id="name" value="<?php echo $row['name']; ?>" name="name" readonly>
        </div>
        <div class="form-group">
            <label for="fathername">Father Name:</label>
            <input type="text" class="form-control" id="father_name" value="<?php echo $row['fname']; ?>" name="father_name" readonly>
        </div>
        <div class="form-group">
            <label for="mothername">Mother Name:</label>
            <input type="text" class="form-control" id="mother_name" value="<?php echo $row['mname']; ?>" name="mother_name" readonly>
        </div>
        <div class="form-group">
            <label for="mobilenumber">Mobile Number:</label>
            <input type="text" class="form-control" id="mobile_number" value="<?php echo $row['mobile']; ?>" name="mobile_number" readonly>
        </div>
        <div class="form-group">
            <label for="mothername">Email:</label>
            <input type="email" class="form-control" id="email" value="<?php echo $row['email']; ?>" name="email" readonly>
        </div>

        <div class="from-group">

            <label>Gender</label>

                <input class="form-control" type="text" name="gender" value="<?php echo $row['gender']; ?>" readonly>


        </div>




        <div class="form-group">
            <label for="comment">Address:</label>
            <input class="form-control" name="address" rows="3"  value="<?php echo $row['address']; ?>" readonly></input>
        </div>


        <div class="form-group">
            <label for="sel1">Religion:</label>
            <input type="text" class="form-control" name="religion"  value="<?php echo $row['religion']; ?>" readonly>

        </div>



        <div class="form-group">
            <label for="exampleFormControlFile1">Your Uploaded File:</label>



                <a href="<?php echo $row['filepdf'];?>" download> Download Document File</a>


        </div>



        <div class="form-check form-group">
            <label class="form-check-label" for="defaultCheck1">
                If you are  Agree or not:
            </label>
            <input class="form-control" type="text" value="<?php echo $row['agree']; ?>" name="yes" namid="defaultCheck1" readonly>

        </div>

    </div>



</div>

</form>




</body>
</html>

<?php
include "inc/footer.php"
?>


