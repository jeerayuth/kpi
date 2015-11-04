<?php

class NewyearController extends Controller
{
	public function actionIndex(){

			if (Yii::app()->session["username"] != null){
			 	$this->layout = "main";
			 }else{
			 	$this->layout = "front";
			 }

				$sql = "SELECT  n.*
						FROM newyear n 
						ORDER BY n.name DESC ";

			$model = Yii::app()->db->createCommand($sql)->queryAll();
			 
			$this->render("//newyear/index", array(
				"model" => $model,
			));
	
	}

	
	public function actionForm($id = null){

		if (Yii::app()->session["username"] != null){
			 $this->layout = "main";
		}else{
			 $this->layout = "front";
		}

		$model = new Newyear();

		if(!empty($_POST["Newyear"])) {
			// 1.step new Newyear
			$model = new Newyear();

			// 2.step edit Newyear
			if(!empty($id)){
				$model = Newyear::model()->findByPk($id);
			}
			
			// 3. step merge data
			$model->_attributes = $_POST["Newyear"];
			

			// 6. step save/update
			if($model->save()){
				$this->redirect("index.php?r=newyear");
			}	
		}

		if (!empty($id)) {
            	$model = Newyear::model()->findByPk($id);
        	}

		$this->render("//newyear/form", array(
			"model" => $model,	
		));

	}




} // end class