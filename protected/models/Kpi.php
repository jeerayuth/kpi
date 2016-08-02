<?php

class Kpi extends CActiveRecord {
		static function model($className = __CLASS__){
			return parent::model($className);
		}
		function tableName(){
			return 'kpi';
		}
		function attributeLabels(){
			return array(
				"newyear_id" => "ปีงบประมาณ",
				"target" => "เป้าหมาย",
				"result" => "ผลลัพธ์ที่ได้",
				"created" => "ปรับปรุงล่าสุด",
				"type_id" => "ระยะเวลา", 
				"state" => "สถานะการใช้",
                                "process" => "เกณฑ์ประเมินผล",
				
			);
		}
		function rules(){
			return array(
				array('created,username','required'),
			);
		}
}