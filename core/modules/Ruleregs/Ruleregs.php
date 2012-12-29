<?php
///////////////////////////////////////////////
///Rules and Regulations v1.1 by php-mods.eu///
///            Author php-mods.eu           ///
///           Packed at 30/08/2012          ///
///     Copyright (c) 2012, php-mods.eu     ///
///////////////////////////////////////////////

class Ruleregs extends CodonModule {
public function index()
  {				
	  $this->set('category', RuleregsData::getAllRuleCat());
	  $this->render('ruleregs.tpl');
  }  
}