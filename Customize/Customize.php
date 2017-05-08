<?php

namespace App;

class Customize
{
    /**
     * [$title description]
     * @var array
     * @version  1.0 
     * setting_id
     * section_id
     * 
     * title_section
     * 
     * label_setting
     * type
     * priority
     * 
     * default
     * transport
     */
    private $fields;
    private $wp_customize;

    public function __construct($fields)
    {
        global $wp_customize;
        $this->wp_customize = $wp_customize;
        $this->fields       = $fields;
        add_action( 'customize_register', array( $this, 'create_customize' ) );
    }

    protected function Setting($fields)
    {
    	if(empty($fields['default'])){
    		$fields['default'] = '';
    	}
    	if(empty($fields['transport'])){
    		$fields['transport'] = 'postMessage';
    	}
        $this->wp_customize->add_setting(
            $fields['setting_id'],
            [
                'default'   => $fields['default'],
                'transport' => $fields['transport'],
            ]
        );
    }

    protected function Section($fields)
    {
    	if(empty($fields['title_section'])){
    		$fields['title_section'] = 'Mặc định';
    	}
    	if(empty($fields['priority'])){
    		$fields['priority'] = 30;
    	}
        $this->wp_customize->add_section(
            $fields['section_id'],
            [
                'title'    => $fields['title_section'],
                'priority' => $fields['priority'],
            ]
        );
    }

    protected function Control($fields){
    	if(empty($fields['label_setting'])){
    		$fields['label_setting'] = 'Mặc định';
    	}
    	if(empty($fields['type'])){
    		$fields['type'] = 'text';
    	}
    	$this->wp_customize->add_control(
    		new WP_Customize_Control(
    			$this->wp_customize,
    			$fields['setting_id'],
    			[
    				'label' => $fields['label_setting'],
    				'section' => $fields['section_id'],
    				'type' => $fields['type']
    			]
    		)
    	);
    }

    public function create_customize() {
        $this->Setting($this->fields);
        $this->Section($this->fields);
        $this->Control($this->fields);
    }
}
