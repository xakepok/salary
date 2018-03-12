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
            <?php echo $post['dep']; ?>
        </td>
        <td>
            <?php echo $post['post']; ?>
        </td>
        <td>
            <?php echo $post['fio']; ?>
        </td>
        <td>
            <?php echo $post['ds']; ?>
        </td>
        <td>
            <?php echo $post['de']; ?>
        </td>
        <td>
            <?php echo $post['wage']; ?>
        </td>
    </tr>
<?php endforeach; ?>