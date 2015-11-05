<?php

class KpiController extends Controller {

    public function actionIndex($template_id = null, $title = null) {

        if (Yii::app()->session["username"] != null) {
            $this->layout = "main";
        } else {
            $this->layout = "front";
        }

        if (!empty($template_id)) {
            $sql = "SELECT 
                    k.*, n.name as newyear, t.goal
                    FROM kpi k
                    LEFT OUTER JOIN newyear n ON n.id = k.newyear_id
                    LEFT OUTER JOIN template t ON t.id = k.template_id
                    WHERE k.template_id = '$template_id'
                    ORDER BY n.name DESC
				";

            $model = Yii::app()->db->createCommand($sql)->queryAll();
        }

        $this->render("//kpi/index", array(
            "model" => $model,
            "template_id" => $template_id,
            "title" => $title,
        ));
    }

    public function actionForm($id = null, $template_id = null, $title = null) {

        if (Yii::app()->session["username"] != null) {
            $this->layout = "main";
        } else {
            $this->layout = "front";
        }

        $model = new Kpi();

        if (!empty($_POST["Kpi"])) {
            // 1.step new kpi
            $model = new Kpi();

            // 2.step edit kpi
            if (!empty($id)) {
                $model = Kpi::model()->findByPk($id);
            }

            // 3. step merge data
            $model->_attributes = $_POST["Kpi"];
            $model->template_id = $template_id;
            $model->username = Yii::app()->session["username"];
            $model->created = new CDbExpression('NOW()');


            // 4. step save/update
            if ($model->save()) {
                $this->redirect("index.php?r=kpi/index&template_id=$template_id&title=$title");
            }
        }


        if (!empty($id)) {
            $model = Kpi::model()->findByPk($id);
        }

        $this->render("//kpi/form", array(
            "model" => $model,
            "template_id" => $template_id,
            "title" => $title,
        ));
    }

}

// end class