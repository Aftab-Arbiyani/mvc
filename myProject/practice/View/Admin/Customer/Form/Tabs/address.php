<?php $shipping = $this->getAddress(); ?>
<?php $billing = $this->getBilling(); ?>


<table>
    <tr style='text-align: center;'>
        <th style=" background-color: white; color: black">Shipping Address</th>
    </tr>
    <tr>
        <td>Address</td>
        <td><input type="text" name='shipping[Address]' value='<?php echo $shipping->address; ?>'></td>
        <td>City</td>
        <td><input type="text" name='shipping[City]' value='<?php echo $shipping->city; ?>'></td>
    </tr>
    <tr>
        <td>State</td>
        <td><input type="text" name='shipping[State]' value='<?php echo $shipping->state; ?>'></td>
        <td>ZipCode</td>
        <td><input type='text' name='shipping[Zipcode]' value='<?php echo $shipping->zipcode; ?>'></td>
    </tr>
    <tr>
        <td>Country</td>
        <td><input type="text" name='shipping[Country]' value='<?php echo $shipping->country; ?>'></td>
    </tr>
    <tr style='text-align: center;'>
        <th style=" background-color: white; color: black">Billing Address</th>
    </tr>
    <tr>
        <td>Address</td>
        <td><input type="text" name='billing[Address]' value='<?php echo $billing->address; ?>'></td>
        <td>City</td>
        <td><input type="text" name='billing[City]' value='<?php echo $billing->city; ?>'></td>
    </tr>
    <tr> 
        <td>State</td>
        <td><input type="text" name='billing[State]' value='<?php echo $billing->state; ?>'></td>
        <td>ZipCode</td>
        <td><input type='text' name='billing[Zipcode]' value='<?php echo $billing->zipcode; ?>'></td>
    </tr>
    <tr>
        <td>Country</td>
        <td><input type="text" name='billing[Country]' value='<?php echo $billing->country; ?>'></td>
    </tr>
    <tr> 
        <td colspan="4" style="text-align: right;"><input type="button" name="" value="SUBMIT" onclick="mage.setForm(this).setUrl('<?php echo $this->getUrl()->geturl('address', 'admin_customer'); ?>').load()" class='btn btn-primary'></td>
    </tr>
</table>

