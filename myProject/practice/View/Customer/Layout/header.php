<div class="header">
    <h1>Website Name</h1>
</div >
<div class="topnav">
    <a onclick="mage.setUrl('<?php echo $this->getUrl()->geturl('grid', 'customercustomer'); ?>').load()" href="javascript:void(0);">Customer</a>
    <a onclick="mage.setUrl('<?php echo $this->getUrl()->geturl('grid', 'customercategory'); ?>').load()" href="javascript:void(0);">Category</a>
    <a onclick="mage.setUrl('<?php echo $this->getUrl()->geturl('grid', 'customerproduct'); ?>').load()" href="javascript:void(0);">Product</a>
    <a onclick="mage.setUrl('<?php echo $this->getUrl()->geturl('grid', 'customerpayment'); ?>').load()" href="javascript:void(0);">Payment</a>
    <a onclick="mage.setUrl('<?php echo $this->getUrl()->geturl('grid', 'customershipping'); ?>').load()" href="javascript:void(0);">Shipping</a>
    <a onclick="mage.setUrl('<?php echo $this->getUrl()->geturl('grid', 'customeradmin'); ?>').load()" href="javascript:void(0);">Admin</a>
    <a onclick="mage.setUrl('<?php echo $this->getUrl()->geturl('grid', 'customercms'); ?>').load()" href="javascript:void(0);">CMS</a>
    <a onclick="mage.setUrl('<?php echo $this->getUrl()->geturl('grid', 'customercustomergroup'); ?>').load()" href="javascript:void(0);">Customer Group</a>
    <a onclick="mage.setUrl('<?php echo $this->getUrl()->geturl('grid', 'customerattribute'); ?>').load()" href="javascript:void(0);">Attribute</a>
    <!-- <a href="logout.php" style="float: right">Log Out</a> -->
    <a onclick="mage.setUrl('<?php echo $this->getUrl()->geturl('index', 'dashboard'); ?>').load()" href="javascript:void(0);"style="float: right"><i class="fa fa-home" aria-hidden="false"></i>&nbsp; &nbsp;Home</a> 
</div><br><br>
