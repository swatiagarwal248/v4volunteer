<div id="main" class="clearing-fix">
	<!-- Include navigation block -->
<?php include 'navigation_block.php'; ?>
<div id="content">
	<div class="content-bg">

		<?php if ($site_submit_report_message != ''): ?>
			<div class="green-box" style="margin: 25px 25px 0px 25px">
				<h3><?php echo $site_submit_report_message; ?></h3>
			</div>
		<?php endif; ?>
		<?php $name1 = $_GET['type'];?>
		
		<!-- start report form block -->
		
		<?php print form::open(NULL, array('enctype' => 'multipart/form-data', 'id' => 'reportForm', 'name' => 'reportForm', 'class' => 'gen_forms')); ?>
		<input type="hidden" name="latitude" id="latitude" value="<?php echo $form['latitude']; ?>">
		<input type="hidden" name="longitude" id="longitude" value="<?php echo $form['longitude']; ?>">
		<input type="hidden" name="country_name" id="country_name" value="<?php echo $form['country_name']; ?>" />
		<input type="hidden" name="incident_zoom" id="incident_zoom" value="<?php echo $form['incident_zoom']; ?>" />
		<div class="big-block">
			<?php if ($form_error): ?>
			<!-- red-box -->
			<div class="red-box">
				<h3>Error!</h3>
				<ul>
					<?php
						foreach ($errors as $error_item => $error_description)
						{
							// print "<li>" . $error_description . "</li>";
							print (!$error_description) ? '' : "<li>" . $error_description . "</li>";
						}
					?>
				</ul>
			</div>
			<?php endif; ?>
			<div class="row">
				<input type="hidden" name="form_id" id="form_id" value="<?php echo $id?>">
			</div>
			<div class="report_left">
				<div class="report_rformSwitchow">
					<?php if(count($forms) > 1): ?>
					<div class="row">
							<span class="sel-holder">
							<?php if($name1 =="4"): ?>
									<script> formSwitch(1,''); </script>
								<h4>Report your Blood Group</h4>	
									<div class="report_row">
									<h4>
									<?php echo Kohana::lang('ui_main.reports_BloodGroup_title'); ?> <span class="required">*</b></span></h4>
									<?php print form::input('incident_title', $form['incident_title'], ' class="text long"'); ?>		
									</div>			
								<?php else: ?>
							<?php if($name1 =="2"): ?>
									<script> formSwitch(4,''); </script>
								<h4>	Register NGO</h4>	
									<div class="report_row">
										
						<h4>	<?php echo Kohana::lang('ui_main.reports_NGO_title'); ?> <span class="required">*</b></span></h4>
				<?php print form::input('incident_title', $form['incident_title'], ' class="text long"'); ?>		
				</div>			
							<?php else: ?>
								<?php if($name1=="3"): ?>
									<script> formSwitch(3,''); </script>
								<h4>Post Activities/ Openings</h4>
									<div class="report_row">
						<h4>	<?php echo Kohana::lang('ui_main.reports_activity_title'); ?> <span class="required">*</span></h4>
				<?php print form::input('incident_title', $form['incident_title'], ' class="text long"'); ?>
				</div>
							<?php else: ?>
								<h4>Volunteer Form  </h4>
					Plese see our<a href = "http://v4volunteer.com/privacy"> Privacy Policy</a> for the contact information you provide us.
							</br>
							<script> formSwitch(2,''); </script>
							<div class="report_row"></br></br>
						<h4>	<?php echo Kohana::lang('ui_main.reports_Volunteer_title'); ?> <span class="required">*</span></h4>
						
				<?php print form::input('incident_title', $form['incident_title'], ' class="text long"'); ?>
				
					<div class="report_row">
							<?php endif; ?>
							<?php endif; ?>	
							<?php endif; ?>							
							</h4> </span>
						<div id="form_loader" style="float:left;"></div>
					</div>
					<?php endif; ?>
					
				</div>
				<div class="report_row">
					<h4><?php echo Kohana::lang('ui_main.reports_description'); ?> <span class="required">*</span> </h4>
					<?php print form::textarea('incident_description', $form['incident_description'], ' rows="10" class="textarea long" ') ?>
				</div>
				<div class="report_row" id="datetime_default">
					<h4>
						<a href="#" id="date_toggle" class="show-more"><?php echo Kohana::lang('ui_main.modify_date'); ?></a>
						<?php echo Kohana::lang('ui_main.date_time'); ?>: 
						<?php echo Kohana::lang('ui_main.today_at')." "."<span id='current_time'>".$form['incident_hour']
							.":".$form['incident_minute']." ".$form['incident_ampm']."</span>"; ?>
						<?php if($site_timezone != NULL): ?>
							<small>(<?php echo $site_timezone; ?>)</small>
						<?php endif; ?>
					</h4>
				</div>
				<div class="report_row hide" id="datetime_edit">
					<div class="date-box">
						<h4><?php echo Kohana::lang('ui_main.reports_date'); ?></h4>
						<?php print form::input('incident_date', $form['incident_date'], ' class="text short"'); ?>
						<script type="text/javascript">
							$().ready(function() {
								$("#incident_date").datepicker({ 
									showOn: "both", 
									buttonImage: "<?php echo url::file_loc('img'); ?>media/img/icon-calendar.gif", 
									buttonImageOnly: true 
								});
							});
						</script>
					</div>
					<div class="time">
						<h4><?php echo Kohana::lang('ui_main.reports_time'); ?></h4>
						<?php
							for ($i=1; $i <= 12 ; $i++)
							{
								// Add Leading Zero
								$hour_array[sprintf("%02d", $i)] = sprintf("%02d", $i);
							}
							for ($j=0; $j <= 59 ; $j++)
							{
								// Add Leading Zero
								$minute_array[sprintf("%02d", $j)] = sprintf("%02d", $j);
							}
							$ampm_array = array('pm'=>'pm','am'=>'am');
							print form::dropdown('incident_hour',$hour_array,$form['incident_hour']);
							print '<span class="dots">:</span>';
							print form::dropdown('incident_minute',$minute_array,$form['incident_minute']);
							print '<span class="dots">:</span>';
							print form::dropdown('incident_ampm',$ampm_array,$form['incident_ampm']);
						?>
						<?php if ($site_timezone != NULL): ?>
							<small>(<?php echo $site_timezone; ?>)</small>
						<?php endif; ?>
					</div>
					<div style="clear:both; display:block;" id="incident_date_time"></div>
				</div>
				<div class="report_row">
					<h4><?php echo Kohana::lang('ui_main.reports_categories'); ?> <span class="required">*</span></h4>
					<div class="report_category" id="categories">
					<?php
						$selected_categories = (!empty($form['incident_category']) AND is_array($form['incident_category']))
							? $selected_categories = $form['incident_category']
							: array();
							
						$columns = 2;
						echo category::tree($categories, TRUE, $selected_categories, 'incident_category', $name1,$columns);
						?>
					</div>
				</div>


				<?php
				// Action::report_form - Runs right after the report categories
				Event::run('ushahidi_action.report_form');
				?>

				<?php echo $custom_forms ?>

			
			</div>
		
				<?php if ( ! $multi_country AND count($cities) > 1): ?>
				<div class="report_row">
					<h4><?php echo Kohana::lang('ui_main.reports_find_location'); ?></h4>
					<?php print form::dropdown('select_city',$cities,'', ' class="select" '); ?>
				</div>
				<?php endif; ?>
			<div class="report_left">
				<div class="report_row">
					<div id="divMap" class="report_map">
						<div id="geometryLabelerHolder" class="olControlNoSelect">
							<div id="geometryLabeler">
								<div id="geometryLabelComment">
									<span id="geometryLabel">
										<label><?php echo Kohana::lang('ui_main.geometry_label');?>:</label> 
										<?php print form::input('geometry_label', '', ' class="lbl_text"'); ?>
									</span>
									<span id="geometryComment">
										<label><?php echo Kohana::lang('ui_main.geometry_comments');?>:</label> 
										<?php print form::input('geometry_comment', '', ' class="lbl_text2"'); ?>
									</span>
								</div>
								<div>
									<span id="geometryColor">
										<label><?php echo Kohana::lang('ui_main.geometry_color');?>:</label> 
										<?php print form::input('geometry_color', '', ' class="lbl_text"'); ?>
									</span>
									<span id="geometryStrokewidth">
										<label><?php echo Kohana::lang('ui_main.geometry_strokewidth');?>:</label> 
										<?php print form::dropdown('geometry_strokewidth', $stroke_width_array, ''); ?>
									</span>
									<span id="geometryLat">
										<label><?php echo Kohana::lang('ui_main.latitude');?>:</label> 
										<?php print form::input('geometry_lat', '', ' class="lbl_text"'); ?>
									</span>
									<span id="geometryLon">
										<label><?php echo Kohana::lang('ui_main.longitude');?>:</label> 
										<?php print form::input('geometry_lon', '', ' class="lbl_text"'); ?>
									</span>
								</div>
							</div>
							<div id="geometryLabelerClose"></div>
						</div>
				
					<div class="report-find-location">
					    <div id="panel" class="olControlEditingToolbar"></div>
						<div class="btns" style="float:left;">
							<ul style="padding:4px;">
								<li><a href="#" class="btn_del_last"><?php echo strtoupper(Kohana::lang('ui_main.delete_last'));?></a></li>
								<li><a href="#" class="btn_del_sel"><?php echo strtoupper(Kohana::lang('ui_main.delete_selected'));?></a></li>
								<li><a href="#" class="btn_clear"><?php echo strtoupper(Kohana::lang('ui_main.clear_map'));?></a></li>
							</ul>
						</div>
						<div style="clear:both;"></div>
						<?php print form::input('location_find', '', ' title="'.Kohana::lang('ui_main.location_example').'" class="findtext"'); ?>
						<div style="float:left;margin:9px 0 0 5px;">
							<input type="button" name="button" id="button" value="<?php echo Kohana::lang('ui_main.find_location'); ?>" class="btn_find" />
						</div>
						<div id="find_loading" class="report-find-loading"></div>
						<div style="clear:both;" id="find_text"><?php echo Kohana::lang('ui_main.pinpoint_location'); ?>.</div>
					</div>
				</div>
				<?php Event::run('ushahidi_action.report_form_location', $id); ?>
				<div class="report_row">
					<h4>
						<?php echo Kohana::lang('ui_main.reports_location_name'); ?> 
						<span class="required">*</span><br />
						<span class="example"><?php echo Kohana::lang('ui_main.detailed_location_example'); ?></span>
					</h4>
					<?php print form::input('location_name', $form['location_name'], ' class="text long"'); ?>
				</div>
					<?php if(($name1=="3" )OR ($name1 == "2")): ?>
	
				<!-- Photo Fields -->
				<div id="divPhoto" class="report_row">
					<h4><?php echo Kohana::lang('ui_main.reports_photos'); ?></h4>
					<?php 
						// Initialize the counter
						$i = (empty($form['incident_photo']['name'][0])) ? 1 : 0;
					?>

					<?php if (empty($form['incident_photo']['name'][0])): ?>
					<div class="report_row">
						<?php print form::upload('incident_photo[]', '', ' class="file long2"'); ?>
						<a href="#" class="add" onClick="addFormField('divPhoto', 'incident_photo','photo_id','file'); return false;">add</a>
					</div>
					<?php else: ?>
						<?php foreach ($form[$this_field]['name'] as $value): ?>

							<div class="report_row" id="<?php echo $i; ?>">
								<?php print form::upload('incident_photo[]', $value, ' class="file long2"'); ?>
								<a href="#" class="add" onClick="addFormField('divPhoto','incident_photo','photo_id','file'); return false;">add</a>

								<?php if ($i != 0): ?>
									<?php $css_id = "#incident_photo_".$i; ?>
									<a href="#" class="rem"	onClick="removeFormField('<?php echo $css_id; ?>'); return false;">remove</a>
								<?php endif; ?>

							</div>

							<?php $i++; ?>

						<?php endforeach; ?>
					<?php endif; ?>

					<?php print form::input(array('name'=>'photo_id','type'=>'hidden','id'=>'photo_id'), $i); ?>
				</div>
			</div>
			<?php endif; ?>
			
		</div>
									
				<div class="report_row">
					<input name="submit" type="submit" value="<?php echo Kohana::lang('ui_main.reports_btn_submit'); ?>" class="btn_submit" /> 
				</div>
			</div>
		</div>
		<?php print form::close(); ?>
		<!-- end report form block -->
	</div>
</div>
</div>
</div>
