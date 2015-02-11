<?php
///////////////////////////////////////////////
///Rules and Regulations v1.2 by php-mods.eu///
///            Author php-mods.eu           ///
///            Packed at 11/2/2015          ///
///     Copyright (c) 2015, php-mods.eu     ///
///////////////////////////////////////////////

?>
<h3>Rule and Regulations Administration Panel</h3>
<p align="center">Administrate your virtual airline's rules caregories.</p>
<hr />
<center><table id="tabledid" class="tablesorter">
<thead>
<tr>
<th width="34%" align="center">Title</th>
<th width="33%" align="center">Status</th>
<th width="33%">&nbsp;</td>
</tr>
</thead>
<tbody>
<?php
if(!$categories)
            {echo '<tr><td colspan="3"><center>You have not added any rule categories yet.</center></td></tr>';}
            else
            {
foreach($categories as $category)
{ ?>
<tr>
<td align="center"><?php echo $category->title; ?></td>
<td align="center"><?php if($category->status == '1'){echo '<font color="green"><b>Shown</b></font>';}
    if($category->status == '2'){echo '<font color="red"><b>Hidden</b></font>';} ?></td>
<td><a href="<?php echo SITE_URL; ?>/admin/index.php/ruleregs/catedit/<?php echo $category->id; ?>" class="button">Administrate</a></td>
</tr>
<?php } } ?>
<tr><td colspan="3" align="center">
<a href="<?php echo SITE_URL; ?>/admin/index.php/ruleregs/add_category" class="button">Add a new Rule Category</a></td></tr>
</tbody>
</table></center>
