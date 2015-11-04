<?php

class DepartmentController extends Controller {

    public function actionIndex() {

        if (Yii::app()->session["username"] != null) {
            $this->layout = "main";
        } else {
            $this->layout = "front";
        }

        $sql = "SELECT  d.*, t.name as template_type_name
		FROM department d 
                LEFT OUTER JOIN template_type t ON t.id = d.template_type_id
		ORDER BY t.id,d.name ASC ";

        $model = Yii::app()->db->createCommand($sql)->queryAll();


        $this->render("//department/index", array(
            "model" => $model,
        ));
    }

    public function actionForm($id = null) {

        if (Yii::app()->session["username"] != null) {
            $this->layout = "main";
        } else {
            $this->layout = "front";
        }

        $model = new Department();

        if (!empty($_POST["Department"])) {
            // 1.step new Department
            $model = new Department();

            // 2.step edit Department
            if (!empty($id)) {
                $model = Department::model()->findByPk($id);
            }

            // 3. step merge data
            $model->_attributes = $_POST["Department"];


            // 6. step save/update
            if ($model->save()) {
                $this->redirect("index.php?r=department");
            }
        }

        if (!empty($id)) {
            $model = Department::model()->findByPk($id);
        }

        $this->render("//department/form", array(
            "model" => $model,
        ));
    }

}

// end class