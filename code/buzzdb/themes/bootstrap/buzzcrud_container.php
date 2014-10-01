<div class="buzzcrud<?php echo $this->is_rtl ? ' buzzcrud_rtl' : ''?>">
    <?php echo $this->render_table_name(false, 'div', true)?>
    <div class="buzzcrud-container"<?php echo ($this->start_minimized) ? ' style="display:none;"' : '' ?>>
        <div class="buzzcrud-ajax">
            <?php echo $this->render_view() ?>
        </div>
        <div class="buzzcrud-overlay"></div>
    </div>
</div>