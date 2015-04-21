<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0014)about:internet -->
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en"> 
    <!-- 
    Smart developers always View Source. 
    
    This application was built using Adobe Flex, an open source framework
    for building rich Internet applications that get delivered via the
    Flash Player or to desktops via Adobe AIR. 
    
    Learn more about Flex at http://flex.org 
    // -->
    <head>
        <title></title>
        <meta name="google" value="notranslate" />   
        <meta http-equiv="PRAGMA" content="NO-CACHE"></HEAD> 
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		
		

<?php
function endsWith($haystack, $needle) {
	$length = strlen($needle);
	if ($length == 0) {
		return true;
	}
	return (substr($haystack, -$length) === $needle);
}

$handler = opendir("./");
$xml_file_arr = array();
while (($filename = readdir($handler)) !== false) {
	if ($filename != "." && $filename != "..") {
		if (endsWith($filename, ".xml")) {
			array_push($xml_file_arr, $filename);
		}
	}
}
$latest_xml = $xml_file_arr[0];
$xml_file_arr_length = count($xml_file_arr);
for ($i=0; $i<$xml_file_arr_length; $i++) {
	if ( filemtime($xml_file_arr[$i]) > filemtime($latest_xml) ) {
		$latest_xml = $xml_file_arr[$i];
	}
}
$xml_content = file_get_contents($latest_xml);
$flash_width = "1024";
$flash_height = "768";
$flash_colour = "#ffffff";

$reg = '/<screen(.*)width="(?P<width>\d+)" height="(?P<height>\d+)"(.*)<\/screen>/';
$matches = array();
if (preg_match($reg, $xml_content, $matches)) {
	$flash_width = $matches['width'];
	$flash_height = $matches['height'];
}

$reg_colour = '/<screen(.*)BGcolour="(?P<colour>\w+)"(.*)<\/screen>/';
$matches_colour = array();
if (preg_match($reg_colour, $xml_content, $matches_colour)) {
	$flash_colour = $matches_colour['colour'];
	$flash_colour = str_replace("0x", "#", $flash_colour);
}
?>
		
		
        <!-- Include CSS to eliminate any default margins/padding and set the height of the html element and 
             the body element to 100%, because Firefox, or any Gecko based browser, interprets percentage as 
             the percentage of the height of its parent container, which has to be set explicitly.  Fix for
             Firefox 3.6 focus border issues.  Initially, don't display flashContent div so it won't show 
             if JavaScript disabled.
        -->
        <style type="text/css" media="screen"> 
            html, body  { height:100%; }
            body {
	margin:0;
	padding:0;
	overflow:auto;
	text-align:center;
	background-color: <?php echo $flash_colour ?>;
}   
            object:focus { outline:none; }
            #flashContent { display:none; }

			#wrapper {
				width: 100%;
				height: 100%;
			}
			#container {
				position: relative;
				left: 0;
				margin: 0 auto;
				width: 100%;
				height: 100%;
			}	

        </style>
        
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js"></script>
    </head>
    <body>
        <!-- SWFObject's dynamic embed method replaces this alternative HTML content with Flash content when enough 
             JavaScript and Flash plug-in support is available. The div is initially hidden so that it doesn't show
             when JavaScript is disabled.
        -->
