<?php $customer = $this->getTableRow(); ?>
<?php $customerGroups = $this->getCustomerGroups(); ?>

<table> 
    <tr>
        <td>First Name</td>
        <td><input type="text" name='customer[firstName]' value="<?php echo $customer->firstName; ?>"></td>
        <td>Last Name</td>
        <td><input type="text" name="customer[lastName]" value="<?php echo $customer->lastName; ?>"></td>
        </td>
    </tr>
    <tr>
        <td>Email</td>
        <td><input type="email" name="customer[email]" value="<?php echo $customer->email; ?>"></td>
        <td>Password</td>
        <td><input type="password" name="customer[password]" value="<?php echo $customer->password; ?>"></td>
    </tr>
    <tr>
        <td>Status</td>
        <td>
            <select name="customer[status]" id="" style="padding: 10px; width: 100%">
            <?php
                foreach($customer->getStatusOptions() as $key => $value){ ?>
                <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
            <?php } ?>
        </td>
        <td>Mobile</td>
        <td><input type="tel" name="customer[mobile]" value="<?php echo $customer->mobile; ?>"></td>
    </tr>
    <tr>
        <td>Customer Group</td>
        <td>
            <select name="customer[groupId]" id="" style='padding: 10px; width: 100%;'>
                <?php
                    foreach ($customerGroups as $key => $value) { ?>
                        <option value="<?php echo $key ?>"><?php echo $value; ?></option>
                <?php } ?>
            </select>
        </td>
    </tr>
    <tr> 
    <td colspan="2"> <input type="button" value="CANCEL" onclick="mage.setUrl('<?php echo $this->getUrl()->geturl('grid', 'admin_customer') ?>').load();" style='width: 30%' class='btn btn-primary'></td>
    <td colspan="2" style=""><input type="button" name="" value="SUBMIT" onclick="mage.setForm(this).load()" style='width: 30%' class='btn btn-primary'></td>
    </tr>
</table>
