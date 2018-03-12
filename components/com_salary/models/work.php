<?php
use Joomla\CMS\MVC\Model\BaseDatabaseModel;

defined('_JEXEC') or die;

class SalaryModelWork extends BaseDatabaseModel
{
    public static function getInstance($type='Work', $prefix = 'SalaryModel', $config = array())
    {
        return parent::getInstance($type, $prefix, $config);
    }

    public function startWork()
    {
        $input = JFactory::getApplication()->input;
        $this->id = $input->getInt('id', 0);
        $this->sick = $input->getInt('sick', 0);
        if ($this->id == 0) return false;

        $db =& $this->getDBO();
        $query = $db->getQuery(true);
        $table = $db->quoteName('#__slr_works');
        $fields = $db->quoteName(array("employer_id", "sick"));
        $values = implode(', ', array($db->quote($this->id), $db->quote($this->sick)));

        $query
            ->insert($table)
            ->columns($fields)
            ->values($values);
        return $db->setQuery($query)->execute();
    }

    public function endWork()
    {
        $input = JFactory::getApplication()->input;
        $this->id = $input->getInt('id', 0);
        if ($this->id == 0) return false;

        $db =& $this->getDBO();
        $query = $db->getQuery(true);
        $table = $db->quoteName('#__slr_works');
        $fields = $db->quoteName('time_end')." = CURRENT_TIMESTAMP()";
        $condition = array(
            $db->quoteName("employer_id")." = ".$db->quote($this->id),
            $db->quoteName('time_start')." LIKE ".$db->quote(date("Y-m-d")."%")
        );
        $query
            ->update($table)
            ->set($fields)
            ->where($condition);

        return $db->setQuery($query)->execute();
    }

    private $id, $sick;
}
