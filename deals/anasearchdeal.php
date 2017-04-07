<!doctype html>
<html>
<head>


    <title>Search</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content="Education Tutorial Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design"/>
    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);
        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
    <!--bootstrap-->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
    <!--coustom css-->
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
    <!--script-->
    <script src="js/jquery-1.11.0.min.js"></script>
    <!-- js -->
    <script src="js/bootstrap.js"></script>
    <!-- /js -->
    <!--fonts-->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,300italic,400italic,400,600,600italic,700,700italic,800,800italic'
          rel='stylesheet' type='text/css'>
    <!--/fonts-->
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <!--script-->
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $(".scroll").click(function (event) {
                event.preventDefault();
                $('html,body').animate({scrollTop: $(this.hash).offset().top}, 900);
            });
        });
    </script>
    <!--/script-->
</head>
<body>

<div class="typrography">
    <div class="container">
        <section id="tables">
            <div class="bs-docs-example">
                <h3 style="text-align:center">Manage Employees</h3>

                <form role="form" align="center" name="updateEmp" id="updateEmp" action="anasearch.php"
                      method="post">

                    Animal ID: <br> <input type="text" name="animalID"><br>

                    <input type="submit" name="submit" id="login" value="Search">
                </form>

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>AnimalID</th>
                        <th>Type</th>
                        <th>Collar ID</th>
                        <th>Record Time</th>
                        <th>Heart Beats</th>
                        <th>Respire</th>
                        <th>Location</th>

                        <!--                    <th>Order Items</th>-->
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (isset($_POST["submit"]) && $_POST["submit"] == "Register") {

                        $DB_HOST = 'localhost';
                        $DB_PORT = '3306';
                        $DB_USER = 'root';
                        $DB_PASS = '';
                        $DB_NAME = 'aqua';
                        $mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME, $DB_PORT);

                        $sql = "select animal.AnimalID, standard.Name, collar.CollarID, 
                          collardata.RecordTime, collardata.HeartBeat, collardata.Respire, collardata.Location 
                          from ((animal join standard on animal.TypeID = standard.TypeID)
                          join collar on animal.AnimalID = collar.AnimalID)
                          join collardata on collar.CollarID = collardata.CollarID
                          where animal.AnimalID = $_POST[animalID]; ";
                        $result = $mysqli->query($sql);
                        if (!$result) {
                            die('Could not get data: ' . mysql_error());
                        }
                        while ($animalInfo = mysqli_fetch_array($result)) {
                            $ID = $animalInfo[0];
                            $typename = $animalInfo[1];
                            $collarID = $animalInfo[2];
                            $rectime = $animalInfo[3];
                            $beat = $animalInfo[4];
                            $respire = $animalInfo[5];
                            $location = $animalInfo[6];

                            //$sql = "select type,imgpath from product where gid = $pid";
//
//                        <td><span class="badge">42</span></td>
                            echo "<tr>";
                            echo "<td><span class='badge'>$ID</span></td>";
                            echo "<td>$typename</td>";
                            echo "<td>$collarID</td>";
                            echo "<td>$rectime</td>";
                            echo "<td>$beat</td>";
                            echo "<td>$respire</td>";
                            echo "<td>$location</td>";

//        echo "<td><a href='../deals/mngempupdate.php?empID=" . $ID . "'>Update</a></td>";
//        echo "<td><a href='../deals/mngempdel.php?empID=" . $ID . "'>Delete</a></td>";

//                        echo "&nbsp<a href='test2-1.php?id=" . $re[0] . "'>删除</a><br />";


//                    echo "<td><img src=$imgpath alt=\"item1\" height=\"40px\" width=\"60px\"><br> $pname $ptype</td>";
                            echo "</tr>";
                        }
                    }else{
                        echo "<script>alert('Failed!'); history.go(-1);</script>";
                    }

                    ?>

                    <!--						<tr><td><img src="Images/chineseknot/chineseknot.png" alt="item4" height="50px" width="80px"><br> Chineseknot 2</td></tr>	-->
                    </tbody>
                </table>


            </div>
        </section>
    </div>
</div>
<br>
<br>
<?php //include '../shared/script.php'; ?>
</body>
</html>