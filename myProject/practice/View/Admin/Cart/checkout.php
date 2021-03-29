<?php $billingAddress = $this->getBillingAddress(); ?>
<?php $shippingAddress = $this->getShippingAddress(); ?>
<?php $customer = $this->getCart()->getCustomer(); ?>
<?php $paymentMethods = $this->getPaymentMethods(); ?>
<?php $shippingMethods = $this->getShippingMethods(); ?>
<?php $cart = $this->getCart(); ?>
<?php $items = $this->getCart()->getItems(); ?>

<form action="" method="post" enctype="multipart/form-data">
    <table>    
        <tr style='text-align: center;'>
            <th style=" background-color: white; color: black">Billing Address</th>
        </tr>
        <tr>
            <td>First Name</td>
            <td><input type="text" value="<?= $customer->firstName ?> "></td>
            <td>Last Name</td>
            <td><input type="text" value="<?= $customer->lastName ?> "></td>
        </tr>
        <tr>
            <td>Address</td>
            <td><input type="text" name='billing[Address]' value='<?php echo $billingAddress->address; ?>'></td>
            <td>City</td>
            <td><input type="text" name='billing[City]' value='<?php echo $billingAddress->city; ?>'></td>
        </tr>
        <tr> 
            <td>State</td>
            <td><input type="text" name='billing[State]' value='<?php echo $billingAddress->state; ?>'></td>
            <td>ZipCode</td>
            <td><input type='text' name='billing[Zipcode]' value='<?php echo $billingAddress->zipcode; ?>'></td>
        </tr>
        <tr>
            <td>Country</td>
            <td><input type="text" name='billing[Country]' value='<?php echo $billingAddress->country; ?>'></td>
        </tr>
        <tr> 
            <td><input type="checkbox" name="saveBilling" value="<?php echo $billingAddress->addressId ?>"></td>
            <td>Save to address book</td>
            <td colspan="2" style="text-align: center;"><input type="button" onclick="mage.setForm(this).setUrl('<?php echo $this->getUrl()->geturl('saveBillingAddress', 'admin_checkout') ?>').load()" value="SUBMIT" onclick="" class='btn btn-primary' style="width:50%"></td>
        </tr>
        <tr style='text-align: center;'>
            <th style=" background-color: white; color: black">Shipping Address</th>
        </tr>
        <tr>
            <td><input type="checkbox" name="sameAsBilling" value="<?php echo $billingAddress->addressId ?>" <?php if($billingAddress->addressId): ?> checked <?php endif; ?>></td>
            <td>Same as billing</td>
        </tr>
        <tr>
            <td>First Name</td>
            <td><input type="text" value="<?= $customer->firstName ?> "></td>
            <td>Last Name</td>
            <td><input type="text" value="<?= $customer->lastName ?> "></td>
        </tr>
        <tr>
            <td>Address</td>
            <td><input type="text" name='shipping[Address]' value='<?php echo $shippingAddress->address; ?>'></td>
            <td>City</td>
            <td><input type="text" name='shipping[City]' value='<?php echo $shippingAddress->city; ?>'></td>
        </tr>
        <tr>
            <td>State</td>
            <td><input type="text" name='shipping[State]' value='<?php echo $shippingAddress->state; ?>'></td>
            <td>ZipCode</td>
            <td><input type='text' name='shipping[Zipcode]' value='<?php echo $shippingAddress->zipcode; ?>'></td>
        </tr>
        <tr>
            <td>Country</td>
            <td><input type="text" name='shipping[Country]' value='<?php echo $shippingAddress->country; ?>'></td>
        </tr>
        <tr> 
            <td><input type="checkbox" name="saveShipping" value="<?php echo $shippingAddress->addressId ?>"></td>
            <td>Save to address book</td>
            <td colspan="2" style="text-align: center;"><input type="button" name="" value="SUBMIT" onclick="mage.setForm(this).setUrl('<?php echo $this->getUrl()->geturl('saveShippingAddress', 'admin_checkout'); ?>').load()" class='btn btn-primary' style="width:50%"></td>
        </tr>
    </table>

    <table style="border: 1px solid black; float:left;   margin-left: 200px">
        <tr style="border: 1px solid black;">
            <th colspan="2">Payment Method</th>
        </tr>
        <tr style="border: 1px solid black;">
            <td>Select</td>
            <td>Name</td>
        </tr>
        <?php foreach ($paymentMethods as $methodId => $Name): ?>
            <tr style="border: 1px solid black;">
                <td><input type="radio" name="paymentMethod[paymentMethodId]" value="<?= $methodId ?>" <?php if($methodId == $cart->paymentMethodId): ?> checked <?php endif; ?>></td>
                <td><?= $Name ?></td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="2" style="text-align: left;"><input type="button" name="" value="SUBMIT" onclick="mage.setForm(this).setUrl('<?php echo $this->getUrl()->geturl('savePaymentMethod', 'admin_checkout'); ?>').load()" class='btn btn-primary' style="width:50%"></td>
        </tr>
    </table><br><br>
    <table style="float: right; margin-right: 200px">
        <tr style="border: 1px solid black;">
            <th colspan="3">Shipping Methods</th>
        </tr>
        <tr style="border: 1px solid black;">
            <td>Select</td>
            <td>Name</td>
            <td>Amount</td>
        </tr>
        <?php foreach ($shippingMethods->getData() as $shippingMethod): ?>
            <tr style="border: 1px solid black;">
                <td><input type="radio" name="shippingMethod[shippingMethodId]" value="<?= $shippingMethod->methodId ?>" <?php if($shippingMethod->methodId == $cart->shippingMethodId): ?> checked <?php endif; ?>></td>
                <td><?= $shippingMethod->Name ?></td>
                <td><?= $shippingMethod->Amount ?></td>
            </tr>
        <?php endforeach; ?>
        <tr style="border: 1px solid black;">
            <td colspan="3" style="text-align: left;"><input type="button" name="" value="SUBMIT" onclick="mage.setForm(this).setUrl('<?php echo $this->getUrl()->geturl('saveShippingMethod', 'admin_checkout'); ?>').load()" class='btn btn-primary' style="width:50%"></td>
        </tr>
    </table>
        <br><br>

    <table style="border: 1px solid black; float: right;">
        <tr style="border: 1px solid black;">
            <td>Base Total</td>
            <td><?= $this->getTotal() ?></td>
        </tr>
        <tr style="border: 1px solid black;">
            <td>Shipping Charges</td>
            <td><?= $cart->shippingAmount ?></td>
        </tr>
        <tr style="border: 1px solid black;">
            <td>Grand Total</td>
            <td><?= $this->getTotal() + $cart->shippingAmount ?></td>
        </tr>
    </table>
</form>