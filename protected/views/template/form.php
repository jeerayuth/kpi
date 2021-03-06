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
                                    'role' => 'form',
                                    'enctype'=>'multipart/form-data'
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
                                    <?php echo $form->labelEx($model, "template_type_level_id"); ?>
                                </label> 

                                <?php
                                $opts = CHtml::listData(Template_Type_Level::model()->findAll(), 'id', 'name');
                                echo $form->dropDownList($model, 'template_type_level_id', $opts, array("class" => "form-control", "empty" => "--เลือกผลดำเนินงานทางด้าน--"));
                                ?>
                            </div> 
                            

                            <div class="form-group">
                                <label>
                                    <?php echo $form->labelEx($model, "goal"); ?>
                                </label>
                                <?php
                                echo $form->textField($model, "goal", array("class" => "form-control",
                                    "placeholder" => "เช่น ร้อยละ 50",
                                ));
                                ?>
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
                                    <?php echo $form->labelEx($model, "orderno"); ?>
                                </label>
                                <?php
                                echo $form->textField($model, "orderno", array("class" => "form-control",
                                    "placeholder" => "ระบุลำดับที่ใช้แสดงผลเป็นตัวเลข",
                                ));
                                ?>
                            </div>
                            
                              <div class="form-group">
                                <label>
                                    <?php echo $form->labelEx($model, "family"); ?>
                                </label>
                                <?php echo ZHtml::enumDropDownList($model, "family", array("class" => "form-control", "empty" => "--กลุ่มตัวชี้วัด--")); ?>

                            </div>
                            
                             <div class="form-group">
                                <label>
                                    <?php echo $form->labelEx($model, "content_type"); ?>
                                </label>
                                <?php echo ZHtml::enumDropDownList($model, "content_type", array("class" => "form-control", "empty" => "--เลือกประเภทเนื้อหา--")); ?>

                            </div>

                           
                            <div class="form-group">
                                <label>
                                    <?php echo $form->labelEx($model, "state"); ?>
                                </label>
                                <?php echo ZHtml::enumDropDownList($model, "state", array("class" => "form-control", "empty" => "--เลือกสถานะ--")); ?>

                            </div>

                            <div clas="form-group">
                                 <label>
                                    <?php echo $form->labelEx($model, "image"); ?>
                                </label>
                                <?php echo CHtml::activeFileField($model, 'image'); ?>
                                
                            </div>
                            <br/>

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



