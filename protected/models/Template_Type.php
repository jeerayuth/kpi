<?php

class Template_Type extends CActiveRecord {
		static function model($className = __CLASS__){
			return parent::model($className);
		}
		function tableName(){
			return 'template_type';
		}
		function attributeLabels(){
			return array(
				"name" => "ชื่อกลุ่มตัวชี้วัด"
			);
		}
		function rules(){
			return array(
				array('name','required'),
				array('name', 'unique'),
			);
		}
}