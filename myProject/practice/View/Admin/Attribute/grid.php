<?php $attributes = $this->getAttributes(); ?>

<input type='button' style="width:200px" class="btn btn-primary" value='Add Attribute' onclick="mage.setUrl('<?php echo $this->getUrl()->geturl('form', null, null, true); ?>').load()">
<br><br>


<table style="border: 1px solid black; border-collapse:collapse; text-align: center;">
    <tr style="border: 1px solid black; border-collapse:collapse; text-align: center;">
        <th>Attribute Id</th>
        <th>Entity Type Id</th>
        <th>Name</th>
        <th>Code</th>
        <th>Input Type</th>
        <th>Back End Type</th>
        <th>Sort Order</th>
        <th>Back End Model</th>
        <th colspan='2'>Actions</th>
    </tr>
    <?php if(!$attributes): ?>
        <?php echo 'No Data Found'; ?>
    <?php else: ?>
        <?php foreach ($attributes->getData() as $key => $attribute): ?>
            <tr style="border: 1px solid black; border-collapse:collapse; text-align: center;">
                <td><?php echo $attribute->attributeId; ?></td>
                <td><?php echo $attribute->entityTypeId; ?></td>
                <td><?php echo $attribute->name; ?></td>
                <td><?php echo $attribute->code; ?></td>
                <td><?php echo $attribute->inputType; ?></td>
                <td><?php echo $attribute->backendType; ?></td>
                <td><?php echo $attribute->sortOrder; ?></td>
                <td><?php echo $attribute->backendModel; ?></td>
                <td><button onclick="mage.setUrl('<?php echo $this->getUrl()->geturl('form', null, ['id' => $attribute->attributeId], true) ?>'). removeParam().load()" class='btn btn-primary'>Edit</button></td>
                <td><button onclick="mage.setUrl('<?php echo $this->getUrl()->geturl('delete', null, ['id' => $attribute->attributeId], true) ?>').removeParam().load()" class='btn btn-danger'>Delete</button></td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
    
</table>