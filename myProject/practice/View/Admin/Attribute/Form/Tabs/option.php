<?php $options = $this->getOptions(); ?>

<input type="button" value="Update" style= "width: 10%; margin-left: 500px" onclick="mage.setForm(this).setUrl('<?php echo $this->getUrl()->geturl('option', 'admin_attribute'); ?>').load()" class='btn btn-primary'>
<input type="button" value="Add Option" style= "width: 10%" onclick="addOption()" class='btn btn-primary'>
<br><br>

<table id="existingOption">
    <tbody id="tBody1">
        <?php if($options): ?>
            <?php foreach ($options->getData() as $key => $option): ?>
                <tr>
                    <td><input type="text" name="exist[<?php echo $option->optionId; ?>][name]" value="<?php echo $option->name; ?>"></td>
                    <td><input type="text" name="exist[<?php echo $option->optionId; ?>][sortOrder]" value="<?php echo $option->sortOrder; ?>"></td>
                    <td><input type="button" value="Remove" onclick="removeOption(this);" style="width:100%" class='btn btn-primary'></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>


<div style="display: none">
    <table id="newOption">
        <tbody id="tBody2">
            <tr>
                <td><input type="text" name="name[new][]"></td>
                <td><input type="text" name="sortOrder[new][]"></td>
                <td><input type="button" name="removeOption[new][]" value="Remove Option" onclick="removeOption(this);" class='btn btn-primary'></td>
            </tr>
        </tbody>
    </table>
</div>

<script type='text/javascript'>

    function addOption()
    {
        var row = document.getElementById('tBody2').children[0].cloneNode(true);
        $('#tBody1').prepend(row);
    }
    function removeOption(button)
    {
        var ObjTr = $(button).closest('tr');
        ObjTr.remove();
    }
</script>