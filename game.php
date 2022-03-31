<?php
function mod($a, $n)
{
    return ($a % $n) + ($a < 0 ? $n : 0);
}

function check($computer, $human)
{
    $result = mod($computer - $human, 3);
    if ($result == 2) {
        return "You Win";
    } elseif ($result == 1) {
        return "You Lose";
    } else {
        return "Tie";
    }
}

    $host = $_SERVER['HTTP_HOST'];
    $ruta = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $url = "http://$host$ruta"; 

if (!isset($_GET["name"]) || strlen($_GET["name"]) < 1) {
    die("Name parameter missing");
}

if (isset($_POST["logout"])) {
    header("Location: $url/index.html");
    die();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <link href="starter-template.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <title>Welcome to the game</title>
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


</head>
<body>
<div class="container">
<h1>Rock Paper Scissors</h1>
<p>Welcome:<?php echo htmlentities($_GET["name"])?></p>
<form method="post">
<select name="human">
<option value="-1">Select</option>
<option value="0">Rock</option>
<option value="1">Paper</option>
<option value="2">Scissors</option>
<option value="3">Test</option>
</select>
<input type="submit" value="Play">
<input type="submit" name="logout" value="Logout">
</form>

<?php
    echo "<pre>";
    $names = array('0' => "Rock", '1' => "Paper", '2' => "Scissors");
if (isset($_POST["human"]) && $_POST["human"] != -1 && is_numeric($_POST["human"])) {
    if ($_POST["human"] != 3) {
        $h = $_POST['human'];
        $c = rand(0, 2);
        echo "Your Play=". $names[$h] .
        " Computer Play=" . $names[$c] .
        " Result=" . check($c, $h);
    } else {
        for ($c=0; $c<3; $c++) {
            for ($h=0; $h<3; $h++) {
                $r = check($c, $h);
                print "Human=$names[$h] Computer=$names[$c] Result=$r\n";
            }

        }
    }
} else {
        print "Please select a strategy and press Play.";
}
    echo "</pre>";
?>
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