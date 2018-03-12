<?php
use Joomla\CMS\Language\Text;
defined('_JEXEC') or die;

class SalaryHelper
{
	public function addSubmenu($vName)
	{
		JHtmlSidebar::addEntry(Text::_('COM_SALARY'), 'index.php?option=com_salary&view=salary', $vName == 'salary');
		JHtmlSidebar::addEntry(Text::_('COM_SALARY_MENU_DEPARTMENTS'), 'index.php?option=com_salary&view=departments', $vName == 'departments');
		JHtmlSidebar::addEntry(Text::_('COM_SALARY_MENU_POSTS'), 'index.php?option=com_salary&view=posts', $vName == 'posts');
		JHtmlSidebar::addEntry(Text::_('COM_SALARY_MENU_EMPLOYERS'), 'index.php?option=com_salary&view=employers', $vName == 'employers');
		JHtmlSidebar::addEntry(Text::_('COM_SALARY_MENU_FINES'), 'index.php?option=com_salary&view=fines', $vName == 'fines');
	}

	public static function getEmployers()
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

        return $options;
    }
}
