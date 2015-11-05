<?php if (Yii::app()->session["username"] != null){ ?>

<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
						<a href="<?php echo Yii::app()->request->baseUrl;?>/index.php?r=user/form" class="btn btn-info"><i class="glyphicon glyphicon-plus"></i>  เพิ่มข้อมูลผู้ใช้งานระบบ</a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
							

<table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>ชื่อ-สกุล</th>
                                            <th>ประเภท</th>
                                            <th>วันที่ลงทะเบียน</th>
                                            <th>สถานะ</th>
											<th>จัดการ</th>
                                        </tr>
                                    </thead>
                                    <tbody>

<? foreach($model as $item){ ?>

     <tr class="odd gradeX">
          <td><?= $item['full_name']; ?></td>
          <td><?= $item['type']; ?></td>
          <td class="center"><?= $item['created']; ?></td>
          <td class="center"><?= $item['status']; ?></td>
		  
		<? if(Yii::app()->session["type"] == "admin"): ?>  
			<td calss="center">
			<a href="<?php echo Yii::app()->request->baseUrl;?>/index.php?r=user/form&id=<?=$item['id'];?>" class="btn btn-primary btn-xs">แก้ไข</a>
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


		
		
		