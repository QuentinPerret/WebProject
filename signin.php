<?php session_start(); ?>
<!doctype html>
<html>
<?php 
require_once "includes/functions.php";
isUserInDb();
require_once "includes/head.php"; ?>
<body>
    <div class="container-fluid">
        <?php require_once "includes/header.php"; ?>
    
<div class="container" style="margin-top: 100px">
        <form method='post' action='signin.php'>
            <div class="form-group row">
                <div class="col-sm-8">
                    <div class="col-sm-6">
                    </div>
                    <label for="Login"class="col-sm-2 col-form-label">Login</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name ="login" id="login" placeholder="Login" required>
                    </div>
                </div>      
            </div>
            
            <div class="form-group row">
                <div class="col-sm-8">
                    <div class="col-sm-6">
                    </div>
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-4">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                    </div>
                </div>  
            </div>
            <div class="col-sm-7">
                    </div>
            <div class="form-group row" style="width:100px;" >
                <button type="submit" class="btn btn-danger">Submit</button>
            </div>
            <div class="col-sm-6">
                    </div>
            
                <a class="btn btn-primary" href="signup.php">Ou alors créez un compte</a>
           
        </form>
    </div>
    </div>
        <?php require_once "includes/footer.php"; ?>
    </div>

    <?php require_once "includes/scripts.php"; ?>
</body>

</html>