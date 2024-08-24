<?php
include "layout/header.php";

//check if the user is logged in, if not then redirect him to the login page
if (!isset($_SESSION['email'])){
    header ("location:http://localhost/ovie.php/myown/index.php");
    exit;
}
?>

<div class="form">
    <h2 class="reg">Profile</h2>
    <hr>

    <div class="idea">
        <div class="name">First Name</div>
        <div class="subname"><?= $_SESSION['first_name'] ?></div>
    </div>

    <div class="idea">
        <div class="name">Last Name</div>
        <div class="subname"><?= $_SESSION['last_name'] ?></div>
    </div>

    <div class="idea">
        <div class="name">Email</div>
        <div class="subname"><?= $_SESSION['email'] ?></div>
    </div>

    <div class="idea">
        <div class="name">Phone</div>
        <div class="subname"><?= $_SESSION['phone'] ?></div>
    </div>

    <div class="idea">
        <div class="name">Address</div>
        <div class="subname"><?= $_SESSION['address'] ?></div>
    </div>

    <div class="idea">
        <div class="name">Registered At</div>
        <div class="subname"><?= $_SESSION['created_at'] ?></div>
    </div>
</div>
<?php
include "layout/footer.php";
?>