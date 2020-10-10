<?php
include "inc/header.php";

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
        <li><a href="view.php?tab=student" style="color: white; right:20% "><span >Student Table View</span></a></li>

    </ul>

    <ul class="nav navbar-nav navbar-right">
        <li><a href="view.php?tab=teacher" style="color: white; right:20% "><span >Teacher Table View</span></a></li>

    </ul>





</nav>

<div class="container" style=" padding-top: 15%; padding-bottom: 30%; padding-left: 15%">
    <div class="card">
        <div class="card-header">
            <h4>TEACHER</h4>
        </div>
        <div class="card-body">
            <h5 class="card-title">Special title treatment</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="teacherIndex.php" class="btn btn-primary">GO</a>
        </div>
    </div>
    <br>
    <div class="card-header">
        <h4>STUDENT</h4>
    </div>
    <div class="card-body">
        <h5 class="card-title">Special title treatment</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="studentIndex.php" class="btn btn-primary">GO</a>
    </div>
</div>


</div>










</body>

<?php
include "inc/footer.php";

?>

