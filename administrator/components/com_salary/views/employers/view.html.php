<?php
use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;
use Joomla\CMS\MVC\View\HtmlView;

defined('_JEXEC') or die;
class SalaryViewEmployers extends HtmlView
{
	protected $helper;
	protected $sidebar = '';
	public $items, $state, $pagination;

	public function display($tpl = null)
	{
		$this->toolbar();

		$this->helper = new SalaryHelper;
		$this->helper->addSubmenu('employers');
		$this->sidebar = JHtmlSidebar::render();

		$this->state = $this->get('State');
		$this->pagination = $this->get('Pagination');
		$this->items = $this->get('Items');

		return parent::display($tpl);
	}

	private function toolbar()
	{
		JToolBarHelper::title(Text::_('COM_SALARY_MENU_EMPLOYERS'), '');

		if (Factory::getUser()->authorise('core.admin', 'com_salary'))
		{
			JToolBarHelper::addNew('employer.add');
			JToolBarHelper::editList('employer.edit');
			JToolbarHelper::custom('employers.dismiss', '', '', JText::_('COM_SALARY_BUTTON_DISMISS'));
			JToolBarHelper::deleteList(JText::_('COM_SALARY_DELETE_QUESTSION_EMPLOYERS'), 'employers.delete');
			JToolBarHelper::preferences('com_salary');
		}
	}
}
