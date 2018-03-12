<?php
use Joomla\CMS\MVC\Model\AdminModel;
defined('_JEXEC') or die;

class SalaryModelFine extends AdminModel {
    public function getTable($name = 'fines', $prefix = 'TableSalary_', $options = array())
    {
        return JTable::getInstance($name, $prefix, $options);
    }

    public function getForm($data = array(), $loadData = true)
    {
        $form = $this->loadForm(
            $this->option.'.fine', 'fine', array('control' => 'jform', 'load_data' => $loadData)
        );
        if (empty($form))
        {
            return false;
        }

        return $form;
    }

    protected function loadFormData()
    {
        $data = JFactory::getApplication()->getUserState($this->option.'.edit.fine.data', array());
        if (empty($data))
        {
            $data = $this->getItem();
        }

        return $data;
    }
}