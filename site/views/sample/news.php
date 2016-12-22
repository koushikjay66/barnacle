<?php
    if (isset($_POST["success"])) {
        echo "<script> alert({$_POST["success"]}); </script>";
    }elseif (isset($_POST["error"])) {
         echo "<script> alert({$_POST["error"]}); </script>";
    }

 ?>

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
    <link href="<?php echo STATIC_CONTENT ; ?>bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo STATIC_CONTENT ; ?>bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo STATIC_CONTENT ; ?>dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo STATIC_CONTENT ; ?>bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>

    <!-- DataTables CSS -->
    <link href="<?php echo STATIC_CONTENT ; ?>bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="<?php echo STATIC_CONTENT ; ?>bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

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
                        <h1 class="page-header">News</h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="glyphicon glyphicon-stats"></i> Publish and control your news
                            </li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                <!-- /.row -->
                <div class="col-lg-12">
                    <div class="panel panel-primary" id="publishnews">
                        <div class="panel-heading">
                            <h3 class="panel-title center-block">Publish a News</h3>

                        </div>
                        <div class="panel-body">
                            <form role="form" action="<?php echo $this->addnews; ?>" method="<?php echo $this->method; ?>">
                                <fieldset>
                                    <div class="form-group">
                                    <input class="form-control" placeholder="News Title" name="news_title" type="text" autofocus required>
                                    </div>
                                    <div class="form-group">
                                    <textarea class="form-control" placeholder="News Body" name="news_body" rows="4" required></textarea>
                                    </div>
                                    <input type="submit" name="add_news" value="Publish News" id="submit" class="btn btn-default btn-primary btn-block">
                                    <!-- <a id="signin" href="" class="btn btn-sm btn-link btn-block">Got your password? Sign in!</a> -->
                                </fieldset>
                            </form>
                        </div>
                        </div>
                </div>
                <div class="col-lg-12">
                    <div class="panel panel-info" id="publishnews">
                        <div class="panel-heading">
                            <h3 class="panel-title center-block">Previously published News</h3>
                        </div>
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead> <!-- Dummy values -->
                                        <tr>
                                            <th>News Title</th>
                                            <th>Publish Date</th>
                                            <th>Delete?</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            if($this->news!=null){
                                                $info=$this->news;


                                                for ($i=0; $i <sizeof($info["news_id"]); $i++) {
                                                    $time=strtotime($info["data_created"][$i]);

                                        ?>
                                            <tr>
                                                <td><?php echo $info["news_title"][$i]; ?></td>
                                                <td><?php echo date("d M Y", $time); ?></td>
                                                <td>
                                                    <form action="<?php echo $this->action; ?>" method="<?php echo $this->method; ?>">

                                                        <button type="submit" id="deletenews" value="<?php echo $info["news_id"][$i]; ?>" name ="news_id"class="btn btn-danger btn-block">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php
                                                }

                                            }

                                         ?>
                                    </tbody>
                                </table>
                            </div>
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
    <script src="<?php echo STATIC_CONTENT ; ?>bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo STATIC_CONTENT ; ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo STATIC_CONTENT ; ?>bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo STATIC_CONTENT ; ?>dist/js/sb-admin-2.js"></script>

    <!-- DataTables JavaScript -->
    <script src="<?php echo STATIC_CONTENT ; ?>bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo STATIC_CONTENT ; ?>bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Page-Level Script - Tables -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>


</body>

</html>
