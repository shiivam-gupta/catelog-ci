<header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url('admin'); ?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b><?php echo $this->siteTitle; ?></b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b><?php echo $this->siteTitle; ?></b></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->
                <!-- <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?php echo !empty($this->sessionData->userimgpath) ? base_url($this->sessionData->userimgpath) : base_url('resource/dist/img/avatar04.png'); ?>" class="user-image" alt="User Image">
                        <span class="hidden-xs"><?php echo $this->sessionData->fullname; ?></span>
                    </a>

                    <ul class="dropdown-menu">
                      
                        <li class="user-header">
                            <img src="<?php echo !empty($this->sessionData->userimgpath) ? base_url($this->sessionData->userimgpath) : base_url('resource/dist/img/avatar04.png'); ?>" class="img-circle" alt="User Image">
                            <p>
                                <?php echo $this->sessionData->fullname; ?>
                                <small><?php echo $this->sessionData->scope; ?></small>
                            </p>
                        </li>
                     
                        <li class="user-footer">
                            <div class="pull-right">
                                <a href="<?php echo base_url('admin/logout'); ?>" class="btn btn-default btn-flat"><?php echo $this->lang->line('HEADER_LOGOUT'); ?></a>
                            </div>
                        </li>
                    </ul>
                </li> -->

                <li class="dropdown user user-menu">
                    <a href="<?php echo base_url('admin/logout'); ?>">
                        <img src="<?php echo !empty($this->sessionData->userimgpath) ? base_url($this->sessionData->userimgpath) : base_url('resource/dist/img/avatar04.png'); ?>" class="user-image" alt="User Image">
                        <?php echo $this->lang->line('HEADER_LOGOUT'); ?>
                    </a>
                </li>                
            </ul>
        </div>

        <div class="navbar-custom-menu pullLeft">
            <ul class="nav navbar-nav">
                <li style="color: white; margin-top: 15px; margin-left: 10px">
                    <span>
                       <div class="dropdown">
                            <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color: white" aria-expanded="false">
                              <?php echo get_language($this->siteLang,'name'); ?> &nbsp;<img src="<?php echo base_url().get_language($this->siteLang,'flag'); ?>" style="width: 40px; height: 20px;"> <span class="caret"></span>
                            </a> -->

                            
                            <!--usa flag-->
                            <a href="<?php echo base_url('admin/language/change/en'); ?>"><img src="<?php echo base_url('/cosmetics/images/usa.jpg'); ?>" style="width: 30px;"></a>&nbsp;&nbsp;
                            <!--israel flag-->
                            <a href="<?php echo base_url('admin/language/change/he'); ?>"><img src="<?php echo base_url('/cosmetics/images/israel.jpg'); ?>" style="width: 30px;"></a>
                         
                            <!-- <ul class="dropdown-menu">
                                <?php foreach (get_language() as $lnk => $lnv) { 
                                    $this->session->set_userdata('currentUrl',current_url()); ?>
                                    <li>
                                        <a href="<?php echo base_url('admin/language/change/').$lnk; ?>"><?= $lnv['name']; ?>&nbsp;<img src="<?php echo base_url().$lnv['flag']; ?>" style="width: 40px; height: 20px;"></a>
                                    </li>
                                <?php } ?>
                            </ul> -->
                        </div>
                    </span>
                </li>
            </ul>
        </div>

    </nav>
</header>