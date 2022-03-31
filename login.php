<?php
$host = $_SERVER['HTTP_HOST'];
$ruta = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$url = "http://$host$ruta"; 

if (isset($_POST["cancel"])) {
header("Location: $url/login.php");
die();
}

$message = false;
if (isset($_POST["who"]) && isset($_POST["pass"])) {
$salt = 'XyZzy12*_';

$stored_hash = '1a52e17fa899cf40fb04cfc42e6352f1';

$md5 = hash("md5", $salt . $_POST["pass"]);

if ($md5 == $stored_hash) {
    header("Location: $url/game.php?name=" . urlencode($_POST['who']));
    die();
}
if (strlen($_POST["who"]) < 1 || strlen($_POST['pass']) < 1) {
    $message = "User name and password are required";
} else {
    $message = "Incorrect password";
}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <link href="starter-template.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <title>Please log in</title>
</head>

<body>
    <nav class="navbar navbar-dark bg-dark navbar-expand-lg fixed-top fs-10">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand mr-auto" href="./index.html">Game</a>
            <div class="collapse navbar-collapse" id="Navbar">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active"><a class="nav-link" href="./index.html">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="./login.php">Log In</a></li>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="./contactus.html">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

<div class="container mt-5">
<h1>Please Log In</h1>
<?php
    if ($message !== false) {
        echo('<p style="color: red;">'.htmlentities($message) . "</p>\n");
    }
    ?>
<form method="POST">
<label for="nam" >User Name</label>
<input type="text" name="who" id="nam" placeholder="enter your user name"><br/>
<label for="pw">Password</label>
<input type="text" name="pass" id="pw" placeholder="php123"><br/>
<input type="submit" value="Log In">
<input type="submit" name="cancel" value="Cancel">
</form>
</div>
</div>

<footer class="footer ">
        <div class="container">
            
            <div class="row justify-content-center">
                <div class="col-auto">
                    <p>© Copyright Lynn Lin</p>
                </div>
            </div>
        </div>
    </footer>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>
