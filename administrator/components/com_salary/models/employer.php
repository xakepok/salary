<?php
use Joomla\CMS\MVC\Model\AdminModel;
defined('_JEXEC') or die;

class SalaryModelEmployer extends AdminModel {
    public function getTable($name = 'employers', $prefix = 'TableSalary_', $options = array())
    {
        return JTable::getInstance($name, $prefix, $options);
    }

    public function getForm($data = array(), $loadData = true)
    {
        $form = $this->loadForm(
            $this->option.'.employer', 'employer', array('control' => 'jform', 'load_data' => $loadData)
        );
        if (empty($form))
        {
            return false;
        }

        return $form;
    }

    protected function loadFormData()
    {
        $data = JFactory::getApplication()->getUserState($this->option.'.edit.employer.data', array());
        if (empty($data))
        {
            $data = $this->getItem();
        }

        return $data;
    }

    public function dismiss()
    {
        $ids = JFactory::getApplication()->input->get('cid');
        $db =& $this->getDbo();
        $query = $db->getQuery(true);
        $query
            ->update($db->quoteName('#__slr_employers'))
            ->set($db->quoteName('date_end')." = CURRENT_DATE()");
        $where = array();
        foreach ($ids as $id)
        {
            $where[] = $db->quoteName('id')." = ".$db->quote($id);
        }
        $query
            ->where(implode(' OR ', $where));
        return $db->setQuery($query)->execute();
    }
}