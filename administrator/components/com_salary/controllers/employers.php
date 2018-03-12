<?php
use Joomla\CMS\MVC\Controller\AdminController;
defined('_JEXEC') or die;

class SalaryControllerEmployers extends AdminController
{
    public function getModel($name = 'Employer', $prefix = 'SalaryModel', $config = array())
    {
        return parent::getModel($name, $prefix, $config);
    }

    public function dismiss() {
        $model = $this->getModel();
        $model->dismiss();
        $this->setRedirect('index.php?option=com_salary&view=employers', JText::_('COM_SALARY_MESSAGE_DISMISS_OK'));
    }
}
