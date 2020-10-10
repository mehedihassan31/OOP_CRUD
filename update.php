<?php
/**
 * Created by PhpStorm.
 * User: radid
 * Date: 10/7/2020
 * Time: 6:03 PM
 */
?>

<?php
include "insert.php";

$model = new CRUD();
$id = $_REQUEST['id'];


$table_name = $_REQUEST['tab'];

$row = $model->viewId($id,$table_name);







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
        <li><a href="view.php?tab=<?php echo $table_name ;?>" style="color: white; right:20% "><span >VIEW</span></a></li>

    </ul>
    <ul class="nav navbar-nav navbar-right">
        <li><a href="Home.php" style="color: white; right:20% "><span >HOME</span></a></li>

    </ul>





</nav>


<div>



</div>



<form action="" method="post" enctype="multipart/form-data">
    <?php

             $img_old=$row['img'];
             $filepdf_old=$row['filepdf'];

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['submit'])){


            $data['name'] = $_POST['name'];
            $data['fname'] = $_POST['father_name'];
            $data['mname'] = $_POST['mother_name'];
            $data['mobile'] = $_POST['mobile_number'];
            $data['email'] = $_POST['email'];
            $data['gender'] = $_POST['gender'];
            $data['address'] = $_POST['address'];
            $data['religion'] = $_POST['religion'];







            $image = $_FILES["image"]["name"];
            $temp_image = $_FILES["image"]["tmp_name"];
            $file_size = $_FILES["image"]["size"];
            $target_dir = "images/";
            $data['img']=$target_file = strtolower($target_dir . basename($image));
            $img_file_type = pathinfo($target_file, PATHINFO_EXTENSION);

            //Allow certain file formats
            if ($img_file_type != "jpg" && $img_file_type != "png" && $img_file_type != "jpeg" && $img_file_type != "gif") {
                echo "<script>alert('JPG, PNG, JPEG and GIF files are allowed!')</script>";

            } else {

                $move_img = move_uploaded_file($temp_image, $target_file);

            }




            /// File Part
            $file = $_FILES["file"]["name"];
            $temp_doc = $_FILES["file"]["tmp_name"];
            $file_size = $_FILES["file"]["size"];
            $target_pdf_dir = "images/";
            $data['filepdf']= $target_pdf_file = strtolower($target_pdf_dir . basename($file));
            $doc_file_type = pathinfo($target_pdf_file, PATHINFO_EXTENSION);


            if ($doc_file_type != "docx" && $doc_file_type != "ppt" && $doc_file_type != "pdf" && $doc_file_type != "xls") {
                echo "<script>alert('Docx, PPT, PDF and XLS files are allowed!')</script>";

            } else {
                $movfile = move_uploaded_file($temp_doc, $target_pdf_file);

            }








            $obj = new CRUD();
            $obj->update($id,$data, $table_name,$img_old, $filepdf_old,$image,$file);

        }

    }


    ?>




    <div class="container"style=" padding: 10%">
        <h2> Student Information</h2>



        <div class="form-group">

            <div class="form-group" style="padding-left: 70%;">

                <img   class="form-control-file"   style=" height: 200px; width: 200px;" src="<?php echo $row['img']; ?>">

                <br><label for="exampleFormControlFile1">Change your photo:</label>
                <input type="file" accept="image/x-png,image/gif,image/jpeg" class="form-control-file" name="image" id="imgFile">
            </div>



            <div class="form-group">
                <label for="name">Name:</label>

                <input type="text" class="form-control" id="name" value="<?php echo $row['name']; ?>" name="name" >
            </div>
            <div class="form-group">
                <label for="fathername">Father Name:</label>
                <input type="text" class="form-control" id="father_name" value="<?php echo $row['fname']; ?>" name="father_name" >
            </div>
            <div class="form-group">
                <label for="mothername">Mother Name:</label>
                <input type="text" class="form-control" id="mother_name" value="<?php echo $row['mname']; ?>" name="mother_name">
            </div>
            <div class="form-group">
                <label for="mobilenumber">Mobile Number:</label>
                <input type="text" class="form-control" id="mobile_number" value="<?php echo $row['mobile']; ?>" name="mobile_number" >
            </div>
            <div class="form-group">
                <label for="mothername">Email:</label>
                <input type="email" class="form-control" id="email" value="<?php echo $row['email']; ?>" name="email" >
            </div>




            <?php
            if($row['gender']=="Male"){
            ?>

            <div class="from-group">

            <label>Gender</label>

            <div class="radio">
                <label><input type="radio" name="gender" value="Male" checked>Male</label>
            </div>
            <div class="radio">
                <label><input type="radio" name="gender" value="Female">Female</label>
            </div>
            <div class="radio ">
                <label><input type="radio" name="gender" value="Other">Other</label>
            </div>
        </div>
<?php

            }elseif($row['gender']=="Female")

            {
            ?>


            <div class="from-group">

                <label>Gender</label>

                <div class="radio">
                    <label><input type="radio" name="gender" value="Male" >Male</label>
                </div>
                <div class="radio">
                    <label><input type="radio" name="gender" value="Female" checked>Female</label>
                </div>
                <div class="radio ">
                    <label><input type="radio" name="gender" value="Other">Other</label>
                </div>
            </div>

                      <?php
            }else{

            ?>
                <div class="from-group">

                    <label>Gender</label>

                    <div class="radio">
                        <label><input type="radio" name="gender" value="Male" >Male</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="gender" value="Female" >Female</label>
                    </div>
                    <div class="radio ">
                        <label><input type="radio" name="gender" value="Other" checked>Other</label>
                    </div>
                </div>


            <?php
           }

            ?>









            <!---->
