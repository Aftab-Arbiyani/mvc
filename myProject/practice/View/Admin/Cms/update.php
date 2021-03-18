<?php $cms = $this->getTableRow(); ?>

<form action="<?php echo $this->getFormUrl(); ?>" method="post">

    <table>
        <tr>
            <td>Title</td>
            <td><input type="text" name="cms[title]" value='<?php echo $cms->title; ?>'></td>
            <td>Identifier</td>
            <td><input type="text" name="cms[identifier]" value='<?php echo $cms->identifier; ?>'></td>
        </tr>
        <tr>
            <td>Content</td>
            <td><input type="text" name="cms[content]" value='<?php echo $cms->content; ?>'></td>
            <td>Status</td>
            <td>
                <select name="cms[status]" id="" style="padding: 10px; width: 100%">
                    <?php foreach($cms->getStatusOptions() as $key => $value): ?>
                        <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                    <?php endforeach; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan ='4'  style="text-align: right;"><input type="button" name="" value="SUBMIT" onclick="mage.setForm(this).load()" class='btn btn-primary'></td>
        </tr>
    </table>

</form>