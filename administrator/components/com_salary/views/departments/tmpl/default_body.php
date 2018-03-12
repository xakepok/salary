<?php
// Запрет прямого доступа.
defined('_JEXEC') or die;
foreach ($this->items as $i => $dep) :?>
    <tr class="row0">
        <td class="center">
            <?php echo JHtml::_('grid.id', $i, $dep->id); ?>
        </td>
        <td>
            <?php echo $dep->id; ?>
        </td>
        <td>
            <?php $link = JRoute::_('index.php?option=com_salary&view=department&layout=edit&id='.$dep->id);
            echo JHtml::link($link, $dep->title);
            ?>
        </td>
    </tr>
<?php endforeach; ?>