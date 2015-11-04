<?php

class UserController extends Controller
{

	public function actionIndex(){


		if (Yii::app()->session["username"] != null){
			 $this->layout = "main";
		   }else{
			 $this->layout = "front";
		   }

		
		$sql = "
		
		SELECT u.id,concat(u.fname, '  ',u.lname) as full_name, u.type,
		u.created, u.status, d.name as dep_name
		
		FROM user u 

		LEFT OUTER JOIN department d ON d.id = u.department_id
		
		ORDER BY u.created DESC ";
		
		$model = Yii::app()->db->createCommand($sql)->queryAll();

		$this->render("//user/index", array(
			"model" => $model,
		));
	}

	
	public function actionForm($id = null){

		if (Yii::app()->session["username"] != null){
			 $this->layout = "main";
		  }else{
			 $this->layout = "front";
		}

		$model = new User();

		if(!empty($_POST["User"])) {
			// 1.step new user
			$model = new User();

			// 2.step edit user
			if(!empty($id)){
				$model = User::model()->findByPk($id);
			} 

			// 3. step merge data
			$model->_attributes = $_POST["User"];
			$model->created = new CDbExpression('NOW()');

			$model->department_id =implode(",", $model->department_id);


			// 4. step save/update
			if($model->save()){
				$this->redirect("index.php?r=user");
			}


		}

		
		if (!empty($id)) {
            	$model = User::model()->findByPk($id);
        	}


		$this->render("//user/form", array(
			"model" => $model));

	}




	



} // end class