<?php
use Joomla\CMS\MVC\Controller\AdminController;
defined('_JEXEC') or die;

class SalaryControllerPosts extends AdminController
{
    public function getModel($name = 'Post', $prefix = 'SalaryModel', $config = array())
    {
        return parent::getModel($name, $prefix, $config);
    }
}
