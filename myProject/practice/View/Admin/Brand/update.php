<?php $brand = $this->getTableRow(); ?>

<form id="form"action="<?php echo $this->getFormUrl(); ?>" method="post" enctype="multipart/form-data">

    <table>
        <tr>
            <td>Name</td>
            <td><input type="text" name="brand[name]" value='<?php echo $brand->name; ?>'></td>
            <td>Image</td>
            <td><input type="file" name='image' value='<?php echo $brand->image; ?>' id="image"></td>
        </tr>
        <tr>
            <td>Status</td>
            <td>
                <select name="brand[status]" id="" style="padding: 10px; width: 100%">
                    <?php foreach($brand->getStatusOptions() as $key => $value): ?>
                        <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                    <?php endforeach; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan ='4'  style="text-align: right;"><input type="button" name="" value="SUBMIT" onclick="mage.setForm(this).setFileForm(this, '#image').setUrl('<?php echo $this->getUrl()->geturl('save', 'admin_brand') ?>').uploadFile()" class='btn btn-primary'></td>
        </tr>
    </table>
</form>