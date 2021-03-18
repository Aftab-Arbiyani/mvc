<?php  $payments = $this->getPayments(); ?>

<input type='button' style="width:200px" class="btn btn-primary" value='Add Payment' onclick="mage.setUrl('<?php echo $this->getUrl()->geturl('form', null, null, true); ?>').load()">
<br><br>

<table style="border: 1px solid black; border-collapse:collapse; text-align: center;">

    <tr style="border: 1px solid black; border-collapse:collapse;">
        <th>Method Id</th>
        <th>Name</th>
        <th>Code</th>
        <th>Description</th>
        <th>Status</th>
        <th>Created Date</th>
        <th colspan="2">Actions</th>
    </tr>
    <?php if(!$payments): ?>
        <?php echo 'No Data Found'; ?>
    <?php else: ?>
        <?php foreach($payments->getData() as $value): ?>
            <tr style="border: 1px solid black; border-collapse:collapse; text-align: left;">
                <td> <?php echo $value->methodId; ?> </td>
                <td> <?php echo $value->Name; ?> </td>
                <td> <?php echo $value->Code; ?> </td>
                <td> <?php echo $value->Description; ?> </td>
                <td> <?php echo $value->Status; ?> </td>
                <td> <?php echo $value->createdDate; ?> </td>
                <td><button onclick="mage.setUrl('<?php echo $this->getUrl()->geturl('form', null, ['id' => $value->methodId], true) ?>').removeParam().load()" class='btn btn-primary'>Edit</button></td>
                <td><button onclick="mage.setUrl('<?php echo $this->getUrl()->geturl('delete', null, ['id' => $value->methodId], true) ?>').removeParam().load()" class='btn btn-danger'>Delete</button></td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
</table>
