<?php
session_start();
if (!isset($_SESSION['uid'])) {
    header('Location: signin.php');
}

require_once 'bootstrap.php';
$rnr = 'class="active"';

use Pop\Db\Record;

class staff extends Record {
    
}

$stafflist = staff::query("SELECT * FROM staff WHERE id>0");

$d = $_SESSION['uid'];
if (isset($_GET['d'])) {
    $d = $_GET['d'];
} else {
    $d = "invd";
}
if (!isset($_GET['y'])) {
    $d = "invd";
}
if (!isset($_GET['m'])) {
    $d = "invd";
}
$m = $_GET['m'];
$y = $_GET['y'];

$lastday = lastday($m, $y);
$firstday = firstDay($m, $y);

if ($d != "invd") {

    class balance extends Record {

        protected $tableName = 'expense';

    }

    $query = "SELECT (SELECT IFNULL(SUM(price),0) FROM `expense` WHERE `refundable`=1 AND `refundableto`=$d and MONTH(`dated`)=$m AND YEAR(`dated`)=$y) - (SELECT IFNULL(SUM(price),0) FROM `expense` WHERE `receivable`=1 AND `receivableto`=$d and MONTH(`dated`)=$m AND YEAR(`dated`)=$y) AS balance";
    $users = balance::query($query);
    $balance = 0;
    foreach ($users->rows as $user) {
        $balance = $user->balance;
    }

    if (intval($balance) == 0) {
        $balance = 0;
    }
    setlocale(LC_MONETARY, 'en_IN');
    $balance = money_format('%.0n', $balance);


// FOR GIVEN
    $query = "SELECT SUM(price) as given FROM `expense` WHERE `refundable`=1 AND `refundableto`=$d and MONTH(`dated`)=$m AND YEAR(`dated`)=$y";
    $users = balance::query($query);
    $given = 0;
    foreach ($users->rows as $user) {
        $given = $user->given;
    }

    if (intval($given) == 0) {
        $given = 0;
    }
    setlocale(LC_MONETARY, 'en_IN');
    $given = money_format('%.0n', $given);

// FOR TAKEN
    $query = "SELECT SUM(price) as taken FROM `expense` WHERE `receivable`=1 AND `receivableto`=$d and MONTH(`dated`)=$m AND YEAR(`dated`)=$y";
    $users = balance::query($query);
    $taken = 0;
    foreach ($users->rows as $user) {
        $taken = $user->taken;
    }

    if (intval($taken) == 0) {
        $taken = 0;
    }
    setlocale(LC_MONETARY, 'en_IN');
    $taken = money_format('%.0n', $taken);
}

