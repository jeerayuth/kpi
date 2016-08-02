<!DOCTYPE html>
<?php
@ob_start();
@session_start();
?>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title><?php echo CHtml::encode($this->pageTitle); ?></title>

        <!-- Bootstrap Core CSS -->
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/dist/css/sb-admin-2.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    </head>

    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site"><i class="glyphicon glyphicon-signal"></i> ระบบบันทึกตัวชี้วัด เวอร์ชั่น 1.0</a>

                    <!-- /.navbar-header -->
                </div>

                <div class="nav navbar-top-links navbar-right">

                    <!-- /.dropdown -->
                    <li>
                        <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/form">
                            <font color="white">เข้าสู่ระบบ</font
                        </a>

                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </div>
                <!-- /.navbar-top-links -->




                <div class="navbar-default sidebar " role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li class="sidebar-search">
                                <div class="input-group custom-search-form">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                                <!-- /input-group -->
                            </li>

                            <?php
                            $sql = "SELECT *
						FROM template_type WHERE state = 'enable'
						ORDER BY id  ASC ";
                            $model = Yii::app()->db->createCommand($sql)->queryAll();
                            ?>      



                            <!-- User Menu -->		


                            <li>
                                <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site"><i class="fa fa-dashboard fa-fw"></i> ประเภทข้อมูลตัวชี้วัด</a>
                            </li>


                            <ul class="nav nav-second-level">

                                <?php foreach ($model as $item) { ?>
                                    <li>
                                        <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/show&template_type_id=<?= $item['id']; ?>">
                                            <i class="fa fa-dashboard fa-fw"></i>
                                            <?= $item['name']; ?>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>




                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>


    
            <div id="page-wrapper">
            <br/>
                <?php echo $content; ?>
            </div>
            <!-- /#page-wrapper -->


        </div>





        <!-- jQuery -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/bower_components/jquery/dist/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/bower_components/metisMenu/dist/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/dist/js/sb-admin-2.js"></script>



    </body>
</html>
