<?php $customers = $this->getCustomers(); ?>


<input type='button' value='Add Customer' style="width:200px" class="btn btn-primary" onclick="mage.setUrl('<?php echo $this->getUrl()->geturl('form', null, null, true); ?>').load()">
<br><br>    

<table style="border: 1px solid black; border-collapse:collapse;">

    <tr style="border: 1px solid black; border-collapse:collapse; text-align: center;">
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Billing Zipcode</th>
        <th>Customer Group</th>
        <th>Status</th>
        <th>Created Date</th>
        <th>Updated Date</th>
        <th colspan="2">Actions</th>
    </tr>
    <?php if(!$customers): ?>
        <?php echo 'No Data Found'; ?>
    <?php else: ?>
        <?php foreach($customers->getData() as $value): ?>
            <tr style="border: 1px solid black; border-collapse:collapse; text-align:left;">
                <td> <?php echo $value->customerId; ?> </td>
                <td> <?php echo $value->firstName; ?> </td>
                <td> <?php echo $value->lastName; ?> </td>
                <td> <?php echo $value->email; ?> </td>
                <td><?php echo $value->Zipcode; ?></td>
                <td><?php echo $value->name; ?></td>
                <td> <?php echo $value->status; ?> </td>
                <td> <?php echo $value->createdDate; ?> </td>
                <td> <?php echo $value->updatedDate; ?> </td>
                <td> <button onclick="mage.setUrl('<?php echo $this->getUrl()->geturl('form', null, ['id' => $value->customerId], true); ?>').removeParam().load()" class='btn btn-primary'><i class='fa fa-pencil' aria-hidden='false'></i>Edit</button></td>
                <td> <button onclick="mage.setUrl('<?php echo $this->getUrl()->geturl('delete', null, ['id' => $value->customerId], true); ?>').removeParam().load()" class='btn btn-danger'>Delete</button></td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
</table> 

