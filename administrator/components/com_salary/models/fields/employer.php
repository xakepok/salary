<?php
defined('_JEXEC') or die;
jimport('joomla.form.helper');
JFormHelper::loadFieldClass('list');

class JFormFieldEmployer extends JFormFieldList  {
    protected  $type = 'Employer';

    protected function getOptions()
    {
        $db = JFactory::getDbo();
        $query = $db->getQuery(true);
        $query
            ->select('`e`.`id`, `e`.`fio`, `p`.`title` as `post`, `d`.`title` as `dep`')
            ->from("#__slr_employers as `e`")
            ->leftJoin('#__slr_departments as `d` ON `d`.`id` = `e`.`dep_id`')
            ->leftJoin('#__slr_posts as `p` ON `p`.`id` = `e`.`post_id`')
            ->where('`e`.`date_end` IS NULL')
            ->order('`e`.`fio`');
        $db->setQuery($query);
        $employers = $db->loadObjectList();

        $options = array();

        if ($employers) {
            foreach ($employers as $employer) {
                $name = $employer->fio." (".$employer->post.", ".$employer->dep.")";
                $options[] = JHtml::_('select.option', $employer->id, $name);
            }
        }

        $options = array_merge(parent::getOptions(), $options);

        return $options;
    }
}