<!DOCTYPE html>
<?php
require_once 'bootstrap.php';

use Pop\Db\Record;

class staff extends Record {
    
}

class heads extends Record {
    
}

$stafflist = staff::query("SELECT * FROM staff WHERE id>0");
$headlist = heads::findAll();

$d = "";
if (isset($_GET['d'])) {
    $d = explode("-", $_GET['d']);
    if (count($d) == 3) {
        $year = intval($d[0]);
        $month = intval($d[1]);
        $day = intval($d[2]);
        if (!(checkdate($month, $day, $year))) {
            $d = "invd";
        } else {
            $month = str_pad($month, 2, "0", STR_PAD_LEFT);
            $day = str_pad($day, 2, "0", STR_PAD_LEFT);
            $d = "$year-$month-$day";
        }
    } else {
        $d = "invd";
    }
}
$d="1970-12-12"; // as $d was not required because this is copied from expense.php
include('code/xcrud/xcrud.php');
?>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Uncategorised Entries Only | Expense</title>
        <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" type="text/css" />
        <link rel="stylesheet" href="css/animate.css" type="text/css" />
        <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" />
        <link rel="stylesheet" href="css/font.css" type="text/css" cache="false" />
        <link rel="stylesheet" href="css/plugin.css" type="text/css" />
        <link rel="stylesheet" href="css/app.css" type="text/css" />
        <link rel="stylesheet" href="js/select2/select2.css" type="text/css" />
        <?php echo Xcrud::load_css() ?> 
        <!--[if lt IE 9]>
          <script src="js/ie/respond.min.js" cache="false"></script>
          <script src="js/ie/html5.js" cache="false"></script>
          <script src="js/ie/fix.js" cache="false"></script>
        <![endif]-->
    </head>
    <body>
        <section class="hbox stretch">
            <!-- .aside -->
            <aside class="bg-dark aside-sm" id="nav">
                <section class="vbox">
                    <header class="dker nav-bar">
                        <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen" data-target="#nav">
                            <i class="fa fa-bars"></i>
                        </a>
                        <a href="#" class="nav-brand" data-toggle="fullscreen">expense</a>
                        <a class="btn btn-link visible-xs" data-toggle="class:show" data-target=".nav-user">
                            <i class="fa fa-comment-o"></i>
                        </a>
                    </header>
                    <section>
                        <div class="lter nav-user hidden-xs pos-rlt">            
                            <div class="nav-avatar pos-rlt">
                                <a href="#" class="thumb-sm avatar animated rollIn" data-toggle="dropdown">
                                    <img src="images/avatar.jpg" alt="" class="">
                                    <span class="caret caret-white"></span>
                                </a>
                                <ul class="dropdown-menu m-t-sm animated fadeInLeft">
                                    <span class="arrow top"></span>
                                    <li>
                                        <a href="#">Settings</a>
                                    </li>
                                    <li>
                                        <a href="profile.html">Profile</a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="badge bg-danger pull-right">3</span>
                                            Notifications
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="docs.html">Help</a>
                                    </li>
                                    <li>
                                        <a href="signin.html">Logout</a>
                                    </li>
                                </ul>
                                <div class="visible-xs m-t m-b">
                                    <a href="#" class="h3">John.Smith</a>
                                    <p><i class="fa fa-map-marker"></i> London, UK</p>
                                </div>
                            </div>
                            <div class="nav-msg">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <b class="badge badge-white count-n">2</b>
                                </a>
                                <section class="dropdown-menu m-l-sm pull-left animated fadeInRight">
                                    <div class="arrow left"></div>
                                    <section class="panel bg-white">
                                        <header class="panel-heading">
                                            <strong>You have <span class="count-n">2</span> notifications</strong>
                                        </header>
                                        <div class="list-group">
                                            <a href="#" class="media list-group-item">
                                                <span class="pull-left thumb-sm">
                                                    <img src="images/avatar.jpg" alt="John said" class="img-circle">
                                                </span>
                                                <span class="media-body block m-b-none">
                                                    Use awesome animate.css<br>
                                                    <small class="text-muted">28 Aug 13</small>
                                                </span>
                                            </a>
                                            <a href="#" class="media list-group-item">
                                                <span class="media-body block m-b-none">
                                                    1.0 initial released<br>
                                                    <small class="text-muted">27 Aug 13</small>
                                                </span>
                                            </a>
                                        </div>
                                        <footer class="panel-footer text-sm">
                                            <a href="#" class="pull-right"><i class="fa fa-cog"></i></a>
                                            <a href="#">See all the notifications</a>
                                        </footer>
                                    </section>
                                </section>
                            </div>
                        </div>
                        <?php
                        $expense = 'class="active"';
                        require_once 'menu.php';
                        ?>
                    </section>
                    <footer class="footer bg-gradient hidden-xs">
                        <a href="modal.lockme.html" data-toggle="ajaxModal" class="btn btn-sm btn-link m-r-n-xs pull-right">
                            <i class="fa fa-power-off"></i>
                        </a>
                        <a href="#nav" data-toggle="class:nav-vertical" class="btn btn-sm btn-link m-l-n-sm">
                            <i class="fa fa-bars"></i>
                        </a>
                    </footer>
                </section>
            </aside>
            <!-- /.aside -->
            <!-- .vbox -->
            <section id="content">
                <section class="vbox">
                    <header class="header bg-success">
                        <p><i class="fa fa-columns"></i>Grid</p>
                    </header>
                    <section class="scrollable wrapper">          
                        <div class="row">
                                    <?php if ($d != "invd" && $d != "") { ?>
                                <div class="col-sm-12">
                                    <section class="panel">
                                        <header class="panel-heading font-bold">Enter Expense</header>
                                        <div class="panel-body">
                                            <?php
                                            $xcrud = Xcrud::get_instance();
                                            $xcrud->table('expense');
                                            //$xcrud->highlight_row('head', '=', '0', 'red');
                                            $xcrud->where('head =', 0);
                                            $xcrud->relation('head', 'heads', 'id', 'head');
                                            $xcrud->relation('bystaffid', 'staff', 'id', 'name');
                                            $xcrud->relation('refundableto', 'staff', 'id', 'name');
                                            $xcrud->relation('receivableto', 'staff', 'id', 'name');
                                            //$xcrud->pass_var('dated', $d);
                                            //$xcrud->fields('dated', true);
                                            $xcrud->columns('dated,expense,price,head,income,bystaffid,refundableto,receivableto');
                                            //$xcrud->sum('price');
                                            $xcrud->limit(50);
                                            echo $xcrud->render();
                                            ?>
                                        </div>
                                    </section>
                                </div>
                            <?php } ?>
                        </div>
                    </section>
                </section>
            </section>
            <!-- /.vbox -->
        </section>

        <script src="js/jquery.min.js"></script>
        <?php echo Xcrud::load_js() ?> 
        <!-- Bootstrap -->
        <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
        <!-- App -->
        <script src="js/app.js"></script>
        <script src="js/app.plugin.js"></script>
        <script src="js/app.data.js"></script>
        <!-- select2 -->
        <script src="js/select2/select2.min.js" cache="false"></script>
        <script>
            $.datepicker.setDefaults({dateFormat: 'yy-mm-dd'});
            $('#expensedate').datepicker({
                dateFormat: 'yy-mm-dd',
                startDate: '-3d'
            });
            $(document).ready(function() {
                $('#expensedate').change(function() {
                    window.location.replace("expense.php?d=" + $(this).val());
                });
            });
        </script>
    </body>
</html>