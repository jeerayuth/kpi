<?php

class SiteController extends Controller {

    public function actionIndex() {

        if (Yii::app()->session["username"] != null) {
            $this->layout = "main";
        } else {
            $this->layout = "front";
        }

        $model = Configure::model()->findByPk(1);

        $this->render("//site/index", array(
            "model" => $model,
        ));
    }

    public function actionForm() {
        if (Yii::app()->session["username"] != null) {
            $this->layout = "main";
        } else {
            $this->layout = "front";
        }

        $model = Configure::model()->findByPk(1);

        $this->render("//site/form", array(
            "model" => $model,
        ));
    }

    public function actionLogin() {
        // step1. Prepare Where
        $attributes = array();
        $attributes["username"] = $_POST["username"];
        $attributes["password"] = MD5(($_POST["password"]));
        $attributes["status"] = "เปิดใช้งาน";

        // step2. Find User in Database
        $user = User::model()->findByAttributes($attributes);

        // step3. Login
        if (!empty($user)) {
            Yii::app()->session["id"] = $user->id;
            Yii::app()->session["fullname"] = $user->fullname;
            Yii::app()->session["username"] = $user->username;
            Yii::app()->session["type"] = $user->type;
            Yii::app()->session["department_id"] = $user->department_id;
            $this->redirect("index.php?r=site");
        } else {
            $this->redirect("index.php?r=site");
        }
    }

    public function actionLogout() {
        // clear session
        unset(Yii::app()->session["id"]);
        unset(Yii::app()->session["fullname"]);
        unset(Yii::app()->session["username"]);
        unset(Yii::app()->session["type"]);
        unset(Yii::app()->session["department_id"]);
        $this->redirect("index.php?r=site");
    }

    public function actionShow($template_type_id = null, $department_id = null,$template_type_level_id = null, $newyear_id = null, $newyear_name = null,$process = null) {

        if (Yii::app()->session["username"] != null) {
            $this->layout = "main";
        } else {
            $this->layout = "front";
        }


        if (!empty($template_type_id)) {

            
            $sql = "
                    
SELECT

t.id,t.family,t.title,t.goal,

(
	select max(k.result) 
		from kpi k 
	left outer join newyear n on n.id = k.newyear_id
	where k.template_id = t.id and n.name = '2554'
) as Y_54,

(
	select max(k.result) 
		from kpi k 
	left outer join newyear n on n.id = k.newyear_id
	where k.template_id = t.id and n.name = '2555'
) as Y_55,

(
	select max(k.result) 
		from kpi k 
	left outer join newyear n on n.id = k.newyear_id
	where k.template_id = t.id and n.name = '2556'
) as Y_56,

(
	select max(k.result) 
		from kpi k 
	left outer join newyear n on n.id = k.newyear_id
	where k.template_id = t.id and n.name = '2557'
) as Y_57,

(
	select max(k.result) 
		from kpi k 
	left outer join newyear n on n.id = k.newyear_id
	where k.template_id = t.id and n.name = '2558'
) as Y_58 ";

if( !empty($newyear_id)){
    $sql.= ", (
            select max(k.result) 
		from kpi k 
            left outer join newyear n on n.id = k.newyear_id
            where k.template_id = t.id and n.id = $newyear_id
    ) as Y_select ";   
}

$sql.= " FROM template t

WHERE t.template_type_id = '$template_type_id' and t.state = 'enable'

            ";

            if (!empty($department_id)) {
                $sql.= " AND t.department_id = '$department_id' ";
            }
            
            if (!empty($template_type_level_id) && !empty($department_id)) {
                $sql.= " AND  t.department_id = '$department_id'  AND t.template_type_level_id = '$template_type_level_id' ";
            }
            
            if (!empty($template_type_level_id) && !empty($department_id) && !empty($newyear_id)) {
                $sql.= " AND  t.department_id = '$department_id'  AND t.template_type_level_id = '$template_type_level_id' 
                         AND 
                            (
                                select id from newyear  where id = $newyear_id
                            )
                ";      
                       
            }
            
               if (!empty($department_id) && !empty($newyear_id) && !empty($process)) {
                  
                        
                $sql.= " AND  t.department_id = '$department_id' 
                         AND 
                            (
                                select id from newyear  where id = $newyear_id 
                            )
                         AND
                            (
                                select id from kpi where kpi.template_id = t.id and kpi.newyear_id = $newyear_id
                                    and kpi.process = $process
                            )
                         
                ";      
                       
            }
            
            
             if (!empty($template_type_level_id) && !empty($department_id) && !empty($newyear_id) && !empty($process)) {
                  
                        
                $sql.= " AND  t.department_id = '$department_id'  AND t.template_type_level_id = '$template_type_level_id' 
                         AND 
                            (
                                select id from newyear  where id = $newyear_id 
                            )
                         AND
                            (
                                select id from kpi where kpi.template_id = t.id and kpi.newyear_id = $newyear_id
                                    and kpi.process = $process
                            )
                         
                ";      
                       
            }
            
            
            
            
              if (!empty($template_type_level_id) && !empty($department_id) && !empty($newyear_id) && !empty($process)) {
                  
                        
                $sql.= " AND  t.department_id = '$department_id'  AND t.template_type_level_id = '$template_type_level_id' 
                         AND 
                            (
                                select id from newyear  where id = $newyear_id 
                            )
                         AND
                            (
                                select id from kpi where kpi.template_id = t.id and kpi.newyear_id = $newyear_id
                                    and kpi.process = $process
                            )
                         
                ";      
                       
            }
            
            
            

            $model = Yii::app()->db->createCommand($sql)->queryAll();
        }
        
          $view = "//site/show";
              
        if(!empty($newyear_id)){
            $view = "//site/show_year";
        }


        $this->render($view, array(
            "newyear_id" => $newyear_id,
            "newyear_name" => $newyear_name,
            "model" => $model,
            "template_type_id" => $template_type_id,
            "template_type_level_id" => $template_type_level_id,
        ));
    }

}

// end class