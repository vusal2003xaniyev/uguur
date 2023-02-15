<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Daxil ol</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/style.css" />
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="./assets/main.js"></script>
    <?php require_once "./app/loginController.php"?>
</head>

<body class="sign-up">
    <div class="mt-5 ">
        <form method="POST">
            <div class="col-3 m-auto sign">
                <div class="form-group mt-5">
                    <h4 class="display-6 text-center">Daxil ol</h4>
                </div>

                <div class="form-group mt-5">
                    <input type="email" onfocusout="loginCheck(this.value)" class="form-control" name="email" required="required" id="email" placeholder="E-Poçt" aria-describedby="emailHelp">
                </div>
                <div class="form-group mt-5">
                    <input type="password" class="form-control" name="password" required="required" id="password" placeholder="Şifrə">
                </div>
                <a href="sign_up.php" class="nav-link">Qeydiyyat</a>


                <button name="login" id="login" class="btn btn-primary btn-block mt-4">Göndər</button>
            </div>

        </form>
    </div>

</body>

</html>