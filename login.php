<?php
session_start();
?>

<!doctype html>
<html>

<?php require_once "Include/head.php"; ?>

<body>
    <div class="container-fluid">
        <?php require_once "Include/header.php"; ?>
    
</br>
</br>
</br>
</br>
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
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                </div>  
            </div>
            <div class="col-sm-7">
                    </div>
            <div class="form-group row">
                <button type="submit" class="btn btn-danger">Submit</button>
            </div>
        </form>
    </div>

        <?php require_once "Include/footer.php"; ?>
    </div>

    <?php require_once "Include/scripts.php"; ?>
</body>

</html>