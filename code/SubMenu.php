<?php

class SubMenu extends DataObject {
	public static $db = array(
		'ShowAll' => 'Boolean',
		'Sort' => 'Int'
	);
	public static $has_one = array(
		'Icon' => 'Image',
		'Base' => 'SiteTree',
		'Site' => 'SiteConfig'
	);
	public static $summary_fields = array(
		'Base.Title' => 'Title',
		'ShowAll.Nice' => 'Show all children'
	);
	static $default_sort = 'Sort ASC';
	public function getCMSFields() {
		$fields = new FieldList(
			new TreeDropdownField('BaseID', 'Base of submenu', 'SiteTree', 'ID', 'MenuTitle'),
			new CheckboxField('ShowAll', 'Include items hidden from the menu'),
			new UploadField('Icon')
		);
		$this->extend('updateCMSFields', $fields);
		return $fields;
	}
	public function ShowAll() {
		return $this->dbObject('ShowAll');
	}
	public function getTitle() {
		return 'Submenu - '.$this->Base()->Title;
	}
	public function Children() {
		return $this->ShowAll ? $this->Base()->AllChildren() : $this->Base()->Children();
	}
}
