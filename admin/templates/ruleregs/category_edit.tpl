<?php
///////////////////////////////////////////////
///Rules and Regulations v1.2 by php-mods.eu///
///            Author php-mods.eu           ///
///            Packed at 11/2/2015          ///
///     Copyright (c) 2015, php-mods.eu     ///
///////////////////////////////////////////////

?>
<h3>Edit Rule's Category</h3>
<center><form id="form" action="<?php echo adminaction('/ruleregs/category_edit_db/');?>" method="post">
<table width="30%" border="0">
  <tr>
    <td width="30%">Title:</td>
    <td width="70%">
    <textarea cols="30" id="title" name="title" rows="5"><?php echo $ruleinfo->title; ?></textarea>
    <input name="id" id="id" type="hidden" value="<?php echo $ruleinfo->id; ?>" /></td>
  </tr>
    <tr>
    <td>Status:</td>
    <td><select name="status">
    <option value="1" <?php if ($ruleinfo->status == '1') echo 'selected="selected"' ; ?>>Active</option>
    <option value="2" <?php if ($ruleinfo->status == '2') echo 'selected="selected"' ; ?>>Hidden</option>
    </select></td>
  </tr>
  <tr>
    <td colspan="2"><center><input type="submit" name="submit" value="Edit Rule Category" /></center></td>
  </tr>
</table>
</form></center>
<br />
