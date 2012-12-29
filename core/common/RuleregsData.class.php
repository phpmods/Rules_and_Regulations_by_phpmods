<?php
///////////////////////////////////////////////
///Rules and Regulations v1.1 by php-mods.eu///
///            Author php-mods.eu           ///
///           Packed at 30/08/2012          ///
///     Copyright (c) 2012, php-mods.eu     ///
///////////////////////////////////////////////

class RuleregsData extends CodonData {
	
        public function getAllRuleCat() {
        $sql = "SELECT * FROM " . TABLE_PREFIX . "rules_categories WHERE status='1' ORDER BY id";
        return DB::get_results($sql);
        }
		public function rulesincat($id) {
		$sql = "SELECT * FROM " . TABLE_PREFIX . "rules WHERE category = '".$id."' ORDER BY id";
		return DB::get_results($sql);
		}
        public function categories() {
		$sql = "SELECT * FROM " . TABLE_PREFIX . "rules_categories ORDER BY id";
		return DB::get_results($sql);
		}
		public function ruleinfo($id)
		{
		$sql = "SELECT * FROM " . TABLE_PREFIX . "rules_categories WHERE id='".$id."' ORDER BY id";
		return DB::get_row($sql);
		}
		public function delete_rule($id)  
		{
		$sql = "DELETE FROM " . TABLE_PREFIX . "rules WHERE id='$id'";
		return DB::get_results($sql);
	    }
		public function edit_rule($id)
		{
		$sql = "SELECT * FROM " . TABLE_PREFIX . "rules WHERE id='$id'";
		return DB::get_row($sql);
		}
       public function edit_rule_db($rule, $status, $category, $id)
	    {
         $query = "UPDATE " . TABLE_PREFIX . "rules SET
         rule='$rule',
         status='$status',
         category='$category'
         WHERE id='$id'";
        DB::query($query);
       }
	   public function addrule($rule,$status,$category) {
		$rule = DB::escape($rule);
        $status = DB::escape($status);
        $category = DB::escape($category);

        $sql = "INSERT INTO " . TABLE_PREFIX . "rules
					(id, rule, status, category)
			VALUES	('', '$rule','$status','$category')";
        DB::query($sql);
	 }
	 	public function delete_category($id)  
		{
		$sql = "DELETE FROM " . TABLE_PREFIX . "rules_categories WHERE id='$id'";
		return DB::get_results($sql);
	    }
		public function addcategory($title,$status) {
		$title = DB::escape($title);
        $status = DB::escape($status);

        $sql = "INSERT INTO " . TABLE_PREFIX . "rules_categories
					(id, title, status)
			VALUES	('', '$title','$status')";
        DB::query($sql);
	 }
	 public function edit_category_db($title, $status, $id)
	    {
         $query = "UPDATE " . TABLE_PREFIX . "rules_categories SET
         title='$title',
         status='$status'
         WHERE id='$id'";
        DB::query($query);
       }
}