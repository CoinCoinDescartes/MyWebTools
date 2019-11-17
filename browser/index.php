<?php
include('ti-mo-PHP-UA.php');

$icon_OS = 'icons/os/';
$icon_RE = 'icons/renderengine/';
$icon_BW = 'icons/browser/';

// chemin vers icons OS
switch ($GLOBALS['parsed_UA']['platfrm_name']) {
	case 'Windows Phone': $OS = 'windows-8.png'; break;
	case 'Windows':
		switch ($GLOBALS['parsed_UA']['platfrm_vers']) {
			case '8':
			case '10':
			case '8.1': $OS = 'windows-8.png'; break;
			case '7': $OS = 'windows-7.png'; break;
			case 'Vista': $OS = 'windows-vista.png'; break;
			case 'XP': $OS = 'windows-xp.png'; break;
			default : $OS = 'windows-xp.png'; break;
		} break;
	case 'Linux':
		$OS = 'linux.png'; break;
	case 'Macintosh':
		$OS = 'apple.png'; break;
	case 'iPhone':
	case 'iPod':
	case 'iPad': $OS = 'apple-iphone.png'; break;
	case 'Android': $OS = 'android.png'; break;
	case 'Nintendo': $OS = 'nintendo-DS.png'; break;
	case 'BlackBerry': $OS = 'blackberry.png'; break;
	case 'PlayStation':
	case 'XBox, Windows':
	case 'Nintendo Wii': $OS = 'console.png'; break;

	default : $OS = 'default.png'; break;
}
$icon_OS = $icon_OS.$OS;

// chemin vers icones browser
switch (strtolower($GLOBALS['parsed_UA']['browser_name'])) {
	case 'internet explorer':
		switch ($GLOBALS['parsed_UA']['browser_vers']) {
			case '10':
			case '9': $BW = 'ie-9.png'; break;
			case '8': 
			case '7': $BW = 'ie-7.png'; break;
			default : $BW = 'ie-6.png'; break;
		} break;
	case 'firefox':
	case 'firefox mobile':
		$BW = 'firefox.png'; break;
	case 'opera':
	case 'opera mobile':
		$BW = 'opera.png'; break;
	case 'safari':
	case 'safari mobile':
		$BW = 'safari.png'; break;
	case 'chrome':
	case 'chrome mobile':
		$BW = 'chrome.png'; break;
	case 'yandex':
	case 'yabrowser':
		$BW = 'yandex.png'; break;
	case 'chromium':
		$BW = 'chromium.png'; break;
	case 'netscape':
		$BW = 'netscape.png'; break;
	case 'flock':
		$BW = 'flock.png'; break;
	case 'rockmelt':
		$BW = 'rockmelt.png'; break;
	case 'seamonkey':
	case 'sea monkey':
		$BW = 'seamonkey.png'; break;
	case 'iron':
		$BW = 'iron.png'; break;
	case 'edge':
		$BW = 'edge.png'; break;
	case 'vivaldi':
		$BW = 'vivaldi.png'; break;
	case 'maxthon':
	case 'maxthon mobile':
		$BW = 'maxthon.png'; break;
	default : $BW = 'default.png'; break;
}
$icon_BW = $icon_BW.$BW;

if (!empty($GLOBALS['parsed_UA']['browser_vers'])) $GLOBALS['parsed_UA']['browser_name'] .= ',';
if (!empty($GLOBALS['parsed_UA']['platfrm_vers'])) $GLOBALS['parsed_UA']['platfrm_name'] .= ',';

if (!empty($_SERVER['HTTP_REFERER'])) {
	$referer = htmlspecialchars($_SERVER['HTTP_REFERER']);
} else {
	$referer = '';
}

?><!DOCTYPE html>
<html lang="fr-fr">
<head>
	<meta charset="UTF-8" />
	<meta name="author" content="Timo van Neerden" />
	<meta name="viewport" content="initial-scale=1.0, user-scalable=yes" />	<meta name="description" content="Afficher sur une seule page les informations relatives à votre navigateur : IP, Navigateur, version, système d'exploitation, cookies, javascript" />
	<title>Trouver les informations de votre navigateur - le hollandais volant</title>
	<link rel="stylesheet" href="../0common/common.css"/>
	<style>

