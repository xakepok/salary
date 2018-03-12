<?php
use Joomla\CMS\MVC\Model\ListModel;
defined('_JEXEC') or die;

class SalaryModelDepartments extends ListModel
{
    public function __construct(array $config = array())
    {
        if (empty($config['filter_fields']))
        {
            $config['filter_fields'] = array(
                'id',
                'title'
            );
        }
        parent::__construct($config);
    }

    public static function getInstance($type='Departments', $prefix = 'SalaryModel', $config = array())
    {
        return parent::getInstance($type, $prefix, $config);
    }

    public function getListQuery()
    {
        $db =& $this->getDBO();
        $query = $db->getQuery(true);
        $query
            ->select("*")
            ->from("#__slr_departments");

        $orderCol  = $this->state->get('list.ordering', 'id');
        $orderDirn = $this->state->get('list.direction', 'asc');
        $query->order($db->escape($orderCol . ' ' . $orderDirn));

        return $query;
    }

    protected function populateState($ordering = null, $direction = null)
    {
        parent::populateState('id', 'asc');
    }
}
