<div class="header">
    <h1>Website Name</h1>
</div >
<div class="topnav">
    <a onclick="mage.setUrl('<?php echo $this->getUrl()->geturl('grid', 'admin_customer'); ?>').load()" href="javascript:void(0);">Customer</a>
    <a onclick="mage.setUrl('<?php echo $this->getUrl()->geturl('grid', 'admin_category'); ?>').load()" href="javascript:void(0);">Category</a>
    <a onclick="mage.setUrl('<?php echo $this->getUrl()->geturl('grid', 'admin_product'); ?>').load()" href="javascript:void(0);">Product</a>
    <a onclick="mage.setUrl('<?php echo $this->getUrl()->geturl('grid', 'admin_payment'); ?>').load()" href="javascript:void(0);">Payment</a>
    <a onclick="mage.setUrl('<?php echo $this->getUrl()->geturl('grid', 'admin_shipping'); ?>').load()" href="javascript:void(0);">Shipping</a>
    <a onclick="mage.setUrl('<?php echo $this->getUrl()->geturl('grid', 'admin_admin'); ?>').load()" href="javascript:void(0);">Admin</a>
    <a onclick="mage.setUrl('<?php echo $this->getUrl()->geturl('grid', 'admin_cms'); ?>').load()" href="javascript:void(0);">CMS</a>
    <a onclick="mage.setUrl('<?php echo $this->getUrl()->geturl('grid', 'admin_customergroup'); ?>').load()" href="javascript:void(0);">Customer Group</a>
    <a onclick="mage.setUrl('<?php echo $this->getUrl()->geturl('grid', 'admin_attribute'); ?>').load()" href="javascript:void(0);">Attribute</a>
    <!-- <a href="logout.php" style="float: right">Log Out</a> -->
    <a onclick="mage.setUrl('<?php echo $this->getUrl()->geturl('grid', 'admin_dashboard'); ?>').load()" href="javascript:void(0);"style="float: right"><i class="fa fa-home" aria-hidden="false"></i>&nbsp; &nbsp;Home</a> 
</div><br><br>