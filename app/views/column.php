<!DOCTYPE html>
<!-- saved from url=(0050)https://getbootstrap.com/docs/3.3/examples/navbar/ -->
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://getbootstrap.com/docs/3.3/favicon.ico">
    <link rel="canonical" href="https://getbootstrap.com/docs/3.3/examples/navbar/">

    <title>Exercise</title>

    <!-- Bootstrap core CSS -->
    <link href="./assets/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="./assets/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./assets/navbar.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <script src="./assets/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<div class="container">

    <!-- Static navbar -->
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                        aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="">Exercise</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class=""><a href="/index">Upload Csv File</a></li>
                    <li class=""><a href="/dashboard">Dashboard</a></li>
                    <li class=""><a href="/column">Add new column</a></li>
                </ul>
                <ul class="nav navbar-nav pull-right">
                    <li class="active"><a href="/logout" class="pull-right">Logout</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
    </nav>

    <?php
    if (isset($success)) {
        ?>
        <div class="alert alert-success" role="alert">
            <?php echo $success; ?>
        </div>
    <?php }
    ?>

    <?php
    if (isset($error)) {
        ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $error; ?>
        </div>
    <?php }
    ?>
    <div class="jumbotron">
        <form method="post" action="/column">
            <div class="form-group">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Name</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="form-group">
                    <label>Operator</label>
                    <select class="form-control" id="operator" name="operator">
                        <option value="+">+</option>
                        <option value="-">-</option>
                        <option value="/">/</option>
                        <option value="*">*</option>
                        <option value="&">&</option>
                    </select>
                </div>
            </div>

            <div id="arithmetic">
                <div class="form-group">
                    <label>First operand</label>
                    <select class="form-control" name="operand[]">
                        <option value="units">units</option>
                        <option value="price">price</option>
                        <option value="sales">sales</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Second operand</label>
                    <select class="form-control" name="operand[]">
                        <option value="units">units</option>
                        <option value="price">price</option>
                        <option value="sales">sales</option>
                    </select>
                </div>
            </div>

            <div id="nonarithmetic" style="display: none">
                <div class="form-group">
                    <label>Contact expression</label>
                    <input type="text" class="form-control" name="expression">

                </div>
            </div>


            <button type="submit" class="btn btn-primary">Sumit</button>
        </form>
    </div>
</div> <!-- /container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="./assets/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="./assets/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="./assets/ie10-viewport-bug-workaround.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#operator').on('change', function () {

            if ($(this).val() === '&') {
                $('#arithmetic').hide();
                $('#nonarithmetic').show();
            } else {
                $('#arithmetic').show();
                $('#nonarithmetic').hide();

            }
        });
    });
</script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
</html>