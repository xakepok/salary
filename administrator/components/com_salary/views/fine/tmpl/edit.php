<?php
defined('_JEXEC') or die;
JHtml::_('bootstrap.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('formbehavior.chosen', 'select');
?>
<script type="text/javascript">
    Joomla.submitbutton = function(task) {
        //if (task == 'direction.cancel' || document.formvalidator.isValid(document.id('direction-form'))) {
            Joomla.submitform(task, document.getElementById('adminForm'));
        //}
    }
</script>
<form action="<?php echo JRoute::_('index.php?option=com_salary&view=fine&layout=edit&id=' . (int)$this->item->id); ?>"
      method="post" name="adminForm" id="adminForm" xmlns="http://www.w3.org/1999/html" class="form-validate">
    <div class="row-fluid">
        <div class="span12 form-horizontal">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#general" data-toggle="tab"><?php echo JText::_('COM_SALARY_TABLE_FINE');?></a></li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="general">
                    <fieldset class="adminform">
                        <div class="control-group form-inline">
                            <?php foreach ($this->form->getFieldset('names') as $field) : ?>
                                <div class="control-label"><?php echo $field->label; ?></div>
                                <div class="controls"><?php echo $field->input; ?></div>
                                <br>
                            <?php endforeach; ?>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
        <div>
            <input type="hidden" name="task" value="" />
            <?php echo JHtml::_('form.token'); ?>
        </div>
    </div>
</form>