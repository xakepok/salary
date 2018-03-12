<?php
use Joomla\CMS\Factory;
use Joomla\CMS\MVC\Controller\BaseController;

defined('_JEXEC') or die;
require_once JPATH_ADMINISTRATOR.'/components/com_salary/helpers/salary.php';

$controller = BaseController::getInstance('salary');
$controller->execute(Factory::getApplication()->input->get('task'));
$controller->redirect();
