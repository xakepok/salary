<?php
use Joomla\CMS\MVC\Model\ListModel;

defined('_JEXEC') or die;

class SalaryModelMonth extends ListModel
{
    public $time_start, $time_end;

    public function __construct(array $config = array())
    {
        $input = JFactory::getApplication()->input;
        $this->time_start = $input->getString('date_1', false);
        $this->time_end = $input->getString('date_2', false);
        if ($this->time_start !== false && $this->time_end !== false)
        {
            $db =& JFactory::getDBO();
            $this->time_start = "'".$this->time_start." 00:00:00'";
            $this->time_end = "'".$this->time_end." 23:59:59'";
        }
        parent::__construct($config);
    }

    public static function getInstance($type, $prefix = '', $config = array())
    {
        return parent::getInstance($type, $prefix, $config);
    }

    public function getItems()
    {
        $db = $this->getDbo();
        $query = $db->getQuery(true);
        $query
            ->select("`w`.`id`, `w`.`employer_id`, `e`.`fio`, `p`.`title` as `post`, `d`.`title` as `dep`, DATE_FORMAT(TIMEDIFF(`w`.`time_end`,`w`.`time_start`),'%k')*`p`.`salary`*0.87 as `salary`")
            ->from("#__slr_works as `w`")
            ->leftJoin('#__slr_employers as `e` ON `e`.`id` = `w`.`employer_id`')
            ->leftJoin('#__slr_departments as `d` ON `d`.`id` = `e`.`dep_id`')
            ->leftJoin('#__slr_posts as `p` ON `p`.`id` = `e`.`post_id`')
            ->order('`e`.`fio`');

        if ($this->time_start !== false && $this->time_end !== false)
        {
            $query->where("`w`.`time_start` BETWEEN {$this->time_start} AND {$this->time_end}");
        }

        $items = $db->setQuery($query)->loadObjectList();

        $fines = $this->getFines();
        $salary = array();
        foreach ($items as $item)
        {
            if (!isset($salary[$item->employer_id]))
            {
                $salary[$item->employer_id]['fio'] = $item->fio;
                $salary[$item->employer_id]['salary'] = $item->salary;
            }
            else
            {
                $salary[$item->employer_id]['salary'] = $salary[$item->employer_id]['salary'] + $item->salary;
            }
        }
        foreach ($fines as $employer_id => $amount)
        {
            $salary[$employer_id]['salary'] = $salary[$employer_id]['salary'] - $amount;
            $salary[$employer_id]['salary'] = (string) $salary[$employer_id]['salary'];
        }

        return $salary;
    }

    private function getFines()
    {
        $result = array();
        $db =& $this->getDBO();
        $query = $db->getQuery(true);
        $query
            ->select("`employer_id`, `amount`")
            ->from('#__slr_fines');
        if ($this->time_start !== false && $this->time_end !== false) $query->where("`fine_time` BETWEEN {$this->time_start} AND {$this->time_end}");
        $fines = $db->setQuery($query)->loadAssocList();
        foreach ($fines as $fine) {
            if (!isset($result[$fine->employer_id]))
            {
                $result[$fine->employer_id] = (int) $fine->amount;
            }
            else
            {
                $result[$fine->employer_id] = $result[$fine->employer_id] + (int) $fine->amount;
            }
        }

        return $result;
    }
}
