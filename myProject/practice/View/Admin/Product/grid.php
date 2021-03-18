 <?php  
    $products = $this->getProducts();
?>

<input type='button' style="width:200px" class="btn btn-primary" value='Add Product' onclick="mage.setUrl('<?php echo $this->getUrl()->geturl('form', null, null, true); ?>').load()">
<br><br>


<table style="border: 1px solid black; border-collapse:collapse;">

    <tr style="border: 1px solid black; border-collapse:collapse; text-align: center;">
        <th>ID</th>
        <th>Sku</th>
        <th>Name</th>
        <th>Price</th>
        <th>Discount</th>
        <th>Quantity</th> 
        <th>Description</th>
        <th>Status</th>
        <th>Created Date</th>
        <th>Updated Date</th>
        <th colspan="2">Actions</th>
    </tr>
    <?php if(!$products): ?>
        <?php echo 'No Data Found'; ?>
    <?php else: ?>
        <?php foreach($products->getData() as $value): ?>
            <tr style="border: 1px solid black; border-collapse:collapse; text-align: left;">
                <td> <?php echo $value->productId; ?> </td>
                <td> <?php echo $value->sku; ?> </td>
                <td> <?php echo $value->name; ?> </td>
                <td> <?php echo $value->price; ?> </td>
                <td> <?php echo $value->discount; ?> </td>
                <td> <?php echo $value->quantity; ?> </td>
                <td> <?php echo $value->description; ?> </td>
                <td> <?php echo $value->status; ?> </td>
                <td> <?php echo $value->createdDate; ?> </td>
                <td> <?php echo $value->updatedDate; ?> </td>
                <td><button onclick="mage.setUrl('<?php echo $this->getUrl()->geturl('form', null, ['id' => $value->productId], true); ?>').removeParam().load()" class='btn btn-primary'>Edit</button></td>
                <td><button onclick="mage.setUrl('<?php echo $this->getUrl()->geturl('delete', null, ['id' => $value->productId], true); ?>').removeParam().load()" class='btn btn-danger'>Delete</button></td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
</table>