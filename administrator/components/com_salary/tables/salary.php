<?php
use Joomla\CMS\Table\Table;

defined('_JEXEC') or die;

class TableSalary extends Table
{
	public function __construct(JDatabaseDriver $db)
	{
		parent::__construct('#__salary_items', 'item_id', $db);
	}
}