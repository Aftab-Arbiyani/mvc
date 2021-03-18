<?php $attributes = $this->getAttributes(); ?>

<table>
    <?php foreach ($attributes->getData() as $att => $attribute): ?>

        
        <tr>
            <td><?php echo $attribute->name; ?></td>
            <td>
                <?php if($attribute->inputType != 'select' && $attribute->inputType != 'multiselect'): ?>
                    <?php foreach ($this->getOptions($attribute->attributeId)->getData() as $key => $value): ?>
                        <input name="product[<?php echo $attribute->code; ?>]" type="<?php echo $attribute->inputType; ?>" value="<?php echo $value->name; ?>">
                    <?php endforeach; ?>
                <?php else: ?>
                    <select name="product[<?php echo $attribute->code; ?>]" id="" <?php if($attribute->inputType == 'multiselect'): ?> multiple <?php endif; ?> style="padding: 10px; width: 100%">
                        <?php foreach ($this->getAttrOptions($attribute->attributeId) as $key => $value): ?>
                            <option value="<?php echo $key ?>"><?php echo $value; ?></option>
                        <?php endforeach; ?>
                    </select>
                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; ?>
    <tr>
        <td><input type="button" value="Save" onclick="mage.setForm(this).setUrl('<?php echo $this->getUrl()->geturl('attribute', 'admin_product'); ?>').load()" class='btn btn-primary' style="padding: 10px; width: 100%"></td>
    </tr>
</table>    