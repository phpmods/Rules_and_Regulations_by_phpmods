<?php
///////////////////////////////////////////////
/// Rules and Regulations v1 by php-mods.eu ///
///            Author php-mods.eu           ///
///           Packed at 30/08/2012          ///
///     Copyright (c) 2012, php-mods.eu     ///
///////////////////////////////////////////////

?>
<h3><?php echo $rule->title; ?> Admin</h3>
<center><table width="40%" cellpadding="1" cellspacing="0" border="1">
<tr>
<td width="50%" align="center"><b>Title</b></td>
<td width="50%" align="center"><?php echo $rule->title; ?></td>
</tr>
<tr>
<td width="20%" align="center"><b>Status</b></td>
<td width="10%" align="center"><?php if($rule->status = '1'){echo 'Active';} elseif($rule->status = '2'){echo 'Hidden';} ?></td>
</tr>
</table><br />
<a href="<?php echo SITE_URL; ?>/admin/index.php/ruleregs/category_edit/<?php echo $rule->id; ?>">Edit Category</a> / <a href="<?php echo SITE_URL; ?>/admin/index.php/ruleregs/delete_category/<?php echo $rule->id; ?>">Delete Category</a></center>
<h3>Category's Rules</h3>
<center>
<table width="60%" border="1" cellpanding="1" cellspacing="0">
<tr>
<td width="60%" align="center"><b>Rule</b></td>
<td width="25%" align="center"><b>Status</b></td>
<td width="15%">&nbsp;</td>
</tr>
<?php $rulesa = RuleregsData::rulesincat($rule->id); 
  if(!$rulesa)
            {echo '<td colspan="3" align="center">There are no any rules in this category.</td>';}
            else
            {
foreach($rulesa as $rula)
{?>
<td width="20%" align="center"><?php echo $rula->rule; ?></td>
<td width="20%" align="center">
<?php if($rula->status == '1'){echo 'Shown';}
    if($rula->status == '2'){echo 'Hidden';} ?></td>
<td width="10%" align="center"><a href="<?php echo SITE_URL; ?>/admin/index.php/ruleregs/rule_edit/<?php echo $rula->id; ?>">Edit</a> / <a href="<?php echo SITE_URL;?>/admin/index.php/ruleregs/rule_delete/<?php echo $rula->id; ?>">Delete</a></td>
</tr>
<?php } } ?>
<tr>
<td colspan="3" align="center"><a href="<?php echo SITE_URL; ?>/admin/index.php/ruleregs/add_rule">Add a new Rule</a></td></tr>
</table></center>