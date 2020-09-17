<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo !empty($this->sessionData->userimgpath) ? base_url($this->sessionData->userimgpath) : base_url('resource/dist/img/avatar04.png'); ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php echo $this->sessionData->fullname; ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> <?php echo $this->lang->line('ONLINE_LABEL'); ?></a>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="<?php echo ($this->uriSegments[2] == 'supplier') ? 'active' : '' ;?>">
                <a href="<?php echo base_url('admin/supplier/list'); ?>">
                    <i class="fa fa-users"></i> <span><?php echo $this->lang->line('USER_MENU'); ?></span>
                    <span class="pull-right-container">
                    </span>
                </a>
            </li>
            <li class="<?php echo ($this->uriSegments[2] == 'products') ? 'active' : '' ;?>">
                <a href="<?php echo site_url('admin/products/list'); ?>">
                    <i class="fa fa-product-hunt"></i> <span><?php echo $this->lang->line('PRODUCT_MENU'); ?></span>
                    <span class="pull-right-container">
                    </span>
                </a>
            </li>
            <li class="<?php echo ($this->uriSegments[2] == 'orders') ? 'active' : '' ;?>">
                <a href="<?php echo site_url('admin/orders/list'); ?>">
                    <i class="fa fa-cart-plus"></i> <span><?php echo $this->lang->line('ORDER_MENU'); ?></span>
                    <span class="pull-right-container">
                    </span>
                </a>
            </li>
            <li class="<?php echo ($this->uriSegments[2] == 'settings') ? 'active' : '' ;?>">
                <a href="<?php echo site_url('admin/settings'); ?>">
                    <i class="fa fa-gear"></i> <span><?php echo $this->lang->line('SETTING_MENU'); ?></span>
                    <span class="pull-right-container">
                    </span>
                </a>
            </li>
            <li class="">
                <a href="<?php echo site_url('/'); ?>" target="_blank">
                    <i class="fa fa-link"></i> <span><?php echo $this->lang->line('WEB_SITE_LABEL'); ?></span>
                    <span class="pull-right-container">
                    </span>
                </a>
            </li>
            <li class="">
                <a href="<?php echo site_url('/admin/buying-supplier'); ?>" target="_blank">
                    <i class="fa fa-link"></i> <span><?php echo $this->lang->line('BUYING_SUPPLIER'); ?></span>
                    <span class="pull-right-container">
                    </span>
                </a>
            </li>
            <li class="">
                <a href="<?php echo site_url('admin/selling-to-buyer'); ?>" target="_blank">
                    <i class="fa fa-link"></i> <span><?php echo $this->lang->line('SELLING_TO_CUSTOMER'); ?></span>
                    <span class="pull-right-container">
                    </span>
                </a>
            </li>
            <li class="">
                <a href="<?php echo site_url('admin/payment-supplier'); ?>" target="_blank">
                    <i class="fa fa-link"></i> <span><?php echo $this->lang->line('PAYMENT_TO_SUPPLIER'); ?></span>
                <a href="<?php echo site_url('admin/recipts-from-buyer/list'); ?>" target="_blank">
                    <i class="fa fa-link"></i> <span><?php echo $this->lang->line('RECIPTS_FROM_BUYER'); ?></span>
                    <span class="pull-right-container">
                    </span>
                </a>
            </li>
            <li class="">
                <a href="<?php echo site_url('admin/report'); ?>" target="_blank">
                    <i class="fa fa-link"></i> <span><?php echo $this->lang->line('REPORTS'); ?></span>
                    <span class="pull-right-container">
                    </span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>