<?php

  if(!defined('CHECK_PHPCHESS')){
    die("Hacking attempt");
    exit;
  }

?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td id="header">
	<!--Header Begin-->
    <?php include($Root_Path."skins/".$SkinName."/admin_header.php");?>
    <!--Header End-->
	</td>
  	</tr>
 	 <tr>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="0">
	<tr><td class="greenbg" width="18"><img src="images/spacer.gif" width="1" height="22" /></td>
	<td class="bluebg" width="225">&nbsp;</td>
	<td class="shadow_green">&nbsp;</td>
	</tr>
	<tr><td class="lgreenbg" width="18">&nbsp;</td>
	<td class="whitebg" width="225">
			<!--Left Menu Begin-->
<?php include($Root_Path."skins/".$SkinName."/admin_left_menu.php");?>
<!--Left Menu Finish-->

<!--Right Menu Begin-->
<?php include($Root_Path."skins/".$SkinName."/admin_right_menu.php");?>
<!--Right Menu Finish-->
</td>
			<td class="shadow_lgreen">

<!--Content Begin-->
<?php 

$strCustomCellPath = $Root_Path."skins/".$SkinName."/cells/".$Contentpage;
if(file_exists($strCustomCellPath)){
  include($strCustomCellPath);
}else{
  include($Root_Path."includes/cells/".$Contentpage);
}

?>
<!--Content Finish--></td>
		  </tr>
		  <tr>
          	<td class="greenbg" width="18">&nbsp;</td>
			
          <td class="bluebg" width="225" align="center" style="padding:10px 0;"><span class="bluebg" style="padding:10px 0;"><img src="<?php echo $Root_Path."skins/".$SkinName."/";?>images/logo_footer.gif" width="180" height="44" /></span></td>
			<td class="shadow_green" valign="middle">
			<?php include($Root_Path."skins/".$SkinName."/admin_footer.php");?>		</td>
		  </tr>
		</table>

	</td>
  </tr>
</table>



