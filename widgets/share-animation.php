<?php
class CE_Share_Animation extends \Elementor\Widget_Base {

	public function get_name() {
		return 'ce-share-animation';
	}

	public function get_title() {
		return esc_html__( 'Share Animation', 'elementor-addon' );
	}

	public function get_icon() {
		return 'eicon-code';
	}

	public function get_categories() {
		return [ 'custom-element' ];
	}

	public function get_keywords() {
		return [ 'share', 'button', 'animation' ];
	}

	protected function register_controls() {

		// Content Tab Start

		$this->start_controls_section(
			'ce_share_content',
			[
				'label' => esc_html__( 'Content', 'custom-element' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'ce_share_title', 
			[
				'label' => esc_html__( 'Title', 'custom-element' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Product Name' , 'custom-element' ),
				'label_block' => true,
			]
		);

        $repeater->add_control(
			'ce_share_icon',
			[
				'label' => esc_html__( 'Icon', 'custom-element' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'solid',
				],
			]
		);

        $repeater->add_control(
			'ce_share_link',
			[
				'label' => esc_html__( 'URL', 'custom-element' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'custom-element' ),
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					'custom_attributes' => '',
				],
				'label_block' => true,
			]
		);

		$this->add_control(
			'ce_share_item',
			[
				'label' => esc_html__( 'Share Item', 'custom-element' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'ce_share_title' => esc_html__( 'Title #1', 'custom-element' ),
					],
				],
				'title_field' => '{{{ ce_share_title }}}',
			]
		);

		$this->end_controls_section();

        // Content Tab Start

		$this->start_controls_section(
			'ce_share_button',
			[
				'label' => esc_html__( 'Share Button Content', 'custom-element' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

        $this->add_control(
			'ce_share_button_text',
			[
				'label' => esc_html__( 'Button Text', 'custom-element' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Share', 'custom-element' ),
			]
		);

        $this->add_control(
			'ce_share_button_icon',
			[
				'label' => esc_html__( 'Icon', 'custom-element' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'solid',
				],
			]
		);

        $this->end_controls_section();

		// Button Style Tab Start

		$this->start_controls_section(
			'ce_share_arrow',
			[
				'label' => esc_html__( 'Arrow', 'custom-element' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
            <div class="social-share__widget">
                <span>
                    <?php \Elementor\Icons_Manager::render_icon( $settings['ce_share_button_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                    <?php echo esc_html__( $settings['ce_share_button_text'] );?>
                </span>
                <ul class="social-share__widget-list">
                    <?php foreach ( $settings['ce_share_item'] as $index => $item ) : ?>
                        <?php
                            $target = $item['ce_share_link']['is_external'] ? ' target="_blank"' : '';
                            $nofollow = $item['ce_share_link']['nofollow'] ? ' rel="nofollow"' : '';
                        ?>
                        <li><a href="<?php echo $item['ce_share_link']['url'] ?>" <?php echo $target ?> <?php echo $nofollow;?> >
                            <?php \Elementor\Icons_Manager::render_icon( $item['ce_share_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                        </a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
		<?php
	}
}