

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
                                $opts = CHtml::listData(Newyear::model()->findAll(), 'id', 'name');

                                if (Yii::app()->session['type'] != 'admin') {

                                    echo $form->dropDownList($model, 'newyear_id', $opts, array("class" => "form-control",
                                        "disabled" => "disabled",
                                        "empty" => "--เลือกปีงบประมาณ--"));
                                } else {
                                    echo $form->dropDownList($model, 'newyear_id', $opts, array("class" => "form-control",
                                        "empty" => "--เลือกปีงบประมาณ--"));
                                }
                                ?>

                            </div>

                            <div class="form-group">
                                <label>
                                    <?php echo $form->labelEx($model, "target"); ?>
                                </label>
                                <?php if (Yii::app()->session['type'] != 'admin') { ?>
                                    <?php if ($model->state == "locked") { ?>
                                        <?php echo $form->textField($model, "target", array("class" => "form-control", "disabled" => "disabled",)); ?>
                                    <?php } else { ?>
                                        <?php echo $form->textField($model, "target", array("class" => "form-control",)); ?>
                                    <?php } ?>
                                <?php } else { ?>
                                    <?php echo $form->textField($model, "target", array("class" => "form-control",)); ?>
                                <?php } ?>
                            </div>

                            <div class="form-group">
                                <label>
                                    <?php echo $form->labelEx($model, "result"); ?>
                                </label>
                                <?php if (Yii::app()->session['type'] != 'admin') { ?>
                                    <?php if ($model->state == "locked") { ?>
                                        <?php echo $form->textField($model, "result", array("class" => "form-control", "disabled" => "disabled",)); ?>
                                    <?php } else { ?>
                                        <?php echo $form->textField($model, "result", array("class" => "form-control",)); ?>
                                    <?php } ?>
                                <?php } else { ?>
                                    <?php echo $form->textField($model, "result", array("class" => "form-control",)); ?>
                                <?php } ?>

                            </div>

                            <? if(Yii::app()->session["type"] == "admin"): ?> 
                            <div class="form-group">
                                <label>
                                    <?php echo $form->labelEx($model, "type_id"); ?>
                                </label>
                                <?php echo ZHtml::enumDropDownList($model, "type_id", array("class" => "form-control", "empty" => "--เลือกระยะเวลา--")); ?>

                            </div>
                            <? endif ?>


                            <? if(Yii::app()->session["type"] == "admin"): ?> 
                            <div class="form-group">
                                <label>
                                    <?php echo $form->labelEx($model, "state"); ?>
                                </label>
                                <?php echo ZHtml::enumDropDownList($model, "state", array("class" => "form-control", "empty" => "--เลือกสถานะ--")); ?>

                            </div>
                            <? endif ?>



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
		

