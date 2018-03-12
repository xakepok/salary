<?php
use Joomla\CMS\MVC\Model\ListModel;
defined('_JEXEC') or die;

class SalaryModelEmployers extends ListModel
{
    public function __construct(array $config = array())
    {
        if (empty($config['filter_fields'])) {
            $config['filter_fields'] = array(
                'id',
                'fio'
            );
        }
        parent::__construct($config);
    }

    public static function getInstance($type = 'Employers', $prefix = 'SalaryModel', $config = array())
    {
        return parent::getInstance($type, $prefix, $config);
    }

    public function getListQuery()
    {
        $db =& $this->getDBO();
        $query = $db->getQuery(true);
        $query
            ->select("`e`.`id`, `d`.`title` as `dep`, `p`.`title` as `post`, `e`.`fio`, DATE_FORMAT(`e`.`date_start`,'%d.%m.%Y') as `date_start`, DATE_FORMAT(`e`.`date_end`,'%d.%m.%Y') as `date_end`, `e`.`wage`")
            ->from("#__slr_employers as `e`")
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
            $dep = $item->dep;
            $post = $item->post;
            $fio = $item->fio;
            $ds = $item->date_start;
            $de = (!empty($item->date_end)) ? $item->date_end : JText::_('COM_SALARY_TABLE_EMPLOYERS_WORK_TODAY');
            $wage = $item->wage;
            $url = JRoute::_('index.php?option=com_salary&view=employer&layout=edit&id='.$id);
            $link = JHtml::link($url, $fio);
            $result[] = array(
                'id' => $id,
                'dep' => $dep,
                'post' => $post,
                'fio' => $link,
                'ds' => $ds,
                'de' => $de,
                'wage' => $wage
            );
        }
        return $result;
    }

    protected function populateState($ordering = null, $direction = null)
    {
        parent::populateState('id', 'asc');
    }
}
