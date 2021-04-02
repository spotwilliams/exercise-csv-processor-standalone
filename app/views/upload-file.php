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
    <script data-dapp-detection="">!function () {
            let e = !1;

            function n() {
                if (!e) {
                    const n = document.createElement("meta");
                    n.name = "dapp-detected", document.head.appendChild(n), e = !0
                }
            }

            if (window.hasOwnProperty("ethereum")) {
                if (window.__disableDappDetectionInsertion = !0, void 0 === window.ethereum) return;
                n()
            } else {
                var t = window.ethereum;
                Object.defineProperty(window, "ethereum", {
                    configurable: !0, enumerable: !1, set: function (e) {
                        window.__disableDappDetectionInsertion || n(), t = e
                    }, get: function () {
                        if (!window.__disableDappDetectionInsertion) {
                            const e = arguments.callee;
                            e && e.caller && e.caller.toString && -1 !== e.caller.toString().indexOf("getOwnPropertyNames") || n()
                        }
                        return t
                    }
                })
            }
        }();</script>

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
                    <li class=""><a href="/column">Add new column</a></li>                </ul>
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

    <!-- Main component for a primary marketing message or call to action -->
    <div class="jumbotron">
        <form action="/upload" method="post" enctype="multipart/form-data">

            <h1>Upload csv file</h1>
            <p>Please, upload a CSV file in order to populate the dashboard.</p>
            <p>
                <input type="file"
                       id="file" name="csv"
                       accept="text/csv">

            </p>

            <button type="submit" class="btn btn-primary">Upload</button>
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


</body>
</html>