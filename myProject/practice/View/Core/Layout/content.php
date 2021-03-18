<div id='contentHtml'>
    <?php $children = $this->getChildren(); ?>
    <?php foreach ($children as $child): ?>
        <?php echo '<br>'.$child->toHtml(); ?>
    <?php endforeach; ?> 
</div> 