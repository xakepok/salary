<?php
defined('_JEXEC') or die;
use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;
use Joomla\CMS\MVC\View\HtmlView;

class SalaryViewEmployer extends HtmlView {
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
        $title = JText::_('COM_SALARY_FORM_EMPLOYER_FIO');

        JToolbarHelper::title($title, 'employer');
        JToolbarHelper::apply('employer.apply', 'JTOOLBAR_APPLY');
        JToolbarHelper::save('employer.save');
        JToolbarHelper::cancel('employer.cancel', 'JTOOLBAR_CLOSE');
    }

    protected function setDocument() {
        JHtml::_('bootstrap.framework');
    }
}