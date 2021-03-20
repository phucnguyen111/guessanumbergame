<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Guess A Number</title>

    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.3/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<style>
    html {
        font-family: 'OpenSans-Regular';
        height: 100%;
        width: 100%
    }

    .btn-info:focus {
        outline: none;

    }

    .btn-info {

        padding: 10px;
        margin: 25px 0;
    }

    .block {
        display: block;
    }


    .modal {
        text-align: center;
        padding: 0 !important;
    }

    .modal:before {
        content: '';
        display: inline-block;
        height: 100%;
        vertical-align: middle;
        margin-right: -4px;
    }

    .modal-dialog {
        display: inline-block;
        text-align: left;
        vertical-align: middle;
        width: 70%;
        margin-top: 0;
    }

    .black {
        background-color: black;
        color: white;
    }
</style>

<body id="body" style='display:flex; align-items:center;justify-content:center;height:100%;width:100%'>

    <?php
    $in = '';
    $display = '';
    $block = 'none';
    $message = '';
    $alert = '';
    $collapse = 'collapse';
    $message2 = 'Your guess is ';
    if (isset($_POST["random"], $_POST["guess"], $_POST["count"])) {
        $random = round($_POST['random'] * 89468);
        $guess = $_POST['guess'];
        $count = $_POST['count'] + 1;
        $block = 'block';
        $collapse = '';
        $message = $message2 . $guess . ".";
        if (is_numeric($guess)) {

            if ($guess < $random && $guess >= 0) {

                $message =  $message . " Oops! You are wrong! Please try a higher number";
                $alert = 'warning';
            } else if ($guess > $random && $guess <= 100) {

                $message = $message . " Oops! You are wrong! Please try a lower number";
                $alert = 'danger';
            } else if ($guess == $random) {

                $message = $message .
                    " Woww! Your guess is correct ! Marvellous";
                $alert = 'success';
                $display = "block";
                $in = "in" ?>
                <script>
                    document.getElementById("body").classList.add('black');
                </script>
    <?php          } else {
                $message = $message . " The random number is from 0 - 100, darling !!!";
                $alert = 'warning';
            }
        } else {
            $message = $message . " That is not a number, sweetheart! TRY AGAIN with a number";
            $alert = 'warning';
        }
    } else {

        $random = rand(0, 100);
        $guess = '';
        $count = 0;
    }

    // print($random);
    ?>
    <div class="container">
        <div class="modal fade <?= $in ?> <?= $display ?>" id="modal-id">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-body" style="background-color: black">
                        <img src="https://ss-images.saostar.vn/w800/2019/04/12/4953005/db0a34d9-c70e-402b-bc08-52655c95489f.jpg" style="width:100%; height:100%" alt="">
                    </div>
                    <div class="modal-footer" style="background-color: black; border-top-color: black;">
                        <button type="button" style="background-color: black; color:white" class="btn btn-default" id="btnClosePopup" onclick="hideModal()">Close</button>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">

            <div>
                <h1 style="color: #3786be;font-weight:bold; text-align:center">Let's Play a Game !!!!</h1>
                <div style="text-align: center;">
                    <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#game">Click me</button>
                </div>
                <div class="panel panel-primary <?= $collapse ?>" id="game" style="width: 50%; margin:auto; height:100%;">

                    <div class="panel-heading">
                        <h3 class="panel-title">Guess A Number</h3>
                    </div>
                    <div class="panel-body">

                        <form action="" method="POST" role="form" id="scare">
                            <div class="alert alert-<?= $alert ?>" style="display: <?= $block ?>;">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <strong><?= $message ?></strong>
                            </div>
                            <div class="form-group">
                                <label for="">Enter your guess number:</label>
                                <input type="text" class="form-control" name="guess" placeholder="From 0 - 100">
                            </div>
                            <button type="submit" class="btn btn-success" style="padding-right: 15px;">Submit</button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                            <input type="hidden" name="random" value="<?= $random / 89468 ?>">
                            <input type="hidden" name="count" value="<?= $count ?>">
                        </form>

                    </div>


                    <div class="panel-footer">
                        You have guessed: <b><?= $count ?> </b> times

                    </div>
                </div>

            </div>

        </div>

    </div>



    </div>



    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
        function hideModal() {
            document.getElementById("body").classList.remove('black');
            document.getElementById("modal-id").classList.remove('in');
            document.getElementById("modal-id").classList.remove('block');
        }
    </script>
</body>

</html>