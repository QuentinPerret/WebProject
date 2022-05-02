<?php
session_start();
?>

<!doctype html>
<html>

<?php require_once "includes/head.php"; ?>

<body>
    <div class="container-fluid">
        <?php require_once "includes/header.php"; ?>
    

    <div class="container" style="margin-top: 100px">
        <form>
            <div class="form-group row">
                <div class="col-sm-8">
                    <div class="col-sm-6">
                    </div>
                    <label for="email"class="col-sm-2 col-form-label">Email address</label>
                    <div class="col-sm-4">
                        <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                    </div>
                </div>      
            </div>
            
            <div class="form-group row">
                <div class="col-sm-8">
                    <div class="col-sm-6">
                    </div>
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-4">
                        <input type="password" class="form-control" id="Password1" placeholder="Password">
                    </div>
                </div>  
            </div>
            <div class="form-group row">
                <div class="col-sm-8">
                    <div class="col-sm-6">
                    </div>
                    <label for="password" class="col-sm-2 col-form-label">Confirm Password</label>
                    <div class="col-sm-4">
                        <input type="password" class="form-control" id="Password2" placeholder="Password">
                    </div>
                </div>  
            </div>
            <div class="col-sm-7">
                    </div>
            <div class="form-group row" style="width:100px;" >
                <button type="submit" class="btn btn-danger">Submit</button>
            </div>
        </form>
    </div>
    </div>

        <?php require_once "includes/footer.php"; ?>
    </div>

    <?php require_once "includes/scripts.php"; ?>
</body>

</html>