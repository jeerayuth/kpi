<?php if (Yii::app()->session["username"] != null) { ?>


<div class="alert alert-info" role="alert">
	
	<h1>ระบบบันทึกข้อมูลตัวชี้วัด version 1.0</h1>
	<h3><?php echo $model->hospname; ?></h3>
    <h3><?php echo $model->address; ?></h3>
	<h3>โทรศัพท์ <?php echo $model->telephone; ?></h3>
	<p>
		อัพเดตล่าสุดเมื่อ: 2015-10-25
	</p>
	
	<br/><br/><br/><br/>

	 <p>
        <?php echo CHtml::image('images/logoyii.png'); ?>
        <?php echo CHtml::image('images/logomysql.png'); ?>
        <?php echo CHtml::image('images/logophp.png'); ?>
    </p>

</div>



<?php  } else { ?>
	<?php $this->renderPartial("//site/_formlogin"); ?>
<?php } ?>





