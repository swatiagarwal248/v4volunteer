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
				<?php
				$color_css = 'class="swatch" style="background-color:#'.$default_map_all.'"';
				$all_cat_image = '';
				if($default_map_all_icon != NULL) {
					$all_cat_image = html::image(array(
						'src'=>$default_map_all_icon,
						'style'=>'float:left;'
					));
					$color_css = '';
				}
				?>
			
				<?php
					foreach ($categories as $category => $category_info)
					{
						$blood_group_flag = 0;
						$category_title = $category_info[0];
						if ($category_title == 'Blood Group')
						{
							$blood_group_flag = 1;
						}
						$category_color = $category_info[1];
						$category_image = ($category_info[2] != NULL) ? url::convert_uploaded_to_abs($category_info[2]) : NULL;
						$color_css = 'class="swatch" style="background-color:#'.$category_color.'"';
						if($category_info[2] != NULL) {
							$category_image = html::image(array(
								'src'=>$category_image,
								'style'=>'float:left;'
								));
							$color_css = '';
						}
						echo '<li class="c"><a href="#" id="cat_'. $category .'"><span '.$color_css.'>'.$category_image.'</span><span class="category-title">'.$category_title.'</span></a>';
						// Get Children
						echo '<div class="hide" id="child_'. $category .'">';
                                                if( sizeof($category_info[3]) != 0)
                                                {
                                                    echo '<ul>';
                                                    foreach ($category_info[3] as $child => $child_info)
                                                    {
                                                            $child_title = $child_info[0];                                                            
                                                            $child_color = $child_info[1];
                                                            $child_image = ($child_info[2] != NULL) ? url::convert_uploaded_to_abs($child_info[2]) : NULL;
                                                            $color_css = 'class="swatch" style="background-color:#'.$child_color.'"';
                                                            if($child_info[2] != NULL) {
                                                                    $child_image = html::image(array(
                                                                            'src'=>$child_image,
                                                                            'style'=>'float:left;'
                                                                            ));
                                                            if ($blood_group_flag == 1)
                                                            {
																$child_image = '';
															}
                                                                    $color_css = '';
                                                            }
                                                              echo '<li class="c"><a href="#" id="cat_'. $child .'"><span '.$color_css.'>'.$child_image.'</span><span class="category-title">'.$child_title.'</span></a></li>';
                                                            
                                                    }
                                                    echo '</ul>';
                                                }
						echo '</div></li>';
					}
				?>
			</ul>
			<!-- / category filters -->
<!-- content blocks -->

				<br />		<?php
			// Action::main_sidebar - Add Items to the Entry Page Sidebar
			Event::run('ushahidi_action.main_sidebar');
			?>

		</div>
	
		<!-- / right column -->
	
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
		<!-- content column -->
		

	</div>
</div>
<!-- / main body -->

<!-- content -->
<div class="content-container">

	<!-- content blocks -->
	<div class="content-blocks clearingfix">
		<ul class="content-column">
			<?php blocks::render(); ?>
		</ul>
	</div>
	<!-- /content blocks -->

</div>
<!-- content -->
