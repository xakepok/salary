<?php
use Joomla\CMS\Table\Table;
defined('_JEXEC') or die;
class TableSalary_fines extends Table
{
    var $id = null;
    var $employer_id = null;
    var $fine_time = null;
    var $amount = null;
    var $comment = null;

	public function __construct(JDatabaseDriver $db)
	{
		parent::__construct('#__slr_fines', 'id', $db);
	}
}