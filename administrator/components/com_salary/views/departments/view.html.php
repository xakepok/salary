<?php
use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;
use Joomla\CMS\MVC\View\HtmlView;

defined('_JEXEC') or die;
class SalaryViewDepartments extends HtmlView
{
	protected $helper;
	protected $sidebar = '';
	public $items, $state, $pagination;

	public function display($tpl = null)
	{
		$this->toolbar();

		$this->helper = new SalaryHelper;
		$this->helper->addSubmenu('departments');
		$this->sidebar = JHtmlSidebar::render();

		$this->state = $this->get('State');
		$this->pagination = $this->get('Pagination');
		$this->items = $this->get('Items');

		return parent::display($tpl);
	}

	private function toolbar()
	{
		JToolBarHelper::title(Text::_('COM_SALARY_MENU_DEPARTMENTS'), '');

		if (Factory::getUser()->authorise('core.admin', 'com_salary'))
		{
			JToolBarHelper::addNew('department.add');
			JToolBarHelper::editList('department.edit');
			JToolBarHelper::deleteList(JText::_('COM_SALARY_DELETE_QUESTSION_DEPARTMENTS'), 'departments.delete');
			JToolBarHelper::preferences('com_salary');
		}
	}
}
