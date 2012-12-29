<?php
///////////////////////////////////////////////
///Rules and Regulations v1.1 by php-mods.eu///
///            Author php-mods.eu           ///
///           Packed at 30/08/2012          ///
///     Copyright (c) 2012, php-mods.eu     ///
///////////////////////////////////////////////

?>
<h3>Add a new Rule</h3>
<center><form id="form" action="<?php echo adminaction('/ruleregs/add_rule_db/');?>" method="post">
<table width="30%" border="0">
  <tr>
    <td width="30%">Rule:</td>
    <td width="70%">
    <textarea cols="30" id="rule" name="rule" rows="5"></textarea></td>
  </tr>
  <tr>
    <td>Category:</td>
    <td><select name="category">
    <?php
foreach($rulecat as $cat)
{ ?>
    <option value="<?php echo $cat->id; ?>"><?php echo $cat->title; ?></option>  <?php } ?>
</select></td>
  </tr>
    <tr>
    <td>Status:</td>
    <td><select name="status">
    <option value="1">Active</option>
    <option value="2">Hidden</option>
    </select></td>
  </tr>
  <tr>
    <td colspan="2"><center><input type="submit" name="submit" value="Add Rule" /></center></td>
  </tr>
</table>
</form></center>
<br />