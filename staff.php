<!DOCTYPE html>
<?php
include('code/xcrud/xcrud.php');
?>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Manage Staff | Expense</title>
        <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
        <link rel="stylesheet" href="css/animate.css" type="text/css" />
        <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" />
        <link rel="stylesheet" href="css/font.css" type="text/css" cache="false" />
        <link rel="stylesheet" href="css/plugin.css" type="text/css" />
        <link rel="stylesheet" href="css/app.css" type="text/css" />
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
                        <?php $staff='class="active"'; require_once 'menu.php'; ?>
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
                    <header class="header b-b bg-white">
                        <div class="input-group input-s pull-right m-t-sm">
                            <span class="input-group-addon input-sm"><i class="fa fa-search"></i></span>
                            <input type="text" class="form-control input-sm" id="search-note" placeholder="search">
                        </div>
                        <p>Category Management</p>
                    </header>
                    <section class="scrollable wrapper">          
                        <div class="row">
                            <div class="col-sm-9">
                                <div class="blog-post">
                                    <div class="post-item">
                                        <div class="caption wrapper-lg">
                                            <h2 class="post-title"><a href="#">Manage Expense Heads</a></h2>
                                            <?php
                                            $xcrud = Xcrud::get_instance();
                                            $xcrud->table('staff');
                                            $xcrud->limit(10);
                                            echo $xcrud->render();
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <h4 class="m-t-lg m-b">3 Comments</h4>

                                <h4 class="m-t-lg m-b">Leave a comment</h4>

                            </div>
                            <div class="col-sm-3">
                                <h5 class="font-semibold">About me</h5>
                                <div class="line line-dashed"></div>
                                <div class="m-b-lg">
                                    <span class="pull-left thumb-sm avatar m-r-sm m-t-xs">
                                        <img src="images/avatar.jpg" class="img-circle">
                                    </span>
                                    <p class="clear text-sm">
                                        I am a UI/UX designer for Flatfull where i focus on Web applications, Mobile apps...
                                    </p>
                                </div>
                                <h5 class="font-semibold">Subscribe</h5>
                                <div class="line line-dashed"></div>
                                <div class="m-t-sm m-b-lg">
                                    <a href="#" title="RSS" class="btn btn-rounded btn-warning btn-icon"><i class="fa fa-rss"></i></a>
                                    <a href="#" title="Twitter" class="btn btn-rounded btn-twitter btn-icon"><i class="fa fa-twitter"></i></a>
                                    <a href="#" title="Facebook" class="btn btn-rounded btn-facebook btn-icon"><i class="fa fa-facebook"></i></a>
                                    <a href="#" title="Google+" class="btn btn-rounded btn-gplus btn-icon"><i class="fa fa-google-plus"></i></a>
                                    <a href="#" title="LinkedIn" class="btn btn-rounded btn-info btn-icon"><i class="fa fa-linkedin"></i></a>
                                </div>
                                <h5 class="font-semibold">Recent Tweets</h5>
                                <div class="line line-dashed"></div>       
                                <div class="clear m-b">
                                    <a href="#" class="text-info">
                                        <span class="thumb-sm">
                                            <img src="images/avatar.jpg" class="img-circle">
                                        </span>
                                        @Mike Mcalidek <i class="fa fa-twitter"></i>
                                    </a>
                                </div>
                                <ul class="list-unstyled m-b-lg">
                                    <li>
                                        <p>Wellcome <a href="#" class="text-info">@Drew Wllon</a> and play this web application template, have fun1 </p>
                                        <small class="block text-muted"><i class="fa fa-clock-o"></i> 2 minuts ago</small>
                                        <div class="line"></div>
                                    </li>
                                    <li>
                                        <p>Morbi nec <a href="#" class="text-info">@Jonathan George</a> nunc condimentum ipsum dolor sit amet, consectetur</p>
                                        <small class="block text-muted"><i class="fa fa-clock-o"></i> 1 hour ago</small>
                                        <div class="line"></div>
                                    </li>
                                    <li>                     
                                        <p><a href="#" class="text-info">@Josh Long</a> Vestibulum ullamcorper sodales nisi nec adipiscing elit. Morbi id neque quam. Aliquam sollicitudin venenatis</p>
                                        <small class="block text-muted"><i class="fa fa-clock-o"></i> 2 hours ago</small>
                                        <div class="line"></div>
                                    </li>
                                </ul>
                                <h5 class="font-semibold">Categories</h5>
                                <div class="line line-dashed"></div>
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="#" class="dk">
                                            <span class="badge pull-right">15</span>
                                            Photograph
                                        </a>
                                    </li>
                                    <li class="line"></li>
                                    <li>
                                        <a href="#">
                                            <span class="badge pull-right">30</span>
                                            Life style
                                        </a>
                                    </li>
                                    <li class="line"></li>
                                    <li>
                                        <a href="#">
                                            <span class="badge pull-right">9</span>
                                            Food
                                        </a>
                                    </li>
                                    <li class="line"></li>
                                    <li>
                                        <a href="#">
                                            <span class="badge pull-right">4</span>
                                            Travel world
                                        </a>
                                    </li>
                                    <li class="line"></li>
                                </ul>
                                <div class="tags m-b-lg">
                                    <a href="#" class="label bg-success">Bootstrap</a> <a href="#" class="label bg-success">Application</a> <a href="#" class="label bg-success">Apple</a> <a href="#" class="label bg-success">Less</a> <a href="#" class="label bg-success">Theme</a> <a href="#" class="label bg-success">Wordpress</a>
                                </div>
                                <h5 class="font-semibold">Recent Posts</h5>
                                <div class="line line-dashed"></div>
                                <div>
                                    <article class="media">
                                        <a class="pull-left thumb m-t-xs">
                                            <img src="images/thumb_1.jpg">
                                        </a>
                                        <div class="media-body">                        
                                            <a href="#" class="font-semibold">Bootstrap 3: What you need to know</a>
                                            <div class="text-xs block m-t-xs"><a href="#">Travel</a> 2 minutes ago</div>
                                        </div>
                                    </article>
                                    <div class="line"></div>
                                    <article class="media m-t-none">
                                        <a class="pull-left thumb m-t-xs">
                                            <img src="images/ipad.png">
                                        </a>
                                        <div class="media-body">                        
                                            <a href="#" class="font-semibold">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a>
                                            <div class="text-xs block m-t-xs"><a href="#">Design</a> 2 hours ago</div>
                                        </div>
                                    </article>
                                    <div class="line"></div>
                                    <article class="media m-t-none">
                                        <a class="pull-left thumb m-t-xs">
                                            <img src="images/thumb_2.jpg">
                                        </a>
                                        <div class="media-body">                        
                                            <a href="#" class="font-semibold">Sed diam nonummy nibh euismod tincidunt ut laoreet</a>
                                            <div class="text-xs block m-t-xs"><a href="#">MFC</a> 1 week ago</div>
                                        </div>
                                    </article>
                                </div>
                            </div>
                        </div>
                    </section>
                </section>
                <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
            </section>
            <!-- /.vbox -->
        </section>

        <script src="js/jquery.min.js"></script>
        <?php echo Xcrud::load_js() ?> 
        <!-- Bootstrap -->
        <script src="js/bootstrap.js"></script>
        <!-- App -->
        <script src="js/app.js"></script>
        <script src="js/app.plugin.js"></script>
        <script src="js/app.data.js"></script>
    </body>
</html>