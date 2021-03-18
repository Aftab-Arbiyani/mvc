<?php $attribute = $this->getTableRow(); ?>

<table>
    <tr>
        <td>Entity Type Id</td>    
        <td>
            <select name="attribute[entityTypeId]" id="" style="padding: 10px; width: 100%">
                <?php foreach ($attribute->getEntityTypeOptions() as $key => $value): ?>
                    <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                <?php endforeach; ?>
            </select>
        </td>
        <td>Name</td>
        <td><input type="text" name="attribute[name]" value="<?php echo $attribute->name; ?>"></td>
    </tr>
    <tr>
        <td>Code</td>
        <td><input type="text" name="attribute[code]" value="<?php echo $attribute->code; ?>"></td>
        <td>Back End Type</td>
        <td>
            <select name="attribute[backendType]" id="" style="padding: 10px; width: 100%">
                <?php foreach ($attribute->getBackendTypeOptions() as $key => $value): ?>
                    <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                <?php endforeach; ?>
            </select>
        </td>
    </tr>
    <tr>
        <td>Input Type</td>
        <td>
            <select name="attribute[inputType]" id="" style="padding: 10px; width: 100%">
                <?php foreach ($attribute->getInputTypeOptions() as $key => $value): ?>
                    <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                <?php endforeach; ?>
            </select>
        </td>
        <td>Sort Order</td>
        <td><input type="text" name="attribute[sortOrder]" value="<?php echo $attribute->sortOrder; ?>"></td>
    </tr>
    <tr>
        <td>Back End Model</td>
        <td><input type="text" name="attribute[backendModel]" value="<?php echo $attribute->backendModel; ?>"></td>
    </tr>
    <tr>
        <td colspan="4" style="text-align: right;"><input type="button" name="" value="SUBMIT" onclick="mage.setForm(this).load()" class='btn btn-primary'></td>
    </tr>
</table>