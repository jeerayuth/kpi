<?php if (Yii::app()->session["username"] != null) { ?>
	

<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
						 ฟอร์มบันทึกข้อมูลปีงบประมาณ
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
						<?php echo $form->labelEx($model, "name"); ?>
					</label>
					<?php echo $form->textField($model, "name",array("class"=>"form-control",
					"placeholder"=>"ระบุตัวเลขปีงบประมาณ เช่น 2558")); ?>
				</div>

				<div class="form-group">
					<input class="btn btn-lg btn-info btn-block" type="submit" value="บันทึกข้อมูลปีงบประมาณ">
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


<?php } else { ?>
	<?php $this->renderPartial("//site/_formlogin"); ?>
<?php } ?>


		