<?php
use Joomla\CMS\MVC\Controller\BaseController;

defined('_JEXEC') or die;

class SalaryControllerWork extends BaseController
{
    public static function getInstance($prefix, $config = array())
    {
        return parent::getInstance($prefix, $config);
    }

    public function getModel($name = 'Work', $prefix = 'SalaryModel', $config = array())
    {
        return parent::getModel($name, $prefix, $config);
    }

    public function startWork()
    {
        $model = $this->getModel();
        $model->startWork();
        $this->setRedirect('/index.php?option=com_salary');
    }

    public function endWork()
    {
        $model = $this->getModel();
        $model->endWork();
        $this->setRedirect('/index.php?option=com_salary');
    }
}
