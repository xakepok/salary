<?php
use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;
use Joomla\CMS\MVC\View\HtmlView;

defined('_JEXEC') or die;
class SalaryViewFines extends HtmlView
{
	protected $helper;
	protected $sidebar = '';
	public $items, $state, $pagination;

	public function display($tpl = null)
	{
		$this->toolbar();

		$this->helper = new SalaryHelper;
		$this->helper->addSubmenu('fines');
		$this->sidebar = JHtmlSidebar::render();

		$this->state = $this->get('State');
		$this->pagination = $this->get('Pagination');
		$this->items = $this->get('Items');

		return parent::display($tpl);
	}

	private function toolbar()
	{
		JToolBarHelper::title(Text::_('COM_SALARY_MENU_FINES'), '');

		if (Factory::getUser()->authorise('core.admin', 'com_salary'))
		{
			JToolBarHelper::addNew('fine.add');
			JToolBarHelper::editList('fine.edit');
			JToolBarHelper::deleteList(JText::_('COM_SALARY_DELETE_QUESTSION_FINES'), 'fines.delete');
			JToolBarHelper::preferences('com_salary');
		}
	}
}
