<?php
///////////////////////////////////////////////
///Rules and Regulations v1.1 by php-mods.eu///
///            Author php-mods.eu           ///
///           Packed at 30/12/2012          ///
///     Copyright (c) 2014, php-mods.eu     ///
///////////////////////////////////////////////


error_reporting(0);
    include_once '../core/codon.config.php';
    if(Auth::LoggedIn())
            {
	$email = 'info@php-mods.eu';
	$subject = 'Rules and Regulations v1 Installed';
	$message = ''.SITE_NAME.' Installed Rules and Regulations v1 Module URL '.SITE_URL.'';
	
	Util::SendEmail($email, $subject, $message);
                    if(PilotGroups::group_has_perm(Auth::$usergroups, ACCESS_ADMIN))
                    {
                        echo '<h4>Rules and Regulations DataBase Installer for '.SITE_NAME.'</h4>';
                    }
             else
                    {
                        header('Location: http://www.google.com/');
                    }
            }
            else
            {
                        header('Location: http://www.google.com/');
	}
	
	$sqldrop = "DROP TABLE IF EXISTS `" . TABLE_PREFIX . "rules`,
	`" . TABLE_PREFIX . "rules_categories`";
	DB::query($sqldrop);
	
  $sql = "CREATE TABLE `" . TABLE_PREFIX . "rules` (
  `id` int(11) NOT NULL auto_increment,
  `rule` varchar(800) NOT NULL,
  `category` int(10) NOT NULL,
  `status` int(20) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
";
   DB::query($sql);
   
  $sql8 = "CREATE TABLE `" . TABLE_PREFIX . "rules_categories` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(100) NOT NULL,
  `status` int(20) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
";
   DB::query($sql8);
   
            if(DB::errno() != 0)
                {echo '<br /><h4>Errors Appeared:</h4>';print_r(DB::error());}
            else 
                {
                    echo '<h4>Rules and Regulations tables created!</h4>';
                }
