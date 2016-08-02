<style type="text/css">
    #horizon li{
        display: inline;
        padding-right: 20px;
    }  
</style>

<?php
$sql = "
			SELECT name 
			FROM template_type
			WHERE id = '$template_type_id' 
			LIMIT 1
		";

$template_type = Yii::app()->db->createCommand($sql)->queryAll();
?>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">

                <b><?= $template_type[0]['name']; ?></b>

            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper">

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
                                <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/show&template_type_id=<?= $template_type_id; ?>&department_id=<?= $item['id']; ?>">
                                    ตัวชี้วัด <?= $item['name']; ?>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>


                    <?php
                    if ($template_type_id == 1) {


                        $sql3 = "
			SELECT * 
			FROM template_type_level
		";

                        $template_type_level = Yii::app()->db->createCommand($sql3)->queryAll();
                        ?>
                         
                        <ul id="horizon" style="list-style: none;">
                         
                            <?php foreach ($template_type_level as $item) { ?>
                               
                                <li>

                                    <a style="text-decoration: none;" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/show&template_type_id=<?= $template_type_id; ?>&department_id=1&template_type_level_id=<?= $item['id'] ?>">
                                        <span class="label <?php echo $item['bcolor'] ?>"><?= $item['name']; ?></span>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>

                    <?php } ?>

                    <p>

                        <?php
                        // ปีงบประมาณ
                        if ($template_type_id == 1) {

                            $sql4 = "
			SELECT * 
			FROM newyear
                        ORDER BY name DESC
                        LIMIT 5
                        ";

                            $template_newyear = Yii::app()->db->createCommand($sql4)->queryAll();
                            ?>

                           
                        <ul id="horizon" style="list-style: none;">
                            &#9899
                              ปีงบประมาณ : 
                            <?php foreach ($template_newyear as $item) { ?>
                                <li>

                                    <a style="text-decoration: none;" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/show&template_type_id=<?= $template_type_id; ?>&department_id=1&template_type_level_id=<?= $template_type_level_id ?>&newyear_id=<?= $item['id']?>&newyear_name=<?= $item['name']?> ">
                                        <?= $item['name']; ?>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>

                    <?php } ?>
                    
                    
    

                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>ลำดับ</th>
                                <th>ชื่อตัวชี้วัด</th>
                                <th>เป้าหมาย</th>                       
                                <th>ปี2556</th>                         
                                <th>ปี2557</th>
                                <th>ปี2558</th>               
                            </tr>
                        </thead>
                        <tbody>
                            <?php $counter = 0; ?>
                            <? foreach($model as $item){ ?>

                            <tr class="odd gradeX">
                                <td>
                                    <?php
                                    if ($item['family'] == "parent") {
                                        echo $counter += 1;
                                    }
                                    ?> 

                                </td>

                                <td>
                                    <?php
                                    if ($item['family'] == "parent") {
                                        echo $item['title'];
                                    } else if ($item['family'] == "child") {
                                        echo '&nbsp;&nbsp;&#9899; ' . $item['title'];
                                    } else {
                                        echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- ' . $item['title'];
                                    }
                                    ?>
                                </td>

                                <td><?= $item['goal']; ?></td>                           
                                <td><?= $item['Y_56']; ?></td>  
                                <td><?= $item['Y_57']; ?></td> 
                                <td><?= $item['Y_58']; ?></td> 



                            </tr>

                            <? } ?>




                        </tbody>

                    </table>

                </div>
            </div>

        </div>
    </div>
</div>