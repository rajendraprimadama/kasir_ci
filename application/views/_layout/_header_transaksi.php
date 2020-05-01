<nav class="navbar navbar-default" style="background-color:#00acd6;">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Aan - Kasir</span>
            </button>
            <a class="navbar-brand text-white" href="javascript:void()">Aan - Kasir</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">

            <ul class="nav navbar-nav navbar-right">
                <li>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- User Account Menu -->
                            <li class="dropdown user user-menu" >
                                <!-- Menu Toggle Button -->
                                <a href="<?php echo base_url(); ?>assets/#" class="dropdown-toggle"
                                    data-toggle="dropdown">
                                    <!-- The user image in the navbar-->
                                    <img src="<?php echo base_url(); ?>assets/img/profil1.jpg"
                                        class="user-image" alt="User Image">
                                    <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                    <span class="hidden-xs"><?php echo $userdata->nama; ?></span>
                                </a>
                                <ul class="dropdown-menu" style="width:100px">
                                    <li><a href="<?php echo base_url('Auth/logout'); ?>">Sign out</a></li>
                                    
                                </ul>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
    <!--/.container-fluid -->
</nav>