<?php $image = $this->getImage(); ?>

<input type="button" value="Remove" style="float: right; width: 10%" onclick="mage.setForm(this).setUrl('<?php echo $this->getUrl()->geturl('delete', 'admin_category_media'); ?>').load()" class='btn btn-primary'> 
<input type="button" value="Update" style="float: right; width: 10%; margin-left: 500px" onclick="mage.setForm(this).setUrl('<?php echo $this->getUrl()->geturl('update', 'admin_category_media'); ?>').load()" class='btn btn-primary'>
<br><br>
<br><br>

<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th>Image</th>
            <th>Label</th>
            <th>Icon</th>
            <th>Base</th>
            <th>Banner</th>
            <th>Active</th>
            <th>Remove</th>
        </tr>
    </thead>
    <tbody>
        <?php if($image): ?>
            <?php foreach ($image->getData() as $key => $value): ?>
                <tr>
                    <td><img src="<?php echo '\myProject\practice\Image\\'.$value->image; ?>" width="100" height="100"></td>
                    <td><input type="text" name="image[data][<?= $value->imageId ?>][label]" value="<?= $value->label ?>"></td>
                    <td><input type="radio" name="image[icon]" value="<?= $value->imageId ?>" <?php if($value->icon == 1): ?>checked<?php endif; ?>></td>
                    <td><input type="radio" name="image[base]" value="<?= $value->imageId ?>" <?php if($value->base == 1): ?>checked<?php endif; ?>></td>
                    <td><input type="checkbox" name="image[data][<?= $value->imageId ?>][banner]" value="<?php echo $value->imageId ?>" <?php if($value->banner == 1): ?>checked<?php endif; ?>></td>
                    <td><input type="checkbox" name="image[data][<?= $value->imageId ?>][active]" value="<?php echo $value->imageId ?>" <?php if($value->active == 1): ?>checked<?php endif; ?>></td>
                    <td><input type="checkbox" name="image[remove][<?php echo $value->imageId; ?>]" value="<?php echo $value->imageId; ?>"></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
        <tr>
            <td colspan="6"><input type="file" name="image" id="image"></td>
            <td><button value="upload" type ="button" class='btn btn-primary' onclick="mage.setForm(this).setFileForm(this, '#image').setUrl('<?php echo $this->getUrl()->geturl('save', 'admin_category_media') ?>').uploadFile().resetParams()">Upload</button></td>
        </tr>
    </tbody>
</table>