<!--            <div class="from-group">-->
<!---->
<!--                <label>Gender</label>-->
<!---->
<!--                <input class="form-control" type="text" name="gender" value="--><?php //echo $row['gender']; ?><!--" readonly>-->
<!---->
<!---->
<!--            </div>-->




            <div class="form-group">
                <label for="comment">Address:</label>
                <textarea class="form-control" name="address" rows="3"   ><?php echo $row['address']; ?></textarea>
            </div>








            <?php
            if($row['religion']=="Islam"){
                ?>

                <div class="form-group">
                    <label for="sel1">Religion:</label>
                    <select class="form-control" name="religion">
                        <option>Choose....</option>
                        <option selected>Islam</option>
                        <option>Hinduism</option>
                        <option>Buddhism</option>
                        <option>Christianity</option>
                    </select>
                </div>

                <?php

            }elseif($row['religion']=="Hinduism")

            {
                ?>

                <div class="form-group">
                    <label for="sel1">Religion:</label>
                    <select class="form-control" name="religion">
                        <option>Choose....</option>
                        <option >Islam</option>
                        <option selected>Hinduism</option>
                        <option>Buddhism</option>
                        <option>Christianity</option>
                    </select>
                </div>

                <?php
            }elseif($row['religion']=="Buddhism"){

                ?>

                <div class="form-group">
                    <label for="sel1">Religion:</label>
                    <select class="form-control" name="religion">
                        <option>Choose....</option>
                        <option >Islam</option>
                        <option >Hinduism</option>
                        <option selected>Buddhism</option>
                        <option>Christianity</option>
                    </select>
                </div>


                <?php
            }else{

            ?>

                <div class="form-group">
                    <label for="sel1">Religion:</label>
                    <select class="form-control" name="religion">
                        <option>Choose....</option>
                        <option >Islam</option>
                        <option >Hinduism</option>
                        <option >Buddhism</option>
                        <option selected>Christianity</option>
                    </select>
                </div>


            <?php
            }

            ?>






<!---->
<!---->
<!--            <div class="form-group">-->
<!--                <label for="sel1">Religion:</label>-->
<!--                <input type="text" class="form-control" name="religion"  value="--><?php //echo $row['religion']; ?><!--" readonly>-->
<!---->
<!--            </div>-->



            <div class="form-group">
                <label for="exampleFormControlFile1"><?php echo $row['filepdf'];?></label><br>



                <a href="<?php echo $row['filepdf'];?>" download> Download Document File</a>


                    <label for="exampleFormControlFile1">Change your file:</label>
                    <input type="file" accept="application/pdf, application/msword" placeholder="Only pdf" class="form-control-file" name="file" id="File">

            </div>
            <div >

                <button  style="
        color: #fff;
    background-color: #337ab7;
    border-color: #2e6da4;" type="submit" name="submit" class="btn btn-default">Update</button>
            </div>




        </div>



    </div>

</form>




</body>
</html>

<?php
include "inc/footer.php"
?>


