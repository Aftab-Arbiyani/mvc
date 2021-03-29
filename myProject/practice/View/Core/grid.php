<?php $collections = $this->getCollection(); ?>
<?php $buttons = $this->getButtons(); ?>
<?php $columns = $this->getColumns(); ?>
<?php $actions = $this->getActions(); ?>
<?php //echo '<pre>'; print_r($this->getPager()); ?>

<div class="container mt-2">
    <div class="row">
        <div class="col-12">
            <form action="" method="POST" enctype="multipart/form-data">
                <?php foreach($buttons as $button): ?>
                    <input type='button' style="width:200px" class="btn btn-primary" value='<?php echo $button['label'] ?>' onclick="<?php echo $this->getButtonUrl($button['method']); ?>">
                <?php endforeach; ?><br><br>
            <div class="row mt-3"> 
                <div class="col-12">
                    <table class="table table-striped" style="width: 100%">
                        <thead class="thead-dark">
                            <tr>
                            <?php foreach ($this->getColumns() as $key => $column): ?>
                                <th><?php echo $column['label']; ?></th>
                            <?php endforeach; ?>
                            <th>Actions</th>
                            </tr>
                            <tr>
                                <?php foreach($columns as $column): ?>
                                    <td>
                                        <input type="<?php echo $column['type'] ?>" name="filter[<?php echo $column['type']; ?>][<?php echo $column['field']; ?>]" style="width: 65%" value="<?php echo $this->getFilter()->getFilterValue($column['type'], $column['field']); ?>">
                                    </td>
                                <?php endforeach; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!$collections): ?>
                                <?php echo 'No Data Found'; ?>
                            <?php else: ?>
                                <?php foreach ($collections->getData() as $collection): ?>
                                    <tr>
                                        <?php foreach($columns as $column): ?>
                                                
                                            <?php if($column['field'] == 'image'): ?> 
                                                <td><img src="<?php echo $this->getFieldValue($collection, $column['field']); ?>" alt="" height="100px" width="100px"></td>
                                            <?php else: ?>
                                                <td><?php echo $this->getFieldValue($collection, $column['field']); ?></td>  
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                        <td>
                                            <?php foreach($actions as $action): ?>
                                                <button type="button" onclick="<?php echo $this->getMethodUrl($collection, $action['method']); ?>"><?php echo $action['label']; ?></button>
                                            <?php endforeach; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </form>

                    <button type="button" onclick="mage.setUrl('<?php echo $this->getUrl()->geturl('grid', null, ['p' => $this->getPager()->getPrevious()]); ?>').load()"><?php  echo $this->getPager()->getPrevious(); ?></button>
                    <button type="button" onclick="mage.setUrl('<?php echo $this->getUrl()->geturl('grid', null, ['p' => $this->getPager()->getCurrentPage()]); ?>').load()"><?= $this->getPager()->getCurrentPage() ?></button>
                    <button type="button" onclick="mage.setUrl('<?php echo $this->getUrl()->geturl('grid', null, ['p' => $this->getPager()->getNext()]); ?>').load()"><?php echo $this->getPager()->getNext(); ?></button>
                </div>
            </div>  
        </div>
    </div>
</div>

