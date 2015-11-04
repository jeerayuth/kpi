<?php if (Yii::app()->session["username"] != null){ ?>


		<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
						 ฟอร์มบันทึกข้อมูลผู้ใช้งานระบบ
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                           
	
	<div class= "row">
		
		<div class="col-lg-6">
				<?php $form = $this->beginWidget('CActiveForm', array(
					'htmlOptions' => array(
					'role'=>'form'
					),
				)); ?>
				
				<div class="form-group">
					<label>
					<?php echo $form->errorSummary($model); ?>
					</label>
				</div>


				<div class="form-group">
					<label>
						<?php echo $form->labelEx($model, "fname"); ?>
					</label>
					<?php echo $form->textField($model, "fname",array("class"=>"form-control")); ?>
				</div>

				<div class="form-group">
					<label>
						<?php echo $form->labelEx($model, "lname"); ?>
					</label>				
					<?php echo $form->textField($model, "lname",array("class"=>"form-control")); ?>
				</div>

				<div class="form-group">
					<label>
						<?php echo $form->labelEx($model, "department_id"); ?>
					</label>
					
					<br/>

					<?

						$type_list=CHtml::listData(Department::model()->findAll(),'id','name');

						echo $form->checkBoxList($model, "department_id",$type_list, array('checked'=>'checked'));  

				
				 	?>
				</div>


				<div class="form-group">
					<label>
						<?php echo $form->labelEx($model, "username"); ?>
					</label>
					<?php echo $form->textField($model, "username",array("class"=>"form-control")); ?>
				</div>

				<div class="form-group">
					<label>
					  <?php echo $form->labelEx($model, "password"); ?>
					</label>
					<?php echo $form->passwordField($model, "password",array("class"=>"form-control")); ?>
				</div>


				<div class="form-group">
					<label>
						<?php echo $form->labelEx($model, "type"); ?>
					</label>

					<?php echo ZHtml::enumDropDownList($model, "type", array("class"=>"form-control", "empty"=>"--เลือกประเภทผู้ใช้งาน--")); ?>
				</div>

				<div class="form-group">
					<label>
						<?php echo $form->labelEx($model, "status"); ?>
					</label>
					<?php echo ZHtml::enumDropDownList($model, "status", array("class"=>"form-control", "empty"=>"--เลือกสถานะผู้ใช้งาน--")); ?>

				</div>


				<div class="form-group">
					<input class="btn btn-lg btn-info btn-block" type="submit" value="บันทึกข้อมูลผู้ใช้">
				</div>



				<?php $this->endWidget(); ?>
		</div>

		<div class="col-lg-5">
			&nbsp;
		</div>
	</div>


						
						</div> <!-- end panel body-->

					</div> <!-- end panel panel-default-->

				</div> <!-- end col-lg-12 -->

	</div> <!-- end row-->


<?php  } else { ?>
	<?php $this->renderPartial("//site/_formlogin"); ?>
<?php } ?>



		
		