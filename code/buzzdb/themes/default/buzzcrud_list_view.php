    <?php //echo $this->render_table_name(); ?>
    <div class="buzzcrud-list-container">
        <table class="buzzcrud-list table table-striped table-hover table-bordered">
            <thead>
                <?php echo $this->render_grid_head('tr', 'th'); ?>
            </thead>
            <tbody>
                <?php echo $this->render_grid_body('tr', 'td'); ?>
            </tbody>
            <tfoot>
                <?php echo $this->render_grid_footer('tr', 'td'); ?>
            </tfoot>
        </table>
    </div>
        <div class="buzzcrud-nav">
            <?php echo $this->add_button('buzzcrud-button buzzcrud-green','icon-plus');
            echo $this->csv_button('buzzcrud-button buzzcrud-purple','icon-file');
            echo $this->print_button('buzzcrud-button buzzcrud-pink','icon-print'); 
            echo $this->render_search(); ?>
            <div style="float: right;">
            <?php echo $this->render_benchmark(); ?>
            </div>
            <br />
            <?php echo $this->render_limitlist(true); ?>
            <div style="float: right;">
            <?php echo $this->render_pagination(); ?>
            </div>
            
        </div>