body {
	background-color: #F5F5F5;
}

#results {
	width: 95%;
	max-width: 700px;
	margin: 50px auto;
	text-align: left;
}

.main-info {
	display: flex;
	flex-direction: row;
	flex-wrap: wrap;
	align-items: center;
	background: #fff;
	box-shadow: 0 1px 2px rgba(0, 0, 0, .3);
	border-radius: 2px;
	padding: 15px;
}

#results a {
	color: rgb(50, 50, 255);
}
#results h2 {
	text-align: center;
}

.hiddenblock {
	display: none;
}

#buttonshowmore {
	text-align: center;
	padding-top: 15px;
}
#buttonshowmore > button {
	font-size: .7em;
	border: none;
	padding: 7px;
	border-radius: 3px;
	border: 1px solid currentColor;
}

.info-block-main {
	flex: 1 1 auto;
	text-align: center;
}

.info-block-main .info-block-main-info {
	flex: 1 0 250px;
}
.info-block-main h3 {
	margin: 10px;
}
.info-block-main .text {
	font-size: 120%;
	margin: 0 0 5px;
}

#UA,
.main-info > h2 {
	flex: 0 1 100%;
}

#UA  h3 {
	margin: 30px auto 0;
	font-size: 100%;
}
#UA  .text {
	font-size: 95%;
	margin: 5px 0 auto;
}



.info-block {
	background: #fff;
	box-shadow: 0 1px 2px rgba(0, 0, 0, .3);
	border-radius: 2px;
	padding: 15px;
	margin-top: 20px;
}

.info-block > div {
	margin: 10px 0 0;
}

.info-block h3 {
	font-size: 100%;
	text-align: left;
	color: #222;
	margin: 0;
	display: inline;
}

.info-block .text {
	color: #444;
	display: inline;
}

.small {
	font-size: 70%;
	line-height: 1em;
	overflow: hidden;
	width: 235px;
}

.notes {
	padding-top: 30px;
	font-size: 70%;
}

#socialMedia ul {
	marign: 0;
	padding: 0 15px;
	list-style: none;
}

#socialMedia ul > li > span {
	color: green;
}

/* codecs list */
#all-cdc {
	display: flex;
}
#audio-cdc,
#video-cdc {
	flex: 1;
}

#videocodecs-list,
#audiocodecs-list {
	list-style: none;
}
#videocodecs-list li,
#audiocodecs-list li {
	margin: 0 0 3px 15px;
	padding-left: 25px;
}
.unknown {
	background: url(icons/question.png) no-repeat left center;
	padding-left: 25px;
}
.error {
	background: url(icons/cross.png) no-repeat left center;
	padding-left: 25px;
}
.success {
	background: url(icons/tick.png) no-repeat left center;
	padding-left: 25px;
}

	</style>
</head>
<body>

<header id="top-nav">
	<div class="home">
		<a title="Accueil" class="logo" href="/">
		<img src="/index/logo-no-border.png" alt="logo le hollandais volant" /></a>
	</div>
	<p class="navbarlinks"><a href="../">Outils</a>   &gt;   <a href=".">Informations Système</a></p>
</header>

<section id="results">

	<div class="main-info">
		<h2>Navigateur &amp; Système d’exploitation</h2>
		<div id="browser" class="info-block-main">
			<h3>Navigateur</h3>
			<div class="info-block-main-info">
				<p class="text"><?php echo htmlspecialchars($GLOBALS['parsed_UA']['browser_name'].' '.$GLOBALS['parsed_UA']['browser_vers']); ?></p>
				<div class="icon"><img src="<?php echo $icon_BW; ?>" alt="mon navigateur"/></div>
			</div>

		</div>

		<div id="OS" class="info-block-main">
			<h3>Système d’exploitation</h3>
			<div class="info-block-main-info">
				<p class="text"><?php echo htmlspecialchars($GLOBALS['parsed_UA']['platfrm_name'].' '.$GLOBALS['parsed_UA']['platfrm_vers']); ?></p>
				<div class="icon"><img src="<?php echo $icon_OS; ?>" alt="mon os"/></div>
			</div>
		</div>
		<div id="UA">
			<div class="info-block-info">
				<h3>Agent utilisateur :</h3>
				<p class="text"><?php echo htmlspecialchars($GLOBALS['parsed_UA']['full-UA']); ?></p>
			</div>
			<div class="info-block-info">
				<h3>Date et heure :</h3>
				<p class="text" id="date-tz"></p>
			</div>
		</div>


	</div>
	<!--<p id="buttonshowmore"><button onclick="show_all_info(this)">Plus d’informations ?</button></p>-->


