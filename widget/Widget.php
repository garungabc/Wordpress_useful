<?php
/**
 * create a widget
 *
 * @since      1.0.0
 * @package    msc
 * @subpackage widget
 * @author     Monkeyscode <monkeyscodestudio@gmail.com>
 */

namespace MSC;

class Widget extends \WP_Widget
{
    /**
     * @var   array
     * @since 1.0.0
     */
    public $fields;

    /**
     * @var   array
     * @since 1.0.0
     */
    protected $widget;

	/**
	 * constructor
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function __construct($widget, $fields) 
	{
		if (!is_array($widget) || !is_array($fields)) {
		    wp_die(__('It must be an array.', 'monkeyscode'));
		}

		if (empty($widget) || empty($fields)) {
		    wp_die(__('It is not empty.', 'monkeyscode'));
		}

		$this->widget   = $widget;
		$this->fields   = $fields;

		parent::__construct(
			$this->widget['id'],
			__($this->widget['label'], 'monkeyscode'),
			['description' => __($this->widget['description'], 'monkeyscode')]
		);

		add_action('widgets_init', [$this, 'widgetInit']);

	}

	/**
	 * register widget
	 *
	 * @since 1.1.0
	 * @return void
	 */
	public function widgetInit()
	{
		register_widget($this);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param  array $args     Widget arguments.
	 * @param  array $instance Saved values from database.
	 * @return void
	 */
	public function widget($args, $instance) 
	{
		echo $args['before_widget'];

		$title = apply_filters( 'widget_title', $instance['title'] );

		if (!empty($title)) {
            echo $args['before_title'] . $title . $args['after_title'];
        }

		$this->handle($instance);

		echo $args['after_widget'];
	}

	/**
	 * handle data
	 *
	 * @param  array $instance
	 * @since  1.2.1
	 * @return void
	 */
	public function handle($instance)
	{

	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param  array $instance Previously saved values from database.
	 * @return void
	 */
	public function form($instance) 
	{
		foreach ($this->fields as $field) {

			if (@$instance[$field['name']] == null) $instance[$field['name']] = '';

			$this->checkTypeOfField($field, $instance[$field['name']]);
		}
	}

	/**
	 * check type of the field and navigate it to correct rendering method
	 *
	 * @param array $field
	 * @param array $instance
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function checkTypeOfField($field, $instance) 
	{
        switch ($field['type']) {
            case 'text':
                $this->renderTextField($field, $instance);
                break;
            case 'select':
                $this->renderSelectField($field, $instance);
                break;
            case 'checkbox':
                $this->renderCheckboxField($field, $instance);
                break;

        }
	}

	/**
	 * render input text field
	 *
	 * @since 1.0.0
	 *
	 * @param  array $field
	 * @param  array $instance
	 * @return void
	 */
	public function renderTextField($field, $instance) 
	{
		?>
		<p>

		<label for="<?php echo esc_attr($this->get_field_id($field['name'])); ?>">
			<?php esc_attr_e($field['label'] . ':', 'text_domain'); ?>
		</label>

		<input class="widefat"
				id="<?php echo esc_attr( $this->get_field_id($field['name']) ); ?>"
				name="<?php echo esc_attr( $this->get_field_name($field['name']) ); ?>"
				type="text"
				value="<?php echo esc_attr($instance); ?>">

		</p>
		<?php
	}

	/**
	 * render input number field
	 *
	 * @since 1.2.2
	 *
	 * @param  array $field
	 * @param  array $instance
	 * @return void
	 */
	public function renderNumberField($field, $instance) 
	{
		?>
		<p>

		<label for="<?php echo esc_attr($this->get_field_id($field['name'])); ?>">
			<?php esc_attr_e($field['label'] . ':', 'text_domain'); ?>
		</label>

		<input class="widefat"
				id="<?php echo esc_attr( $this->get_field_id($field['name']) ); ?>"
				name="<?php echo esc_attr( $this->get_field_name($field['name']) ); ?>"
				type="number"
				value="<?php echo esc_attr($instance); ?>">

		</p>
		<?php
	}

	/**
	 * render a checkbox field
	 *
	 * @since 1.0.0
	 *
	 * @param array $field
	 * @param array $instance
	 * @return void
	 */
	public function renderCheckboxField($field, $instance) 
	{
	    ?>
	    <p>

        <label for="<?php echo esc_attr($this->get_field_id($field['name'])); ?>">
        	<?php esc_attr_e($field['label'] . ':', 'text_domain'); ?>
        </label>

        <input class="widefat"
        		id="<?php echo esc_attr( $this->get_field_id($field['name']) ); ?>"
        		name="<?php echo esc_attr( $this->get_field_name($field['name']) ); ?>"
        		type="checkbox" value="<?php echo $field['name']; ?>"
        		<?php checked($instance, $field['name']); ?>>

	    </p>
	    <?php
	}

	/**
	 * render select field
	 *
	 * @since 1.0.0
	 *
	 * @param array $field
	 * @param array $instance
	 * @return void
	 */
	public function renderSelectField($field, $instance) 
	{
		?>
		<?php if (!empty($field['options'])) : ?>
		<p>

		<label for="<?php echo esc_attr($this->get_field_id($field['name'])); ?>">
			<?php esc_attr_e($field['label'] . ':', 'text_domain'); ?>
		</label>

		<select class="widefat"
				id="<?php echo esc_attr( $this->get_field_id($field['name']) ); ?>"
				name="<?php echo esc_attr( $this->get_field_name($field['name']) ); ?>">

			<?php foreach ($field['options'] as $key => $option) : ?>
				<option value="<?php echo $key; ?>" <?php selected($instance, (int) $key); ?>>
					<?php echo $option; ?>
				</option>

			<?php endforeach; ?>
		</select>

		</p>
		<?php endif; ?>
		<?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update($new_instance, $old_instance) 
	{
		$instance = array();

		foreach ($this->fields as $field) {
			/**
			 * @TODO validate url value with HTTP Protocol
			 */
            $instance[$field['name']] = (!empty( $new_instance[$field['name']])) ? strip_tags($new_instance[$field['name']]) : '';
		}

		return $instance;
	}
}
