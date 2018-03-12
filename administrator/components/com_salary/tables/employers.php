<?php
use Joomla\CMS\Table\Table;
defined('_JEXEC') or die;
class TableSalary_employers extends Table
{
    var $id = null;
    var $dep_id = null;
    var $post_id = null;
    var $fio = null;
    var $date_start = null;
    var $date_end = null;
    var $wage = null;

	public function __construct(JDatabaseDriver $db)
	{
		parent::__construct('#__slr_employers', 'id', $db);
	}
}