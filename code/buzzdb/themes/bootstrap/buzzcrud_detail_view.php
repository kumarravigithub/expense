<?php echo $this->render_table_name($mode); ?>
<div class="buzzcrud-top-actions">
    <?php echo $this->render_button('save_new','save','create','btn btn-primary','','create,edit') ?>
    <?php echo $this->render_button('save_edit','save','edit','btn btn-default','','create,edit') ?>
    <?php echo $this->render_button('save_return','save','list','btn btn-success','','create,edit') ?>
    <?php echo $this->render_button('return','list','','btn btn-warning') ?>
</div>
<div class="buzzcrud-view">
<?php echo $this->render_fields_list($mode); ?>
</div>
<div class="buzzcrud-nav">
    <?php echo $this->render_benchmark(); ?>
</div>
