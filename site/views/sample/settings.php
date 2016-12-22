<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Nemesis Admin Panel">
    <meta name="author" content="Neonsofts">
    <link rel="icon" href="../favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon"/>  

    <title>in2nemesis</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="css/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="css/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>  

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include("nav.php"); ?>
        <!-- Navigation -->

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Settings</h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="glyphicon glyphicon-stats"></i> Change your information
                            </li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->                
                <!-- /.row -->
                <div class="col-md-4">                
                    <div class="panel panel-default" id="changepw">                    
                        <div class="panel-heading">
                            <h3 class="panel-title center-block">Change your password</h3>
                        </div>
                        <div class="panel-body">
                            <form role="form" action="#" method="post">
                                <fieldset>
                                    <div class="form-group">
                                    <input class="form-control" placeholder="Old Password" name="oldpw" type="password" autofocus required>
                                    </div>
                                    <div class="form-group">
                                    <input class="form-control" placeholder="New Password" name="newpw" type="password" required>
                                    </div>
                                    <div class="form-group">
                                    <input class="form-control" placeholder="Confirm New Password" name="confirmnewpw" type="password" required> <!-- Either use JS or PHP to check this -->
                                    </div>
                                    <input type="submit" name="changepw" value="Change Password" id="submit" class="btn btn-default btn-danger btn-block">
                                    <!-- <a id="signin" href="" class="btn btn-sm btn-link btn-block">Got your password? Sign in!</a> -->
                                </fieldset>
                            </form>
                        </div>
                        </div>
                    </div>
                    </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="css/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="css/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="css/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="css/dist/js/sb-admin-2.js"></script>

</body>

</html>
