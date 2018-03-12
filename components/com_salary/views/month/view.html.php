<?php
use Joomla\CMS\MVC\View\HtmlView;

defined('_JEXEC') or die;

class SalaryViewMonth extends HtmlView
{
    public $items;

    public function display($tpl = null)
    {
        $this->items = $this->get('Items');
        parent::display($tpl);
    }
}
