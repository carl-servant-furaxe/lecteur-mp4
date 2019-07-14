<?php
$ga = 'UA-130445059-XX';

$video_image = '';
$video_title = '';
$video_urls = array(
	'large' => '',
	'desktop' => '',
	'tablet' => '',
	'mobile' => '',
);;
$cta_image = '';
$cta_title = '';
$cta_url = '';


$video_id = filter_input(INPUT_GET, 'v');
switch($video_id){
	case 'code-de-la-video':
		$video_image = 'data/traffic-club-cafe.jpg';
		$video_title = 'Traffic Club Café';
		$video_urls = array(
			'large' => 'https://medias-pub.radio-canada.ca/Y_NISSAN_DODD-Cafe_Trafic_2_min_colo_mix_2000.mp4',
			'desktop' => 'https://medias-pub.radio-canada.ca/Y_NISSAN_DODD-Cafe_Trafic_2_min_colo_mix_800.mp4',
			'tablet' => 'https://medias-pub.radio-canada.ca/Y_NISSAN_DODD-Cafe_Trafic_2_min_colo_mix_800.mp4',
			'mobile' => 'https://medias-pub.radio-canada.ca/Y_NISSAN_DODD-Cafe_Trafic_2_min_colo_mix_400.mp4',
		);
	break;
}
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript">
	/**/ /**/
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

	  ga('create', '<?php echo $ga; ?>', 'auto');
	  ga('set', 'anonymizeIp', true);
	/**/
	</script>
	<style type="text/css">
	html, body, #screen, #player{ display: block; height: 100%; margin: 0; padding: 0; width: 100%; }
	#button{ background: none; background-position: center center; background-size: cover; border: 0; cursor: pointer; display: none; height: 100%; left: 0; overflow: hidden; position: absolute; text-indent: -9999em; top: 0; width: 100%; z-index: 999; }
	#cta{ background: rgba(0,0,0,0.75) url(<?php echo $cta_url; ?>) no-repeat center center; background-size: cover; border: 0; cursor: pointer; display: none; height: 100%; left: 0; overflow: hidden; position: absolute; text-indent: -9999em; top: 0; width: 100%; z-index: 999; }

	#screen[data-is-mobile="true"] #button{ display: none !important; }
	#screen[data-status="ready"] #button{ display: block; }
	#screen[data-status="pause"] #button{ display: block; }
	#screen[data-status="completed"] #cta{ display: block; }
	</style>
</head>
<body>
<div id="screen" data-status="init" data-is-mobile="false">
	<video id="player" width="320" height="240" controls controlsList="nodownload" poster="<?php echo $video_image; ?>">
		<source id="source" type="video/mp4">
		Your browser does not support the video tag.
	</video>
<?php	if($cta_url != ""):?>
	<a id="cta" href="<?php echo $cta_url; ?>" target="_blank"><?php echo $cta_title; ?></a>
<?php	endif; ?>
</div>
</body>
</html>
<script type="text/javascript">
//var sw = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
var sw = screen.width;

(function($) {
	var video_title = "<?php echo htmlspecialchars($video_title); ?>";
	var screen = document.getElementById('screen');
	var player = document.getElementById('player');
	var source = document.getElementById('source');
	var cta = document.getElementById('cta');

	var timer;
	var tracker;

	if(sw >= 1220){
		source.setAttribute('src', '<?php echo $video_urls["large"]; ?>');
	}else if(sw >= 990 && sw <= 1219){
		source.setAttribute('src', '<?php echo $video_urls["desktop"]; ?>');
	}else if(sw >= 768 && sw <= 989){
		source.setAttribute('src', '<?php echo $video_urls["tablet"]; ?>');
	}else{
		source.setAttribute('src', '<?php echo $video_urls["mobile"]; ?>');
	}

	window.onload = function() {
		var check = false;
		(function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino|android|ipad|playbook|silk/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))) check = true;})(navigator.userAgent||navigator.vendor||window.opera);
		screen.setAttribute('data-is-mobile', check);

		if (navigator.userAgent.match(/MSIE [67]\./gi)){
			screen.setAttribute('data-is-ltie7', true);
		}
	};

	player.addEventListener('play', function() {
		screen.setAttribute('data-status','play');
		ga('send', 'event', 'MP4 Player', 'Play', video_title);
		console.log('send', 'event', 'MP4 Player', 'Play', video_title);
	});
	player.addEventListener('pause', function() {
		screen.setAttribute('data-status','pause');
		ga('send', 'event', 'MP4 Player', 'Pause', video_title);
		console.log('send', 'event', 'MP4 Player', 'Pause', video_title);
	});
	player.addEventListener('ended', function() {
		screen.setAttribute('data-status','completed');
		ga('send', 'event', 'MP4 Player', 'Finished', video_title);
		console.log('send', 'event', 'MP4 Player', 'Finished', video_title);
	});
	player.addEventListener('error', function() {
		screen.setAttribute('data-status','error');
		ga('send', 'event', 'MP4 Player', 'Error', video_title);
		console.log('send', 'event', 'MP4 Player', 'Error', video_title);
	});
	player.addEventListener('timeupdate', function(){
		var percentage = Math.floor(player.currentTime * 4 / player.duration) * 25;
		if(tracker != percentage){
			ga('send', 'event', 'MP4 Player - PlayBack Tracking', percentage + '%', video_title, percentage);
			console.log('send', 'event', 'MP4 Player - PlayBack Tracking', percentage + '%', video_title, percentage);
			tracker = percentage;
		}
	});
})();
</script>
