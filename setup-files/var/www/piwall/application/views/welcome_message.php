<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<script>
var clickedInput;
$(document).ready(function () {
	$("input").click(function (event) {
		clickedInput = this;
	});

	$("form").submit(function () {
		var confirmClick = $(clickedInput).hasClass("confirm");
		if (confirmClick) {
			var msg = $(clickedInput).attr("title");
			if (!msg)
				msg = "Are you sure you wish to use this video? \nBy clicking OK you are confirming that the video complies with the list of File Creation Required Specifications below.";
			return confirm(msg);
		}
		return true;
	});
  
	$("a").click(function (event) {	
		clickedInput = this;
		var confirmClick = $(clickedInput).hasClass("confirm");
		if (confirmClick) {
			var msg = $(clickedInput).attr("title");
			if (!msg)
				msg = "Are you sure you wish to use this video? By clicking OK you are confirming that the video complies with the list of File Creation Required Specifications below.";
		  
				var answer = confirm(msg);
				if (!answer)
					event.preventDefault();		
		}
		
	});
	});
</script>
	<div class="content-block" id="user-header">
			<p>Hi, <strong><?php echo $username; ?></strong>! You are logged in now. <?php echo anchor('/auth/logout/', 'Logout'); ?></p>
		</div>
		<div class="content-block">
			<h3>Loaded Content</h3>
			<p><form id="updateForm" action="welcome/do_update" method="POST">
			<?php
			if(empty($file_list)) {
				echo "<li>No Files Found! Make sure the USB Disk is plugged in!</li>";
			} else {
				?>
				<select name="selected_video">
				<?php
				foreach($file_list as $file)
				{
					if( ! strlen($file)) 
						continue;
					?>
					
					<option <?php if (trim($file) == trim($current_selection)){echo "selected";} ?> value="<?php echo $file; ?>"><?php echo $file; ?></option>
					<?php
				}
				echo "</select>";
				?>
				<p><input class="confirm" type="submit" name="submit" value="Update" /></p>
				<?php
			}
			?>
			</p>
			<p id="message"></p>
			<!--
			<p><input type="submit" value="Delete Selected" /></p></form>
			-->
		</div>
		
		<!--
		<div class="content-block">
			<h3>Add a Video</h3>
			<a href="upload">Upload new video</a>
		</div>
		<div class="content-block">
			<h3>Player Controls</h3>
			<button>Play</button>
			<button>Stop</button>
			<button>Restart Screens</button>
		</div>
		
		-->
		
		<div class="content-block">
			<h3>File Creation Required Specifications</h3>
			<ul>
				<li>File Type: mov,mp4,m4a</li>
				<li>Video Codec: h264</li>
				<li>Maximum bitrate: bitrate: 3000 kb/s (<em>Audio and Video <strong>COMBINED!</strong></em>)</li>
				<li>Maximum Resolution: 1280x720</li>
			</ul>
		</div>
		
		<div class="content-block">
			<h3>Details About Currently Loaded Content</h3>
			<p>
			<ul>
			<?php $in_meta = FALSE; ?>
			<?php foreach($mediainfo as $info) { ?>
				<?php if(trim($info) == "Metadata:") { 
						if($in_meta){ ?>
						</ul></li>
					<?php } $in_meta = TRUE;?>
					<li>Metadata:<ul>
				<?php continue;} ?>
			<li>
				<?php echo $info; ?>
			</li>
			
			<?php } ?>
			</ul>
			</p>
		</div>
		
		<div class="content-block">
			<h3>Disk Space Used and Remaining</h3>
			<ul>
			<li><?php if(empty($disk_usage)) { echo "No Data Found!" ;} else { echo $disk_usage['used']; }?> (<?php if(empty($disk_usage)) { echo "..." ;} else { echo $disk_usage['percent']; }?>) of <?php if(empty($disk_usage)) { echo "..." ;} else { echo $disk_usage['total'];}?> Used.</li>
			<li><?php if(empty($disk_usage)) { echo "..." ;} else { echo $disk_usage['avail'];}?> Remaining.</li>
			</ul>
		</div>
		
	</div>

	<p class="footer"><span class="left">Powered by: <a href="http://www.hazelwoodlaboratories.com/">#HazLabs</a></span><span class="right">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></right></p>
</div>

</body>
</html>