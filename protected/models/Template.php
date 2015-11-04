<?php

class Template extends CActiveRecord {
		static function model($className = __CLASS__){
			return parent::model($className);
		}
		function tableName(){
			return 'template';
		}
		function attributeLabels(){
			return array(
				"title" => "ชื่อตัวชี้วัด",
				"department_id" => "หน่วยงาน",
				"details" => "รายละเอียด",
				"type_id" => "ระยะเวลา",
				"created" => "วันที่สร้าง",
				"state" => "สถานะ"
			);
		}

		function rules(){
			return array(
				array('title,department_id,type_id, state','required'),
			);
		}
}