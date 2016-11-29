<style type="text/css">
    #horizon li{
        display: inline;
        padding-right: 20px;
    }  
</style>

<?php if (Yii::app()->session["username"] != null) { ?>

    <?php
    $sql = "
			SELECT name 
			FROM template_type
			WHERE id = '$template_type_id' 
			LIMIT 1
		";

    $template_type = Yii::app()->db->createCommand($sql)->queryAll(); ?>

    <div class="row">
        <div class="col-lg-12 ">
            <div class="alert alert-info">

                <?php
                $sql2 = "
			SELECT id,name 
			FROM department
			WHERE template_type_id = '$template_type_id' 
		";

                $department = Yii::app()->db->createCommand($sql2)->queryAll();
                ?>

                <ul id="horizon">
                    <?php foreach ($department as $item) { ?>
                        <li>
                            &#9899 
                            <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=template&template_type_id=<?=$template_type_id;?>&department_id=<?= $item['id']; ?>">                       
                                ตัวชี้วัด <?= $item['name']; ?>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
                
                
                
                <?php
               
               if($template_type_id == 1) {
                   

                $sql3 = "
			SELECT * 
			FROM template_type_level
		";

                $template_type_level = Yii::app()->db->createCommand($sql3)->queryAll();
               ?>

                <ul id="horizon" style="list-style: none;">
                    <?php foreach ($template_type_level as $item) { ?>
                        <li>
                           
                            <a style="text-decoration: none;" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=template&template_type_id=<?=$template_type_id;?>&department_id=1&template_type_level_id=<?=$item['id']?>">
                                <span class="label <?php echo $item['bcolor']?>"><?= $item['name']; ?></span>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
                        
             <?php  } ?>
                
                
                
            </div>
        </div>

    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php if (Yii::app()->session["type"] == "admin"): ?>
                        <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=template/form&template_type_id=<?= $template_type_id; ?>" class="btn btn-info"><i class="glyphicon glyphicon-plus"></i> เพิ่ม<?= $template_type[0]['name']; ?>ใหม่</a>
                    <?php endif ?>

                    <?php  if (Yii::app()->session["type"] != "admin"): ?>
                        <b><?= $template_type[0]['name']; ?> </b>
                    <?php endif ?>

                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">

                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>ลำดับ</th>
                                    <th width="50%">ชื่อตัวชี้วัด</th>
                                    <th>เป้าหมาย</th>
                                    <th>ระดับตัวชี้วัด</th>                       
                                    <th>จัดการ</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $counter = 0; ?>
                                <?php $attach_src = Yii::app()->baseUrl.'/docs/'; ?>
                                <? foreach($model as $item){ ?>

                                <tr class="odd gradeX">
                                    <td><?php
                                        if ($item['family'] == "parent") {
                                            echo $counter += 1;
                                        }
                                        ?>                    
                                    </td>
                                    <td>
                                        <?php
                                        if ($item['family'] == "parent") {
                                            echo $item['title'];
                                            if($item['content_type'] != "หัวข้อ") {
                                                ?>
                                                <a href = "<?php echo $attach_src.$item["image"]; ?>">นิยามตัวชี้วัด</a>
                                                <?php
                                            }
                                        } else if ($item['family'] == "child") {
                                            echo '&nbsp;&nbsp;&#9899; ' . $item['title'];
                                            if($item['content_type'] != "หัวข้อ") {
                                                ?>
                                                <a href = "<?php echo $attach_src.$item["image"]; ?>">นิยามตัวชี้วัด</a>
                                                <?php
                                            }
                                        } else {
                                            echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- ' . $item['title'];
                                            if($item['content_type'] != "หัวข้อ") {
                                                ?>
                                                <a href = "<?php echo $attach_src.$item["image"]; ?>">นิยามตัวชี้วัด</a>
                                                <?php
                                            }
                                        }
                                        ?>

                                        <?php if ($item['template_type_level_name'] != null) { ?>
                                            <span class="label <?php echo $item['bcolor']?>">
                                                <?= $item['template_type_level_name']; ?>
                                            </span>
                                        <?php } ?>
                                    </td>
                                    <td><?= $item['goal']; ?></td>
                                    <td>
                                         <?php if($item['content_type']=="เนื้อหา"){ ?>
                                            <?= $item['department_name']; ?>
                                         <?php } ?>
                                    </td>
                                  
                                    <td calss="center">
                                        <?php if($item['content_type']=="เนื้อหา"){ ?>
                                        
                                                <?php if(Yii::app()->session["type"] == "admin"): ?>                                        
                                                    <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=template/form&id=<?= $item['id']; ?>&template_type_id=<?= $template_type_id; ?>" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-pencil"></i> แก้ไข</a>  
                                                <?php endif ?>
                                                
                                                <a target=_blank href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=kpi/index&template_id=<?= $item['id']; ?>&title=<?= $item['title'] ?>" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i> เป้าหมาย</a>
                                            <?php } ?>
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

<?php } else { ?>
    <?php $this->renderPartial("//site/_formlogin"); ?>
<?php } ?>




