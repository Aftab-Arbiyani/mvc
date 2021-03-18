<?php $admin = $this->getTableRow(); ?>    


<table>
    <tr>
        <td>User Name</td>
        <td><input type="text" name='admin[userName]' value="<?php echo $admin->userName; ?>"></td>
        <td>Status</td>
        <td>
        <select name="admin[status]" id="" style="padding: 10px; width: 100%">
            <?php
                foreach($admin->getStatusOptions() as $key => $value){ ?>
                <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
            <?php } ?>
            </select>
        </td>
    </tr>
    <tr>
        <td>Password</td>
        <td><input type="password" name="admin[password]" value="<?php echo $admin->password; ?>"></td>
    </tr>
    <tr>
        <td colspan="4" style="text-align: right;"><input type="button" name="" value="SUBMIT" onclick="mage.setForm(this).load()" class='btn btn-primary'></td>
    </tr>
</table>