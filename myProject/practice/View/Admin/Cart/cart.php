<?php $cartItems = $this->getCart()->getItems(); ?>
<?php $cart = $this->getCart(); ?>
<?php $customers = $this->getCustomers(); ?>

    <div class="container mt-2">
        <div class="row">
            <div class="col-12">
                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="button" value="Update Cart" class="btn btn-primary" style="width:200px" onclick="mage.setForm(this).setUrl('<?php echo $this->getUrl()->geturl('update', 'admin_cart'); ?>').load()">
                    <div class="row mt-3"> 
                        <div class="col-12">
                            <select name="customer[customerId]" id="" style="width: 200px; padding: 10px; margin-left: 50px">
                                <?php foreach ($customers as $customerId => $firstName): ?>
                                    <option value="<?= $customerId ?>" <?php if($customerId == $cart->customerId):  ?>selected <?php endif; ?>><?= $firstName ?></option>
                                <?php endforeach; ?>
                            </select>
                            <input type="button" value="Go" class="btn btn-primary" style="width:100px" onclick="mage.setForm(this).setUrl('<?php echo $this->getUrl()->geturl('selectCustomer', 'admin_cart'); ?>').load()"><br><br>
                            <table class="table table-striped">
                                <thead class="thead-dark" style="width: 100%">
                                    <tr>
                                        <th>Cart Id</th>
                                        <th>Product Id</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Row Total</th>
                                        <th>Discount</th>
                                        <th>Final Total</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php if (!$cartItems): ?>
                                    <tr>
                                        <td colspan="7">No data</td>
                                    </tr>
                                <?php else: ?>
                                    <?php foreach ($cartItems->getData() as $key => $item): ?>
                                        <tr>
                                            <td><?php echo $item->cartId; ?></td>
                                            <td><?php echo $item->productId; ?></td>
                                            <td><?php echo $item->price; ?></td>
                                            <td><input type="number" name="quantity[<?php echo $item->cartItemId; ?>]" value="<?php echo $item->quantity; ?>"></td>
                                            <td><?php echo ($item->price * $item->quantity); ?></td>
                                            <td><?php echo ($item->discount * $item->quantity); ?></td>
                                            <td><?php echo ($item->price * $item->quantity - $item->discount * $item->quantity) ?></td>
                                            <td><input type="button" value="Remove from cart" onclick="mage.setUrl('<?php echo $this->getUrl()->geturl('delete', 'admin_cart', ['id' => $item->cartItemId]); ?>').load()" width="15px" class="btn btn-danger"></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <input type="button" value="Checkout" class="btn btn-primary" style="width:200px" onclick="mage.setUrl('<?php echo $this->getUrl()->geturl('checkout', 'admin_checkout'); ?>').load()">
                </form>
            </div>
        </div>
    </div>