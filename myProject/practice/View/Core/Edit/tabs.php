<?php $tabs = $this->getTabs();

foreach ($tabs as $key => $tab) { ?>
    <input style="width: 75%" type="button" value="<?php echo $tab['label']; ?>" onclick="mage.setUrl('<?php echo $this->getUrl()->geturl(null, null, ['tab' => $key]); ?>').load();" class="btn btn-primary"> <br><br>
<?php } ?>