<div id="hardware" class="info-block">
	<h2>Votre matériel</h2>
	<div id="screen">
		<h3>Taille de l’écran :</h3>
		<p class="text" id="screen-sizes"><noscript>Impossible de déterminer sans JavaScript</noscript></p>
	</div>

	<div id="arch"> 
		<h3>Architecture CPU :</h3>
		<p class="text" id="cpu-arch"><?php echo htmlspecialchars($GLOBALS['parsed_UA']['archtcr_name']); ?></p>
		<p class="text" id="cpu-cores">N/A</p>
	</div>

	<div id="arch-gpu"> 
		<h3>Informations GPU :</h3>
		<p class="text" id="gpu-mod1">N/A</p>
		<p class="text" id="gpu-mod2">N/A</p>
	</div>

	<!--<div id="silverlight">
		<h3>Gyroscope :</h3>
		<p class="text" id="gyroscope"><noscript>Impossible de déterminer sans JavaScript</noscript></p>
	</div>-->
</div>


<div id="network" class="info-block">
	<h2>Votre connexion</h2>
	<div id="IP">
		<h3>Adresse IP publique :</h3>
		<p class="text"><?php echo htmlspecialchars($GLOBALS['parsed_UA']['ip_adress']); ?></p>
	</div>

	<div id="localnetwork">
		<h3>Adresse IP locale privée :</h3>
		<p class="text" id="localIP">N/A</p>
	</div>

	<div id="ISP">
		<h3>Fournisseur d’Accès :</h3>
		<p class="text" id="ip-isp"><?php echo htmlspecialchars(gethostbyaddr($GLOBALS['parsed_UA']['ip_adress'])); ?></p>
	</div>

	<div id="geo">
		<h3>Position géographique :</h3>
		<p class="text" id="geo-ll">N/A</p>
	</div>

	<div id="referer">
		<h3>Page visitée précédente :</h3>
		<p class="text"><?php if (!empty($referer)) echo '<a href="'.$referer.'">'.$referer.'</a>'; else echo "N/A"; ?></p>
	</div>
</div>


<div id="plugins" class="info-block">
	<h2>Plugins disponibles</h2>
	<div id="javascript">
		<h3 id="activate-JS-h3" class="error">Javascript :</h3>
		<p class="text" id="JS-activate"><noscript>Javascript est désactivé</noscript></p>
	</div>

	<div id="cookiez">
		<h3 id="activate-cookie-h3" class="unknown">Cookies :</h3>
		<p class="text" id="cookie-activate"><noscript>Impossible de déterminer sans JavaScript</noscript></p>
	</div>

	<div id="flash">
		<h3 id="activate-flash-h3" class="unknown">Adobe Flash :</h3>
		<p class="text" id="flash-activate"><noscript>Impossible de déterminer sans JavaScript</noscript></p>
	</div>

	<div id="java">
		<h3 id="activate-java-h3" class="unknown">Plugin Java :</h3>
		<p class="text" id="java-activate"><noscript>Impossible de déterminer sans JavaScript</noscript></p>
	</div>

	<div id="videolan">
		<h3 id="activate-vlc-h3" class="unknown">Plugin VLC :</h3>
		<p class="text" id="vlc-activate"><noscript>Impossible de déterminer sans JavaScript</noscript></p>
	</div>

	<div id="pubs">
		<h3 id="activate-is4ds-h3" class="unknown">Bloqueur de pub :</h3>
		<p class="text" id="is4ds"><span id="adblock" class="myTestAd ads ad adsbox doubleclick ad-placement carbon-ads">Absent ou inactif.</span><noscript>Impossible de déterminer sans JavaScript</noscript></p>
	</div>

