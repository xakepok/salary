<?php
use Joomla\CMS\MVC\Controller\AdminController;
defined('_JEXEC') or die;

class SalaryControllerFines extends AdminController
{
    public function getModel($name = 'Fine', $prefix = 'SalaryModel', $config = array())
    {
        return parent::getModel($name, $prefix, $config);
    }
}
