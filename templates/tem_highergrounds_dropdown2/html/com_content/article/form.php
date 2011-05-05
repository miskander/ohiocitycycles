<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>
<script language="javascript" type="text/javascript">
<!--
function setgood() {
	// TODO: Put setGood back
	return true;
}

var sectioncategories = new Array;
<?php
$i = 0;
foreach ($this->lists['sectioncategories'] as $k=>$items) {
	foreach ($items as $v) {
		echo "sectioncategories[".$i++."] = new Array( '$k','".addslashes( $v->id )."','".addslashes( $v->title )."' );\n\t\t";
	}
}
?>

function submitbutton(pressbutton) {
	var form = document.adminForm;
	if (pressbutton == 'cancel') {
		submitform( pressbutton );
		return;
	}
	try {
		form.onsubmit();
	} catch(e) {
		alert(e);
	}

	// do field validation
	var text = <?php echo $this->editor->getContent( 'text' ); ?>
	if (form.title.value == '') {
		return alert ( "<?php echo JText::_( 'Article must have a title', true ); ?>" );
	} else if (text == '') {
		return alert ( "<?php echo JText::_( 'Article must have some text', true ); ?>");
	} else if (parseInt('<?php echo $this->article->sectionid;?>')) {
		// for articles
		if (form.catid && getSelectedValue('adminForm','catid') < 1) {
			return alert ( "<?php echo JText::_( 'Please select a category', true ); ?>" );
		}
	}
	<?php echo $this->editor->save( 'text' ); ?>
	submitform(pressbutton);
}
//-->
</script>

<form action="index.php" method="post" name="adminForm" onSubmit="setgood();">
<fieldset>
<legend><?php echo JText::_('Editor'); ?></legend>

		<div class="floatleft">
			<label for="title">
				<?php echo JText::_( 'Title' ); ?>:
			</label>
			<input class="inputbox" type="text" id="title" name="title" size="50" maxlength="100" value="<?php echo $this->escape($this->article->title); ?>" />
	</div>

		<div class="floatright">
			<button type="button" onclick="submitbutton('save')">
				<?php echo JText::_('Save') ?>
			</button>
			<button type="button" onclick="submitbutton('cancel')">
				<?php echo JText::_('Cancel') ?>
			</button>
		</div>
		<div class="clear"></div>

<div class="editor"><?php
echo $this->editor->display('text', $this->article->text, '100%', '400', '70', '15');
?></div>

</fieldset>

<fieldset>
<legend><?php echo JText::_('Publishing'); ?></legend>

		<div class="floatleft widleft">
		<label for="sectionid">	<?php echo JText::_( 'Section' ); ?>:</label>
		</div>
		<div class="floatright widright">
		<?php echo $this->lists['sectionid']; ?>
		</div>
		
		<div class="floatleft widleft">
		<label for="catid"><?php echo JText::_( 'Category' ); ?>:</label>
		</div>
		<div class="floatright widright">
		<?php echo $this->lists['catid']; ?>
		</div>
		
<?php if ($this->user->authorize('com_content', 'publish', 'content', 'all')) : ?>
		<div class="floatleft widleft">
		<label for="state"><?php echo JText::_( 'Published' ); ?>:</label>
		</div>
		<div class="floatright widright">
		<?php echo $this->lists['state']; ?>
		</div>
<?php endif; ?>

		<div class="floatleft widleft">
		<label for="frontpage"><?php echo JText::_( 'Show on Front Page' ); ?>:	</label>
		</div>
		<div class="floatright widright">
		<?php echo $this->lists['frontpage']; ?>
		</div>

		<div class="floatleft widleft">
		<label for="created_by_alias"><?php echo JText::_( 'Author Alias' ); ?>:</label>
		</div>
		<div class="floatright widright">
		<input type="text" id="created_by_alias" name="created_by_alias" size="50" maxlength="100" value="<?php echo $this->article->created_by_alias; ?>" class="inputbox" />
		</div>

		<div class="floatleft widleft">
		<label for="publish_up"><?php echo JText::_( 'Start Publishing' ); ?>:</label>
		</div>
		<div class="floatright widright">
		<input class="inputbox" type="text" name="publish_up" id="publish_up" size="25" maxlength="19" value="<?php echo $this->article->publish_up; ?>" />
		<a href="#" onclick="return showCalendar('publish_up', 'y-mm-dd');"><img class="calendar" src="images/blank.png" alt="calendar" /></a>
		</div>

		<div class="floatleft widleft">
		<label for="publish_down">	<?php echo JText::_( 'Finish Publishing' ); ?>:</label>
		</div>
		<div class="floatright widright">
		<input class="inputbox" type="text" name="publish_down" id="publish_down" size="25" maxlength="19" value="<?php echo $this->article->publish_down; ?>" />
		<a href="#" onclick="return showCalendar('publish_down', 'y-mm-dd');"><img class="calendar" src="images/blank.png" alt="calendar" /></a>
		</div>

		<div class="floatleft widleft">
		<label for="access"><?php echo JText::_( 'Access Level' ); ?>:	</label>
		</div>
		<div class="floatright widright">
		<?php echo $this->lists['access']; ?>
		</div>

		<div class="floatleft widleft">
		<label for="ordering"><?php echo JText::_( 'Ordering' ); ?>:</label>
		</div>
		<div class="floatright widright">
		<?php echo $this->lists['ordering']; ?>
		</div>
</fieldset>

<fieldset>
<legend><?php echo JText::_('Metadata'); ?></legend>
		<label for="metadesc"><?php echo JText::_( 'Description' ); ?>:</label>
		<textarea rows="5" cols="50" class="inputbox" id="metadesc" name="metadesc"><?php echo str_replace('&','&amp;',$this->article->metadesc); ?></textarea>

		<label for="metakey"><?php echo JText::_( 'Keywords' ); ?>:</label>
		<textarea rows="5" cols="50" class="inputbox" id="metakey" name="metakey"><?php echo str_replace('&','&amp;',$this->article->metakey); ?></textarea>
</fieldset>

<input type="hidden" name="option" value="com_content" />
<input type="hidden" name="Returnid" value="<?php echo $this->returnid; ?>" />
<input type="hidden" name="id" value="<?php echo $this->article->id; ?>" />
<input type="hidden" name="version" value="<?php echo $this->article->version; ?>" />
<input type="hidden" name="created_by" value="<?php echo $this->article->created_by; ?>" />
<input type="hidden" name="referer" value="<?php echo @$_SERVER['HTTP_REFERER']; ?>" />
<input type="hidden" name="task" value="" />
</form>
<?php echo JHTML::_('behavior.keepalive'); ?>