<!--	<div id="silverlight">
		<h3>Microsoft Silverlight :</h3>
		<p class="text" id="silverlight-activate"><noscript>Impossible de déterminer sans JavaScript</noscript><strong style="color: red;">TODO</strong></p>
	</div>
-->
</div>

<div id="codecs" class="info-block">
	<h2>Codecs</h2>

	<div id="all-cdc">
		<div id="video-cdc">
			<h3>Vidéo</h3>
			<ul id="videocodecs-list" class="text">
				<li class="unknown" id="c-video">&lt;video/&gt;</li>
				<li class="unknown" id="c-mse">MSE</li>
				<li class="unknown" id="c-h264">H264</li>
				<li class="unknown" id="c-mse-h264">MSE-H264</li>
				<li class="unknown" id="c-webm">WebM VP8</li>
				<li class="unknown" id="c-mse-webm">MSE-WebM</li>
			</ul>
		</div>

		<div id="audio-cdc">
			<h3>Audio</h3>
			<ul id="audiocodecs-list" class="text">
				<li class="unknown" id="c-audio">&lt;audio/&gt;</li>
				<li class="unknown" id="c-opus">Opus</li>
				<li class="unknown" id="c-weba">WebA</li>
				<li class="unknown" id="c-ogg">Ogg</li>
				<li class="unknown" id="c-mp3">MP3</li>
				<li class="unknown" id="c-flac">Flac</li>
				<li class="unknown" id="c-aac">AAC</li>
				<li class="unknown" id="c-wave">Wave</li>
				<li class="unknown" id="c-wma">WMA</li>
			</ul>
		</div>
	</div>
</div>

</section>


<footer id="footer"><a href="//lehollandaisvolant.net">by <em>Timo Van Neerden</em></a></footer>
<iframe id="testiframe" style="display: none"></iframe>


<script>
'use strict'

/*
var divs = new Array('network', 'hardware', 'plugins', 'codecs', "UA", "socialMedia");

function show_all_info(e) {
	for (var block of divs) {
		document.getElementById(block).classList.remove('hiddenblock');
	}
	e.parentNode.parentNode.removeChild(e.parentNode);
}

if (window.location.hash.substr(1) == 'all') {
	document.getElementById('buttonshowmore').parentNode.removeChild(document.getElementById('buttonshowmore'))
} else {
	for (var block of divs) {
		document.getElementById(block).classList.add('hiddenblock');
	}
}

*/

// Check JS
document.getElementById('JS-activate').innerHTML = 'JavaScript est activé';
document.getElementById('activate-JS-h3').classList.add('success');



// check cookies
function checkCookie(){
	var cookieEnabled = (navigator.cookieEnabled);
	if (cookieEnabled == true) {
		document.getElementById('cookie-activate').innerHTML = 'Les cookies sont activés';
		document.getElementById('activate-cookie-h3').classList.add('success');
	} else {
		document.getElementById('cookie-activate').innerHTML = 'Les cookies sont désactivés';
		document.getElementById('activate-cookie-h3').classList.add('error');
	}
}



// check flash.
function getFlashVersion(){
	try { // ie
		document.getElementById('flash-activate').innerHTML = new ActiveXObject('ShockwaveFlash.ShockwaveFlash').GetVariable('$version').replace(/\D+/g, '.').match(/^\.?(.+)\.?$/)[1];
	} catch(e) { // normal browsers
		try {
			if(navigator.mimeTypes["application/x-shockwave-flash"].enabledPlugin){
				document.getElementById('flash-activate').innerHTML = (navigator.plugins["Shockwave Flash 2.0"] || navigator.plugins["Shockwave Flash"]).description;
				document.getElementById('activate-flash-h3').classList.add('success');
			}
		} catch(e) {
			document.getElementById('flash-activate').innerHTML = 'Flash non détecté';
			document.getElementById('activate-flash-h3').classList.add('error');

		}
	}

}



