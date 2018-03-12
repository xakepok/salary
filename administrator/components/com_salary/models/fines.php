<?php
use Joomla\CMS\MVC\Model\ListModel;
defined('_JEXEC') or die;

class SalaryModelFines extends ListModel
{
    public function __construct(array $config = array())
    {
        if (empty($config['filter_fields'])) {
            $config['filter_fields'] = array(
                'id'
            );
        }
        parent::__construct($config);
    }

    public static function getInstance($type = 'Fines', $prefix = 'SalaryModel', $config = array())
    {
        return parent::getInstance($type, $prefix, $config);
    }

    public function getListQuery()
    {
        $db =& $this->getDBO();
        $query = $db->getQuery(true);
        $query
            ->select("`f`.`id`, DATE_FORMAT(`f`.`fine_time`,'%d.%m.%Y') as `fine_time`, `f`.`amount`, `f`.`comment`, `e`.`fio`, `p`.`title` as `post`, `d`.`title` as `dep`")
            ->from("#__slr_fines as `f`")
            ->leftJoin('#__slr_employers as `e` ON `e`.`id` = `f`.`employer_id`')
            ->leftJoin('#__slr_departments as `d` ON `d`.`id` = `e`.`dep_id`')
            ->leftJoin('#__slr_posts as `p` ON `p`.`id` = `e`.`post_id`');

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
            $url = JRoute::_('index.php?option=com_salary&view=fine&id='.$id);
            $fine_time = JHtml::link($url, $item->fine_time);
            $comment = $item->comment;
            $fio = $item->fio;
            $post = $item->post;
            $amount = $item->amount.' '.JText::_('COM_SALARY_RUB');
            $dep = $item->dep;
            $result[] = array(
                'id' => $id,
                'time' => $fine_time,
                'amount' => $amount,
                'comment' => $comment,
                'fio' => $fio,
                'post' => $post,
                'dep' => $dep
            );
        }
        return $result;
    }

    protected function populateState($ordering = null, $direction = null)
    {
        parent::populateState('id', 'asc');
    }
}
