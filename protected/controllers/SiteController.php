<?php

class SiteController extends Controller
{
	public function actionIndex(){
		
		  if (Yii::app()->session["username"] != null){
			 $this->layout = "main";
		   }else{
			 $this->layout = "front";
		   }

			
			$model = Configure::model()->findByPk(1);

			$this->render("//site/index", array(
				"model" => $model,
			));

	}

	public function actionLogin(){
		// step1. Prepare Where
		$attributes = array();
		$attributes["username"] = $_POST["username"];
		$attributes["password"] = ($_POST["password"]);
		$attributes["status"] = "เปิดใช้งาน";

		// step2. Find User in Database
		$user = User::model()->findByAttributes($attributes);

		// step3. Login
		if(!empty($user)) {
			Yii::app()->session["id"] = $user->id;
			Yii::app()->session["username"] = $user->username;
			Yii::app()->session["fname"] = $user->fname;
			Yii::app()->session["lname"] = $user->lname;
			Yii::app()->session["type"] = $user->type;
			Yii::app()->session["department_id"] = $user->department_id;
			$this->redirect("index.php?r=site");
		}else{
			$this->redirect("index.php?r=site");
		}
	}


	public function actionLogout(){
		// clear session
		unset(Yii::app()->session["id"]);
		unset(Yii::app()->session["username"]);
		unset(Yii::app()->session["fname"]);
		unset(Yii::app()->session["lname"]);
		unset(Yii::app()->session["type"]);
		unset(Yii::app()->session["department_id"]);
		$this->redirect("index.php?r=site");
	}


	




} // end class