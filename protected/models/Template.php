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
                                "goal" => "เกณฑ์เป้าหมาย",
				"department_id" => "หน่วยงาน",
                                "template_type_level_id" => "ผลดำเนินงานทางด้าน",
				"details" => "รายละเอียด",
				"type_id" => "ระยะเวลา",
				"created" => "วันที่สร้าง",
				"state" => "สถานะ",
                                "orderno" => "ลำดับแสดงผล",
                                "family" => "กลุ่มตัวชี้วัด",
			);
		}

		function rules(){
			return array(
				array('title,department_id,type_id, state, family','required'),
			);
		}
}