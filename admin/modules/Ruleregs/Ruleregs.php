<?php
///////////////////////////////////////////////
///Rules and Regulations v1.2 by php-mods.eu///
///            Author php-mods.eu           ///
///            Packed at 11/2/2015          ///
///     Copyright (c) 2015, php-mods.eu     ///
///////////////////////////////////////////////

class Ruleregs extends CodonModule {
	public function HTMLHead()
    {
        $this->set('sidebar', 'ruleregs/ruleregs_sidebar.tpl');
    }
	public function NavBar()
    {
        echo '<li><a href="'.SITE_URL.'/admin/index.php/Ruleregs">Rules and Regulations</a></li>';
    }
	public function index()
	{
		$this->set('categories', RuleregsData::categories());
		$this->render('ruleregs/ruleregs_index.tpl');
	}
	public function catedit($id)
	{
		$this->set('rule', RuleregsData::ruleinfo($id));
		$this->render('ruleregs/ruleregs_admin.tpl');
	}
	public function rule_delete($id, $cat)
	{
	  RuleregsData::delete_rule($id);
	  $this->set('message', 'Rule Deleted!');
	  $this->render('core_success.tpl');
	  LogData::addLog(Auth::$userinfo->pilotid, "Deleted a rule from the database.");
	  self::catedit($cat);
	}
	public function rule_edit($id)
	{
		$this->set('ruleinfo', RuleregsData::edit_rule($id));
		$this->set('rulecat', RuleregsData::categories());
		$this->render('ruleregs/rule_edit.tpl');
	}
	public function rule_edit_db() {
		if($this->post->rule == '')
		{
			$this->set('message', 'Some fields are missing! Fill them all please.');
			$this->render('core_error.tpl');
			self::rule_edit($this->post->id);
			return;
		}
		$rule = DB::escape($this->post->rule);
		$category = DB::escape($this->post->category);
		$status = DB::escape($this->post->status);
		$id = DB::escape($this->post->id);
		RuleregsData::edit_rule_db($rule, $status, $category, $id);
		$this->set('message', 'Rule Updated!');
		$this->render('core_success.tpl');
		LogData::addLog(Auth::$userinfo->pilotid, "Updated a rule!");
		self::catedit($category);
	}
	public function add_rule($category)
	{
		$this->set('rulecat', RuleregsData::categories());
		$this->set('category', $category);
		$this->render('ruleregs/rule_add.tpl');
	}
	public function add_rule_db() {
		if($this->post->rule == '')
		{
			$this->set('message', 'Some fields are missing! Fill them all please.');
			$this->render('core_error.tpl');
			self::add_rule();
			return;
		}	
		$ret = RuleregsData::addrule($this->post->rule, $this->post->status, $this->post->category);
		$this->set('message', 'New Rule Added Successfully');
		$this->render('core_success.tpl');
		LogData::addLog(Auth::$userinfo->pilotid, "Added a new rule!");
		self::catedit($this->post->category);
	}
	public function delete_category($id)
	{
		RuleregsData::delete_category($id);
	  	$this->set('message', 'Rule Category Deleted');
	  	$this->render('core_success.tpl');
	  	LogData::addLog(Auth::$userinfo->pilotid, "Deleted a rule category from the database.");
	  	self::index();
	}
	public function add_category()
	{
		$this->render('ruleregs/category_add.tpl');
	}
	public function add_category_db() {
		if($this->post->title == '')
		{
			$this->set('message', 'Some fields are missing! Fill them all please.');
			$this->render('core_error.tpl');
			self::add_category();
			return;
		}	
		$ret = RuleregsData::addcategory($this->post->title, $this->post->status);
		$this->set('message', 'New Rule Category Added Successfully');
		$this->render('core_success.tpl');
		LogData::addLog(Auth::$userinfo->pilotid, "Added a new rule category!");
		self::index();
	}
	public function category_edit($id)
	{
		$this->set('ruleinfo', RuleregsData::ruleinfo($id));
		$this->render('ruleregs/category_edit.tpl');
	}
	public function category_edit_db() {
		if($this->post->title == '')
		{
			$this->set('message', 'Some fields are missing! Fill them all please.');
			$this->render('core_error.tpl');
			self::category_edit($this->post->id);
			return;
		}
		$title = DB::escape($this->post->title);
		$status = DB::escape($this->post->status);
		$id = DB::escape($this->post->id);
		RuleregsData::edit_category_db($title, $status, $id);
		$this->set('message', 'Rule Category Updated!');
		$this->render('core_success.tpl');
		LogData::addLog(Auth::$userinfo->pilotid, "Updated a rule category!");
		$this->set('categories', RuleregsData::categories());
		$this->render('ruleregs/ruleregs_index.tpl');
	}
}

