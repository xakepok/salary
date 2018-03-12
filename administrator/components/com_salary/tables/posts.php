<?php
use Joomla\CMS\Table\Table;
defined('_JEXEC') or die;
class TableSalary_posts extends Table
{
    var $id = null;
    var $title = null;
    var $salary = null;

	public function __construct(JDatabaseDriver $db)
	{
		parent::__construct('#__slr_posts', 'id', $db);
	}
}