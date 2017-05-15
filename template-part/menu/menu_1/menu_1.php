<div class="top-menu">
	<div class="container">
		<div id="toggle">		    
		    <div id="toggle">
		    	<p>Menu</p>
		    </div>
		    <div id="popout">
			    <?php
			    wp_nav_menu([
			        'theme_location' => 'top',
			        'menu_id'        => 'top-menu',
			        'menu_class'     => 'nav-menu'
			    ]);
			    ?>
		    </div>
		</div>
	    <?php
	    wp_nav_menu([
	        'theme_location' => 'top',
	        'menu_id'        => 'top-menu',
	        'menu_class'     => 'nav-menu'
	    ]);
	    ?>
    </div>
</div>
