<?php

class TemplateController extends Controller {

    public function actionIndex($template_type_id = null, $department_id = null, $template_type_level_id = null) {

        if (Yii::app()->session["username"] != null) {
            $this->layout = "main";
        } else {
            $this->layout = "front";
        }


        if (Yii::app()->session["username"] != null) {

            if (!empty($template_type_id)) {

                $sql = "

		SELECT 
				
		t.*, d.name AS department_name,
                l.bcolor,
                l.name as template_type_level_name
				
		FROM template t 
				
		LEFT OUTER JOIN  department d ON d.id = t.department_id
                LEFT OUTER JOIN  template_type_level l ON l.id = t.template_type_level_id
					
		WHERE t.template_type_id = '$template_type_id'
            ";
                
             if (!empty($department_id)) {
               $sql.= " AND t.department_id = '$department_id' ";  
             }
             
                if (!empty($template_type_level_id) && !empty($department_id)) {
                $sql.= " AND  t.department_id = '$department_id'  AND t.template_type_level_id = '$template_type_level_id' ";
            }


             //   if (Yii::app()->session["type"] != "admin") {

             //       $sql .= " AND t.state = 'enable' AND t.department_id in (" .
             //               Yii::app()->session["department_id"] . ") ";
            //    }

                $sql .= " ORDER BY t.template_type_level_id,t.department_id,t.orderno ASC  ";


                $model = Yii::app()->db->createCommand($sql)->queryAll();

            }
        }



        $this->render("//template/index", array(
            "model" => $model,
            "template_type_id" => $template_type_id
        ));
    }

    public function actionForm($id = null, $template_type_id = null) {

        if (Yii::app()->session["username"] != null) {
            $this->layout = "main";
        } else {
            $this->layout = "front";
        }

        $model = new Template();

        if (!empty($_POST["Template"])) {
            // 1.step new user
            $model = new Template();

            // 2.step edit template
            if (!empty($id)) {
                $model = Template::model()->findByPk($id);
            }

            // 3. step merge data
            $model->_attributes = $_POST["Template"];
            $model->template_type_id = $template_type_id;
            $model->created = new CDbExpression('NOW()');

            // 4. generate secret key
            /*
              if(!empty($id)){
              $key = $model->findByPk($id); //find old secret_key
              $model->secret_key = $key->secret_key;
              } else {
              $model->secret_key = MyClass::generateKey(80);
              }
             */

            // 5. step save/update
            if ($model->save()) {
                $this->redirect("index.php?r=template&template_type_id=$template_type_id");
            }
        }

        if (!empty($id)) {
            $model = Template::model()->findByPk($id);
        }

        $this->render("//template/form", array(
            "model" => $model,
            "template_type_id" => $template_type_id,
        ));
    }

}

// end class