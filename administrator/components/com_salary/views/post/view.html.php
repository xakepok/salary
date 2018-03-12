<?php
defined('_JEXEC') or die;
use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;
use Joomla\CMS\MVC\View\HtmlView;

class SalaryViewPost extends HtmlView {
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
        $title = JText::_('COM_SALARY_FORM_POST_TITLE');

        JToolbarHelper::title($title, 'department');
        JToolbarHelper::apply('post.apply', 'JTOOLBAR_APPLY');
        JToolbarHelper::save('post.save');
        JToolbarHelper::cancel('post.cancel', 'JTOOLBAR_CLOSE');
    }

    protected function setDocument() {
        JHtml::_('bootstrap.framework');
    }
}