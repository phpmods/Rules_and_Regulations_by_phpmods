<?php
///////////////////////////////////////////////
/// Rules and Regulations v1 by php-mods.eu ///
///            Author php-mods.eu           ///
///           Packed at 30/08/2012          ///
///     Copyright (c) 2012, php-mods.eu     ///
///////////////////////////////////////////////

?>
<h3>Add a new Rule Category</h3>
<center><form id="form" action="<?php echo adminaction('/ruleregs/add_category_db/');?>" method="post">
<table width="30%" border="0">
  <tr>
    <td width="30%">Title:</td>
    <td width="70%">
    <input type="text" id="title" name="title" /></td>
  </tr>
    <tr>
    <td>Status:</td>
    <td><select name="status">
    <option value="1">Active</option>
    <option value="2">Hidden</option>
    </select></td>
  </tr>
  <tr>
    <td colspan="2"><center><input type="submit" name="submit" value="Add Rule Category" /></center></td>
  </tr>
</table>
</form></center>
<br />