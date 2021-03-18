<?php $image = $this->getImage(); ?>

<input type="button" value="Remove" style="float: right; width: 10%" onclick="mage.setForm(this).setUrl('<?php echo $this->getUrl()->geturl('delete', 'admin_product_media'); ?>').load()" class='btn btn-primary'> 
<input type="button" value="Update" style="float: right; width: 10%; margin-left: 500px" onclick="mage.setForm(this).setUrl('<?php echo $this->getUrl()->geturl('update', 'admin_product_media'); ?>').load()" class='btn btn-primary'>
<br><br>
<br><br>

<table style="border: 1px solid black; border-collapse:collapse;">
    <tr style="border: 1px solid black; border-collapse:collapse;">
        <th>Image</th>
        <th>Label</th>
        <th>Small</th>
        <th>Thumb</th>
        <th>Base</th>
        <th>Gallery</th>
        <th>Remove</th>
    </tr>
    <?php if($image): ?>
        <?php foreach ($image->getData() as $value): ?>
            <tr style="border: 1px solid black; border-collapse:collapse;">
                <td><img src="<?php echo '\myProject\practice\Image\\'.$value->image; ?>" width="100" height="100"></td>
                <td><input type="text" name="image[data][<?php echo $value->imageId; ?>][label]" value="<?php echo $value->label; ?>"></td>
                <td><input type="radio" name="image[small]" value="<?php echo $value->imageId ?>" <?php if($value->small == 1): echo 'checked' ?><?php endif; ?>></td>
                <td><input type="radio" name="image[thumb]"  value="<?php echo $value->imageId ?>" <?php if($value->thumb == 1): ?>checked<?php endif; ?>></td>
                <td><input type="radio" name="image[base]"  value="<?php echo $value->imageId ?>" <?php if($value->base == 1): ?>checked<?php endif; ?>></td>
                <td><input type="checkbox" name="image[data][<?php echo $value->imageId; ?>][gallery]"  value="<?php echo $value->imageId ?>" <?php if($value->gallery == 1): ?>checked<?php endif; ?>></td>
                <td><input type="checkbox" name="image[remove][<?php echo $value->imageId; ?>]" value="<?php echo $value->imageId; ?>"></td>
            </tr>
        <?php endforeach ?>
    <?php endif; ?>
    <tr>
        <td colspan="6"><input type="file" name="image" id="image"></td>
        <td><button value="upload" type ="button" class='btn btn-primary' onclick="mage.setFileForm(this, '#image').setUrl('<?php echo $this->getUrl()->geturl('save', 'admin_product_media') ?>').uploadFile().resetParams()">Upload</button></td>
    </tr>
</table>    