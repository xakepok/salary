<?php
defined('_JEXEC') or die;
$listOrder    = $this->escape($this->state->get('list.ordering'));
$listDirn    = $this->escape($this->state->get('list.direction'));
?>
<tr>
    <th width="1%" class="hidden-phone">
        <input type="checkbox" name="checkall-toggle" value="" title="<?php echo JText::_('JGLOBAL_CHECK_ALL'); ?>" onclick="Joomla.checkAll(this)" />
    </th>
    <th width="1%">
        <?php echo JHtml::_('grid.sort', 'COM_SALARY_TABLE_ID', '`id`', $listDirn, $listOrder); ?>
    </th>
    <th>
        <?php echo JHtml::_('grid.sort', 'COM_SALARY_TABLE_DEPARTMENTS_TITLE', 'title', $listDirn, $listOrder); ?>
    </th>
</tr>