<?php $customerGroup = $this->getCustomerGroup(); ?>


<input type='button' style="width:200px" class="btn btn-primary" value='Add Customer Group' onclick="mage.setUrl('<?php echo $this->getUrl()->geturl('form', null, null, true); ?>').load()">
<br><br>


<table style="border: 1px solid black; border-collapse:collapse;">
    <tr style="border: 1px solid black; border-collapse:collapse;">
        <th>ID</th>
        <th>Name</th>
        <th>Status</th>
        <th>Created Date</th>
        <th colspan='2'>Actions</th>
    </tr>
    <?php if(!$customerGroup): ?>
        <?php echo 'No Data Found'; ?>
    <?php else: ?>
        <?php foreach ($customerGroup->getData() as $value): ?>
            <tr style="border: 1px solid black; border-collapse:collapse; text-align:left;">
                <td><?php echo $value->groupId; ?></td>
                <td><?php echo $value->name; ?></td>
                <td><?php echo $value->status; ?></td>
                <td><?php echo $value->createdDate; ?></td>
                <td><button onclick="mage.setUrl('<?php echo $this->getUrl()->geturl('form', null, ['id' => $value->groupId], true); ?>').removeParam().load()" class='btn btn-primary'>Edit</button></td>
                <td><button onclick="mage.setUrl('<?php echo $this->getUrl()->geturl('delete', null, ['id' => $value->groupId], true); ?>').removeParam().load()" class='btn btn-danger'>Delete</button></td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
</table>
