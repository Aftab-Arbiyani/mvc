<table>
    <tr>
        <td><?php $this->getTabHtml(); ?></td>
        <td>
        <form action="<?php echo $this->getFormUrl(); ?>" method="POST">
            <?php $this->getTabContent(); ?>
        </form>
        </td>
    </tr>
</table>