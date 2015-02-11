<?php
///////////////////////////////////////////////
///Rules and Regulations v1.2 by php-mods.eu///
///            Author php-mods.eu           ///
///            Packed at 11/2/2015          ///
///     Copyright (c) 2015, php-mods.eu     ///
///////////////////////////////////////////////

?>
<h3>Edit Rule</h3>
<center><form id="form" action="<?php echo adminaction('/ruleregs/rule_edit_db/');?>" method="post">
<table width="30%" border="0">
  <tr>
    <td width="30%">Rule:</td>
    <td width="70%">
    <textarea cols="30" id="rule" name="rule" rows="5"><?php echo $ruleinfo->rule; ?></textarea>
    <input name="id" id="id" type="hidden" value="<?php echo $ruleinfo->id; ?>" /></td>
  </tr>
  <tr>
    <td>Category:</td>
    <td><select name="category">
    <?php
foreach($rulecat as $cat)
{ ?>
    <option value="<?php echo $cat->id; ?>"  <?php if ($ruleinfo->category == $cat->id) echo 'selected="selected"' ; ?>><?php echo $cat->title; ?></option>  <?php } ?>
</select></td>
  </tr>
    <tr>
    <td>Status:</td>
    <td><select name="status">
    <option value="1" <?php if ($ruleinfo->status == '1') echo 'selected="selected"' ; ?>>Active</option>
    <option value="2" <?php if ($ruleinfo->status == '2') echo 'selected="selected"' ; ?>>Hidden</option>
    </select></td>
  </tr>
  <tr>
    <td colspan="2"><center><input type="submit" name="submit" value="Edit Rule" /></center></td>
  </tr>
</table>
</form></center>
<br />
