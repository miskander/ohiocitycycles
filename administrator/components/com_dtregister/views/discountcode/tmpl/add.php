<?php

/**
* @version 2.7.0
* @package Joomla 1.5
* @subpackage DT Register
* @copyright Copyright (C) 2006 DTH Development
* @copyright contact dthdev@dthdevelopment.com
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
*/

?>

    <form name="adminForm" class="adminform" id="newDiscountCode" method="post" action="index2.php">

    <table width="100%" class="adminlist">

			<tbody>

			<tr>

				<th class="dt_heading" colspan="3"><?php echo JText::_( 'DT_DISCOUNT_CODE');?> <?php echo JText::_( 'DT_DETAILS');?></th>
			</tr>

			<tr>

				<td width="20%" align="left" valign="top"><?php echo JText::_( 'DT_NAME');?>:</td>

				<td valign="top" align="left" width="30%">

				<input class="text_area" type="text" name="name" size="50" maxlength="50" value=""  />

				</td>

					<td valign="top" align="left">
                       <?php echo JHTML::tooltip((JText::_( 'DT_DISCOUNT_NAME_HELP' )), '', 'tooltip.png', '', ''); ?>
					
					</td>

			</tr>

			<tr class="typeshow type1 type3 type4" >

				<td><?php echo JText::_( 'DT_START_DATE');?>:</td>

				<td align="left">

				<?php echo JHTML::_("calendar",null,"start","start",'%Y-%m-%d %H:%M:%S',array('size'=>'25')); ?>

				</td>

					<td valign="top" align="left">
                    <?php echo JHTML::tooltip((JText::_( 'DT_DISCOUNT_STARTDATE_HELP' )), '', 'tooltip.png', '', ''); ?>
					
					</td>

			</tr>

			<tr class="typeshow type1 type3 type4">

				<td><?php echo JText::_( 'DT_END_DATE');?>:</td>

				<td align="left">

					<?php echo JHTML::_("calendar",null,"end","end",'%Y-%m-%d %H:%M:%S',array('size'=>'25')); ?>

				</td>

					<td valign="top" align="left">
                      <?php echo JHTML::tooltip((JText::_( 'DT_DISCOUNT_ENDDATE_HELP' )), '', 'tooltip.png', '', ''); ?>
					
					</td>

			</tr>

            <tr class="typeshow type1 type3 type4">

				<td><?php echo JText::_( 'DT_DISCOUNT_CODE_LIMIT');?>:</td>

				<td align="left">

                    <input class="text_area" type="text" name="limit" size="10" maxlength="4" value="" />

				</td>

					<td valign="top" align="left">
                    <?php echo JHTML::tooltip((JText::_( 'DT_DISCOUNT_CODE_LIMIT_HELP' )), '', 'tooltip.png', '', ''); ?>
					
					</td>

			</tr>

			<tr class="typeshow type1 type3 type4">

				<td><?php echo JText::_( 'DT_PUBLISH');?>:</td>

				<td>

                  <?php

					   			  $options=array();

								   $options[]=JHTML::_('select.option', "0",JText::_( 'NO'));

								   $options[]=JHTML::_('select.option', "1",JText::_( 'YES'));

								   echo JHTML::_('select.genericlist',$options,"publish","","value","text");

								   ?>

				</td>

				</td>

					<td valign="top" align="left">
                     <?php echo JHTML::tooltip((JText::_( 'DT_DISCOUNT_PUBLISH_HELP' )), '', 'tooltip.png', '', ''); ?>
					
				</td>

			</tr>
             <tr class="typeshow type1 type3 type4">

				<td><?php echo JText::_( 'DT_ENABLE_FOR');?>:</td>

				<td>

                  <?php

					   			  $options=array();

								   $options[]=JHTML::_('select.option',"0",JText::_( 'DT_PER_EVENT'));

								   $options[]=JHTML::_('select.option',"1",JText::_( 'DT_ALL_EVENT'));

								   echo JHTML::_('select.genericlist',$options,"events_enable","","value","text");

								   ?>

				</td>

				</td>

					<td valign="top" align="left">
                     <?php echo JHTML::tooltip((JText::_( 'DT_ENABLE_FOR_HELP' )), '', 'tooltip.png', '', ''); ?>
					
				</td>

			</tr>

			<tr class="typeshow type1 type3 type4">

				<td><?php echo JText::_( 'DT_CODE_DISCOUNT_TYPE');?>:</td>

				<td align="left">

         <?php

				 $options=array();

								   $options[]=JHTML::_('select.option', "1",JText::_( 'DT_AMOUNT'));

								   $options[]=JHTML::_('select.option', "2",JText::_( 'DT_PERCENTAGE'));

								   echo JHTML::_('select.genericlist',$options,"discount_type","","value","text");

				 ?>

				</td>

					<td valign="top" align="left">
                      <?php echo JHTML::tooltip((JText::_( 'DT_DISCOUNT_CODE_TYPE_HELP' )), '', 'tooltip.png', '', ''); ?>
					
					</td>

			</tr>

			<tr class="typeshow type2">

				<td><?php echo JText::_( 'DT_AMOUNT');?>:</td>

				<td align="left">

					<input class="text_area" type="text" name="amount" size="10" maxlength="250" value="" />

				</td>

					<td valign="top" align="left">
                      <?php echo JHTML::tooltip((JText::_( 'DT_DISCOUNT_CODE_AMOUNT_HELP' )), '', 'tooltip.png', '', ''); ?>
					
					</td>

			</tr>

			<tr class="typeshow type2">

				<td><?php echo JText::_( 'DT_DISCOUNT_CODE');?>:</td>

				<td align="left">

					<input class="text_area" type="text" name="code" size="10" maxlength="250" value="" />

				</td>

					<td valign="top" align="left">
                      
                      <?php echo JHTML::tooltip((JText::_( 'DT_DISCOUNT_CODE_HELP' )), '', 'tooltip.png', '', ''); ?>
					
					</td>

			</tr>

			</tbody>

		</table>

    <input type="hidden" name="option" value="<?php echo DTR_COM_COMPONENT;?>" />
    
    <input type="hidden" name="controller" value="discountcode" />

    <input type="hidden" name="task" value="" />

    </form>

     <script src="../components/com_dtregister/assets/js/jquery.js" language="javascript" type="text/javascript"></script>

     <script src="../components/com_dtregister/assets/js/form.js" language="javascript" type="text/javascript"></script>

     <script language="JavaScript" type="text/javascript">

	   DTjQuery(function(){

	   });

		 function submitbutton(pressbutton)

		{
           if(pressbutton=="cancel"){
		     submitform(pressbutton);
		   }else{
			data = DTjQuery('#newDiscountCode').formSerialize()+pressbutton+'&no_html=1';

			DTjQuery.post('index2.php', data,function(){},'script');

			return false;
		   }

		}

		</script>
