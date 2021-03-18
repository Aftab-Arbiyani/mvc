<?php
$shipping = $this->getTableRow();
?>

 
<table>
    <tr>
        <td>Name</td>
        <td><input type="text" name="shipping[Name]" value="<?php echo $shipping->Name; ?>"></td>
        <td>Code</td>
        <td><input type="text" name="shipping[Code]" value="<?php echo $shipping->Code; ?>" required></td>
    </tr>
    <tr>
        <td>Amount</td>
        <td><input type="text" name="shipping[Amount]" value="<?php echo $shipping->Amount; ?>" required></td>
        <td>Description</td>
        <td><input type="text" name="shipping[Description]" value="<?php echo $shipping->Description; ?>" required></td>
    </tr>
    <tr>
        <td>Status</td>
        <td>
            <select name="shipping[status]" id="" style="padding: 10px; width: 100%">
            <?php
                $shipping->getStatusOptions();
                foreach($shipping->getStatusOptions() as $key => $value){ ?>
                <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
            <?php } ?>
        </td>
    </tr>
    <tr>
        <br>
        <td colspan="4" style="text-align: right;"><input type="button" name="" value="SUBMIT" onclick="mage.setForm(this).load()" class='btn btn-primary'></td>
    </tr>
</table>