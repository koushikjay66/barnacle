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

    <!--This is needed for Google maps -->
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>

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
                        <h1 class="page-header">Concert Location</h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="glyphicon glyphicon-stats"></i> Information about the attended concert locations
                            </li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                <!-- /.row -->
                <div class="col-lg-12">
                    <div class="panel panel-primary" id="pinloc">
                        <div class="panel-heading">
                            <h3 class="panel-title center-block">Pin a concert location:</h3>
                        </div>
                        <div class="panel-body">
                            <form role="form" action="<?php echo $this->addC; ?>" method="<?php echo $this->method; ?>">
                                <fieldset>
                                    <div class="form-group">
                             <input class="form-control" placeholder="Concert Title" name="concert_title" type="text" autofocus required>
                                    </div>
                                    <div class="form-group">
                                    <textarea class="form-control" placeholder="Write Something about your concert " name="concert_about" rows="4" required></textarea>
                                    </div>

                                    <div>
                                    <h5>Date of your Concert</h5>
                                    <input class="form-control" placeholder="Concert Date" name="concert_day" type="date" min="<?php echo date("Y-M-D"); ?>" autofocus required>
                                    </div>

                                        <h5>You Can place latitute and longitute manually or just click the location in map (This will take the location automatically)</h5>
                                        <div class="row">
                                          <div class="col-lg-6">
                                            <div>
                                            <input class="form-control" placeholder="Latitute of your concert" name="concert_lat" type="text" id="getLat" autofocus required>
                                            </div>

                                          </div>
                                          <div class="col-lg-6">
                                            <div>
                                            <input class="form-control" placeholder="Longtitute of your concert" name="concert_lon" type="text" id="getLon" autofocus required>
                                            </div>
                                          </div>
                                        </div>
                                        <br>
                                        <div class="row">

                                          <div class="col-lg-12">
                                            <div class="form-control" id="dvMap" style="min-height:300px;" ></div>
                                          </div>

                                        </div>

                                    <div>
                                      <br>
                                    <input type="submit" name="add_location" value="Let everyone know!" id="submit" class="btn btn-default btn-primary btn-block">
                                    <!-- <a id="signin" href="" class="btn btn-sm btn-link btn-block">Got your password? Sign in!</a> -->



                                </fieldset>
                            </form>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="panel panel-info" id="previousloc">
                        <div class="panel-heading">
                            <h3 class="panel-title center-block">Previously posted concert details</h3>
                        </div>
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead> <!-- Dummy values -->
                                        <tr>
                                            <th>Title</th>
                                            <th>Concert Info</th>
                                            <th>Date</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php
                                            if ($this->concert!=null) {
                                                $info=$this->concert;
                                                for ($i=0; $i <sizeof($info['concert_id']) ; $i++) {
                                        ?>
                                            <tr>

                                                <td><?php echo $info["concert_title"][$i]; ?></td>
                                                <td><?php echo $info["concert_about"][$i]; ?></td>
                                                <td><?php echo date("d M Y", strtotime($info["concert_day"][$i]));?></td>
                                                <td>
                                                    <form action="<?php echo $this->action; ?>" method="<?php echo $this->method;?>">

                                                        <button type="submit" id="deleteConcert" value="<?php echo $info["concert_id"][$i]; ?>" name ="concert_id" class="btn btn-danger btn-block">Delete</button>
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

    <!-- DataTables JavaScript -->
    <script src="css/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="css/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Page-Level Script - Tables -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>


    <!-- Get the lat and lon from user on click-->
    <script type="text/javascript">
        function initMap () {

            var mapOptions = {
                center: new google.maps.LatLng(23.8103, 90.4125),
                zoom: 14,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var infoWindow = new google.maps.InfoWindow();
            var latlngbounds = new google.maps.LatLngBounds();
            var map = new google.maps.Map(document.getElementById("dvMap"), mapOptions);
            google.maps.event.addListener(map, 'click', function (e) {

                document.getElementById("getLat").value=e.latLng.lat();
                document.getElementById("getLon").value=e.latLng.lng();
               // alert("Latitude: " + e.latLng.lat() + "\r\nLongitude: " + e.latLng.lng());
            });
        }
    </script>


    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBzZlH8knwqjhe121TQL5JItbH7T5L1Dlk&callback=initMap">
    </script>

</body>

</html>
