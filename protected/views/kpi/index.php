<?php if (Yii::app()->session["username"] != null) { ?>

	
		<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
					
					<?php if(Yii::app()->session["type"] == "admin") { ?>

						<a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=kpi/form&template_id=<?=$template_id; ?>&title=<?=$title; ?>" class="btn btn-info"><i class="glyphicon glyphicon-plus"></i> เพิ่มเป้าหมายตัวชี้วัด</a>
						&nbsp;
						<span class="badge">
							<?=$title; ?>
						</span>
					<?php } else {?>
						<span class="badge">
						ชื่อตัวชี้วัด: <b><?=$title; ?></b>
						</span>
					<?php } ?>

                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
			
			<table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
											<th>ลำดับ</th>
                                            <th>ปีงบประมาณ</th>
											<th>ระยะเวลา</th>
											<th>เป้าหมาย</th>
											<th>ผลลัพธ์</th>
											<th>ร้อยละ(%)</th>
											<th>แก้ไขล่าสุด</th>
											<th>สถานะ</th>
                                            <th>จัดการ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php $counter = 0; ?>
<? foreach($model as $item){ ?>

     <tr class="odd gradeX">
		  <td><?= $counter += 1; ?></td>
          <td><?= $item['newyear']; ?></td>
		  <td><?= $item['type_id']; ?></td>
		  <td><?= $item['target']; ?></td>
		  <td><?= $item['result']; ?></td>
		  <td>
				<? if(($item['target'] > 0) && ($item['result'] >= 0)): ?>
				<?= ($item['result']/$item['target']) * 100 ;?>
				<? endif; ?>
		  </td>
		  <td><?= $item['created']; ?></td>  
		  <td><?= $item['state']; ?></td> 
		  <td align="center">
			<a href="<?php echo Yii::app()->request->baseUrl;?>/index.php?r=kpi/form&id=<?=$item['id']; ?>&template_id=<?=$template_id; ?>&title=<?=$title; ?>" class="btn btn-primary btn-xs">แก้ไข</a> 
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



	