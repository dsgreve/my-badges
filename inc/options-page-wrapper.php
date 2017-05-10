<h2><?php esc_attr_e( '2 Columns Layout: static (px)', 'wp_admin_style' ); ?></h2>

<div class="wrap">

	<div id="icon-options-general" class="icon32"></div>
	<h1><?php esc_attr_e( 'Official Treehouse Badges Plugin', 'wp_admin_style' ); ?></h1>

	<div id="poststuff">

		<div id="post-body" class="metabox-holder columns-2">

			<!-- main content -->
			<div id="post-body-content">

				<div class="meta-box-sortables ui-sortable">
						<?php if (!isset( $wptreehouse_username ) || $wptreehouse_username == '' ): ?> <!-- test if username is not pressent or blank -->
					<div class="postbox">

						<div class="handlediv" title="Click to toggle"><br></div>
						<!-- Toggle -->

						<h2 class="hndle"><span><?php esc_attr_e( 'Lets Get started', 'wp_admin_style' ); ?></span>
						</h2>

						<div class="inside">
							<form name="wptreehouse_username_form" method="post" action="">
								<input type="hidden" name="wptreehouse_form_submitted" value="Y">
							<table class="form-table">
								<tr>
									<th class="row-title"><?php esc_attr_e( 'User Name', 'wp_admin_style' ); ?></th>
									<th><?php esc_attr_e( 'Table header cell #2', 'wp_admin_style' ); ?></th>
								</tr>
								<tr valign="top">
									<td scope="row">
										<label for="wptreehouse_username">
											<?php esc_attr_e(
												'Treehouse User Name', 'wp_admin_style'
											); ?>
										</label>
									</td>
									<td>
										<input name="wptreehouse_username" id="wptreehouse_username" type="text" value="" class="regular-text" /><br>
									</td>
								</tr>
							</table>
							<p>
								<input class="button-primary" type="submit" name="wptreehouse_username_submit" value="<?php esc_attr_e( 'Save' ); ?>" />
							</p>
						</form>


						</div>
						<!-- .inside -->

					</div>
					<!-- .postbox -->
				<?php else: ?> <!-- if no username is present-->

					<div class="postbox">

						<div class="handlediv" title="Click to toggle"><br></div>
						<!-- Toggle -->

						<h2 class="hndle"><span><?php esc_attr_e( 'Most Recent Badges', 'wp_admin_style' ); ?></span>
						</h2>

						<div class="inside">
							<p>Below are your 20 most recent badges.</p>

							<ul class="wptreehouse-badges">
								<?php for ( $i = 0; $i < 20; $i++ ): ?>
									<li>
										<ul>
											<li>
												<img class="wptreehouse-gravatar" width="120px" src="<?php echo $plugin_url . '/images/wp-badge.png'; ?>">
											</li>
											<li class="wptreehouse-badge-name">
												<a href="#">Badge Name</a>
											</li>
											<li class="wptreehouse-project-name">
												<a href="#">Project Name</a>
											</li>
										</ul>
									</li>
									<?php endfor; ?>
							</ul>

						</div>
						<!-- .inside -->

					</div>
					<!-- .postbox -->
				<?php endif; ?>

				</div>
				<!-- .meta-box-sortables .ui-sortable -->

			</div>
			<!-- post-body-content -->

			<!-- sidebar -->
			<div id="postbox-container-1" class="postbox-container">

				<div class="meta-box-sortables">
					<?php if (isset( $wptreehouse_username ) && $wptreehouse_username != '' ): ?>
					<div class="postbox">
						<h3><span><?php echo $wptreehouse_username; ?></span></h3>
						<div class="inside">
							<p>
								<img width="100%" class="wptreehouse-gravatar" src="<?php echo $plugin_url . '/images/mike-the-frog.png'; ?>" alt="Mike the Frog Gravatar">
							</p>
						</div> <!-- .inside ..-->
						<ul class="wptreehouse-badges-and-points">
							<li>Badges: <strong>200</strong></li>
							<li>Points: <strong>10000</strong></li>

						</ul>

						<div class="handlediv" title="Click to toggle"><br></div>
						<!-- Toggle -->

						<div class="inside">
							<form name="wptreehouse_username_form" method="post" action="">
								<input type="hidden" name="wptreehouse_form_submitted" value="Y">
								<p>
									<?php esc_attr_e(
												'User Name', 'wp_admin_style'
											); ?>
									</p>
									<p>
										<input style="width:100%;" name="wptreehouse_username" id="wptreehouse_username" type="text" value="<?php echo $wptreehouse_username; ?>" />
									</p>
								</tr>
							</table>
							<p>
								<input class="button-primary" type="submit" name="wptreehouse_username_submit" value="<?php esc_attr_e( 'Update' ); ?>" />
							</p>
						</form>
						</div>
						<!-- .inside -->

					</div>
				<?php endif; ?>
					<!-- .postbox -->

				</div>
				<!-- .meta-box-sortables -->

			</div>
			<!-- #postbox-container-1 .postbox-container -->

		</div>
		<!-- #post-body .metabox-holder .columns-2 -->

		<br class="clear">
	</div>
	<!-- #poststuff -->

</div> <!-- .wrap -->
