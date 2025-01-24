<?php
if (! defined('ABSPATH')) {
    exit;
}
// Exit if accessed directly

class Custom_FAQ_Widget extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'custom_faq';
    }

    public function get_title()
    {
        return __('Custom FAQ', 'custom-faq-widget');
    }

    public function get_icon()
    {
        return 'eicon-help-o'; // Choose an appropriate icon from Elementor's icons
    }

    public function get_categories()
    {
        return ['general']; // Add it to a category
    }

    protected function register_controls()
    {
        // Content Section
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Content', 'custom-faq-widget'),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'faq_items',
            [
                'label'       => __('FAQ Items', 'custom-faq-widget'),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => [
                    [
                        'name'    => 'question',
                        'label'   => __('Question', 'custom-faq-widget'),
                        'type'    => \Elementor\Controls_Manager::TEXT,
                        'default' => __('FAQ Question', 'custom-faq-widget'),
                    ],
                    [
                        'name'    => 'answer',
                        'label'   => __('Answer', 'custom-faq-widget'),
                        'type'    => \Elementor\Controls_Manager::TEXTAREA,
                        'default' => __('FAQ Answer', 'custom-faq-widget'),
                    ],
                ],
                'default'     => [],
                'title_field' => '{{{ question }}}',
            ]
        );

        $this->end_controls_section();

        // Style Section for Questions
        $this->start_controls_section(
            'question_style_section',
            [
                'label' => __('Question', 'custom-faq-widget'),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'faq_item_gap',
            [
                'label'      => __('Gap Between Items', 'custom-faq-widget'),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', '%'],
                'range'      => [
                    'px' => [
                        'min' => 0,
                        'max' => 50,
                    ],
                    'em' => [
                        'min' => 0,
                        'max' => 5,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .faq-item:not(:last-child)' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
                'default'    => [
                    'unit' => 'px',
                    'size' => 10,
                ],
            ]
        );

        $this->add_control(
            'question_color',
            [
                'label'     => __('Text Color', 'custom-faq-widget'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq-question' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'question_typography',
                'label'    => __('Typography', 'custom-faq-widget'),
                'selector' => '{{WRAPPER}} .faq-question',
            ]
        );
        $this->add_group_control(\Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'faq_item_border',
                'label'    => __('Item Border', 'custom-faq-widget'),
                'selector' => '{{WRAPPER}} .faq-item',
            ]
        );
        $this->add_control(
            'faq_item_border_radius',
            [
                'label'      => __('Border Radius', 'custom-faq-widget'),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range'      => [
                    'px' => [
                        'min' => 0,
                        'max' => 50,
                    ],
                    '%'  => [
                        'min' => 0,
                        'max' => 50,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .faq-item' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'faq_item_background_color',
            [
                'label'     => __('Background Color', 'custom-faq-widget'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#ffffff', // Default background color
                'selectors' => [
                    '{{WRAPPER}} .faq-item' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'faq_item_padding',
            [
                'label'      => __('Padding', 'custom-faq-widget'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .faq-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'faq_item_margin',
            [
                'label'      => __('Margin', 'custom-faq-widget'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .faq-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Section for Answers
        $this->start_controls_section(
            'answer_style_section',
            [
                'label' => __('Answer', 'custom-faq-widget'),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'answer_color',
            [
                'label'     => __('Text Color', 'custom-faq-widget'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq-answer' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'answer_typography',
                'label'    => __('Typography', 'custom-faq-widget'),
                'selector' => '{{WRAPPER}} .faq-answer',
            ]
        );

        $this->add_control(
            'answer_background_color',
            [
                'label'     => __('Background Color', 'custom-faq-widget'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq-answer' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        if ($settings['faq_items']) {
            echo '<div class="custom-faq-widget">';
            foreach ($settings['faq_items'] as $item) {
                echo '<div class="faq-item">';
                echo '<h3 class="faq-question">' . esc_html($item['question']) . '</h3>';
                echo '<div class="faq-answer" style="display: none;">' . esc_html($item['answer']) . '</div>';
                echo '<button class="faq-toggle-btn">Open Answer</button>';
                echo '</div>';
            }
            echo '</div>';
        }
    }

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Custom_FAQ_Widget());
