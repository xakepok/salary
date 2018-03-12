<?php
use Joomla\CMS\Table\Table;
defined('_JEXEC') or die;
class TableSalary_departments extends Table
{
    var $id = null;
    var $title = null;
	public function __construct(JDatabaseDriver $db)
	{
		parent::__construct('#__slr_departments', 'id', $db);
	}
}