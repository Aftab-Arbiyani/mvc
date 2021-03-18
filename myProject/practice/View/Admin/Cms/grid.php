<?php $cms = $this->getCms(); ?>

<input type='button' value='Add Cms' style="width:200px" class="btn btn-primary" onclick="mage.setUrl('<?php echo $this->getUrl()->geturl('form', null, null, true); ?>').load()">
<br><br>

<table style="border: 1px solid black; border-collapse:collapse;">

    <tr style="border: 1px solid black; border-collapse:collapse; text-align: center;">
        <th>ID</th>
        <th>title</th>
        <th>Identifier</th>
        <th>Content</th>
        <th>Status</th>
        <th>Created Date</th>
        <th colspan='2'>Actions</th>
    </tr>
    <?php if(!$cms): ?>
        <?php echo 'No Data Found'; ?>
    <?php else: ?>
        <?php foreach ($cms->getData() as $value): ?>
            <tr>
                <td><?php echo $value->pageId; ?></td>
                <td><?php echo $value->title; ?></td>
                <td><?php echo $value->identifier; ?></td>
                <td><?php echo $value->content; ?></td>
                <td><?php echo $value->status; ?></td>
                <td><?php echo $value->createdDate; ?></td>
                <td><button onclick="mage.setUrl('<?php echo $this->getUrl()->geturl('form', null, ['id' => $value->pageId], true); ?>').removeParam().load()" class='btn btn-primary'>Edit</button></td>
                <td><button onclick="mage.setUrl('<?php echo $this->getUrl()->geturl('delete', null, ['id' => $value->pageId], true); ?>').removeParam().load()" class='btn btn-danger'>Delete</button></td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
</table>