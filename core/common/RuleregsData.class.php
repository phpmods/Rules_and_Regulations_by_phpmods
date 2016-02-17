<?php
///////////////////////////////////////////////
///Rules and Regulations v1.3 by php-mods.eu///
///            Author php-mods.eu           ///
///            Packed at 17/2/2016          ///
///     Copyright (c) 2016, php-mods.eu     ///
///////////////////////////////////////////////

class RuleregsData extends CodonData {
	
	static function getAllRuleCat() {
		$sql = "SELECT * FROM ".TABLE_PREFIX."rules_categories WHERE status=1 ORDER BY id";
        	return DB::get_results($sql);
	}
	static function rulesincat($id) {
		$sql = "SELECT * FROM ".TABLE_PREFIX."rules WHERE category = '$id' ORDER BY id";
		return DB::get_results($sql);
	}
	static function categories() {
		$sql = "SELECT * FROM ".TABLE_PREFIX."rules_categories ORDER BY id";
		return DB::get_results($sql);
	}
	static function ruleinfo($id) {
		$sql = "SELECT * FROM ".TABLE_PREFIX."rules_categories WHERE id='$id' ORDER BY id";
		return DB::get_row($sql);
	}
	static function delete_rule($id) {
		$sql = "DELETE FROM ".TABLE_PREFIX."rules WHERE id='$id'";
		return DB::get_results($sql);
	}
	static function edit_rule($id) {
		$sql = "SELECT * FROM ".TABLE_PREFIX."rules WHERE id='$id'";
		return DB::get_row($sql);
	}
	static function edit_rule_db($rule, $status, $category, $id) {
		$sql = "UPDATE ".TABLE_PREFIX."rules SET rule='$rule', status='$status', category='$category' WHERE id='$id'";
		DB::query($sql);
	}
	static function addrule($rule,$status,$category) {
		$sql = "INSERT INTO ".TABLE_PREFIX."rules (id, rule, status, category) VALUES ('', '$rule','$status','$category')";
        	DB::query($sql);
	}
	static function delete_category($id) {
		$sql = "DELETE FROM ".TABLE_PREFIX."rules_categories WHERE id='$id'";
		return DB::get_results($sql);
	}
	static function addcategory($title,$status) {
        	$sql = "INSERT INTO ".TABLE_PREFIX."rules_categories (id, title, status) VALUES ('', '$title','$status')";
        	DB::query($sql);
	}
	static function edit_category_db($title, $status, $id) {
		$sql = "UPDATE ".TABLE_PREFIX."rules_categories SET title='$title', status='$status' WHERE id='$id'";
		DB::query($sql);
	}
}
