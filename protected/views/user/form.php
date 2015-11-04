<?php if (Yii::app()->session["username"] != null) { ?>


    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    ฟอร์มบันทึกข้อมูลผู้ใช้งานระบบ
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
                                    <?php echo $form->labelEx($model, "fname"); ?>
                                </label>
                                <?php echo $form->textField($model, "fname", array("class" => "form-control")); ?>
                            </div>

                            <div class="form-group">
                                <label>
                                    <?php echo $form->labelEx($model, "lname"); ?>
                                </label>				
                                <?php echo $form->textField($model, "lname", array("class" => "form-control")); ?>
                            </div>

                            <div class="form-group">
                                <label>
                                    <?php echo $form->labelEx($model, "department_id"); ?>
                                </label>

                                <br/>

                         
                                <?php
                                
                                
                                 
                                 //1. Generate Department All List
                                $department_list=CHtml::listData(Department::model()->findAll(),'id','name');
                                
                                 if($id !='') {
                                     
                                    // 2. Find Field department_id from your user id
                                    $sql = "
                                        SELECT
                                            department_id
                                        FROM user
                                            WHERE id = $id                                  
                                        LIMIT 1
                                    ";
                                
                                    $department_checked = Yii::app()->db->createCommand($sql)->queryAll();                    
                                    $myArray = explode(',', $department_checked[0]['department_id']);
                            
                                    // 3. assign pre-selected list to Department list
                                    $model->department_id = $myArray;
                                }
                                
                                $htmlOptions = array(
                                                        'separator'=>' ',
                                                        'multiple'=>true,
                                                        'checked'=>'checked');
                                
                                echo $form->checkBoxList($model, "department_id",$department_list,$htmlOptions);  
                             
                                ?>

                            </div>


                            <div class="form-group">
                                <label>
                                    <?php echo $form->labelEx($model, "username"); ?>
                                </label>
                                <?php echo $form->textField($model, "username", array("class" => "form-control")); ?>
                            </div>

                            <div class="form-group">
                                <label>
                                    <?php echo $form->labelEx($model, "password"); ?>
                                </label>
                                <?php echo $form->passwordField($model, "password", array("class" => "form-control")); ?>
                            </div>


                            <div class="form-group">
                                <label>
                                    <?php echo $form->labelEx($model, "type"); ?>
                                </label>

                                <?php echo ZHtml::enumDropDownList($model, "type", array("class" => "form-control", "empty" => "--เลือกประเภทผู้ใช้งาน--")); ?>
                            </div>

                            <div class="form-group">
                                <label>
                                    <?php echo $form->labelEx($model, "status"); ?>
                                </label>
                                <?php echo ZHtml::enumDropDownList($model, "status", array("class" => "form-control", "empty" => "--เลือกสถานะผู้ใช้งาน--")); ?>

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


<?php } else { ?>
    <?php $this->renderPartial("//site/_formlogin"); ?>
<?php } ?>