include('code/xcrud/xcrud.php');
?>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Expense / Income Entry | Expense</title>
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
                            <div class="col-sm-4">
                                <section class="panel">
                                    <div class="panel-body">
                                        <label class="col-sm-2 control-label">Staff</label>
                                        <div class="col-sm-10">
                                            <select id="stafflist" name="stafflist" class="form-control">
                                                <option></option>
                                                <?php
                                                foreach ($stafflist->rows as $details) {
                                                    ?> 
                                                    <option <?php echo ($details->id == $d) ? "selected" : ""; ?> value="<?php echo $details->id; ?>"><?php echo $details->name; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </section>
                            </div>
                            <div class="col-sm-4">                               
                                <section class="panel">
                                    <div class="panel-body">
                                        <label class="col-sm-2 control-label">Year</label>
                                        <div class="col-sm-10">
                                            <select id="yearlist" name="yearlist" class="form-control" <?php echo isset($_GET['m']) ? "" : 'disabled="disabled"'; ?> >
                                                <option></option>
                                                <?php
                                                $year = date("Y") - 2;
                                                for ($i = $year; $i <= $year + 2; $i++) {
                                                    ?> 
                                                    <option <?php echo ($i == $y) ? "selected" : ""; ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </section>
                            </div>
                            <div class="col-sm-4">                               
                                <section class="panel">
                                    <div class="panel-body">
                                        <label class="col-sm-2 control-label">Month</label>
                                        <div class="col-sm-10">
                                            <select id="monthlist" name="monthlist" class="form-control" <?php echo isset($_GET['m']) ? "" : 'disabled="disabled"'; ?> >
                                                <option></option>
                                                <?php
                                                for ($i = 1; $i <= 12; $i++) {
                                                    $dateObj = DateTime::createFromFormat('!m', $i);
                                                    $monthName = $dateObj->format('F'); // March
                                                    ?> 
                                                    <option <?php echo ($i == $m) ? "selected" : ""; ?> value="<?php echo $i; ?>"><?php echo $monthName; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </section>
                            </div>
                            <?php if ($d != "invd" && $d != "") { ?>
                                <div class="col-sm-12">
                                    <section class="panel">
                                        <header class="panel-heading font-bold">Summary</header>
                                        <footer class="panel-footer">
                                            <div class="row text-center">
                                                <div class="col-xs-3 b-r">
                                                    <p class="h3 font-bold m-t">Summary</p>
                                                    <p class="text-muted">This Month</p>
                                                </div>
                                                <div class="col-xs-3 b-r">
                                                    <p class="h3 font-bold m-t"><?php echo $given; ?></p>
                                                    <p class="text-muted">Total Given</p>
                                                </div>
                                                <div class="col-xs-3 b-r">
                                                    <p class="h3 font-bold m-t"><?php echo $taken; ?></p>
                                                    <p class="text-muted">Total Taken</p>
                                                </div>
                                                <div class="col-xs-3">
                                                    <p class="h3 font-bold m-t"><?php echo $balance; ?></p>
                                                    <p class="text-muted">Current Balance</p>                        
                                                </div>
                                            </div>
                                        </footer>
                                    </section>
                                </div>
                                <div class="col-sm-12">
                                    <section class="panel">
                                        <header class="panel-heading font-bold">Refunds</header>
                                        <div class="panel-body">
                                            <?php
                                            $xcrud1 = Xcrud::get_instance();
                                            $xcrud1->start_minimized(true);
                                            $xcrud1->table('expense');
                                            $xcrud1->where('refundableto =', $d);
                                            $xcrud1->where("expense.dated <= '$lastday' AND expense.dated >= '$firstday'");
                                            $xcrud1->relation('head', 'heads', 'id', 'head');
                                            $xcrud1->relation('bystaffid', 'staff', 'id', 'name');
                                            $xcrud1->relation('refundableto', 'staff', 'id', 'name');
                                            $xcrud1->relation('receivableto', 'staff', 'id', 'name');
                                            $xcrud1->table_name('Given to the Company', 'This lists all the amount you have given to the company');
                                            $xcrud1->columns('dated,expense,price,bystaffid,refundableto');
                                            $xcrud1->unset_add();
                                            $xcrud1->limit(10);
                                            echo $xcrud1->render();
                                            ?>
                                        </div>
                                    </section>
                                </div>
                                <div class="col-sm-12">
                                    <div class="alert alert-info">
                <button type="button" class="close" data-dismiss="alert"><i class="fa fa-times"></i></button>
                <i class="fa fa-info-sign"></i><strong>Heads up!</strong> This page has been updated, now the list shows the data for the cuurent month only.
              </div>
                                    <section class="panel">
                                        <header class="panel-heading font-bold">To be Given to the company</header>
                                        <div class="panel-body">
                                            <?php
                                            $xcrud3 = Xcrud::get_instance();
                                            $xcrud3->start_minimized(true);
                                            $xcrud3->table('expense');
                                            $xcrud3->where('receivableto =', $d);
                                            $xcrud3->where("expense.dated <= '$lastday' AND expense.dated >= '$firstday'");
                                            $xcrud3->relation('head', 'heads', 'id', 'head');
                                            $xcrud3->relation('bystaffid', 'staff', 'id', 'name');
                                            $xcrud3->relation('refundableto', 'staff', 'id', 'name');
                                            $xcrud3->relation('receivableto', 'staff', 'id', 'name');
                                            $xcrud3->table_name('Taken from Company', 'This lists all the amount you have taken from the company');
                                            $xcrud3->columns('dated,expense,price,bystaffid,receivableto');
                                            $xcrud3->unset_add();
                                            $xcrud3->limit(10);
                                            echo $xcrud3->render();
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
            var staffId<?php echo isset($_GET['d']) ? "=" . $_GET['d'] : ""; ?>;
            var monthNumber<?php echo isset($_GET['m']) ? "=" . $_GET['m'] : ""; ?>;
            var yearNumber<?php echo isset($_GET['y']) ? "=" . $_GET['y'] : ""; ?>;
//            localStorage.local = 2;
//            if (localStorage.local != 2) {
//                $("body").html("<h1>This page is being modified. Can you believe it? This very page is being modified and it opening on Ravi's computer and not yours. Yes Yes I mean this page only. :D</h1>");
//            }
            var staffid = "<?php echo $d; ?>";

            $.datepicker.setDefaults({dateFormat: 'yy-mm-dd'});
            $('#expensedate').datepicker({
                dateFormat: 'yy-mm-dd',
                startDate: '-3d'
            });
            $(document).ready(function() {
                $('select#stafflist').change(function() {
                    //window.location.replace("rnr.php?d=" + $(this).val());
                    staffId = $(this).val();
                    $('select#yearlist option:first-child').attr("selected", "selected");
                    $("select#yearlist").attr("disabled", "disabled");

                    $('select#monthlist option:first-child').attr("selected", "selected");
                    $("select#monthlist").attr("disabled", "disabled");

                    $("select#yearlist").removeAttr("disabled");
                });
                $('select#yearlist').change(function() {
                    //window.location.replace("rnr.php?d=" + $(this).val());
                    yearNumber = $(this).val();
                    $('select#monthlist option:first-child').attr("selected", "selected");
                    $("select#monthlist").attr("disabled", "disabled");
                    $("select#monthlist").removeAttr("disabled");
                });
                $('select#monthlist').change(function() {
                    //window.location.replace("rnr.php?d=" + $(this).val());
                    monthNumber = $(this).val();
                    window.location.replace("rnr.php?d=" + staffId + "&m=" + monthNumber + "&y=" + yearNumber);
                });
            });
        </script>
    </body>
</html>
<?php

function lastday($month = '', $year = '') {
    if (empty($month)) {
        $month = date('m');
    }
    if (empty($year)) {
        $year = date('Y');
    }
    $result = strtotime("{$year}-{$month}-01");
    $result = strtotime('-1 second', strtotime('+1 month', $result));
    return date('Y-m-d', $result);
}

function firstDay($month = '', $year = '') {
    if (empty($month)) {
        $month = date('m');
    }
    if (empty($year)) {
        $year = date('Y');
    }
    $result = strtotime("{$year}-{$month}-01");
    return date('Y-m-d', $result);
}
?>