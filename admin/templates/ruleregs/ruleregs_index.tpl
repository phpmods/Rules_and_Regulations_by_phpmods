<?php
///////////////////////////////////////////////
/// Rules and Regulations v1 by php-mods.eu ///
///            Author php-mods.eu           ///
///           Packed at 30/08/2012          ///
///     Copyright (c) 2012, php-mods.eu     ///
///////////////////////////////////////////////

?>
<h3>Rule and Regulations Administration Panel</h3>
<center><table width="40%" cellpadding="1" cellspacing="0" border="1">
<tr>
<td colspan="3" align="center"><b><u>Rules Categories</u></b></td>
</tr>
<tr>
<td width="20%" align="center"><b>Title</b></td>
<td width="10%" align="center"><b>Status</b></td>
<td width="10%">&nbsp;</td>
</tr>
<tr>
<?php
if(!$categories)
            {echo '<tr><td colspan="3"><center>You have not added any rule categories yet.</center></td></tr>';}
            else
            {
foreach($categories as $category)
{ ?>
<td width="20%" align="center"><?php echo $category->title; ?></td>
<td width="10%" align="center"><?php if($category->status == '1'){echo 'Shown';}
    if($category->status == '2'){echo 'Hidden';} ?></td>
<td width="10%" align="center"><a href="<?php echo SITE_URL; ?>/admin/index.php/ruleregs/catedit/<?php echo $category->id; ?>">Administrate</a></td>
</tr>
<?php } } ?>
<tr><td colspan="3" align="center">
<a href="<?php echo SITE_URL; ?>/admin/index.php/ruleregs/add_category">Add a new Rule Category</a> / 
<a href="<?php echo SITE_URL; ?>/admin/index.php/ruleregs/add_rule">Add a new Rule</a></td></tr>
</table></center>