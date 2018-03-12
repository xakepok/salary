<?php
use Joomla\CMS\MVC\View\HtmlView;

defined('_JEXEC') or die;

class SalaryViewSalary extends HtmlView
{
    public $items, $pagination;

    public function display($tpl = null)
    {
        $this->items = $this->get('Items');
        $this->pagination = $this->get('Pagination');
        parent::display($tpl);
    }
}
