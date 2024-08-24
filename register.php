<?php
include "layout/header.php";

//logged in user are ridirected to the home page
if (isset($_SESSION['email'])){
    header("location:http://localhost/ovie.php/myown/index.php");
    exit;
}

$first_name = $last_name = $email = $phone = $password = $address = "";

$first_name_error = $last_name_error = $email_error = $email_error_and = $phone_error = $address_error = $password_error = $confirm_password_error = "";

$error = false;

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $password= $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    //validate first name
    if (empty($first_name)) {
        $first_name_error = "first name is required";
        $error = true;
    }

    //validate last name
    if (empty($last_name)) {
        $last_name_error = "last name is required";
        $error = true;
    }

    //validate email
    if (empty($email)) {
        $email_error = "email is required and";
        $error = true;
    }

    include "tools/db.php";
    $dbConnection = getDatabaseConnetion();

    $statement= $dbConnection->prepare ("SELECT id FROM users WHERE email = ?");

    //bind variable to the prepared statement as parameters
    $statement -> bind_param("s", $email);

    //execute statement
    $statement -> execute();

    //check if email is already in the database
    $statement->store_result();
    if ($statement->num_rows>0){
        $email_error = "email is already used";
        $error = true;
    }

    //close this statement
    $statement -> close();

    if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $email_error_and = "Email format is must valid";
        $error = true;
    }

    
    //validate phone

    if (empty($phone)) {
        $phone_error = "phone number is required";
        $error = true;
    }

    /*if (!preg_match ("/^(\+[00/d{1,3})?[- ]/d{7,12}$/",$phone)){
        $phone_error = "Phone format is not valid";
        $error = true;
    }*/

    //validate address
    if (empty($address)) {
        $address_error = "address is required";
        $error = true;
    }

    /*validate password
    if (empty($password)){
        $password_error = "password is required";
        $error = true;
    }*/

    if (strlen($password)<6){
        $password_error = "password must have at least 6 characters";
        $error = true;
    }

    //validate confirm password
    if ($password <> $confirm_password) {
        $confirm_password_error = "password must match";
        $error = true;
    }

    if(!$error){
        //all fields are valid: create a new user
        $password = password_hash($password, PASSWORD_DEFAULT);
        $create_at = date('Y-m-d H:i:s');

        //let use prepared statement to avoid sql injection attacks
        $statement = $dbConnection->prepare(
            "INSERT INTO users (first_name, last_name, email, phone, address, password, created_at)" .
            "VALUES (?, ?, ?, ?, ?, ?, ?)"
        );

        //bind varaition to the prepared statement as parameters
        $statement->bind_param('sssssss', $first_name, $last_name, $email, $phone, $address, $password, $create_at);

        //execute statement
        $statement -> execute();
        
        $insert_id = $statement -> insert_id;
        $statement -> close();

        //a new account is created
        //save session data
        $_SESSION['id'] = $insert_id;
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
?>
        <div class="form">
            <h2 class="reg">Register</h2>
            <hr>

            <form  method="post">
                <div class="row mb-3">
                    <label class="col-sm-4 col-form-label">First Name*<label>
                    <div class="col-sm-8">
                        <input class="form-control" name="first_name" value="<?php echo $first_name; ?>">
                        <span class="text-danger"><?= $first_name_error?></span>
                    </div>
                </div>


                <div class="row mb-3">
                    <label class="col-sm-4 col-form-label">Last Name*<label>
                    <div class="col-sm-8">
                        <input class="form-control" name="last_name" value="<?php echo $last_name; ?>">
                        <span class="text-danger"><?= $last_name_error?></span>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-4 col-form-label">Email*<label>
                    <div class="col-sm-8">
                        <input class="form-control" type="text" name="email" value="<?php echo $email; ?>">
                        <span class="text-danger"><?php echo "$email_error  $email_error_and";?></span>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-4 col-form-label">Phone*<label>
                    <div class="col-sm-8">
                        <input class="form-control" name="phone" value="<?php echo $phone; ?>">
                        <span class="text-danger"><?= $phone_error?></span>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-4 col-form-label">Address*<label>
                    <div class="col-sm-8">
                        <input class="form-control" name="address" value="<?php echo $address; ?>">
                        <span class="text-danger"><?= $address_error?></span>
                    </div>
                </div>


                <div class="row mb-3">
                    <label class="col-sm-4 col-form-label">Password*<label>
                    <div class="col-sm-8">
                        <input class="form-control" type="password" name="password" value="">
                        <span class="text-danger"><?= $password_error?></span>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-4 col-form-label">Confirm Password*<label>
                    <div class="col-sm-8">
                        <input class="form-control" type="password" name="confirm_password" value="">
                        <span class="text-danger"><?= $confirm_password_error?></span>
                    </div>
                </div>

                <div class="">
                    
                        <button type="submit" class="btn">Register</button>
               
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