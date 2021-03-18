<?php

$admin = $this->getAdmin();

?>

<input type='button' style="width:200px" class="btn btn-primary" value='Add Admin' onclick="mage.setUrl('<?php echo $this->getUrl()->geturl('form', null, null, true); ?>').load()">
<br><br>
<table style="border: 1px solid black; border-collapse:collapse; text-align: center;">

    <tr style="border: 1px solid black; border-collapse:collapse;">
        <th>ID</th>
        <th>User Name</th>
        <th>Status</th>
        <th>Created Date</th>
        <th colspan="2">Action</th>
    </tr>
    <?php if(!$admin): ?>
        <?php echo 'No Data Found'; ?>
    <?php else: ?>
        <?php  foreach ($admin->getData() as $value): ?>
            <tr style="border: 1px solid black; border-collapse:collapse; text-align: left;">
                <td> <?php echo $value->adminId; ?> </td>
                <td> <?php echo $value->userName; ?> </td>
                <td> <?php echo $value->status; ?> </td>
                <td> <?php echo $value->createdDate; ?> </td>
                <td><button onclick="mage.setUrl('<?php echo $this->getUrl()->geturl('form', null, ['id' => $value->adminId], true); ?>').removeParam().load()" class='btn btn-primary'>Edit</button></td>
                <td><button onclick="mage.setUrl('<?php echo $this->getUrl()->geturl('delete', null, ['id' => $value->adminId], true); ?>').removeParam().load()" class='btn btn-danger'>Delete</button></td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
</table>