
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
        <li><a href="view.php?tab=student" style="color: white; right:20% "><span >VIEW</span></a></li>

    </ul>
    <ul class="nav navbar-nav navbar-right">
        <li><a href="Home.php" style="color: white; right:20% "><span >HOME</span></a></li>

    </ul>





</nav>


<div>

    <?php
    include "insert.php";





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


            $data['agree'] = $_POST['yes'];



            $table_name = "student";

            $obj = new CRUD();
            $obj->insert($data, $table_name);

        }

    }










    ?>

</div>



<div class="container"style=" padding: 10%">
    <h2> Student Information</h2>


    <form action="studentIndex.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" placeholder="Enter Your Name" name="name">
        </div>
        <div class="form-group">
            <label for="fathername">Father Name:</label>
            <input type="text" class="form-control" id="father_name" placeholder="Father's Name" name="father_name">
        </div>
        <div class="form-group">
            <label for="mothername">Mother Name:</label>
            <input type="text" class="form-control" id="mother_name" placeholder="Mother's Name" name="mother_name">
        </div>
        <div class="form-group">
            <label for="mobilenumber">Mobile Number:</label>
            <input type="text" class="form-control" id="mobile_number" placeholder="017XXXXXXXX" name="mobile_number">
        </div>
        <div class="form-group">
            <label for="mothername">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="abc@gmail.com" name="email">
        </div>

        <div class="from-group">

            <label>Gender</label>

            <div class="radio">
                <label><input type="radio" name="gender" value="Male" >Male</label>
            </div>
            <div class="radio">
                <label><input type="radio" name="gender" value="Female">Female</label>
            </div>
            <div class="radio ">
                <label><input type="radio" name="gender" value="Other">Other</label>
            </div>
        </div>




        <div class="form-group">
            <label for="comment">Address:</label>
            <textarea class="form-control" name="address" rows="5" id="comment"></textarea>
        </div>


            <div class="form-group">
                <label for="sel1">Religion:</label>
                <select class="form-control" name="religion">
                    <option>Choose....</option>
                    <option>Islam</option>
                    <option>Hinduism</option>
                    <option>Buddhism</option>
                    <option>Christianity</option>
                </select>
            </div>

        <div class="form-group">
            <label for="exampleFormControlFile1">Upload your photo:</label>
            <input type="file" accept="image/x-png,image/gif,image/jpeg" class="form-control-file" name="image" id="imgFile">
        </div>

        <div class="form-group">
            <label for="exampleFormControlFile1">Upload your CV:</label>
            <input type="file" accept="application/pdf, application/msword" placeholder="Only pdf" class="form-control-file" name="file" id="File">
        </div>



        <div class="form-check form-group">
            <input class="form-check-input" type="checkbox" value="yes" name="yes" namid="defaultCheck1">
            <label class="form-check-label" for="defaultCheck1">
                If Agree Then Tick
            </label>
        </div>
        <button type="submit" name="submit" class="btn btn-default">Submit</button>

    </form>



</div>






</body>
</html>

<?php
include "inc/footer.php"
?>

