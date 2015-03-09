<?php

class SiteSubMenus  extends DataExtension {

	public static $has_many = array(
		'SubMenus' => 'SubMenu'
	);

	public function updateCMSFields(FieldList $fields) {
		$fields->addFieldToTab("Root", new Tab('SubMenus'), 'Access');
		$gfconf = GridFieldConfig_RelationEditor::create();
		if(class_exists('GridFieldSortableRows')) $gfconf->addComponent(new GridFieldSortableRows('Sort'));
		$fields->addFieldToTab("Root.SubMenus", new GridField('SubMenus', 'Footer sub menus', $this->owner->SubMenus(), $gfconf));
		return $fields;
	}

}
