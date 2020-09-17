
            </div>

            <div class="copy-right py-3 footer_section">
                <div class="container">
                    <p class="text-center text-white">© <?php echo $this->lang->line('FOOTER_MESSAGE_LABEL'); ?> <!-- | Design by -->
                        <!-- <a href="##"> ABC </a> -->
                    </p>
                </div>
            </div>

            <!-- /.control-sidebar -->
            <!-- Add the sidebar's background. This div must be placed
            immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
        </div>

        <?php if(empty($this->sessionData)) { ?>
            <!-- modals -->
            <!-- log in -->
            <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-center"><?= $this->lang->line('LOG_IN_LABEL'); ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form role="login-form" action="<?php echo base_url('login'); ?>" method="POST" id="loginForm" data-button="#loginFormButton">
                                <div class="form-group">
                                    <label class="col-form-label"><?= $this->lang->line('EMAIL_LABEL'); ?></label>
                                    <input type="text" class="form-control" placeholder='<?= $this->lang->line('EMAIL_LABEL'); ?>' name="email">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label"><?= $this->lang->line('PASSWORD_LABEL'); ?></label>
                                    <input type="password" class="form-control" placeholder="<?= $this->lang->line('PASSWORD_LABEL'); ?>" name="password">
                                </div>
                                <div class="right-w3l">
                                    <button data-request="form-submit" data-target="[role='login-form']" data-url="<?= base_url('login'); ?>" id="loginFormButton" type="submit" class="btn btn-info form-control"><?= $this->lang->line('LOG_IN_LABEL'); ?></button>
                                </div>
                                <div class="sub-w3l">
                                    
                                </div>
                                <p class="text-center dont-do mt-3"><?= $this->lang->line('DONT_HAVE_ACCOUNT'); ?>
                                    <a href="javascript:void(0);" data-toggle="modal" data-target="#registartionModal">
                                        <?= $this->lang->line('REGISTER_NOW'); ?></a>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- register -->
            <div class="modal fade" id="registartionModal" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"><?= $this->lang->line('REGISTER_LABEL'); ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form role="register-form" action="<?php echo base_url('register'); ?>" method="POST" id="registartionForm" data-button="#registartionFormButton">
                                <div class="form-group">
                                    <label class="col-form-label"><?= $this->lang->line('FIRST_NAME_LABEL'); ?></label>
                                    <input type="text" autocomplete="off" class="form-control" placeholder="<?= $this->lang->line('FIRST_NAME_LABEL'); ?>" name="firstname" >
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label"><?= $this->lang->line('LAST_NAME_LABEL'); ?></label>
                                    <input type="text" autocomplete="off" class="form-control" placeholder="<?= $this->lang->line('LAST_NAME_LABEL'); ?>" name="lastname" >
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label"><?= $this->lang->line('EMAIL_LABEL'); ?></label>
                                    <input type="email" id="email" autocomplete="off" class="form-control" placeholder='<?= $this->lang->line('EMAIL_LABEL'); ?>' name="email" >
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label"><?= $this->lang->line('MOBILE_LABEL'); ?></label>
                                    <input type="email" id="phone" autocomplete="off" class="form-control" placeholder="<?= $this->lang->line('MOBILE_LABEL'); ?>" name="mobile" >
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label"><?= $this->lang->line('PASSWORD_LABEL'); ?></label>
                                    <input type="password" autocomplete="off" class="form-control" placeholder="<?= $this->lang->line('PASSWORD_LABEL'); ?>" name="password" id="password" >
                                </div>
                                <!-- <div class="form-group">
                                    <label class="col-form-label"><?= $this->lang->line('CONFIRM_PASSWORD_LABEL'); ?></label>
                                    <input type="password" autocomplete="off" class="form-control" placeholder="<?= $this->lang->line('CONFIRM_PASSWORD_LABEL'); ?>" name="confirmPassword" id="confirmPassword" >
                                </div> -->
                                <div class="right-w3l">
                                    <button data-request="form-submit" data-target="[role='register-form']" data-url="<?= base_url('register'); ?>" id="registartionFormButton" type="submit" class="btn btn-info form-control"><?= $this->lang->line('REGISTER_LABEL'); ?></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- modals -->
        <?php } ?>

        <!-- ./wrapper -->
        <?php require_once('assets/frontjquerylinks.php'); ?>

        <?php 
            $flashMessage = $this->session->flashdata('flash_message');
            $this->session->set_flashdata('flash_message', null);
        ?>
        <script type="text/javascript">
            var flashMessage ='<?php echo json_encode($flashMessage); ?>';
            if(flashMessage != "null") {
                flashMessage = JSON.parse(flashMessage);
                swal(flashMessage);
            }

            $(document).on('scroll mousewheel',function(e){
                if ($('.footer_section').isOnScreen()) {
                    $('[data-request="load-moredata"]').trigger('click');
                }
            });
        </script>

        <script type="text/javascript">
            var websiteDirection = $('html').attr('dir');
            $(document).ready(function(){
                if(websiteDirection == 'rtl') {
                    $('.dataTables_length').addClass('pull-left');
                    $('.pullLeft').addClass('pull-right');
                    $('.pullRight').addClass('pull-left');
					$('.fa-chevron-circle-right').addClass('fa-chevron-circle-left').removeClass('fa-chevron-circle-right');
                } else {
                    $('.dataTables_length').addClass('pull-left');
                    $('.dataTables_filter').addClass('pull-right');
                    $('.pullLeft').addClass('pull-left');
                    $('.pullRight').addClass('pull-right');
                }
            })
        </script>


        <script>
            $(document).ready(function () {
                /*
                var defaults = {
                    containerID: 'toTop', // fading element id
                    containerHoverID: 'toTopHover', // fading element hover id
                    scrollSpeed: 1200,
                    easingType: 'linear' 
                };
                */
                $().UItoTop({
                    easingType: 'easeOutQuart'
                });

            });
        </script>
    
    </body>
</html>
