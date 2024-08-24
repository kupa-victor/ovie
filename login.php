<?php
include "layout/header.php";

//check if the user us logged in, if yes then redirect him to the home page
if (isset($_SESSION["email"])) {
    header("location:http://localhost/ovie.php/myown/index.php");
    exit;
}

$email = $password = "";
$error = "";
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    $password = $_POST['password'];


    if (empty($email) || empty($password)){
        $error = "Email and Password are required";
    }else{
        include "tools/db.php";
        $dbConnection = getDatabaseConnetion();
        
        $statement = $dbConnection -> prepare(
            "SELECT id, first_name, last_name, phone, password, created_at FROM users WHERE email = ?"
        );

        //bind varables to the prepared statement as parameters
        $statement ->bind_param("s",$email);

        //execute statement
        $statement ->execute();

        //bind result variables
        $statement -> bind_result($id, $first_name, $last_name, $phone, $stored_password, $created_at);

        //fetch values
        if ($statement->fetch()){
            if (password_verify($password, $stored_password)) {
                //password is correct

                //store data in session varaibles
                $_SESSION['id'] = $id;
                $_SESSION['first_name'] = $first_name;
                $_SESSION['last_name'] = $last_name;
                $_SESSION['email'] = $email;
                $_SESSION['phone'] = $phone;
                $_SESSION['address'] = $address;
                $_SESSION['created_at'] = $create_at;

                //redirect user to the home page
                header("location:http://localhost/ovie.php/myown/index.php");
                exit;
            }
        }
    }

    $statement -> close();
    $error = "email or password invalid";
}
?>

<div class="form">
            <h2 class="reg">Login</h2>
            <hr>

            <form  method="post">
                <div class="row mb-3">
                    <label class="col-sm-4 col-form-label">Email<label>
                    <div class="col-sm-8">
                        <input class="form-control" name="email" value="<?= $email ?>">
                        <span class="text-danger"> </span>
                    </div>
                </div>


                <div class="row mb-3">
                    <label class="col-sm-4 col-form-label">Password<label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" name="password" value="" />
                        <span class="text-danger"><?= $error?></span>
                    </div>
                </div>
                <div class="">
                    
                    <button type="submit" class="btn">Login</button>
           
            </div>

            <div class="btn">    
                    <a href="index.php" class="">
                        Cancel
                    </a>
            </div>
            </form>
        
</div>

<?php 
include "layout/footer.php";
?>