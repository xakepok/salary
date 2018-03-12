<?php
use Joomla\CMS\MVC\Model\ListModel;

defined('_JEXEC') or die;

class SalaryModelSalary extends ListModel
{
    public static function getInstance($type, $prefix = '', $config = array())
    {
        return parent::getInstance($type, $prefix, $config);
    }

    protected function getListQuery()
    {
        $db = $this->getDbo();
        $query = $db->getQuery(true);
        $query
            ->select('`e`.`id`, `e`.`fio`, `p`.`title` as `post`, `d`.`title` as `dep`')
            ->from("#__slr_employers as `e`")
            ->leftJoin('#__slr_departments as `d` ON `d`.`id` = `e`.`dep_id`')
            ->leftJoin('#__slr_posts as `p` ON `p`.`id` = `e`.`post_id`')
            ->where('`e`.`date_end` IS NULL')
            ->order('`e`.`fio`');

        return $query;
    }

    public function getItems()
    {
        $items = parent::getItems();
        $works = $this->getWorks();
        $employers = array();
        foreach ($items as $employer)
        {
            $links = array();
            if (!empty($works[$employer->id]))
            {
                $links['start'] = $works[$employer->id]['time_start'];
                if (!empty($works[$employer->id]['time_end']))
                {
                    $links['end'] = $works[$employer->id]['time_end'];
                }
                else
                {
                    $url = '/index.php?option=com_salary&task=work.endWork&id='.$employer->id;
                    $links['end'] = JHtml::link($url, JText::_('COM_SALARY_FORM_END_WORK'));
                }
            }
            else
            {
                $url = '/index.php?option=com_salary&task=work.startWork&id='.$employer->id;
                $links['end'] = '';
                $links['start'] = JHtml::link($url, JText::_('COM_SALARY_FORM_START_WORK'));
            }
            $name = $employer->fio." (".$employer->post.", ".$employer->dep.")";
            $employers[] = array(
                'id' => $employer->id,
                'name' => $name,
                'start' => $links['start'],
                'end' => $links['end']
            );
        }

        return $employers;
    }

    private function getWorks()
    {
        $result = array();
        $db =& $this->getDBO();
        $query = $db->getQuery(true);
        $ts = $db->quote(date("Y-m-d")."%");
        $query
            ->select("`id`, `employer_id`, DATE_FORMAT(`time_start`,'%H:%i') as `time_start`, DATE_FORMAT(`time_end`,'%H:%i') as `time_end`")
            ->from('#__slr_works')
            ->where("time_start LIKE {$ts}");
        return $db->setQuery($query)->loadAssocList('employer_id');
    }
}
