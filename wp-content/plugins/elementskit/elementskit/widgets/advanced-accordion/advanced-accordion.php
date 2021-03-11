<?php
namespace Elementor;

use \Elementor\ElementsKit_Widget_Advanced_Accordion_Handler as Handler;
use \ElementsKit_Lite\Modules\Controls\Controls_Manager as ElementsKit_Controls_Manager;
use \ElementsKit_Lite\Modules\Controls\Widget_Area_Utils as Widget_Area_Utils;

if ( ! defined( 'ABSPATH' ) ) exit;


class ElementsKit_Widget_Advanced_Accordion extends Widget_Base {
    use \ElementsKit_Lite\Widgets\Widget_Notice;

	public $base;

	public function get_name() {
        return Handler::get_name();
    }

    public function get_title() {
        return Handler::get_title();
    }

    public function get_icon() {
        return Handler::get_icon();
    }

    public function get_categories() {
        return Handler::get_categories();
    }

    public function get_help_url() {
        return '';
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'section_tab', [
                'label' =>esc_html__( 'Accordion', 'elementskit' ),
            ]
        );
        $repeater = new Repeater();


        $repeater->add_control(
            'acc_title', [
                'label' => esc_html__('Title', 'elementskit'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'ekit_acc_is_active',
            [
                'label' => esc_html__('Keep this open?', 'elementskit'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'no',
                'label_on' =>esc_html__( 'Yes', 'elementskit' ),
                'label_off' =>esc_html__( 'No', 'elementskit' ),
            ]
        );

        $repeater->add_control(
            'acc_content', [
                'label' => esc_html__('Description', 'elementskit'),
                'type' => ElementsKit_Controls_Manager::WIDGETAREA,
                'label_block' => true,
            ]
        );

        $this->add_control(
            'ekit_accordion_items',
            [
                'label' => esc_html__('Content', 'elementskit'),
                'type' => Controls_Manager::REPEATER,
                'separator' => 'before',
                'title_field' => '{{ acc_title }}',
                'default' => [
                    [
                        'acc_title' => ' How to Change my Photo from Admin Dashboard? ',
                        'ekit_acc_is_active'    => 'yes'
                    ],
                    [
                        'acc_title' => ' How to Change my Password easily?',
                    ],
                    [
                        'acc_title' => ' How to Change my Subscription Plan using PayPal',
                    ],
                ],
                'fields' => $repeater->get_controls(),
            ]
        );

        $this->add_control(
            'ekit_accordion_open_first_slide',
            [
                'label' => esc_html__( 'Keep first slide auto open?', 'elementskit' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'elementskit' ),
                'label_off' => esc_html__( 'No', 'elementskit' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'ekit_accordion_style',
            [
                'label' =>esc_html__( 'Style', 'elementskit' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'accoedion-primary',
                'options' => [
                    'accoedion-primary' =>esc_html__( 'Primary', 'elementskit' ),
                    'curve-shape' =>esc_html__( 'Curve Shape', 'elementskit' ),
                    'accoedion-primary side-curve' =>esc_html__( 'Side Curve', 'elementskit' ),
                    'accordion-4' =>esc_html__( 'Box Icon', 'elementskit' ),
                    'floating-style' =>esc_html__( 'Floating Style', 'elementskit' ),
                ],
            ]
        );

        $this->end_controls_section();
        // Icon setting
        $this->start_controls_section(
            'ekit_accordion_section_setting', [
                'label' =>esc_html__( 'Icon', 'elementskit' ),
            ]
        );
        $this->add_control(
            'ekit_accordion_icon_pos_style',
            [
                'label' => esc_html__( 'Icon Position', 'elementskit' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'right',
                'options' => [
                    'right'  => esc_html__( 'Right', 'elementskit' ),
                    'left' => esc_html__( 'Left', 'elementskit' ),
                    'bothside' => esc_html__( 'Both side', 'elementskit' ),
                ],
            ]
        );

        $this->add_control(
            'ekit_accordion_display_loop_count',
            [
                'label' => esc_html__( 'Show Loop Count', 'elementskit' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'elementskit' ),
                'label_off' => esc_html__( 'Hide', 'elementskit' ),
                'return_value' => 'yes',
                'default' => 'no',
                'condition' => [
                    'ekit_accordion_icon_pos_style' => 'right',
                ]
            ]
        );
        $this->add_control(
            'ekit_accordion_left_icons',
            [
                'label' => esc_html__( 'Left Icon', 'elementskit' ),
                'type' => Controls_Manager::ICONS,
                'fa4compatibility' => 'ekit_accordion_left_icon',
                'default' => [
                    'value' => 'icon icon-down-arrow1',
                    'library' => 'ekiticons',
                ],
                'condition' => [
                    'ekit_accordion_icon_pos_style' => ['left', 'bothside']
                ]
            ]
        );
        $this->add_control(
            'ekit_accordion_left_icons_active',
            [
                'label' => esc_html__( 'Left Icon Active', 'elementskit' ),
                'fa4compatibility' => 'ekit_accordion_left_icon_active',
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'icon icon-up-arrow1',
                    'library' => 'ekiticons',
                ],
                'condition' => [
                    'ekit_accordion_icon_pos_style' => ['left', 'bothside']
                ]
            ]
        );
        $this->add_control(
            'ekit_accordion_right_icons',
            [
                'label' => esc_html__( 'Right Icon', 'elementskit' ),
                'type' => Controls_Manager::ICONS,
                'fa4compatibility' => 'ekit_accordion_right_icon',
                'default' => [
                    'value' => 'icon icon-down-arrow1',
                    'library' => 'ekiticons',
                ],
                'condition' => [
                    'ekit_accordion_icon_pos_style' => ['right', 'bothside']
                ]
            ]
        );
        $this->add_control(
            'ekit_accordion_right_icons_active',
            [
                'label' => esc_html__( 'Right Icon Active', 'elementskit' ),
                'fa4compatibility' => 'ekit_accordion_right_icon_active',
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'icon icon-up-arrow1',
                    'library' => 'ekiticons',
                ],
                'condition' => [
                    'ekit_accordion_icon_pos_style' => ['right', 'bothside']
                ]
            ]
        );
        $this->end_controls_section();

        //Title Style Section

        $this->start_controls_section(
            'ekit_accordion_section_title_style', [
                'label'	 =>esc_html__( 'Title', 'elementskit' ),
                'tab'	 => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'		 => 'ekit_accordion_title_typography',
                'selector'	 => '{{WRAPPER}} .elementskit-accordion .elementskit-card-header>.elementskit-btn-link',
            ]
        );
        $this->start_controls_tabs(
            'ekit_accordion_style_tabs'
        );
        $this->start_controls_tab(
            'ekit_accordion_style_open_tab',
            [
                'label' => esc_html__( 'Open', 'elementskit' ),
            ]
        );
        $this->add_control(
            'ekit_accordion_title_color', [
                'label'		 =>esc_html__( 'Color', 'elementskit' ),
                'type'		 => Controls_Manager::COLOR,
                'selectors'	 => [
                    '{{WRAPPER}} .elementskit-accordion .elementskit-card .elementskit-card-header>.elementskit-btn-link[aria-expanded="true"]' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .elementskit-accordion.curve-shape .elementskit-card-header>.elementskit-btn-link[aria-expanded=true]' => 'color: {{VALUE}};'
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'ekit_accordion_background',
                'label' => esc_html__( 'Background', 'elementskit' ),
                'types' => [ 'classic', 'gradient' ],
                'condition' => [
                    'ekit_accordion_style!' => ['curve-shape']
                ],
                'selector' => '{{WRAPPER}} .elementskit-accordion.accoedion-primary .elementskit-card .elementskit-card-header>.elementskit-btn-link[aria-expanded="true"], {{WRAPPER}} .elementskit-accordion .elementskit-card-header>.elementskit-btn-link[aria-expanded=true], {{WRAPPER}} .elementskit-accordion.floating-style .elementskit-card .elementskit-btn-link[aria-expanded="true"]',
            ]
        );
        $this->add_control(
            'ekit_accordion_curve_fill_color', [
                'label'      =>esc_html__( 'Background Color', 'elementskit' ),
                'type'       => Controls_Manager::COLOR,
                'condition' => [
                    'ekit_accordion_style' => ['curve-shape']
                ],
                'selectors'  => [
                    '{{WRAPPER}} .elementskit-accordion.curve-shape .elementskit-card-header>.elementskit-btn-link[aria-expanded=true] .path' => 'fill: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'ekit_accordion_curve_stroke_color', [
                'label'      =>esc_html__( 'Border Color', 'elementskit' ),
                'type'       => Controls_Manager::COLOR,
                'condition' => [
                    'ekit_accordion_style' => ['curve-shape']
                ],
                'selectors'  => [
                    '{{WRAPPER}} .elementskit-accordion.curve-shape .elementskit-card-header>.elementskit-btn-link[aria-expanded=true] .path' => 'stroke: {{VALUE}};',
                ],
            ]
        );


        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'ekit_accordion_title_border_open',
                'label' => esc_html__( 'Border', 'elementskit' ),
                'condition' => [
                    'ekit_accordion_style!' => ['curve-shape']
                ],
                'selector' => '{{WRAPPER}} .elementskit-accordion .elementskit-card .elementskit-card-header>.elementskit-btn-link[aria-expanded="true"]',
            ]
        );

        $this->add_control(
            'ekit_accordion_border_radious_curve_shape_open',
            [
                'label' => esc_html__( 'Border Radius', 'elementskit' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'condition' => [
                    'ekit_accordion_style!' => ['curve-shape']
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementskit-accordion .elementskit-card .elementskit-card-header>.elementskit-btn-link[aria-expanded="true"]' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'ekit_accordion_box_shadow_open',
                'label' => esc_html__( 'Box Shadow', 'elementskit' ),
                'selector' => '{{WRAPPER}} .elementskit-accordion .elementskit-card .elementskit-card-header>.elementskit-btn-link[aria-expanded="true"]',
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'ekit_accordion_style_close_tab',
            [
                'label' => esc_html__( 'Closed', 'elementskit' ),
            ]
        );
        $this->add_control(
            'ekit_accordion_title_color_close', [
                'label'		 =>esc_html__( 'Color', 'elementskit' ),
                'type'		 => Controls_Manager::COLOR,
                'selectors'	 => [
                    '{{WRAPPER}} .elementskit-accordion .elementskit-card-header>.elementskit-btn-link' => 'color: {{VALUE}};'
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'ekit_accordion_background_close',
                'label' => esc_html__( 'Background', 'elementskit' ),
                'types' => [ 'classic', 'gradient' ],
                'condition' => [
                    'ekit_accordion_style!' => ['curve-shape']
                ],
                'selector' => '{{WRAPPER}} .elementskit-accordion .elementskit-card-header>.elementskit-btn-link',
            ]
        );
        $this->add_control(
            'ekit_accordion_curve_fill_close', [
                'label'      =>esc_html__( 'Background', 'elementskit' ),
                'type'       => Controls_Manager::COLOR,
                'condition' => [
                    'ekit_accordion_style' => ['curve-shape']
                ],
                'selectors'  => [
                    '{{WRAPPER}} .elementskit-accordion .elementskit-card-header>.elementskit-btn-link .path' => 'fill: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'ekit_accordion_curve_stroke_close', [
                'label'      =>esc_html__( 'Border Color', 'elementskit' ),
                'type'       => Controls_Manager::COLOR,
                'condition' => [
                    'ekit_accordion_style' => ['curve-shape']
                ],
                'selectors'  => [
                    '{{WRAPPER}} .elementskit-accordion .elementskit-card-header>.elementskit-btn-link .path' => 'stroke: {{VALUE}};',
                ],
            ]
        );


        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'ekit_accordion_title_border_close',
                'label' => esc_html__( 'Border', 'elementskit' ),
                'condition' => [
                    'ekit_accordion_style!' => ['curve-shape']
                ],
                'selector' => '{{WRAPPER}} .elementskit-accordion .elementskit-card-header>.elementskit-btn-link',
            ]
        );
        $this->add_control(
            'ekit_accordion_border_radious_close',
            [
                'label' => esc_html__( 'Border Radius', 'elementskit' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'condition' => [
                    'ekit_accordion_style!' => ['curve-shape']
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementskit-accordion .elementskit-card-header>.elementskit-btn-link' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'ekit_accordion_box_shadow_close',
                'label' => esc_html__( 'Box Shadow', 'elementskit' ),
                'selector' => '{{WRAPPER}} .elementskit-accordion .elementskit-card-header>.elementskit-btn-link',
            ]
        );
        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_control(
            'ekit_accordion_title_divide',
            [
                'type' => Controls_Manager::DIVIDER,
                'style' => 'thick',
            ]
        );

        $this->add_responsive_control(
            'ekit_accordion_title_padding',
            [
                'label' => esc_html__( 'Padding', 'elementskit' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
                'selectors' => [
                    '{{WRAPPER}} .elementskit-accordion .elementskit-card-header>.elementskit-btn-link' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );



        $this->add_responsive_control(
            'ekit_accordion_title_margin_bottom', [
                'label'			 =>esc_html__( 'Margin Bottom', 'elementskit' ),
                'type'			 => Controls_Manager::SLIDER,
                'default'		 => [
                    'size' => '',
                ],
                'range'			 => [
                    'px' => [
                        'min'	 => -30,
                        'step'	 => 1,
                    ],
                ],
                'size_units'	 => ['px'],
                'selectors'		 => [
                    '{{WRAPPER}} .elementskit-accordion .elementskit-card-header>.elementskit-btn-link'	=> 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        //Subtitle Style Section
        $this->start_controls_section(
            'ekit_accordion_section_content_style', [
                'label'	 =>esc_html__( 'Content', 'elementskit' ),
                'tab'	 => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'ekit_accordion_content_color', [
                'label'		 =>esc_html__( 'Color', 'elementskit' ),
                'type'		 => Controls_Manager::COLOR,
                'selectors'	 => [
                    '{{WRAPPER}} .elementskit-accordion .elementskit-card-body p' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .elementskit-accordion .elementskit-card-body' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'		 => 'ekit_accordion_content_typography',
                'selector'	 => '{{WRAPPER}} .elementskit-accordion .elementskit-card-body p, {{WRAPPER}} .elementskit-accordion .elementskit-card-body',
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'ekit_accordion_content_background',
                'label' => esc_html__( 'Background', 'elementskit' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .elementskit-accordion .elementskit-card-body, {{WRAPPER}} .accordion.floating-style .elementskit-card-body',
            ]
        );

        $this->add_control(
            'ekit_accordion_content_border_radious',
            [
                'label' => esc_html__( 'Border Radius', 'elementskit' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .elementskit-accordion .elementskit-card-body' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'ekit_accordion_content_padding',
            [
                'label' => esc_html__( 'Padding', 'elementskit' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .elementskit-accordion .elementskit-card-body' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'ekit_accordion_content_width',
            [
                'label' => esc_html__( 'Width', 'elementskit' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ '%' ],
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 90,
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementskit-accordion.floating-style .elementskit-card-body' => 'width: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'ekit_accordion_style' => 'floating-style'
                ]
            ]
        );


        $this->end_controls_section();

        //Slide border

        $this->start_controls_section(
            'ekit_accordion_section_border_style', [
                'label'	 =>esc_html__( 'Border', 'elementskit' ),
                'tab'	 => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'ekit_accordion_border_open',
                'label' => esc_html__( 'Border', 'elementskit' ),
                'selector' => '{{WRAPPER}} .elementskit-accordion > .elementskit-card',
            ]
        );

        $this->add_control(
            'ekit_accordion_border_radious_open',
            [
                'label' => esc_html__( 'Border Radius', 'elementskit' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .elementskit-accordion > .elementskit-card' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'ekit_accordion_element_box_shadow_group',
                'label' => esc_html__( 'Box Shadow', 'elementskit' ),
                'selector' => '{{WRAPPER}} .elementskit-accordion > .elementskit-card',
            ]
        );


        $this->end_controls_section();

        //Icon Style Section
        $this->start_controls_section(
            'ekit_accordion_section_icon_style', [
                'label'	 =>esc_html__( 'Icon', 'elementskit' ),
                'tab'	 => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
			'ekit_accordion_section_icon_margin',
			[
				'label' => esc_html__( 'Margin', 'elementskit' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ekit_accordion_icon_group, {{WRAPPER}} .ekit_accordion_icon_left_group' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->start_controls_tabs(
            'ekit_accordion_style_tabs_icon'
        );
        $this->start_controls_tab(
            'ekit_accordion_icon_open_tab',
            [
                'label' => esc_html__( 'Slide Closed Icon', 'elementskit' ),
            ]
        );

        $this->add_control(
            'ekit_accordion_icon_color_close', [
                'label'		 =>esc_html__( 'Color', 'elementskit' ),
                'type'		 => Controls_Manager::COLOR,
                'selectors'	 => [
                    '{{WRAPPER}} .elementskit-accordion .elementskit-card-header .elementskit-btn-link .icon-open' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .elementskit-accordion .elementskit-card-header .elementskit-btn-link[aria-expanded="false"] svg path' => 'stroke: {{VALUE}}; fill: {{VALUE}};'
                ],
            ]
        );

        $this->add_responsive_control(
            'ekit_accordion_icon_typography_close',
            [
                'label' => esc_html__( 'Size', 'elementskit' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 6,
                        'max' => 300,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementskit-accordion .elementskit-card-header .elementskit-btn-link  .icon-open' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .elementskit-accordion .elementskit-card-header .elementskit-btn-link svg'  => 'max-width: {{SIZE}}{{UNIT}}; height: auto;'
                ],
            ]
        );

        $this->add_control(
            'ekit_accordion_icon_box_open_bg_hr',
            [
                'type' => Controls_Manager::DIVIDER,
                'style' => 'thick',
                'condition' => [
                    'ekit_accordion_style' => 'accordion-4'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'ekit_accordion_icon_box_open_bg',
                'label' => esc_html__( 'Background', 'elementskit' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .elementskit-accordion.accordion-4 .elementskit-card-header .elementskit-btn-link::before',
                'condition' => [
                    'ekit_accordion_style' => 'accordion-4'
                ]
            ]
        );

        $this->end_controls_tab();
        $this->start_controls_tab(
            'ekit_accordion_icon_close_tab',
            [
                'label' => esc_html__( ' Slide Open icon', 'elementskit' ),
            ]
        );

        $this->add_control(
            'ekit_accordion_icon_color', [
                'label'		 =>esc_html__( 'Color', 'elementskit' ),
                'type'		 => Controls_Manager::COLOR,
                'selectors'	 => [
                    '{{WRAPPER}} .elementskit-accordion .elementskit-card-header .elementskit-btn-link .icon-closed' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .elementskit-accordion .elementskit-card-header .elementskit-btn-link[aria-expanded="true"] svg path' => 'stroke: {{VALUE}}; fill: {{VALUE}};'
                ],
            ]
        );

        $this->add_responsive_control(
            'ekit_accordion_icon_typography', //icon id different because replaced the previous control
            [
                'label' => esc_html__( 'Size', 'elementskit' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 6,
                        'max' => 300,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementskit-accordion .elementskit-card .elementskit-card-header .elementskit-btn-link .icon-closed' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .elementskit-accordion .elementskit-card .elementskit-card-header .elementskit-btn-link svg'  => 'max-width: {{SIZE}}{{UNIT}}; height: auto;'
                ]
            ]
        );

        $this->add_control(
            'ekit_accordion_icon_box_close_bg_hr',
            [
                'type' => Controls_Manager::DIVIDER,
                'style' => 'thick',
                'condition' => [
                    'ekit_accordion_style' => 'accordion-4'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'ekit_accordion_icon_box_close_bg',
                'label' => esc_html__( 'Background', 'elementskit' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .elementskit-accordion.accordion-4 .elementskit-card-header .elementskit-btn-link[aria-expanded="true"]::before',
                'condition' => [
                    'ekit_accordion_style' => ['accordion-4']
                ]
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->insert_pro_message();

    }

    protected function render( ) {
        echo '<div class="ekit-wid-con">';
            $this->render_raw();
        echo '</div>';
    }

    protected function render_raw( ) {

        $settings = $this->get_settings_for_display();

        extract($settings);

        $has_user_defined_active_tab = false;
        foreach($ekit_accordion_items as $tab){
            if($tab['ekit_acc_is_active'] == 'yes'){
                $has_user_defined_active_tab = true;
            }
        }
        $acc_id = uniqid();
        
        ?>


        <div class="elementskit-accordion <?php echo esc_attr( $ekit_accordion_style ); ?>" id="accordion-<?php echo esc_attr($acc_id); ?>">

            <?php
        
            foreach ($ekit_accordion_items as $i=>$accorion_content) :
                $is_active = ($accorion_content['ekit_acc_is_active'] == 'yes') ? ' show collapse' : ' collapse';
                $is_active = ($ekit_accordion_open_first_slide == 'yes' && $has_user_defined_active_tab == false && $i == 0) ? ' show collapse' : $is_active;
                ?>

                <div class="elementskit-card">
                    <div class="elementskit-card-header" id="primaryHeading-<?php echo esc_attr($i); ?>-<?php echo esc_attr($this->get_id()) ?>">
                        <a href="#Collapse-<?php echo esc_attr($accorion_content['_id'].$acc_id)?>" class="elementskit-btn-link collapsed" data-ekit-toggle="collapse" data-target="#Collapse-<?php echo esc_attr($accorion_content['_id'].$acc_id)?>" aria-expanded="<?php echo esc_attr($is_active == ' collapse' ? 'false' : 'true');  ?>" aria-controls="Collapse-<?php echo esc_attr($accorion_content['_id'].$acc_id)?>">
                            <?php if(($ekit_accordion_icon_pos_style == 'left') || ($ekit_accordion_icon_pos_style == 'bothside')) :  ?>
                                <div class="ekit_accordion_icon_left_group">
                                    <div class="ekit_accordion_normal_icon">
                                        <!-- Normal Icon -->
                                        <?php
                                            // new icon
                                            $migrated = isset( $settings['__fa4_migrated']['ekit_accordion_left_icons'] );
                                            // Check if its a new widget without previously selected icon using the old Icon control
                                            $is_new = empty( $settings['ekit_accordion_left_icon'] );
                                            if ( $is_new || $migrated ) {
                                                // new icon
                                                Icons_Manager::render_icon( $settings['ekit_accordion_left_icons'], [ 'aria-hidden' => 'true', 'class'    => 'icon-open icon-left' ] );
                                            } else {
                                                ?>
                                                <i class="<?php echo $settings['ekit_accordion_left_icon']; ?> icon-open icon-left" aria-hidden="true"></i>
                                                <?php
                                            }
                                        ?>
                                    </div>

                                    <div class="ekit_accordion_active_icon">
                                        <!-- Active Icon -->
                                        <?php
                                            // new icon
                                            $migrated = isset( $settings['__fa4_migrated']['ekit_accordion_left_icons_active'] );
                                            // Check if its a new widget without previously selected icon using the old Icon control
                                            $is_new = empty( $settings['ekit_accordion_left_icon_active'] );
                                            if ( $is_new || $migrated ) {
                                                // new icon
                                                Icons_Manager::render_icon( $settings['ekit_accordion_left_icons_active'], [ 'aria-hidden' => 'true', 'class'    => 'icon-closed icon-left' ] );
                                            } else {
                                                ?>
                                                <i class="<?php echo $settings['ekit_accordion_left_icon_active']; ?> icon-closed icon-left" aria-hidden="true"></i>
                                                <?php
                                            }
                                        ?>
                                    </div>
                                </div>
                            <?php  endif;

                            if($ekit_accordion_display_loop_count == 'yes') :  ?>

                                <span class="number"></span>

                            <?php endif; ?>

                            <span class="ekit-accordion-title"><?php echo esc_html($accorion_content['acc_title']); ?></span>

                            <?php if(($ekit_accordion_icon_pos_style == 'right') || ($ekit_accordion_icon_pos_style == 'bothside')) :  ?>

                                <div class="ekit_accordion_icon_group">

                                    <div class="ekit_accordion_normal_icon">
                                        <!-- Normal Icon -->
                                        <?php
                                            // new icon
                                            $migrated = isset( $settings['__fa4_migrated']['ekit_accordion_right_icons'] );
                                            // Check if its a new widget without previously selected icon using the old Icon control
                                            $is_new = empty( $settings['ekit_accordion_right_icon'] );
                                            if ( $is_new || $migrated ) {
                                                // new icon
                                                Icons_Manager::render_icon( $settings['ekit_accordion_right_icons'], [ 'aria-hidden' => 'true', 'class'    => 'icon-open icon-left' ] );
                                            } else {
                                                ?>
                                                <i class="<?php echo $settings['ekit_accordion_right_icon']; ?> icon-open icon-left" aria-hidden="true"></i>
                                                <?php
                                            }
                                        ?>
                                    </div>

                                    <div class="ekit_accordion_active_icon">
                                    <!-- Active Icon -->
                                    <?php
                                        // new icon
                                        $migrated = isset( $settings['__fa4_migrated']['ekit_accordion_right_icons_active'] );
                                        // Check if its a new widget without previously selected icon using the old Icon control
                                        $is_new = empty( $settings['ekit_accordion_right_icon_active'] );
                                        if ( $is_new || $migrated ) {
                                            // new icon
                                            Icons_Manager::render_icon( $settings['ekit_accordion_right_icons_active'], [ 'aria-hidden' => 'true', 'class'    => 'icon-closed icon-left' ] );
                                        } else {
                                            ?>
                                            <i class="<?php echo $settings['ekit_accordion_right_icon_active']; ?> icon-closed icon-left" aria-hidden="true"></i>
                                            <?php
                                        }
                                    ?>
                                    </div>
                                </div>

                            <?php endif; ?>

                            <?php if ( $ekit_accordion_style == 'curve-shape' ): ?>
                                <svg version="1.1" class="svg-shape" x="0px" y="0px" viewBox="0 0 541 64" height="64" preserveAspectRatio="none">
                                    <polygon class="path" points="85,55 81,55 51,55 42.5,64 34,55 0,55 0,0 34.4,0 42.5,9.5 50.6,0 81,0 85,0 541,0 541,55 "/>
                                </svg>
                            <?php endif; ?>
                        </a>
                    </div>

                    <div id="Collapse-<?php echo esc_attr($accorion_content['_id'].$acc_id)?>" class="<?php echo esc_attr($is_active); ?>" aria-labelledby="primaryHeading-<?php echo esc_attr($i); ?>-<?php echo esc_attr($this->get_id()) ?>" data-parent="#accordion-<?php echo esc_attr($acc_id); ?>">

                        <div class="elementskit-card-body">
                            <?php echo Widget_Area_Utils::parse( $accorion_content['acc_content'], $this->get_id(), ($i + 1) ); ?>
                        </div>

                    </div>

                </div><!-- .elementskit-card END --> 

                <?php endforeach; ?>
        </div>
    <?php }
    protected function _content_template() { }
}