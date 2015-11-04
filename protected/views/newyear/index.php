<?php if (Yii::app()->session["username"] != null) { ?>

<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
						<?php if(Yii::app()->session["type"] == "admin"): ?>
							<a href="<?php echo Yii::app()->request->baseUrl;?>/index.php?r=newyear/form" class="btn btn-info"><i class="glyphicon glyphicon-plus"></i> เพิ่มปีงบประมาณใหม่</a>
						<?php endif ?>

                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
			
						<table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
											<th>ลำดับ</th>
                                            <th>ปีงบประมาณ</th>
											<th>จัดการ</th>	
                                        </tr>
                                    </thead>
                                    <tbody>
<?php $counter = 0; ?>
<? foreach($model as $item){ ?>

     <tr class="odd gradeX">
		  <td><?= $counter += 1; ?></td>
          <td><?= $item['name']; ?></td>
		<? if(Yii::app()->session["type"] == "admin"): ?>  
			<td calss="center">
			<a href="<?php echo Yii::app()->request->baseUrl;?>/index.php?r=newyear/form&id=<?=$item['id'];?>" class="btn btn-primary btn-xs">แก้ไข</a> 
			</td>	
		<? endif ?>
    </tr>

<? } ?>


						</tbody>

				</table>

						</div>
						</div>

				</div>
				</div>
	</div>



<?php  } else { ?>
	<?php $this->renderPartial("//site/_formlogin"); ?>
<?php } ?>




