<?php
///////////////////////////////////////////////
///Rules and Regulations v1.2 by php-mods.eu///
///            Author php-mods.eu           ///
///            Packed at 11/2/2015          ///
///     Copyright (c) 2015, php-mods.eu     ///
///////////////////////////////////////////////

?>
<h3>Add a new Rule Category</h3>
<form id="form" action="<?php echo adminaction('/ruleregs/add_category_db/');?>" method="post">
<table width="30%" border="0">
  <tr>
    <td width="30%"><b>Title:</b></td>
    <td width="70%">
    <input type="text" id="title" name="title" /></td>
  </tr>
    <tr>
    <td><b>Status:</b></td>
    <td><select name="status">
    <option value="1">Shown</option>
    <option value="2">Hidden</option>
    </select></td>
  </tr>
  <tr>
    <td colspan="2"><center><input type="submit" name="submit" value="Add Rule Category" /></center></td>
  </tr>
</table>
</form>
<br />
