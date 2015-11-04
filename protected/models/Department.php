<?php

class Department extends CActiveRecord {
		static function model($className = __CLASS__){
			return parent::model($className);
		}
		function tableName(){
			return 'department';
		}
		function attributeLabels(){
			return array(
				"name" => "ชื่อหน่วยงาน"
			);
		}
		function rules(){
			return array(
				array('name','required'),
				array('name', 'unique'),
			);
		}
}