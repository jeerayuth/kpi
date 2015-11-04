<?php if (Yii::app()->session["username"] != null){ ?>


<?php

		$sql = "
			SELECT name 
			FROM template_type
			WHERE id = '$template_type_id' 
			LIMIT 1
		";

		$template_type  = Yii::app()->db->createCommand($sql)->queryAll();
		

?>
			
		<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
						<?php if(Yii::app()->session["type"] == "admin"): ?>
							<a href="<?php echo Yii::app()->request->baseUrl;?>/index.php?r=template/form&template_type_id=<?=$template_type_id; ?>" class="btn btn-info"><i class="glyphicon glyphicon-plus"></i> เพิ่ม<?= $template_type[0]['name']; ?>ใหม่</a>
						<?php endif ?>

						<?php if(Yii::app()->session["type"] != "admin"): ?>
							 <b><?= $template_type[0]['name']; ?> </b>
						<?php endif ?>

                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
			
			<table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
											<th>ลำดับ</th>
                                            <th>ชื่อตัวชี้วัด</th>
											<th>หน่วยงาน</th>
											<th>ระยะเวลา</th>
											<th>แก้ไขล่าสุด</th>
											<th>สถานะ</th>
					<?php if(Yii::app()->session["type"] == "admin"): ?>
											<th>จัดการ</th>
					<?php endif ?>
											<th>เป้าหมาย</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php $counter = 0; ?>
<? foreach($model as $item){ ?>

     <tr class="odd gradeX">
		  <td><?= $counter += 1; ?></td>
          <td><?= $item['title']; ?></td>
          <td><?= $item['department_name']; ?></td>
		  <td><?= $item['type_id']; ?></td>
		  <td><?= $item['created']; ?></td>  
		  <td><?= $item['state']; ?></td> 
		<? if(Yii::app()->session["type"] == "admin"): ?>  
			<td calss="center">
			<a href="<?php echo Yii::app()->request->baseUrl;?>/index.php?r=template/form&id=<?=$item['id'];?>&template_type_id=<?=$template_type_id; ?>" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-pencil"></i> แก้ไข</a>  
			</td>	
		
		<? endif ?>

			<td>
			<a target=_blank href="<?php echo Yii::app()->request->baseUrl;?>/index.php?r=kpi/index&template_id=<?=$item['id'];?>&title=<?=$item['title']?>" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-plus"></i> เพิ่มเป้าหมาย</a>

			</td>

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




