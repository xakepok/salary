<?php
defined('_JEXEC') or die;
use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;
use Joomla\CMS\MVC\View\HtmlView;

class SalaryViewFine extends HtmlView {
    protected $item, $form, $script, $fields;

    public function display($tpl = null) {
        $this->form = $this->get('Form');
        $this->item = $this->get('Item');
        $this->fields = $this->get('Fields');

        $this->addToolbar();
        $this->setDocument();

        parent::display($tpl);
    }

    protected function addToolbar() {
        JFactory::getApplication()->input->set('hidemainmenu', true);
        $title = JText::_('COM_SALARY_TABLE_FINE');

        JToolbarHelper::title($title, 'fine');
        JToolbarHelper::apply('fine.apply', 'JTOOLBAR_APPLY');
        JToolbarHelper::save('fine.save');
        JToolbarHelper::cancel('fine.cancel', 'JTOOLBAR_CLOSE');
    }

    protected function setDocument() {
        JHtml::_('bootstrap.framework');
    }
}