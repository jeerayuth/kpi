<?php

class Template_Type_Level extends CActiveRecord {
		static function model($className = __CLASS__){
			return parent::model($className);
		}
		function tableName(){
			return 'template_type_level';
		}
		function attributeLabels(){
			return array(
				"name" => "ผลด้าน"
			);
		}
		function rules(){
			return array(
				array('name','required'),
				array('name', 'unique'),
			);
		}
}