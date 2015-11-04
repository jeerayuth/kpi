<?php if (Yii::app()->session["username"] != null) { ?>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    ฟอร์มบันทึกข้อมูลตัวชี้วัด
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
                                <?php echo $form->labelEx($model, "title"); ?>
                                </label>
                                <?php echo $form->textField($model, "title", array("class" => "form-control")); ?>
                            </div>

                            <div class="form-group">
                                <label>
                                <?php echo $form->labelEx($model, "details"); ?>
                                </label>				
                                <?php
                                echo $form->textArea($model, "details", array(
                                    "class" => "form-control",
                                    "rows" => 4,
                                    "placeholder" => "ระบุรายละเอียดตัวชี้วัด",
                                ));
                                ?>
                            </div>

                            <div class="form-group">
                                <label>
                                <?php echo $form->labelEx($model, "department_id"); ?>
                                </label>

                                <?php
                                $opts = CHtml::listData(Department::model()->findAll(), 'id', 'name');
                                echo $form->dropDownList($model, 'department_id', $opts, array("class" => "form-control", "empty" => "--เลือกหน่วยงาน--"));
                                ?>
                            </div>

                            <div class="form-group">
                                <label>
                                <?php echo $form->labelEx($model, "type_id"); ?>
                                </label>
    <?php echo ZHtml::enumDropDownList($model, "type_id", array("class" => "form-control", "empty" => "--เลือกระยะเวลา--")); ?>

                            </div>

                            <div class="form-group">
                                <label>
                                <?php echo $form->labelEx($model, "state"); ?>
                                </label>
    <?php echo ZHtml::enumDropDownList($model, "state", array("class" => "form-control", "empty" => "--เลือกสถานะ--")); ?>

                            </div>



                            <div class="form-group">
                                <input class="btn btn-lg btn-info btn-block" type="submit" value="บันทึกข้อมูลตัวชี้วัด">
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



