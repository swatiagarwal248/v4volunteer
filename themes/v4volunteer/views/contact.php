<div class="rightsidecontact" class="clearingfix">
		
		<h4>Team v4volunteer	</h4>
		
			<table>
			<tr>
			<td><input type="image" src="<?php echo url::file_loc('img'); ?>media/img/ujjwal.jpg"  alt="Volunteer" height = '80px' width = '80px' /></td>
			<td><div style ="font-weight:bold; font-size:16px;color:grey;">Ujjwal Jain </div></br><a href = "https://www.facebook.com/ujjwal.jain1"target="_blank">Facebook</a>|<a href="http://www.linkedin.com/pub/ujjwal-jain/29/b8/431" target="_blank">LinkedIn</a></td></tr>
			</td></br>
			<td>
			
			<tr><td><input type="image" src="<?php echo url::file_loc('img'); ?>media/img/swati.jpg"  alt="Volunteer" height = '80px' width = '80px'/></td>
			<td><div style ="font-weight:bold; font-size:16px;color:grey;">Swati Agarwal  </div></br><a href = "https://www.facebook.com/swati.agarwal248" target="_blank">Facebook</a>|<a href="http://www.linkedin.com/pub/swati-agarwal/39/45/62" target="_blank">LinkedIn</a></td></td>
			</tr></table></div>
	</div>

<div id="content">
	<div class="content-bg">
		<!-- Here is the start contacts block -->
		<div class="big-block">
			<div class = "aboutusbox">
					<ul class= "ulaboutus">	
	
			<h1><?php echo Kohana::lang('ui_main.contact'); ?></h1>
			Thank you for showing your interest in contacting v4volunteer.</br>
			You can join us on<a href = "https://www.facebook.com/pages/V-4-Volunteer/233160686805748" > Facebook</a>
and follow us on<a href = "http://twitter.com/v4volunteer"> Twitter</a> 
					<div id = "leftside"> 
</br><ul><li>If you are looking to volunteer,
<a href = "http://v4volunteer.com/reports/submit?type=1">Report your Volunteer aspiration</a></li>
<li>If you are representing an NGO, <a href = "http://v4volunteer.com/reports/submit?type=2" target = "_blank">Register your NGO</a></li>
<li>If you want to post an activity or opening, post it <a href = "http://v4volunteer.com/reports/submit?type=3">here.</a></li>
</ul>

</br>
</br>For any other queries contact us right here!

			</ul></br>
			</br>


			<div id="contact_us" class="contact">
				<?php
				if ($form_error)
				{
					?>
					<!-- red-box -->
					<div class="red-box">
						<h3>Error!</h3>
						<ul>
							<?php
							foreach ($errors as $error_item => $error_description)
							{
								print (!$error_description) ? '' : "<li>" . $error_description . "</li>";
							}
							?>
						</ul>
					</div>
					<?php
				}

				if ($form_sent)
				{
					?>
					<!-- green-box -->
					<div class="green-box">
						<h3><?php echo Kohana::lang('ui_main.contact_message_has_send'); ?></h3>
					</div>
					<?php
				}								
				?>
				<br>
				<div id ="half-block">
				<?php print form::open(NULL, array('id' => 'contactForm', 'name' => 'contactForm')); ?>
				<div class="report_row">
					<strong><?php echo Kohana::lang('ui_main.contact_name'); ?>:</strong><br />
					<?php print form::input('contact_name', $form['contact_name'], ' class="text"'); ?>
				</div>
				<div class="report_row">
					<strong><?php echo Kohana::lang('ui_main.contact_email'); ?>:</strong><br />
					<?php print form::input('contact_email', $form['contact_email'], ' class="text"'); ?>
				</div>
				<div class="report_row">
					<strong><?php echo Kohana::lang('ui_main.contact_phone'); ?>:</strong><br />
					<?php print form::input('contact_phone', $form['contact_phone'], ' class="text"'); ?>
				</div>
				<div class="report_row">
					<strong><?php echo Kohana::lang('ui_main.contact_subject'); ?>:</strong><br />
					<?php print form::input('contact_subject', $form['contact_subject'], ' class="text"'); ?>
				</div>								
				<div class="report_row">
					<strong><?php echo Kohana::lang('ui_main.contact_message'); ?>:</strong><br />
					<?php print form::textarea('contact_message', $form['contact_message'], ' rows="4" cols="40" class="textarea long" ') ?>
				</div>		
				<div class="report_row">
					<strong><?php echo Kohana::lang('ui_main.contact_code'); ?>:</strong><br />
					<?php print $captcha->render(); ?><br />
					<?php print form::input('captcha', $form['captcha'], ' class="text"'); ?>
				</div>
				<div class="report_row">
					<input name="submit" type="submit" value="<?php echo Kohana::lang('ui_main.contact_send'); ?>" class="btn_submit" />
				</div>
				<?php print form::close(); ?>
			</div>
		
	</div>	</div>
		<!-- end contacts block -->

</ul>
</div>
</div>
</div>
</div>

