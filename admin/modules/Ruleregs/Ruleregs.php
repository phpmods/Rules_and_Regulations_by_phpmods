<?php
///////////////////////////////////////////////
///Rules and Regulations v1.3 by php-mods.eu///
///            Author php-mods.eu           ///
///            Packed at 17/2/2016          ///
///     Copyright (c) 2016, php-mods.eu     ///
///////////////////////////////////////////////

class Ruleregs extends CodonModule {
	public function HTMLHead() {
        $this->set('sidebar', 'ruleregs/ruleregs_sidebar.tpl');
    }
	public function NavBar() {
        echo '<li><a href="'.SITE_URL.'/admin/index.php/Ruleregs">Rules and Regulations</a></li>';
    }
	public function index() {
		$this->set('categories', RuleregsData::categories());
		$this->show('ruleregs/ruleregs_index');
	}
	public function catedit($id) {
		$this->set('rule', RuleregsData::ruleinfo($id));
		$this->show('ruleregs/ruleregs_admin');
	}
	public function rule_delete($id, $cat) {
	  RuleregsData::delete_rule($id);
	  $this->set('message', 'Rule Deleted!');
	  $this->show('core_success');
	  LogData::addLog(Auth::$userinfo->pilotid, "Deleted a rule from the database.");
	  self::catedit($cat);
	}
	public function rule_edit($id){
		$this->set('ruleinfo', RuleregsData::edit_rule($id));
		$this->set('rulecat', RuleregsData::categories());
		$this->show('ruleregs/rule_edit');
	}
	public function rule_edit_db() {
		if($this->post->rule == '') {
			$this->set('message', 'Some fields are missing! Fill them all please.');
			$this->show('core_error');
			self::rule_edit($this->post->id);
			return;
		}
		$rule = DB::escape($this->post->rule);
		$category = DB::escape($this->post->category);
		$status = DB::escape($this->post->status);
		$id = DB::escape($this->post->id);
		RuleregsData::edit_rule_db($rule, $status, $category, $id);
		$this->set('message', 'Rule Updated!');
		$this->show('core_success');
		LogData::addLog(Auth::$userinfo->pilotid, "Updated a rule!");
		self::catedit($category);
	}
	public function add_rule($category) {
		$this->set('rulecat', RuleregsData::categories());
		$this->set('category', $category);
		$this->show('ruleregs/rule_add');
	}
	public function add_rule_db() {
		if($this->post->rule == '') {
			$this->set('message', 'Some fields are missing! Fill them all please.');
			$this->show('core_error');
			self::add_rule();
			return;
		}	
		$rule = DB::escape($this->post->rule);
		$status = DB::escape($this->post->status);
		$category = DB::escape($this->post->category);
		RuleregsData::addrule($rule, $status, $category);
		$this->set('message', 'New Rule Added Successfully');
		$this->show('core_success');
		LogData::addLog(Auth::$userinfo->pilotid, "Added a new rule!");
		self::catedit($category);
	}
	public function delete_category($id) {
		RuleregsData::delete_category($id);
	  	$this->set('message', 'Rule Category Deleted');
	  	$this->show('core_success');
	  	LogData::addLog(Auth::$userinfo->pilotid, "Deleted a rule category from the database.");
	  	self::index();
	}
	public function add_category() {
		$this->show('ruleregs/category_add');
	}
	public function add_category_db() {
		if($this->post->title == '') {
			$this->set('message', 'Some fields are missing! Fill them all please.');
			$this->show('core_error');
			self::add_category();
			return;
		}	
		$title = DB::escape($this->post->title);
		$status = DB::escape($this->post->status);
		RuleregsData::addcategory($title, $status);
		$this->set('message', 'New Rule Category Added Successfully');
		$this->show('core_success');
		LogData::addLog(Auth::$userinfo->pilotid, "Added a new rule category!");
		self::index();
	}
	public function category_edit($id) {
		$this->set('ruleinfo', RuleregsData::ruleinfo($id));
		$this->show('ruleregs/category_edit');
	}
	public function category_edit_db() {
		if($this->post->title == '') {
			$this->set('message', 'Some fields are missing! Fill them all please.');
			$this->show('core_error');
			self::category_edit($this->post->id);
			return;
		}
		$title = DB::escape($this->post->title);
		$status = DB::escape($this->post->status);
		$id = DB::escape($this->post->id);
		RuleregsData::edit_category_db($title, $status, $id);
		$this->set('message', 'Rule Category Updated!');
		$this->show('core_success');
		LogData::addLog(Auth::$userinfo->pilotid, "Updated a rule category!");
		self::index();
	}
}
