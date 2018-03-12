<?php
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Layout\FileLayout;
defined('_JEXEC') or die;

HTMLHelper::_('script', 'com_salary/script.js', array('version' => 'auto', 'relative' => true));
HTMLHelper::_('stylesheet', 'com_salary/style.css', array('version' => 'auto', 'relative' => true));
?>
<table>
    <thead>
        <tr>
            <th>
                <?php echo JText::_('COM_SALARY_FORM_EMPLOYER_FIO');?>
            </th>
            <th>
                <?php echo JText::_('COM_SALARY_TABLE_START_WORK');?>
            </th>
            <th>
                <?php echo JText::_('COM_SALARY_TABLE_END_WORK');?>
            </th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($this->items as $item):?>
        <tr>
            <td>
                <?php echo $item['name'];?>
            </td>
            <td>
                <?php echo $item['start'];?>
            </td>
            <td>
                <?php echo $item['end'];?>
            </td>
        </tr>
        <? endforeach;?>
    </tbody>
</table>
<div style="text-align: center"><?php echo $this->pagination->getListFooter(); ?></div>