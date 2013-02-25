<?php global $woocommerce; ?>

<?php do_action('woocommerce_before_customer_login_form'); ?>

<?php if(hana_get_opt('_login_page_style')=='modern') :	?>
<!-- modern style -->

<?php
//enqueue additional style and script
wp_enqueue_script('flexi-background', 	MEARI_SCRIPT_URL.'flexi-background.js', array('jquery'));
wp_enqueue_style( 'flexi-background', 	MEARI_CSS_URL . 'flexi-background.css');
wp_enqueue_style( 'login-style', 		MEARI_CSS_URL . 'login-styles.css');
?>

<style>
#body_wrapper{display: none;}
<?php 
set_bg('body.custom-login, body.boxed', 'login_page');				// body background
?>
</style>

<script type="text/javascript">
jQuery(function($) {
	$('body').addClass('custom-login');
	$('body > :not(#login_container)').hide();
	$('#login_container').appendTo('body');
	$('#login_wrapper').hanaFormSwitching();
});
</script>

<div id="login_container">
	
    <a href="<?php echo home_url(); ?>" title="Go to <?php bloginfo('name'); ?>">
    <?php if(hana_get_opt('_login_page_logo')=='image'):?>
    <img src="<?php echo hana_get_opt('_login_page_logo_image');?>" class="logo" alt="<?php bloginfo('name'); ?>" />
    <?php else:?>
    <h1 class="logo"><?php echo hana_get_opt('_login_page_logo_text');?></h1>
    <?php endif;?>
    </a>
    
	<?php $woocommerce->show_messages(); ?>
    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
    <div id="login_wrapper">
		<form method="post" class="login active" autocomplete="off">
			<h1><?php _e('Member Login', 'meari'); ?></h1>
			<input id="username" name="username" type="text" placeholder="Username" />
			<input id="password" name="password" type="password" placeholder="Password" />
			<?php if (get_option('woocommerce_enable_myaccount_registration')=='yes'):?><a rel="register" class="linkform"><?php _e('Register', 'meari');?></a><?php endif;?>
            <?php $woocommerce->nonce_field('login', 'login') ?>
			<input type="submit" name="login" value="<?php _e('Login', 'meari');?>" />
		</form> 
		
 		<?php if (get_option('woocommerce_enable_myaccount_registration')=='yes') : ?>
        
        <form method="post" class="register" autocomplete="off">
			<h1><?php _e('Member Register', 'meari'); ?></h1>
			<input id="reg_username" name="username" type="text" value="<?php if (isset($_POST['username'])) echo esc_attr($_POST['username']); ?>" placeholder="Username" />
			<input id="reg_email" name="email" type="email" <?php if (isset($_POST['email'])) echo esc_attr($_POST['email']); ?> placeholder="Email"/> 
            <input id="reg_password" name="password" type="password" placeholder="Password"/>
            <input id="reg_password2" name="password2" type="password" placeholder="Re-password"/>
			<div class="hover-opacity"><a rel="login" class="linkform"><?php _e('Login', 'meari');?></a></div>
            <?php $woocommerce->nonce_field('register', 'register') ?>
			<input type="submit" name="register" value="<?php _e('Register', 'meari');?>" />
		</form>   

		<?php endif; ?>
    </div>
    <a href="<?php echo esc_url( wp_lostpassword_url( home_url() ) ); ?>" class="forgot">Forgot your username or password?</a>
</div>

<?php else:?>
	
<?php $woocommerce->show_messages(); ?>

<!-- classic style -->

<?php if (get_option('woocommerce_enable_myaccount_registration')=='yes') : ?>

<div class="col2-set" id="customer_login">

	<div class="col-1">

<?php endif; ?>

		<h2><?php _e('Login', 'woocommerce'); ?></h2>
		<form method="post" class="login">
			<p class="form-row form-row-first">
				<label for="username"><?php _e('Username', 'woocommerce'); ?> <span class="required">*</span></label>
				<input type="text" class="input-text" name="username" id="username" />
			</p>
			<p class="form-row form-row-last">
				<label for="password"><?php _e('Password', 'woocommerce'); ?> <span class="required">*</span></label>
				<input class="input-text" type="password" name="password" id="password" />
			</p>
			<div class="clear"></div>
			
			<p class="form-row">
				<?php $woocommerce->nonce_field('login', 'login') ?>
				<input type="submit" class="button" name="login" value="<?php _e('Login', 'woocommerce'); ?>" />
				<a class="lost_password" href="<?php echo esc_url( wp_lostpassword_url( home_url() ) ); ?>"><?php _e('Lost Password?', 'woocommerce'); ?></a>
			</p>
		</form>

<?php if (get_option('woocommerce_enable_myaccount_registration')=='yes') : ?>	
		
	</div>
	
	<div class="col-2">
	
		<h2><?php _e('Register', 'woocommerce'); ?></h2>
		<form method="post" class="register" autocomplete="off">
		
			<p class="form-row form-row-first">
				<label for="reg_username"><?php _e('Username', 'woocommerce'); ?> <span class="required">*</span></label>
				<input type="text" class="input-text" name="username" id="reg_username" value="<?php if (isset($_POST['username'])) echo esc_attr($_POST['username']); ?>" />
			</p>
			<p class="form-row form-row-last">
				<label for="reg_email"><?php _e('Email', 'woocommerce'); ?> <span class="required">*</span></label>
				<input type="email" class="input-text" name="email" id="reg_email" <?php if (isset($_POST['email'])) echo esc_attr($_POST['email']); ?> />
			</p>
			<div class="clear"></div>
			
			<p class="form-row form-row-first">
				<label for="reg_password"><?php _e('Password', 'woocommerce'); ?> <span class="required">*</span></label>
				<input type="password" class="input-text" name="password" id="reg_password" />
			</p>
			<p class="form-row form-row-last">
				<label for="reg_password2"><?php _e('Re-enter password', 'woocommerce'); ?> <span class="required">*</span></label>
				<input type="password" class="input-text" name="password2" id="reg_password2" />
			</p>
			<div class="clear"></div>
			
			<!-- Spam Trap -->
			<div style="left:-999em; position:absolute;"><label for="trap">Anti-spam</label><input type="text" name="email_2" id="trap" /></div>
			
			<p class="form-row">
				<?php $woocommerce->nonce_field('register', 'register') ?>
				<input type="submit" class="button" name="register" value="<?php _e('Register', 'woocommerce'); ?>" />
			</p>
			
		</form>
		
	</div>
	
</div>
<?php endif; ?>

<?php endif;?>

<?php do_action('woocommerce_after_customer_login_form'); ?>