<?php
///////////////////////////////////////////////
/// Rules and Regulations v1 by php-mods.eu ///
///            Author php-mods.eu           ///
///           Packed at 30/08/2012          ///
///     Copyright (c) 2012, php-mods.eu     ///
///////////////////////////////////////////////

?>
<head>
<script type="text/javascript">

function theChecker()
{
if(document.theForm.theCheck.checked==false)
{
document.theForm.theButton.disabled=true;
}
else
{
document.theForm.theButton.disabled=false;
}
}
</script>
</head>
<body onLoad="document.theForm.theButton.disabled=true">
    <div class="contenth"><div>
<h3><?php echo SITE_NAME; ?> Rules and Regulations</h3>
Rules and Regulations for Membership at <?php echo SITE_NAME; ?>.<br /><hr />
  <?php
  if(!$category)
        {echo 'There are no any rules categories!';}
            else
            {
            $count = 1;
foreach($category as $cat)
{ ?>
<b><u><?php echo $countcat = $count; $count++;
?>) <?php echo $cat->title; ?></u></b><br /><br />
<?php $rules = RuleregsData::rulesincat($cat->id); 

  if(!$rules)
            {echo 'There are no any rules in this category.';}
            else
            {
            $countrl = 1;
foreach($rules as $rule)
{?>
<?php echo $countcat; ?>.<?php echo $countrl; $countrl++;
?>) <?php echo $rule->rule; ?><br />

<?php } } ?><hr />
<?php } } ?>
<?php
if(Auth::LoggedIn())
			{ } 
            else { ?>
            If you agree with our Rules and Regulations, you may continue to fill out the Application by clicking below.<br />
            <form name="theForm" action="<?php echo SITE_URL ?>/index.php/Registration" method="post">
            <p align="center">
<input type="checkbox" name="theCheck" onClick="theChecker()" value="">I agree to the terms of use.<br />
<input type="submit" name="theButton" value="Continue">
</p></form>
       <?php } ?>
       </div>
</div>
<p align="right">Copyright © 2012 - phpmods</p>
</body>