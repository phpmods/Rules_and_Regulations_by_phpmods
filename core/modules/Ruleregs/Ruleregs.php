<?php
///////////////////////////////////////////////
///Rules and Regulations v1.2 by php-mods.eu///
///            Author php-mods.eu           ///
///            Packed at 11/2/2015          ///
///     Copyright (c) 2015, php-mods.eu     ///
///////////////////////////////////////////////

class Ruleregs extends CodonModule {
public function index()
  {				
	  $this->set('category', RuleregsData::getAllRuleCat());
	  $this->render('ruleregs.tpl');
  }  
}
