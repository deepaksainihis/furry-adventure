<div class="shopengine-archive-view-mode">
    <div class="shopengine-archive-view-mode-switch-list">
        <?php if($settings['shopengine_view_mode_four_grid'] === 'yes'): ?>
        <a href="#" class="shopengine-archive-view-mode-switch isactive" data-view="grid">
            <?php \Elementor\Icons_Manager::render_icon( $settings['shopengine_view_mode_four_grid_icon'], [ 'aria-hidden' => 'true' ] ); ?>
        </a>
        <?php endif; ?>
        <?php if($settings['shopengine_view_mode_three_grid'] === 'yes'): ?>
        <a href="#" class="shopengine-archive-view-mode-switch" data-view="grid-3">
            <?php \Elementor\Icons_Manager::render_icon( $settings['shopengine_view_mode_three_grid_icon'], [ 'aria-hidden' => 'true' ] ); ?>
        </a>
        <?php endif; ?>
        <?php if($settings['shopengine_view_mode_two_grid'] === 'yes'): ?>
        <a href="#" class="shopengine-archive-view-mode-switch" data-view="grid-2">
            <?php \Elementor\Icons_Manager::render_icon( $settings['shopengine_view_mode_two_grid_icon'], [ 'aria-hidden' => 'true' ] ); ?>
        </a>
        <?php endif; ?>
        <?php if($settings['shopengine_view_mode_list_grid'] === 'yes'): ?>
        <a href="#" class="shopengine-archive-view-mode-switch" data-view="list">
            <?php \Elementor\Icons_Manager::render_icon( $settings['shopengine_view_mode_list_grid_icon'], [ 'aria-hidden' => 'true' ] ); ?>
        </a>
        <?php endif; ?>
        
    </div>
</div>