// JavaVersion
function JavaVersion() {
	var result = null;
	// Walk through the full list of mime types.
	for (var i=0, size=navigator.mimeTypes.length; i < size; i++ ) {
		// The jpi-version is the plug-in version.  This is the best
		// version to use.
		if ( (result = navigator.mimeTypes[i].type.match(/^application\/x-java-applet;jpi-version=(.*)$/)) !== null ) {
			document.getElementById('java-activate').innerHTML = result[1];
			document.getElementById('activate-java-h3').classList.add('success');
		} else {
			document.getElementById('java-activate').innerHTML = 'Java non détecté';
			document.getElementById('activate-java-h3').classList.add('error');
		}
	}
	if (navigator.mimeTypes.length == 0) {
		document.getElementById('java-activate').innerHTML = 'Java non détecté';
		document.getElementById('activate-java-h3').classList.add('error');

	}
}

// VLC Plugin
function VLCPlugin() {
	try {
		if (vlc && vlc.playlist) {
			document.getElementById('vlc-activate').innerHTML = 'Plugin Web VLC installé et activé';
			document.getElementById('activate-vlc-h3').classList.add('success');
		}
	} catch(e) {
		document.getElementById('vlc-activate').innerHTML = 'Plugin VLC non détecté';
		document.getElementById('activate-vlc-h3').classList.add('error');
	}
}

// Screen Size and refresh rate
function calcFPS(opts){
	var requestFrame = window.requestAnimationFrame ||
		window.webkitRequestAnimationFrame ||
		window.mozRequestAnimationFrame;
	if (!requestFrame) return true; // Check if "true" is returned; 
	// pick default FPS, show error, etc...
	function checker(){
		if (index--) requestFrame(checker);
		else {
			var result = 3*Math.round(count*1000/3/(performance.now()-start));
			if (typeof opts.callback === "function") opts.callback(result);
			document.getElementById('frameRate').textContent = ', ' + result + 'Hz';
		}
	}
	if (!opts) opts = {};
	var count = opts.count||60, index = count, start = performance.now();
	checker();
}

function ScreenSize() {
	var result = null;
	var width = window.screen.width;
	var height = window.screen.height;
	var depth = window.screen.colorDepth;
	var ratio = window.devicePixelRatio;

	var realWidth = Math.round(ratio * width);
	var realHeight = Math.round(ratio * height);

	var isWebkit = 'WebkitAppearance' in document.documentElement.style;
	var zoom = '';
	if (isWebkit) {
		realWidth = width;
		realHeight = height;
	} else {
		if (ratio != 1) {
			zoom = ', Zoom x' + ((Math.round(ratio*100)) / 100); // *100/100 : to round with 2 decimals.
		}
	}
	var size = realWidth + 'x' + realHeight +' ('+ depth + 'Bit' + zoom + '<span id="frameRate"></span>)';
	document.getElementById('screen-sizes').innerHTML = size;
}


// function checkGyro() {
// 	var gyroscopeNode = document.getElementById('gyroscope');
// 	gyroscopeNode.innerHTML = 'N/A';
// 
// 	if (window.DeviceOrientationEvent) {
// 		window.addEventListener("deviceorientation", function(event) {
// 			if(event.alpha || event.beta || event.gamma) {
// 				gyroscopeNode.removeChild(gyroscopeNode.firstChild);
// 				gyroscopeNode.appendChild(document.createTextNode('alpha : '+Math.round(event.alpha)+'°, '+'beta : '+Math.round(event.beta)+'°, '+'gamma : '+Math.round(event.gamma)+'°'));
// 			}
// 		});
// 	}
// }


// CPU cores
function cpuCores() {
	document.getElementById('cpu-cores').innerHTML = (navigator.hardwareConcurrency ? '; ' + navigator.hardwareConcurrency + ' Cores' : '');
}



// GPU infos
function gpuInfos() {
	var canvas = document.createElement('canvas');
	var gl = canvas.getContext("experimental-webgl");

	function getUnmaskedInfo(gl) {
		var unMaskedInfo = {renderer: '', vendor: ''};

		var dbgRenderInfo = gl.getExtension("WEBGL_debug_renderer_info");
		if (dbgRenderInfo != null) {
			unMaskedInfo.renderer = gl.getParameter(dbgRenderInfo.UNMASKED_RENDERER_WEBGL);
			unMaskedInfo.vendor   = ', (' + gl.getParameter(dbgRenderInfo.UNMASKED_VENDOR_WEBGL) + ')';
		}
		return unMaskedInfo;
	}

	document.getElementById('gpu-mod1').innerHTML = getUnmaskedInfo(gl).renderer;
	document.getElementById('gpu-mod2').innerHTML = getUnmaskedInfo(gl).vendor;

}



