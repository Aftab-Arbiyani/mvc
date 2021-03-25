<?php $product = $this->getTableRow(); ?>
<?php $categoryOptions = $this->getCategoryOptions(); ?>
<?php $brandOptions = $this->getBrandOptions(); ?>

<table>
    <tr>
        <td>Sku</td>
        <td><input type="text" name="product[sku]" value="<?php echo $product->sku; ?>"></td>
        <td>Name</td>
        <td><input type="text" name="product[name]" value="<?php echo $product->name; ?>"></td>
    </tr>
    <tr>
        <td>Price</td>
        <td><input type="number" name="product[price]" value="<?php echo $product->price; ?>"></td>
        <td>Description</td>
        <td><input type="text" name="product[description]" value="<?php echo $product->description; ?>"></td>
    </tr>
    <tr>
        <td>Quantity</td>
        <td><input type="number" name="product[quantity]" value="<?php echo $product->quantity; ?>"></td>
        <td >Discount</td>
        <td  ><input type="number" name=" product[discount]" value="<?php echo $product->discount; ?>" ></td>
    </tr>
    <tr>
        <td>Status</td>
        <td>
        <select name="product[status]" id="" style="padding: 10px; width: 100%">
            <?php
                foreach($product->getStatusOptions() as $key => $value){ ?>
                <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
            <?php } ?>
        </select>
        </td>
        <td>Category</td>
        <td>
            <select name="category[categoryId]" id="" style="padding: 10px; width: 100%" multiple>
                <?php if($categoryOptions): ?>
                    <?php foreach ($categoryOptions as $categoryId => $name): ?>
                        <option value="<?php echo $categoryId; ?>"><?php echo $name; ?></option>
                    <?php endforeach; ?>
                <?php endif; ?>
            </select>
        </td>
    </tr>
    <tr>
        <td>Brand</td>
        <td>
            <select name="category[brandId]" id="" style="padding: 10px; width: 100%">
                <?php if($brandOptions): ?>
                    <?php foreach ($brandOptions as $brandId => $name): ?>
                        <option value="<?php echo $brandId; ?>"><?php echo $name; ?></option>
                    <?php endforeach; ?>
                <?php endif; ?>
            </select>
        </td>
    </tr>
    <tr>
        <br>
        <td colspan="4" style="text-align: right;"><input type="button" name="" value="SUBMIT" onclick="mage.setForm(this).load()" class='btn btn-primary'></td>
    </tr>
</table>