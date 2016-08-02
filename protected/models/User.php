<?php

class User extends CActiveRecord {
	static function model($className = __CLASS__) {
			return parent::model($className);
	}

	function tableName(){
		return 'user';
	}

	public function attributeLabels(){
		return array(
			"fullname"	=> "ชื่อ-สกุล",
			"username"	=> "Username",
			"password"	=> "Password",
			"type"		=> "ประเภทผู้ใช้",
			"department_id" => "หน่วยงาน",
			"status"	=> "สถานะผู้ใช้",
			"created"	=> "วันที่บันทึก",
		);
	}

	public function rules(){
		return array(
			array('fullname,username,password,type,status,department_id', 'required'),
			array('username', 'unique'),
		);
	}

}