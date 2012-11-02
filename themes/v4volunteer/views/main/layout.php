<!-- main body -->
<div id="main" class="clearingfix">
	<div id="mainmiddle" class="floatbox withright">

	<?php if ($site_message != ''): ?>
		<div class="green-box">
			<h3><?php echo $site_message; ?></h3>
		</div>
	<?php endif; ?>
	<!-- Include navigation block -->
<?php include 'navigation_block.php'; ?>
		<!-- right column -->
		<div id="right" class="clearingfix">
<img src="<?php echo url::file_loc('img'); ?>media/img/Usingthecategoryfilter.png"  alt="map" width = "130px" height = "20px"/>
		
		Select a Category below and the dots on the map will refresh according to your selection.
		<ul id="nav">
			<!-- category filters -->
			

			<ul id="category_switch">
				<?php
			$color_css = 'class="swatch" style="background-color:#'.$default_map_all.'"';
				$all_cat_image = '';
				if ($default_map_all_icon != NULL)
				{
					$all_cat_image = html::image(array(
						'src'=>$default_map_all_icon,
						'style'=>'float:left;padding-right:5px;'
					));
					$color_css = '';
				}
				?>
				<li class="c">
					<a class="active" id="cat_0" href="#">
						<span <?php echo $color_css; ?>><?php echo $all_cat_image; ?></span>
						<span class="category-title"><?php echo Kohana::lang('ui_main.all_categories');?></span>
					</a>
				</li>
				<?php
					foreach ($categories as $category => $category_info)
					{
						$category_title = $category_info[0];
						$category_color = $category_info[1];
						$category_image = ($category_info[2] != NULL)
						    ? url::convert_uploaded_to_abs($category_info[2])
						    : NULL;

						$color_css = 'class="swatch" style="background-color:#'.$category_color.'"';
						if ($category_info[2] != NULL)
						{
							$category_image = html::image(array(
								'src'=>$category_image,
								'style'=>'float:left;padding-right:5px;'
								));
							$color_css = '';
						}

						echo '<li class="c">'
						    . '<a href="#" id="cat_'. $category .'">'
						    . '<span '.$color_css.'>'.$category_image.'</span>'
						    . '<span class="category-title">'.$category_title.'</span>'
						    . '</a>';

						// Get Children
						echo '<div class="hide" id="child_'. $category .'">';
						if (sizeof($category_info[3]) != 0)
						{
							echo '<ul>';
							foreach ($category_info[3] as $child => $child_info)
							{
								$child_title = $child_info[0];
								$child_color = $child_info[1];
								$child_image = ($child_info[2] != NULL)
								    ? url::convert_uploaded_to_abs($child_info[2])
								    : NULL;
								
								$color_css = 'class="swatch" style="background-color:#'.$child_color.'"';
								if ($child_info[2] != NULL)
								{
									$child_image = html::image(array(
										'src' => $child_image,
										'style' => 'float:left;padding-right:5px;'
									));

									$color_css = '';
								}

								echo '<li class = "c" style="padding-left:20px;">'
								    . '<a href="#" id="cat_'. $child .'">'
								    . '<span '.$color_css.'>'.$child_image.'</span>'
								    . '<span class="category-title">'.$child_title.'</span>'
								    . '</a>'
								    . '</li>';
							}
							echo '</ul>';
						}
						echo '</div></li>';
					}
				?>
			</ul>
			</ul>
			<!-- / category filters -->

			<?php if ($layers): ?>
				<!-- Layers (KML/KMZ) -->
				<div class="cat-filters clearingfix" style="margin-top:20px;">
					<strong><?php echo Kohana::lang('ui_main.layers_filter');?> 
						<span>
							[<a href="javascript:toggleLayer('kml_switch_link', 'kml_switch')" id="kml_switch_link">
								<?php echo Kohana::lang('ui_main.hide'); ?>
							</a>]
						</span>
					</strong>
				</div>
				<ul id="kml_switch" class="category-filters">
				<?php
					foreach ($layers as $layer => $layer_info)
					{
						$layer_name = $layer_info[0];
						$layer_color = $layer_info[1];
						$layer_url = $layer_info[2];
						$layer_file = $layer_info[3];

						$layer_link = ( ! $layer_url)
						    ? url::base().Kohana::config('upload.relative_directory').'/'.$layer_file
						    : $layer_url;
						
						echo '<li>'
						    . '<a href="#" id="layer_'. $layer .'">'
						    . '<div class="swatch" style="background-color:#'.$layer_color.'"></div>'
						    . '<div class="layer-name">'.$layer_name.'</div>'
						    . '</a>'
						    . '</li>';
					}
				?>
				</ul>
				<!-- /Layers -->
			<?php endif; ?>

			<br />

			<!-- additional content -->

			<?php if (Kohana::config('settings.allow_reports')): ?>
				<div class="additional-content" >
					<h5><?php echo Kohana::lang('ui_main.how_to_report'); ?></h5>

					<div>


						<!-- Email -->
						<?php if ( ! empty($report_email)): ?>
						<div style="margin-bottom:10px;">
							<strong><?php echo Kohana::lang('ui_main.report_option_2'); ?>:</strong><br/>
							<a href="mailto:<?php echo $report_email?>"><?php echo $report_email?></a>
						</div>
						<?php endif; ?>

						<!-- Twitter -->
						<?php if ( ! empty($twitter_hashtag_array)): ?>
						<div style="margin-bottom:10px;">
							<strong><?php echo Kohana::lang('ui_main.report_option_3'); ?>:</strong><br/>
							<?php foreach ($twitter_hashtag_array as $twitter_hashtag): ?>
								<span>#<?php echo $twitter_hashtag; ?></span>
								<?php if ($twitter_hashtag != end($twitter_hashtag_array)): ?>
									<br />
								<?php endif; ?>
							<?php endforeach; ?>
						</div>
						<?php endif; ?>

						<!-- Web Form -->
						<div style="margin-bottom:10px;">
						<?php echo Kohana::lang('ui_main.report_option_4'); ?>
					<ul style="margin-left:20px;"><li>
					<a href = "<?php echo url::site(); ?>reports/submit?type=1" target="_blank">Volunteer Now
						</a>
					</li>
					<li>
								<a href = "<?php echo url::site(); ?>reports/submit?type=2" target="_blank">Register NGO
						</a>
					</li>
					<li>
													<a href = "<?php echo url::site(); ?>reports/submit?type=3" target="_blank">Post activities/openings
						</a>
					</li>
					<li>
							<a href = "<?php echo url::site(); ?>reports/submit?type=4" target="_blank">Report blood group
						</a>
					</li>
					</ul>
						</p>
						</div>

					</div>

				</div>
			<?php endif; ?>

			<!-- / additional content -->
			
			<!-- Checkins -->
			<?php if (Kohana::config('settings.checkins')): ?>
			<br/>
			<div class="additional-content">
				<h5><?php echo Kohana::lang('ui_admin.checkins'); ?></h5>
				<div id="cilist"></div>
			</div>
			<?php endif; ?>
			<!-- /Checkins -->
			
			<?php
			// Action::main_sidebar - Add Items to the Entry Page Sidebar
			Event::run('ushahidi_action.main_sidebar');
			?>
	
		</div>
		<!-- / right column -->
	
		<!-- content column -->
		<div id="content" class="clearingfix">
			<div class="floatbox">
	<img src="<?php echo url::file_loc('img'); ?>media/img/Usingthemap.png"  alt="map" width = "100px" height= "20px"/>
		Zoom In and Out of the Map by using Mouse Scroll or buttons on the Vertical Scale Bar in the Map. Use the Arrow Buttons to Move left,right,up,down and pan the map view. Click on the Colored dots for more Information. Use the  Search Feature to find Reports or You can use the  Reports Listing for more filters.
		
			

				<?php								
				// Map and Timeline Blocks
				echo $div_map;
				echo $div_timeline;
				?>
				<?php blocks::render(); ?>
			</div>
		</div>
		<!-- / content column -->

	</div>
</div>
<!-- / main body -->

			
	<!-- /content blocks -->

<!-- content -->