// AD-Block detection
function adblock() {
	// first test: check is a block with .ad* classes is hidden or not
	var flagBlock = document.getElementById('adblock');
	var isBlocked = (window.getComputedStyle(flagBlock, null).getPropertyValue("display") == 'none' ? 'Actif' : 'Absent ou inactif');
	document.getElementById('is4ds').innerHTML = isBlocked;

	// secondth test: check if a ad.js is loaded.
	if( window.canRunAds === undefined ) {
		flagBlock.style.display = 'none';
		document.getElementById('is4ds').innerHTML = 'Actif';
		document.getElementById('activate-is4ds-h3').classList.add('success');

	}
}



// Network information (IP, ISP, Geoposition…), using IP-API: http://ip-api.com/json
function checkIsp() {
	// GÉO
	var coords = '';
	// is HTML5 API
	if ("geolocation" in navigator) {
		function showPosition(position) {
			coords = position.coords.latitude.toFixed(4) + "N, "+ position.coords.longitude.toFixed(4) + "E";
			// add a link to OSM
			coords += ' (<a href="https://www.openstreetmap.org/?mlat='+position.coords.latitude+'&mlon='+position.coords.longitude+'#">carte</a> - <a href="geo:'+position.coords.latitude+','+position.coords.longitude+'?z=15">URI geo</a>)';
			document.getElementById('geo-ll').innerHTML = coords;
		}

		// géolocalisation possible. Regarde si autorisé
		if (navigator.permissions && navigator.permissions.query) {
			navigator.permissions.query({name:'geolocation'}).then(function(result) {
				// si autorisé sans demander : affiche la géo à la place de la géo-IP.
				if (result.state == 'granted') {
					navigator.geolocation.getCurrentPosition(showPosition);
				}
			});
		}


	}

	try {
		var xhr = new XMLHttpRequest();
		xhr.onload = function() {
			var res = JSON.parse(xhr.responseText);

			// ISP
			var isp = '';
			if (res.isp && res.isp !== '') {
				isp = res.isp;
				document.getElementById('ip-isp').innerHTML = isp;
			}


			var coords = '';
			if ((res.lat && res.lon) && res.lat !== '' && res.lon !== '') {
				coords += res.lat + 'N, ' + res.lon + 'E';
				if (res.status == "success") {
					// add a link to OSM
					coords += ' (<a href="https://www.openstreetmap.org/?mlat='+res.lat+'&mlon='+res.lon+'#">carte</a> - <a href="geo:'+res.lat+','+res.lon+'?z=15">URI geo</a>)';
					if (document.getElementById('geo-ll').innerHTML == 'N/A') { // only if HTML5-geo-API has not updated it before
						document.getElementById('geo-ll').innerHTML = coords;
					}
				}
			}


		};

		xhr.open("GET", "geo.php", true);
		xhr.send();
	}
	catch (e) {
		return JSON.parse('{"isp":"", "lat":"", "lon":"", "org":"", "query":"", "region":"", "regionName":"", "status":"error", "timezone":"", "zip":""}');
	}
}


/* Video Codec Detection */
/* Code inspired from https://www.youtube.com/html5 source code */
function checkVideoFormats() {
	var videoElement = document.createElement('video');

	var setCompatibility = function(id, isCompatible) {
		var el = document.getElementById(id);
		el.className = (isCompatible ? 'success' : 'error');
	};

	var videoCompatible = videoElement && videoElement.canPlayType;
	setCompatibility('c-video', videoCompatible);

	setCompatibility('c-h264',
	videoElement && videoElement.canPlayType &&
	videoElement.canPlayType('video/mp4; codecs="avc1.42001E, mp4a.40.2"'));

	setCompatibility('c-webm',
	videoElement && videoElement.canPlayType &&
	videoElement.canPlayType('video/webm; codecs="vp8.0, vorbis"'));

	var mse = window.MediaSource || window['WebKitMediaSource'];
	setCompatibility('c-mse', !!mse);

	var checkMSECompatibility = function(mimeType) {
		if (mse && !mse.isTypeSupported) {
			// When async type detection is required, fall back to canPlayType.
			return videoElement.canPlayType(mimeType);
		} else {
			return mse && mse.isTypeSupported(mimeType);
		}
	};

	setCompatibility('c-mse-h264', checkMSECompatibility('video/mp4; codecs="avc1.4d401e"'));
	setCompatibility('c-mse-webm', checkMSECompatibility('video/webm; codecs="vp9"'));
}
checkVideoFormats();