<div id="wrapper">
	<div id="container">
        <div id="flashContent">
            <p>
                To view this page ensure that Adobe Flash Player version 
                11.5.0 or greater is installed. 
            </p>
            <script type="text/javascript"> 
                var pageHost = ((document.location.protocol == "https:") ? "https://" : "http://"); 
                document.write("<a href='http://www.adobe.com/go/getflashplayer' target='_blank' style='text-align:center;'><img src='" 
                                + pageHost + "www.adobe.com/images/shared/download_buttons/get_flash_player.gif' alt='Get Adobe Flash player' /></a>" ); 
            </script> 
        </div>
        
        <noscript>
            <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" id="TCD">
                <param name="movie" value="xperiment.swf" />
                <param name="quality" value="high" />
                <param name="bgcolor" value="<?php echo $flash_colour ?>" />
                <param name="allowScriptAccess" value="sameDomain" />
                <param name="allowFullScreenInteractive" value="true" />
                <!--[if !IE]>-->
                <object type="application/x-shockwave-flash" data="xperiment.swf" width="php echo $flash_width " height="php echo $flash_height ">
                    <param name="quality" value="high" />
                    <param name="bgcolor" value="<?php echo $flash_colour ?>" />
                    <param name="allowScriptAccess" value="sameDomain" />
                    <param name="allowFullScreenInteractive" value="true" />
                <!--<![endif]-->
                <!--[if gte IE 6]>-->
                    <p> 
                        Either scripts and active content are not permitted to run or Adobe Flash Player version
                        11.5.0 or greater is not installed.
                    </p>
                <!--<![endif]-->
                    <a href="http://www.adobe.com/go/getflashplayer" target="_blank" style="text-align:center;">
                        <img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash Player" />
                    </a>
                <!--[if !IE]>-->
                </object>
                <!--<![endif]-->
            </object>
        </noscript>  
   	</div>
</div> 


		<script type="text/javascript">
			var respect_ratio = <?php echo $flash_width; ?> / <?php echo $flash_height; ?>;
			$(window).resize(function() {
				var wrapper_height = $("#wrapper").height();
				var wrapper_width = $("#wrapper").width();
				$("#container").css("width", "100%");
				$("#container").css("height", "100%");
				var c_width = $("#container").width();
				var c_height = $("#container").height();
				var c_ratio = c_width / c_height;
				if ( c_ratio > respect_ratio ) {
					$("#container").width(c_height*respect_ratio);
				} else if ( c_ratio < respect_ratio ) {
					$("#container").height(c_width/respect_ratio);
				}
				if ( $("#container").height() > wrapper_height ) {
					$("#container").height(wrapper_height);
					$("#container").width(wrapper_height*respect_ratio);
				}
				if ( $("#container").width() > wrapper_width ) {
					$("#container").width(wrapper_width);
					$("#container").height(wrapper_width/respect_ratio);
				}
				var container_height = $("#container").height();
				var top_pos = (wrapper_height - container_height) / 2;
				if (top_pos<0) top_pos = 0;
				$("#container").css("top", top_pos+"px");
				
			}).resize();
		</script>
        <script type="text/javascript">
            // For version detection, set to min. required Flash Player version, or 0 (or 0.0.0), for no version detection. 
            var swfVersionStr = "11.5.0";
            // To use express install, set to expressInstall.swf, otherwise the empty string. 
            var xiSwfUrlStr = "expressInstall.swf";
            var flashvars = {};
			
			// AW: Passing url params 
			var query_string = {};
			  var query = window.location.search.substring(1);
			  var vars = query.split("&");
			  for (var i=0;i<vars.length;i++) {
				var pair = vars[i].split("=");
					// If first entry with this name
				if(pair.length=2){
					flashvars[pair[0]]=pair[1];
				}
			  } 
			  
			flashvars.ip = <?php echo json_encode($_SERVER['REMOTE_ADDR']);?>;
			// AW

            var params = {};
            params.quality = "high";
            params.bgcolor = "<?php echo $flash_colour ?>";
            params.allowscriptaccess = "sameDomain";
            params.allowFullScreenInteractive = "true";

            var attributes = {};
            attributes.id = "TCD";
            attributes.name = "TCD";
            attributes.align = "middle";
            swfobject.embedSWF(
                "xperiment.swf?"+Math.round(Math.random()*10000), "flashContent", 
                "100%", "100%", 
                swfVersionStr, xiSwfUrlStr, 
                flashvars, params, attributes);
            // JavaScript enabled so display the flashContent div in case it is not replaced with a swf object.
            swfobject.createCSS("#flashContent", "display:block;text-align:left;");
        </script>

		<script type="text/javascript">
			/*$.browser.chrome = /chrom(e|ium)/.test(navigator.userAgent.toLowerCase());
			if ($.browser.chrome) {
				$("#container").text('There is currently a bug with Chrome that affects this experiment. Can you reload this page in any other web browser. Apologies.');
				$("body").css("background-color", "#fff");
			}*/
		</script>
 
   </body>
</html>