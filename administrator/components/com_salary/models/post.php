<?php
use Joomla\CMS\MVC\Model\AdminModel;
defined('_JEXEC') or die;

class SalaryModelPost extends AdminModel {
    public function getTable($name = 'posts', $prefix = 'TableSalary_', $options = array())
    {
        return JTable::getInstance($name, $prefix, $options);
    }

    public function getForm($data = array(), $loadData = true)
    {
        $form = $this->loadForm(
            $this->option.'.post', 'post', array('control' => 'jform', 'load_data' => $loadData)
        );
        if (empty($form))
        {
            return false;
        }

        return $form;
    }

    protected function loadFormData()
    {
        $data = JFactory::getApplication()->getUserState($this->option.'.edit.post.data', array());
        if (empty($data))
        {
            $data = $this->getItem();
        }

        return $data;
    }
}