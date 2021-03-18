<?php $category = $this->getCategory(); ?> 


<input type='button' value='Add Category' style="width:200px" class="btn btn-primary" onclick="mage.setUrl('<?php echo $this->getUrl()->geturl('form', null, null, true); ?>').load()">
<br><br>


<table style="border: 1px solid black; border-collapse:collapse; text-align: center; width: 60%">

    <tr style="border: 1px solid black; border-collapse:collapse;">
        <th>ID</th>
        <th>Name</th>
        <th>Status</th>
        <th>Description</th>
        <th colspan="2">Action</th>
    </tr>
    <?php if(!$category): ?>
        <?php echo 'No Data Found'; ?>
    <?php else: ?>
        <?php foreach($category->getData() as $value): ?>
            <tr style="border: 1px solid black; border-collapse:collapse; text-align: left;">
                <td> <?php echo $value->categoryId; ?> </td>
                <td><?php  echo $this->getName($value); ?></td>
                <td> <?php echo $value->status; ?> </td>
                <td> <?php echo $value->description; ?> </td>
                <td><button onclick="mage.setUrl('<?php echo $this->getUrl()->geturl('form', null, ['id' => $value->categoryId], true); ?>').removeParam().load()" class='btn btn-primary'>Edit</button></td>
                <td><button onclick="mage.setUrl('<?php echo $this->getUrl()->geturl('delete', null, ['id' => $value->categoryId], true); ?>').removeParam().load()" class='btn btn-danger'>Delete</button></td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
</table>