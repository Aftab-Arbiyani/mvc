<?php $payment = $this->getTableRow(); ?>

<table> 
    <tr>
        <td>Name</td>
        <td><input type="text" name="payment[Name]" value="<?php echo $payment->Name; ?>"></td>
        <td>Code</td>
        <td><input type="text" name="payment[Code]" value="<?php echo $payment->Code; ?>" required></td>
    </tr>
    <tr>
        <td>Status</td>
            <td>
                <select name="payment[status]" id="" style="padding: 10px; width: 100%">
                <?php
                    $payment->getStatusOptions();
                    foreach($payment->getStatusOptions() as $key => $value){ ?>
                    <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                <?php } ?>
            </td>
        <td>Description</td>
        <td><input type="text" name="payment[Description]" value="<?php echo $payment->Description; ?>" required></td>
    </tr>
    <tr>
        
    </tr>
    <tr>
        <br>
        <td colspan="4" style="text-align: right;"><input type="button" name="" value="SUBMIT" onclick="mage.setForm(this).load()" class='btn btn-primary'></td>
    </tr>
</table>