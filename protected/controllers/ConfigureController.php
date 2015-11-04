<?php

class ConfigureController extends Controller
{

	public function actionForm($id = 1){

		if (Yii::app()->session["username"] != null){
			 $this->layout = "main";
		}else{
			 $this->layout = "front";
		}

		$model = Configure::model()->findByPk($id);

		if(!empty($_POST["Configure"])) {
			$model = Configure::model()->findByPk($id);
			$model->_attributes = $_POST["Configure"];
			$model->state = "enable";

			if($model->save()){
				$this->redirect("index.php?r=site");
			}
		}

		$this->render("//configure/form", array(
			"model" => $model,	
		));

	}




} // end class