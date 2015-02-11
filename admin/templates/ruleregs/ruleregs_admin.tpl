<?php
///////////////////////////////////////////////
///Rules and Regulations v1.2 by php-mods.eu///
///            Author php-mods.eu           ///
///            Packed at 11/2/2015          ///
///     Copyright (c) 2015, php-mods.eu     ///
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
<td width="10%" align="center"><?php if($rule->status = '1'){echo '<font color="green"><b>Shown</b></font>';} elseif($rule->status = '2'){echo '<font color="red"><b>Hidden</b></font>';} ?></td>
</tr>
</table><br />
<a href="<?php echo SITE_URL; ?>/admin/index.php/ruleregs/category_edit/<?php echo $rule->id; ?>" class="button">Edit Category</a> <a href="<?php echo SITE_URL; ?>/admin/index.php/ruleregs/delete_category/<?php echo $rule->id; ?>" class="button">Delete Category</a></center>
<h3>Category's Rules</h3>
<center>
<table id="tabledlist" class="tablesorter">
<thead>
<tr>
<th width="60%" align="center">Rule</th>
<th width="25%" align="center">Status</th>
<th width="15%">&nbsp;</th>
</tr>
</thead>
<tbody>
<?php $rulesa = RuleregsData::rulesincat($rule->id); 
  if(!$rulesa)
            {echo '<tr><td colspan="3" align="center">There are no any rules in this category.</td></tr>';}
            else
            {
foreach($rulesa as $rula)
{?>
<tr>
<td width="20%" align="center"><?php echo $rula->rule; ?></td>
<td width="20%" align="center">
<?php if($rula->status == '1'){echo '<font color="green"><b>Shown</b></font>';}
    if($rula->status == '2'){echo '<font color="red"><b>Hidden</b></font>';} ?></td>
<td width="10%" align="center"><a href="<?php echo SITE_URL; ?>/admin/index.php/ruleregs/rule_edit/<?php echo $rula->id; ?>" class="button">Edit</a> <a href="<?php echo SITE_URL;?>/admin/index.php/ruleregs/rule_delete/<?php echo $rula->id; ?>/<?php echo $rule->id; ?>" class="button">Delete</a></td>
</tr>
<?php } } ?>
<tr>
<td colspan="3" align="center"><a href="<?php echo SITE_URL; ?>/admin/index.php/ruleregs/add_rule/<?php echo $rule->id; ?>" class="button">Add a new Rule</a></td></tr>
</tbody>
</table></center>
