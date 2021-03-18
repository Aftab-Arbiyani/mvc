<?php $customerGroup = $this->getTableRow(); ?>


<form id='form' action="<?php echo $this->getFormUrl(); ?>" method="post">
    <table>
        <tr>
            <td>Name</td>
            <td><input type="text" name='customerGroup[name]' value='<?php echo $customerGroup->name; ?>'></td>
            <td>Status</td>
            <td>
                <select name="customerGroup[status]" id="" style="padding: 10px; width: 200%">
                <?php
                    foreach($customerGroup->getStatusOptions() as $key => $value): ?>
                    <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                    <?php endforeach; ?>
                </select>
            </td>
        </tr>
        <tr>
            <br>
            <td colspan="4" style="text-align: right;"><input type="button" name="" value="SUBMIT" onclick="mage.setForm(this).load()" class='btn btn-primary'></td>
        </tr>
    </table>
</form>

