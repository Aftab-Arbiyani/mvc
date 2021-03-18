<?php $customerGroups = $this->getCustomerGroup(); ?>

<input type="button" value="Update" style=" width: 10%; margin-left: 500px" onclick="mage.setForm(this).setUrl('<?php echo $this->getUrl()->geturl('save', 'admin_product_price'); ?>').load()" class='btn btn-primary'>
<br><br>

<table style="border: 1px solid black; border-collapse:collapse;">
    <tr style="border: 1px solid black; border-collapse:collapse;">
        <th>Group Id</th>
        <th>Group Name</th>
        <th>Price</th>
        <th>Group Price</th>
    </tr>
        <?php foreach ($customerGroups->getData() as $key => $value): ?>
            <?php $rowStatus = $value->entityId ? 'exist':'new' ?>
            <tr style="border: 1px solid black; border-collapse:collapse;">
                <td><?php echo $value->groupId; ?></td>
                <td><?php echo $value->name; ?></td>
                <td><?php echo $value->price; ?></td>
                <td><input type="text" name="groupPrice[<?php echo $rowStatus; ?>][<?php echo $value->groupId; ?>]" value="<?php echo $value->groupPrice; ?>"></td>
            </tr>
        <?php endforeach; ?>
</table>