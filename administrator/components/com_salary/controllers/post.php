<?php
use Joomla\CMS\MVC\Controller\FormController;
defined('_JEXEC') or die;

class SalaryControllerPost extends FormController
{
    public function display($cachable = false, $urlparams = array())
    {
        return parent::display($cachable, $urlparams);
    }
}
