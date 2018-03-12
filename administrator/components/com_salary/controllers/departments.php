<?php
use Joomla\CMS\MVC\Controller\AdminController;
defined('_JEXEC') or die;

class SalaryControllerDepartments extends AdminController
{
    public function getModel($name = 'Department', $prefix = 'SalaryModel', $config = array())
    {
        return parent::getModel($name, $prefix, $config);
    }
}
