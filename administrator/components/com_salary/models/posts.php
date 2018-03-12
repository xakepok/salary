<?php

use Joomla\CMS\MVC\Model\ListModel;

defined('_JEXEC') or die;

class SalaryModelPosts extends ListModel
{
    public function __construct(array $config = array())
    {
        if (empty($config['filter_fields'])) {
            $config['filter_fields'] = array(
                'id',
                'title'
            );
        }
        parent::__construct($config);
    }

    public static function getInstance($type = 'Posts', $prefix = 'SalaryModel', $config = array())
    {
        return parent::getInstance($type, $prefix, $config);
    }

    public function getListQuery()
    {
        $db =& $this->getDBO();
        $query = $db->getQuery(true);
        $query
            ->select("*")
            ->from("#__slr_posts");

        $orderCol = $this->state->get('list.ordering', 'id');
        $orderDirn = $this->state->get('list.direction', 'asc');
        $query->order($db->escape($orderCol . ' ' . $orderDirn));

        return $query;
    }

    public function getItems()
    {
        $items = parent::getItems();
        $result = array();
        foreach ($items as $item) {
            $id = $item->id;
            $title = $item->title;
            $salary = $item->salary . " " . JText::_('COM_SALARY_RUB_IN_HOUR');
            $result[] = array(
                'id' => $id,
                'title' => $title,
                'salary' => $salary
            );
        }
        return $result;
    }

    protected function populateState($ordering = null, $direction = null)
    {
        parent::populateState('id', 'asc');
    }
}
