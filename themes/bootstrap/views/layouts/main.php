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

    <!-- Timeline CSS -->
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


    <!-- DataTables CSS -->
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

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
                <a class="navbar-brand" href="<?php echo Yii::app()->request->baseUrl;?>/index.php?r=site">KPI Management System 1.0</a>

				            <!-- /.navbar-header -->
            </div>
		
            <ul class="nav navbar-top-links navbar-right">

                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>
						<?php echo Yii::app()->session["fname"]; ?>
						<?php echo Yii::app()->session["lname"]; ?>
						<i class="fa fa-caret-down"></i>
                    </a>
					
                    <ul class="dropdown-menu dropdown-user">          
                        <li class="divider"></li>
                        <li><a href="<?php echo Yii::app()->request->baseUrl;?>/index.php?r=site/logout"><i class="fa fa-sign-out fa-fw"></i> ออกจากโปรแกรม</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
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
						FROM template_type
						ORDER BY name  ASC ";
				$model = Yii::app()->db->createCommand($sql)->queryAll();

			?>      
                   
					<?php if(Yii::app()->session["type"] == "admin"): ?>

						<li>
                            <a href="#"><i class="glyphicon glyphicon-cog"></i> ตั้งค่าพื้นฐานของระบบ<span class="fa arrow"></span></a>

							<ul class="nav nav-second-level">
								<li>
                                    <a href="<?php echo Yii::app()->request->baseUrl;?>/index.php?r=configure/form">
									<i class="glyphicon glyphicon-cog"></i>
									พื้นฐานทั่วไป</a>
                                </li>
							</ul>

							<ul class="nav nav-second-level">
								<li>
                                    <a href="<?php echo Yii::app()->request->baseUrl;?>/index.php?r=newyear">
									<i class="glyphicon glyphicon-cog"></i>
									จัดการปีงบประมาณ</a>
                                </li>
							</ul>

							<ul class="nav nav-second-level">
							    <li>
                                    <a href="<?php echo Yii::app()->request->baseUrl;?>/index.php?r=user">
									<i class="glyphicon glyphicon-cog"></i>
									จัดการผู้ใช้งาน</a>
                                </li>
							</ul>

							<ul class="nav nav-second-level">
								<li>
                                    <a href="<?php echo Yii::app()->request->baseUrl;?>/index.php?r=department">
									<i class="glyphicon glyphicon-cog"></i>
									จัดการหน่วยงาน</a>
                                </li>
							</ul>


                        </li>



                        <li>
                            <a href="#"><i class="fa fa-dashboard fa-fw"></i> ระบบบริหารจัดการตัวชี้วัด<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                            

									<?php
									foreach($model as $item){ ?>
										<li>
											<a href="<?php echo Yii::app()->request->baseUrl;?>/index.php?r=template&template_type_id=<?= $item['id']; ?>">
												<i class="fa fa-dashboard fa-fw"></i> จัดการ<?=$item['name']; ?>
											</a>
										</li>
									<?php } ?>

                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
					<?php endif ?>
						
					
<!-- User Menu -->		

						


				<?php if(Yii::app()->session["type"] != "admin"): ?>
						<li>
                            <a href="<?php echo Yii::app()->request->baseUrl;?>/index.php?r=site"><i class="fa fa-dashboard fa-fw"></i> ผู้ใช้งานบันทึกข้อมูลตัวชี้วัด</a>
                        </li>

						
						<ul class="nav nav-second-level">

						<?php		foreach($model as $item){ ?>
										<li>
											<a href="<?php echo Yii::app()->request->baseUrl;?>/index.php?r=template&template_type_id=<?= $item['id']; ?>">
												<i class="fa fa-dashboard fa-fw"></i>
												บันทึก<?= $item['name']; ?>
											</a>
										</li>
									<?php } ?>
						</ul>

						<?php endif ?>


                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
		
		
		
        <div id="page-wrapper">

            <div class="row">
                <div class="col-lg-12">
				
				<?php
					if (Yii::app()->session["type"] == "admin"){
				?>
				
					<h1 class="page-header">ADMINISTRATOR</h1>
				<?
					}else{
				?>
			 		<h1 class="page-header">ระบบบันทึกข้อมูลตัวชี้วัด</h1>

				<?
					}
				?>
		    
                </div>
                <!-- /.col-lg-12 -->
            </div>
            

                     
							 <div><?php echo $content; ?></div>
   
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->


	

	 <!-- jQuery -->
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/bower_components/raphael/raphael-min.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/bower_components/morrisjs/morris.min.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/dist/js/sb-admin-2.js"></script>



    <!-- DataTables JavaScript -->
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/bower_components/DataTables/media/js/jquery.dataTables.min.js"></script>
    
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>


    </body>
</html>
