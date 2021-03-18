<?php $category = $this->getTableRow(); ?>    
<?php $categoryOptions = $this->getCategoryOptions(); ?>

<table>
    <tr>
        <td>Name</td>
        <td><input type="text" name='category[name]' value="<?php echo $category->name; ?>"></td>
        <td>Status</td>
        <td>
        <select name="category[status]" id="" style="padding: 10px; width: 100%">
            <?php
                foreach($category->getStatusOptions() as $key => $value){ ?>
                <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
            <?php } ?>
            </select>
        </td>
    </tr> 
    <tr>
        <td>Description</td>
        <td><input type="text" name="category[description]" value="<?php echo $category->description; ?>"></td>
        <td>Parent Category</td>
        <td>
            <select name="category[parentId]" id="" style="padding: 10px; width: 100%">
                    <option value=""></option>
            <?php if($categoryOptions): ?>
                <?php foreach ($categoryOptions as $categoryId => $name): ?>
                    <option value="<?php echo $categoryId; ?>" <?php if($categoryId == $category->parentId): ?> selected  <?php endif; ?>><?php echo $name; ?></option>
                <?php endforeach; ?>
            <?php endif; ?>
            
            </select>
        </td>
    </tr>
    <tr>
        <td colspan="4" style="text-align: right; width: 30%; align: right"><input type="button" name="" value="SUBMIT" onclick="mage.setForm(this).load()" class='btn btn-primary'></td>
    </tr>
 </table>

