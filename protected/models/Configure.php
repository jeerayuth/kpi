<?php

class Configure extends CActiveRecord {
		static function model($className = __CLASS__){
			return parent::model($className);
		}
		function tableName(){
			return 'configure';
		}
		function attributeLabels(){
			return array(
				"hospcode" => "รหัสหน่วยงาน",
				"hospname" => "ชื่อหน่วยงาน",
				"address" => "ที่อยู่",
				"telephone" => "เบอร์โทรศัพท์",
			);
		}
		function rules(){
			return array(
				array('hospcode,hospname','required'),
				array('hospcode', 'unique'),
			);
		}
}