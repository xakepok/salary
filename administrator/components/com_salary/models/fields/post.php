<?php
defined('_JEXEC') or die;
jimport('joomla.form.helper');
JFormHelper::loadFieldClass('list');

class JFormFieldPost extends JFormFieldList  {
    protected  $type = 'Post';

    protected function getOptions()
    {
        $db = JFactory::getDbo();
        $query = $db->getQuery(true);
        $query
            ->select('id, title')
            ->from("#__slr_posts")
            ->order('title');
        $db->setQuery($query);
        $posts = $db->loadObjectList();

        $options = array();

        if ($posts) {
            foreach ($posts as $post) {
                $options[] = JHtml::_('select.option', $post->id, $post->title);
            }
        }

        $options = array_merge(parent::getOptions(), $options);

        return $options;
    }
}