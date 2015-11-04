<?php

class Newyear extends CActiveRecord {
		static function model($className = __CLASS__){
			return parent::model($className);
		}
		function tableName(){
			return 'newyear';
		}
		function attributeLabels(){
			return array(
				"name" => "ปีงบประมาณ"
			);
		}
		function rules(){
			return array(
				array('name','required'),
				array('name', 'unique'),
			);
		}
}