<?php
use Joomla\CMS\MVC\Model\AdminModel;
defined('_JEXEC') or die;

class SalaryModelDepartment extends AdminModel {
    public function getTable($name = 'departments', $prefix = 'TableSalary_', $options = array())
    {
        return JTable::getInstance($name, $prefix, $options);
    }

    public function getForm($data = array(), $loadData = true)
    {
        $form = $this->loadForm(
            $this->option.'.department', 'department', array('control' => 'jform', 'load_data' => $loadData)
        );
        if (empty($form))
        {
            return false;
        }

        return $form;
    }

    protected function loadFormData()
    {
        $data = JFactory::getApplication()->getUserState($this->option.'.edit.department.data', array());
        if (empty($data))
        {
            $data = $this->getItem();
        }

        return $data;
    }

    public function getScript()
    {
        return 'administrator/components/' . $this->option . '/models/forms/department.js';
    }
}