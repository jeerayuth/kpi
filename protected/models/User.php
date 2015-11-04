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
			"fname"		=> "ชื่อจริง",
			"lname"		=> "นามสกุล",
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
			array('fname,lname,username,password,type,status,department_id', 'required'),
			array('username', 'unique'),
		);
	}

}