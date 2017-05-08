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
     * control_id
     * 
     * title_section
     * 
     * label_control
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

    public function AddSetting($fields)
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

    public function AddSection($fields)
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

    public function AddControl($fields){
    	if(empty($fields['label_control'])){
    		$fields['label_control'] = 'Mặc định';
    	}
    	if(empty($fields['type'])){
    		$fields['type'] = 'text';
    	}
    	$this->wp_customize->add_control(
    		new WP_Customize_Control(
    			$this->wp_customize,
    			$fields['setting_id'],
    			[
    				'label' => $fields['label_control'],
    				'section' => $fields['section_id'],
    				'type' => $fields['type']
    			]
    		)
    	);
    }

    public function create_customize() {
        $this->AddSetting($this->fields);
        $this->AddSection($this->fields);
        $this->AddControl($this->fields);
    }

    // public function add_setting($section, $fields) {

    // }
}
