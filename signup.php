<?php
session_start();
?>

<!doctype html>
<html>
    <?php require_once "includes/head.php";  ?>

<body>
    <div class="container-fluid">

    <?php 
    require_once "includes/functions.php";
    if(checkUser()){ 
        addNewUser(); 
        redirect("index.php");
    }
    require_once "includes/header.php"; ?>
    <div class="container" style="margin-top: 100px">
        <div class="form-group row"> <form method="post" class="row g-2" action="signup.php" novalidate >
            <div class="form-group row" >
                <div class="col-sm-8">
                    <div class="col-sm-6"></div>
                        <label for="login"class="col-sm-2 col-form-label">Login</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="login" id="login" placeholder="Login" required>
                        </div>
                </div>      
            </div>
            <div class="form-group row" >
                <div class="col-sm-8">
                    <div class="col-sm-6"></div>
                    <label for="email"class="col-sm-2 col-form-label">Email address</label>
                    <div class="col-sm-4">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                    </div>
                </div>      
            </div>
                
            <div class="form-group row" >
                <div class="col-sm-8">
                    <div class="col-sm-6"></div>
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-4">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                    </div>
                </div>  
            </div>
            <div class="form-group row" >
                <div class="col-sm-8">
                    <div class="col-sm-6"></div>
                    <label for="password_conf" class="col-sm-2 col-form-label">Confirm Password</label>
                    <div class="col-sm-4">
                        <input type="password" class="form-control" name="password_conf" id="password_conf" placeholder="Password" required>
                    </div>
                </div>  
            </div>
            <div class="form-group row">
                <div class="form-check">
                    <label for="endSto">Admin ?</label>
                    <input class="form-check-input" type="checkbox" id="admin" name="admin" value="1">
                </div>
            </div>
            <div class="col-sm-7"></div>
            <div class="form-group row" style="width:100px;" >
                <button type="submit" class="btn btn-danger">Submit</button>
            </div>
        </form></div>
    </div>
    <?php 
    require_once "includes/footer.php"; 
    require_once "includes/scripts.php"; 
    ?>
</body>
</html>