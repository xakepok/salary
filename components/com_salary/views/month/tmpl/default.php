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
                <?php echo JText::_('COM_SALARY_TABLE_MONTH_SALARY');?>
            </th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($this->items as $employer_id => $item):
            if ($item['salary'] == 0) continue;?>
        <tr>
            <td>
                <?php echo $item['fio'];?>
            </td>
            <td>
                <?php echo $item['salary']." ".JText::_('COM_SALARY_RUB');?>
            </td>
        </tr>
        <? endforeach;?>
    </tbody>
</table>
