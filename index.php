<?php 
session_start();
if (isset($_SESSION['uid'])) {
    header('Location: expense.php');
} else {
    header('Location: signin.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Web Application | todo</title>
  <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="css/animate.css" type="text/css" />
  <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="css/font.css" type="text/css" cache="false" />
  <link rel="stylesheet" href="css/plugin.css" type="text/css" />
  <link rel="stylesheet" href="css/app.css" type="text/css" />
  <!--[if lt IE 9]>
    <script src="js/ie/respond.min.js" cache="false"></script>
    <script src="js/ie/html5.js" cache="false"></script>
    <script src="js/ie/fix.js" cache="false"></script>
  <![endif]-->
</head>
<body>
  <section class="hbox stretch">
    <!-- .aside -->
    <aside class="bg-primary aside-sm" id="nav">
      <section class="vbox">
        <header class="dker nav-bar nav-bar-fixed-top">
          <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen" data-target="#nav">
            <i class="fa fa-bars"></i>
          </a>
          <a href="#" class="nav-brand" data-toggle="fullscreen">todo</a>
          <a class="btn btn-link visible-xs" data-toggle="class:show" data-target=".nav-user">
            <i class="fa fa-comment-o"></i>
          </a>
        </header>
        <section>
          <!-- user -->
          <div class="bg-success nav-user hidden-xs pos-rlt">
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
          <!-- / user -->
          <!-- nav -->
          <nav class="nav-primary hidden-xs">
            <ul class="nav">
              <li class="active">
                <a href="index.html">
                  <i class="fa fa-eye"></i>
                  <span>Discover</span>
                </a>
              </li>
              <li class="dropdown-submenu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-flask"></i>
                  <span>UI kit</span>
                </a>
                <ul class="dropdown-menu">                
                  <li>
                    <a href="buttons.html">Buttons</a>
                  </li>
                  <li>
                    <a href="icons.html">
                      <b class="badge pull-right">302</b>Icons
                    </a>
                  </li>
                  <li>
                    <a href="grid.html">Grid</a>
                  </li>
                  <li>
                    <a href="widgets.html">
                      <b class="badge bg-primary pull-right">8</b>Widgets
                    </a>
                  </li>
                  <li>
                    <a href="components.html">
                      <b class="badge pull-right">18</b>Components
                    </a>
                  </li>
                  <li>
                    <a href="list.html">List groups</a>
                  </li>
                  <li>
                    <a href="table.html">Table</a>
                  </li>
                  <li>
                    <a href="form.html">Form</a>
                  </li>
                  <li>
                    <a href="chart.html">Chart</a>
                  </li>
                  <li>
                    <a href="calendar.html">Fullcalendar</a>
                  </li>
                  <li>
                    <a href="portlet.html">Portlet</a>
                  </li>
                </ul>
              </li>
              <li class="dropdown-submenu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-file-text"></i>
                  <span>Pages</span>
                </a>
                <ul class="dropdown-menu">                
                  <li>
                    <a href="dashboard.html">Dashboard</a>                    
                  </li>
                  <li>
                    <a href="dashboard-1.html">Dashboard one</a>              
                  </li>
                  <li>
                    <a href="dashboard-2.html">Dashboard layout</a>
                  </li>
                  <li>
                    <a href="analysis.html">Analysis</a>
                  </li>
                  <li>
                    <a href="master.html">Master</a>
                  </li>
                  <li>
                    <a href="maps.html">Maps</a>
                  </li>
                  <li>
                    <a href="gallery.html">Gallery</a>              
                  </li>
                  <li>
                    <a href="profile.html">Profile</a>
                  </li>
                  <li>
                    <a href="blog.html">Blog</a>              
                  </li>
                  <li>
                    <a href="invoice.html">Invoice</a>              
                  </li>                  
                  <li>
                    <a href="signin.html">Signin page</a>
                  </li>
                  <li>
                    <a href="signup.html">Signup page</a>
                  </li>
                  <li>
                    <a href="404.html">404 page</a>
                  </li>
                </ul>
              </li>
              <li>
                <a href="mail.html">
                  <b class="badge bg-primary pull-right">3</b>
                  <i class="fa fa-envelope-o"></i>
                  <span>Mail</span>
                </a>
              </li>
              <li>
                <a href="tasks.html">
                  <i class="fa fa-tasks"></i>
                  <span>Tasks</span>
                </a>
              </li>
              <li>
                <a href="notes.html">
                  <i class="fa fa-pencil"></i>
                  <span>Notes</span>
                </a>
              </li>
              <li>
                <a href="timeline.html">
                  <i class="fa fa-clock-o"></i>
                  <span>Timeline</span>
                </a>
              </li>
            </ul>
          </nav>
          <!-- / nav -->
          <!-- note -->
          <div class="bg-danger wrapper hidden-vertical animated fadeInUp text-sm">            
              <a href="#" data-dismiss="alert" class="pull-right m-r-n-sm m-t-n-sm"><i class="fa fa-times"></i></a>
              Hi, welcome to todo,  you can start here.
          </div>
          <!-- / note -->
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
        <header class="header bg-white b-b">
          <p>Welcome to todo application</p>
        </header>
        <section class="scrollable wrapper">
          <div class="row">
            <div class="col-lg-8">
              <section class="panel">
                <form>
                  <textarea class="form-control input-lg no-border" rows="2" placeholder="What are you doing..."></textarea>
                </form>
                <footer class="panel-footer bg-light lter">
                  <button class="btn btn-info pull-right">POST</button>
                  <ul class="nav nav-pills">
                    <li><a href="#"><i class="fa fa-location-arrow"></i></a></li>
                    <li><a href="#"><i class="fa fa-camera"></i></a></li>
                    <li><a href="#"><i class="fa fa-video-camera"></i></a></li>
                    <li><a href="#"><i class="fa fa-microphone"></i></a></li>
                  </ul>
                </footer>
              </section>
              <div class="row">
                <div class="col-lg-6 col-sm-6">
                  <section class="panel">
                    <div class="panel-body">
                      <div class="clearfix m-b">
                        <small class="text-muted pull-right">5m ago</small>
                        <a href="#" class="thumb-sm pull-left m-r">
                          <img src="images/avatar.jpg" class="img-circle">
                        </a>
                        <div class="clear">
                          <a href="#"><strong>Jonathan Omish</strong></a>
                          <small class="block text-muted">San Francisco, USA</small>
                        </div>
                      </div>
                      <p>
                        There are a few easy ways to quickly get started with Bootstrap...
                      </p>
                      <small class="">
                        <a href="#"><i class="fa fa-comment-o"></i> Comments (25)</a>
                      </small>
                    </div>
                    <footer class="panel-footer pos-rlt">
                      <span class="arrow top"></span>
                      <form class="pull-out">
                        <input type="text" class="form-control no-border input-lg text-sm" placeholder="Write a comment...">
                      </form>
                    </footer>
                  </section>
                </div>
                <div class="col-lg-6 col-sm-6">
                  <section class="panel">
                    <div class="panel-body">
                      <div class="clearfix m-b">
                        <small class="text-muted pull-right">1hr ago</small>
                        <a href="#" class="thumb-sm pull-left m-r">
                          <img src="images/avatar_default.jpg" class="img-circle">
                        </a>
                        <div class="clear">
                          <a href="#"><strong>Mike Mcalidek</strong></a>
                          <small class="block text-muted">Newyork, USA</small>
                        </div>
                      </div>
                      <div class="pull-in bg-light clearfix m-b-n">
                        <p class="m-t-sm m-b text-center animated bounceInDown">
                          <i class="fa fa-map-marker text-danger fa fa-4x" data-toggle="tooltip" title="checked in at Newyork"></i>
                        </p>
                      </div>
                    </div>
                    <footer class="panel-footer pos-rlt">
                      <span class="arrow top"></span>
                      <form class="pull-out">
                        <input type="text" class="form-control no-border input-lg text-sm" placeholder="Write a comment...">
                      </form>
                    </footer>
                  </section>
                </div>
              </div>
              <section class="panel no-borders hbox">
                <aside class="bg-info lter r-l text-center v-middle">
                  <div class="wrapper">
                    <i class="fa fa-dribbble fa fa-4x"></i>
                    <p class="text-muted"><em>dribbble invitation</em></p>
                  </div>
                </aside>
                <aside>
                  <div class="pos-rlt">
                    <span class="arrow left hidden-xs"></span>
                    <div class="panel-body">                      
                      <div class="clearfix m-b">
                        <small class="text-muted pull-right">2 days ago</small>
                        <a href="#" class="thumb-sm pull-left m-r">
                          <img src="images/avatar.jpg" class="img-circle">
                        </a>
                        <div class="clear">
                          <a href="#"><strong>Jonathan Omish</strong></a>
                          <small class="block text-muted">San Francisco, USA</small>
                        </div>
                      </div>
                      <p>
                        Thank you for invite...
                      </p>
                      <small class="">
                        <a href="#"><i class="fa fa-comment-o"></i> Comments (10)</a>
                      </small>                    
                    </div>
                    <footer class="panel-footer">
                      <form class="pull-out b-t">
                        <input type="text" class="form-control no-border input-lg text-sm" placeholder="Write a comment...">
                      </form>
                    </footer>
                  </div>
                </aside>
              </section>
              <section class="panel no-borders hbox">                
                <aside>
                  <div class="pos-rlt">
                    <span class="arrow right hidden-xs"></span>
                    <div class="panel-body">                    
                      <div class="clearfix m-b">
                        <small class="text-muted pull-right">2 days ago</small>
                        <a href="#" class="thumb-sm pull-left m-r">
                          <img src="images/avatar.jpg" class="img-circle">
                        </a>
                        <div class="clear">
                          <a href="#"><strong>Jonathan Omish</strong></a>
                          <small class="block text-muted">San Francisco, USA</small>
                        </div>
                      </div>
                      <p>
                        Flat design is more popular today. Google, Microsoft, Apple...
                      </p>
                      <small class="">
                        <a href="#"><i class="fa fa-share"></i> Share (10)</a>
                      </small>                    
                    </div>
                    <footer class="panel-footer">
                      <form class="pull-out b-t">
                        <input type="text" class="form-control no-border input-lg text-sm" placeholder="Write a comment...">
                      </form>
                    </footer>
                  </div>
                </aside>
                <aside class="bg-primary clearfix lter r-r text-right v-middle">
                  <div class="wrapper h3 font-thin">
                    7 things you need to know about the flat design
                  </div>
                </aside>
              </section>
              <div class="text-center m-b">
                <i class="fa fa-spinner fa fa-spin"></i>
              </div>
            </div>
            <div class="col-lg-4">
               <section class="panel bg-info lter no-borders">
                <div class="panel-body">
                  <a class="pull-right" href="#"><i class="fa fa-map-marker"></i></a>
                  <span class="h4">McLean, VA</span>
                  <div class="text-center padder m-t">
                    <span class="h1"><i class="fa fa-cloud text-muted"></i> 68°</span>
                  </div>
                </div>
                <footer class="panel-footer lt">
                  <div class="row">
                    <div class="col-xs-4">
                      <small class="text-muted block">Humidity</small>
                      <span>56 %</span>
                    </div>
                    <div class="col-xs-4">
                      <small class="text-muted block">Precip.</small>
                      <span>0.00 in</span>
                    </div>
                    <div class="col-xs-4">
                      <small class="text-muted block">Winds</small>
                      <span>7 mp</span>
                    </div>
                  </div>
                </footer>
              </section>
              <section class="panel no-borders">
                <header class="panel-heading bg-success lter">
                  <span class="pull-right">Friday</span>
                  <span class="h4">$540<br>
                    <small class="text-muted">+1.05(2.15%)</small>
                  </span>
                  <div class="text-center padder m-b-n-sm m-t-sm">
                      <div class="sparkline" data-type="line" data-resize="true" data-height="65" data-width="100%" data-line-width="2" data-line-color="#fff" data-spot-color="#fff" data-fill-color="" data-highlight-line-color="#fff" data-spot-radius="3" data-data="[220,210,200,325,250,320,345,250,250,250,400,380]"></div>
                      <div class="sparkline inline" data-type="bar" data-height="45" data-bar-width="6" data-bar-spacing="10" data-bar-color="#92cf5c">9,9,11,10,11,10,12,10,9,10,11,9,8</div>
                  </div>
                </header>
                <div class="panel-body">
                  <div>
                    <span class="text-muted">Sales in June:</span>
                    <span class="h3 block">$2500.00</span>
                  </div>
                  <div class="row m-t-sm">
                    <div class="col-xs-4">
                      <small class="text-muted block">From market</small>
                      <span>$1500.00</span>
                    </div>
                    <div class="col-xs-4">
                      <small class="text-muted block">Referal</small>
                      <span>$600.00</span>
                    </div>
                    <div class="col-xs-4">
                      <small class="text-muted block">Affiliate</small>
                      <span>$400.00</span>
                    </div>
                  </div>
                </div>
              </section>
              <section class="panel">
                <div class="text-center wrapper">
                  <div class="sparkline inline" data-type="pie" data-height="150" data-slice-colors="['#acdb83','#f2f2f2','#fb6b5b']">25000,23200,15000</div>
                </div>
                <ul class="list-group no-radius">
                  <li class="list-group-item">
                    <span class="pull-right">25,000</span>
                    <span class="label bg-success">1</span>
                    .inc company
                  </li>
                  <li class="list-group-item">
                    <span class="pull-right">23,200</span>
                    <span class="label bg-danger">2</span>
                    Gamecorp
                  </li>
                  <li class="list-group-item">
                    <span class="pull-right">15,000</span>
                    <span class="label bg-light">3</span>
                    Neosoft company
                  </li>
                </ul>
              </section>
             
              <section class="panel clearfix">
                <div class="panel-body">
                  <a href="#" class="thumb pull-left m-r">
                    <img src="images/avatar.jpg" class="img-circle">
                  </a>
                  <div class="clear">
                    <a href="#" class="text-info">@Mike Mcalidek <i class="fa fa-twitter"></i></a>
                    <small class="block text-muted">2,415 followers / 225 tweets</small>
                    <a href="#" class="btn btn-xs btn-success m-t-xs">Follow</a>
                  </div>
                </div>
              </section>

            </div>
          </div>          
        </section>
      </section>
      <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
    </section>
    <!-- /.vbox -->
  </section>
	<script src="js/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="js/bootstrap.js"></script>
  <!-- Sparkline Chart -->
  <script src="js/charts/sparkline/jquery.sparkline.min.js"></script>
  <!-- App -->
  <script src="js/app.js"></script>
  <script src="js/app.plugin.js"></script>
  <script src="js/app.data.js"></script>  
</body>
</html>