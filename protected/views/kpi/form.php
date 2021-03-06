

<?php if (Yii::app()->session["username"] != null) { ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    ฟอร์มบันทึกข้อมูลผลงานตัวชี้วัด
                    <span class="badge">
                        <?php echo $title; ?>
                    </span>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">


                    <div class= "row">

                        <div class="col-lg-12">
                            <?php
                            $form = $this->beginWidget('CActiveForm', array(
                                'htmlOptions' => array(
                                    'role' => 'form'
                                ),
                            ));
                            ?>


                            <div class="form-group">
                                <label>
                                    <?php echo $form->errorSummary($model); ?>
                                </label>
                            </div>

                            <div class="form-group">
                                <label>
                                    <?php echo $form->labelEx($model, "newyear_id"); ?>
                                </label>

                                <?php
                                $opts = CHtml::listData(Newyear::model()->findAll(array('order' => 'name desc')), 'id', 'name');


                                echo $form->dropDownList($model, 'newyear_id', $opts, array("class" => "form-control",
                                    "empty" => "--เลือกปีงบประมาณ--"));
                                ?>

                            </div>

                            <div class="form-group">
                                <label>
                                    <?php echo $form->labelEx($model, "target"); ?>
                                </label>

                                <?php echo $form->textField($model, "target", array("class" => "form-control",)); ?>

                            </div>

                            <div class="form-group">
                                <label>
                                    <?php echo $form->labelEx($model, "result"); ?>
                                </label>

                                <?php echo $form->textField($model, "result", array("class" => "form-control",)); ?>


                            </div>

                            <div class="form-group">
                                <label>
                                    <?php echo $form->labelEx($model, "process"); ?>
                                </label>
                                <?php echo ZHtml::enumDropDownList($model, "process", array("class" => "form-control", "empty" => "--ผลลัพธ์--")); ?>

                            </div>

                            <!--
                           <div class="form-group">
                               <label>
                            <?php //echo $form->labelEx($model, "type_id"); ?>
                               </label>
                            <?php //echo ZHtml::enumDropDownList($model, "type_id", array("class" => "form-control", "empty" => "--เลือกระยะเวลา--")); ?>

                           </div>
                            -->



                            <div class="form-group">
                                <label>
                                    <?php echo $form->labelEx($model, "state"); ?>
                                </label>
                                <?php echo ZHtml::enumDropDownList($model, "state", array("class" => "form-control", "empty" => "--เลือกสถานะ--")); ?>

                            </div>



                            <div class="form-group">
                                <input class="btn btn-lg btn-info btn-block" type="submit" value="บันทึกข้อมูลผลงานตัวชี้วัด">
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
		

