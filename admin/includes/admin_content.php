<div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                    
                        <?php if($session->notificationExist()):?>
                            <div class="alert alert-<?php echo $session->notiGetType() ?> alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <strong><?php echo strtoupper($session->notiGetType()) ?></strong> <?php echo $session->notiGetMsg()?>
                                <?php $session->delet_notificaion()?>
                            </div>
                        <?php endif;?>
                       <?php
                       
                          
                       
                       
                       
                       
                       
                       
                       ?>
                        <h1 class="page-header">
                            Blank Page
                            
                            <small>Subheading</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>
                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->