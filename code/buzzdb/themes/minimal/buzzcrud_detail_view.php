<?php echo $this->render_table_name($mode); ?>
<div class="buzzcrud-top-actions">
    <?php echo $this->render_button('save_new','save','create','buzzcrud-button buzzcrud-blue','','create,edit') ?>
    <?php echo $this->render_button('save_edit','save','edit','buzzcrud-button buzzcrud-green','','create,edit') ?>
    <?php echo $this->render_button('save_return','save','list','buzzcrud-button buzzcrud-purple','','create,edit') ?>
    <?php echo $this->render_button('return','list','','buzzcrud-button buzzcrud-orange') ?>
</div>
<div class="buzzcrud-view">
<?php echo $this->render_fields_list($mode); ?>
</div>
<div class="buzzcrud-nav">
    <?php echo $this->render_benchmark(); ?>
</div>
