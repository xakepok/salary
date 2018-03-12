<?php
use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;
use Joomla\CMS\MVC\View\HtmlView;

defined('_JEXEC') or die;
class SalaryViewPosts extends HtmlView
{
	protected $helper;
	protected $sidebar = '';
	public $items, $state, $pagination;

	public function display($tpl = null)
	{
		$this->toolbar();

		$this->helper = new SalaryHelper;
		$this->helper->addSubmenu('posts');
		$this->sidebar = JHtmlSidebar::render();

		$this->state = $this->get('State');
		$this->pagination = $this->get('Pagination');
		$this->items = $this->get('Items');

		return parent::display($tpl);
	}

	private function toolbar()
	{
		JToolBarHelper::title(Text::_('COM_SALARY_MENU_POSTS'), '');

		if (Factory::getUser()->authorise('core.admin', 'com_salary'))
		{
			JToolBarHelper::addNew('post.add');
			JToolBarHelper::editList('post.edit');
			JToolBarHelper::deleteList(JText::_('COM_SALARY_DELETE_QUESTSION_POSTS'), 'posts.delete');
			JToolBarHelper::preferences('com_salary');
		}
	}
}
