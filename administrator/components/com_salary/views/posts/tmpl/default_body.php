<?php
// Запрет прямого доступа.
defined('_JEXEC') or die;
foreach ($this->items as $i => $post) :?>
    <tr class="row0">
        <td class="center">
            <?php echo JHtml::_('grid.id', $i, $post['id']); ?>
        </td>
        <td>
            <?php echo $post['id']; ?>
        </td>
        <td>
            <?php $link = JRoute::_('index.php?option=com_salary&view=post&layout=edit&id='.$post->id);
            echo JHtml::link($link, $post['title']);
            ?>
        </td>
        <td>
            <?php echo $post['salary']; ?>
        </td>
    </tr>
<?php endforeach; ?>