/* Check Audio Formats */
function checkAudioFormats() {
	var audioElement = document.createElement('audio');

	var setCompatibility = function(id, isCompatible) {
		var el = document.getElementById(id);
		el.className = (isCompatible ? 'success' : 'error');
	};

	var audioCompatible = audioElement && audioElement.canPlayType; 
	setCompatibility('c-audio', audioCompatible);
	setCompatibility('c-opus', audioElement && audioElement.canPlayType && audioElement.canPlayType('audio/ogg; codecs="opus"'));
	setCompatibility('c-weba', audioElement && audioElement.canPlayType && audioElement.canPlayType('audio/webm'));
	setCompatibility('c-ogg', audioElement && audioElement.canPlayType && audioElement.canPlayType('audio/ogg; codecs="vorbis"'));
	setCompatibility('c-mp3', audioElement && audioElement.canPlayType && audioElement.canPlayType('audio/mpeg'));
	setCompatibility('c-flac', audioElement && audioElement.canPlayType && audioElement.canPlayType('audio/flac'));
	setCompatibility('c-aac', audioElement && audioElement.canPlayType && audioElement.canPlayType('audio/aac'));
	setCompatibility('c-wave', audioElement && audioElement.canPlayType && audioElement.canPlayType('audio/wav'));
	setCompatibility('c-wma', audioElement && audioElement.canPlayType && audioElement.canPlayType('audio/wma'));
}
checkAudioFormats();



// Utilise une faille dans WebRTC pour retrouver l’IP locale.
// L’IP publique est également détectable comme ça, même dérrière un proxy.
function ip_local() {
	var ip = false;
	window.RTCPeerConnection = window.RTCPeerConnection || window.mozRTCPeerConnection || window.webkitRTCPeerConnection || false;

	if (window.RTCPeerConnection) {
		var pc = new RTCPeerConnection( {iceServers:[]} ), noop = function(){};
		pc.createDataChannel('');
		pc.createOffer(pc.setLocalDescription.bind(pc), noop);

		pc.onicecandidate = function(event) {
			if (event && event.candidate && event.candidate.candidate) {
				document.getElementById('localIP').innerHTML = event.candidate.candidate.split('\n')[0].split(' ')[4];
			}
		};
	}
}


// Affiche l’heure et le fuseau horraire.
function timezone() {
	var d = new Date();

	var dateString = d.toLocaleString('fr-FR', {weekday: "long", year: "numeric", month: "long", day: "numeric", hour: "numeric", minute: "numeric", second: "numeric", timeZoneName: "short"});
	// can’t get directly *only* the timezone in JS
	var tzString = (d.toLocaleDateString('fr-FR', {hour: "numeric", timeZoneName: "long"})).replace(d.toLocaleDateString('fr-FR', {hour: "numeric"}), "");
	var tzStringNumeric = (d.toLocaleDateString('fr-FR', {hour: "numeric", timeZoneName: "short"})).replace(d.toLocaleDateString('fr-FR', {hour: "numeric"}), "");

	document.getElementById('date-tz').textContent = dateString + ' (' + tzString.trim() + ')';

}






// load directly
checkCookie();
getFlashVersion();
JavaVersion();
ScreenSize();
cpuCores();
//checkGyro(); //deprecated
gpuInfos();
VLCPlugin();
timezone();

setTimeout(function(){
	calcFPS();
}, '150');

window.addEventListener("load", function() {
	// load on page OK
	// load after a while
	setTimeout(function(){
		adblock();
		checkIsp();
		ip_local();
	}, 750);

 });







</script>
<script src="js/ads.js"></script>
<!--

# adresse de la page : https://lehollandaisvolant.net/tout/tools/browser/
#	  page créée le : 5 mars 2013
#	 mise à jour le : 17 novembre 2019

-->
</body>
</html>