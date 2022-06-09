<?php
/*
 * TemplateName: standard_solo_GLOBAL
 *
 * @version: 1.1 - 03/2017
 */
?>

	<div class="globalMain">
		<div class="formulaire">
			<?php include("solos_form.inc"); ?>
		</div>
	</div>

	<div class="globalFooter">
		<div class="footer w320 w740">
			
			<?php if($vmMention_landing===true){ ?>
				<p class="mentions">
				<?php include_once('../include/mentions/'.$vmMention_landing_fichier_name); ?>
				</p>
			<?php } ?>

			<?php if($vmCrea_landing===true){ ?>
				<p class="copyright"><a href="https://www.vertical-mail.com" target="_blank"><?php echo $trad['copyright']; ?></a></p>
			<?php } ?>

		</div>
	</div>
