<!DOCTYPE HTML>
<html>
	<head>
		<title>Temporal Reality - Modded Minecraft Community | Contact</title>   

<meta name="name" content="Temporal Reality - Modded Minecraft Community" /> 
<meta name="description" content="Temporal Reality is a gaming community, centred around modded Minecraft. Specialized in making high quality mod packs for a custom launcher.">
<meta name="keywords" content="minecraft, mods, modded minecraft, forums, forum, launcher, community, mod packs, modpacks">
<meta name="author" content="Jordan 'jordsta95' Hoyland">
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<?php include_once("phpFiles/analytics.php") ?>
	</head>
	<body>
		<div id="page-wrapper">

			<!-- Header -->
<?php include 'phpFiles/header.php' ?>

			<!-- Main -->
				<div id="main" class="wrapper style1">
					<div class="container">
						<header class="major">
							<h1>Temporal Reality</h1>
							<h2>A modded Minecraft community, made for everyone</h2>
						</header>
						<div class="row 150%">
							<div class="8u 12u$(medium)">

								<!-- Content -->
									<section id="content">										
										<h3>Pack Builder</h3>
										<p>This page will allow you to compile your modpack, to be added to the Temporal Reality launcher.</p>
										
<!-- Pack Tool --> 
<strong>If you are here to update a currently available pack, skip to the "versions" section of the tool</strong>
<h4>General Pack Info:</h4>
<p> <input type="text" name="name" id="name" placeholder="Pack name"></p>
<p> <input type="text" name="author" id="author" placeholder="Pack author(s)"></p>
<p> <textarea type="text" name="description" id="description" placeholder="Modpack description. Type \n to create a new line"></textarea></p> 
<p> <input type="text" name="logo" id="logo" placeholder="Link to the image of your pack logo"></p> 
<!-- Versions -->
<h4>Versions:</h4>
  <p> <input type="text" name="packversion" id="packversion" placeholder="What version is the pack in right now?"></p>                    
    <p> <input type="text" name="changelog" id="changelog" placeholder="Link to changelog (can be left blank)"></p> 
                <p><select id="modVersions" name="select" class="main-form">
                <option value="default" name="defaultVersionValue" selected="selected">Minecraft version</option>
    <option value="default" name="defaultVersionValue">1.6.4</option>
    <option value="default" name="defaultVersionValue">1.7.2</option>
    <option value="default" name="defaultVersionValue">1.7.10</option>
    <option value="default" name="defaultVersionValue">1.8</option>
    <option value="default" name="defaultVersionValue">1.8.8</option>
</select></p>
            <p> <input type="text" name="forge" id="forge" placeholder="Forge version, example: 1.7.10-xx.xx.x.xxxx-1.7.10"></p>  
            <p> <input type="text" name="override" id="override" onChange="urlVerify()" placeholder="Link to active download of zip file containing configs/scripts/saves/etc."></p> 
            <div class="hide3">URL is invalid</div>
           <div class="hide5" style="border:#FFF 1px thin;">  
            <p>NOTE! - This will only work with mods that aren't Alpha (and some Beta). If the mod version you are using is classified as such, it needs to be added as if it wasn't on Curse</p> 
            <p> <input type="text" name="download" id="download" placeholder="Link to mod on Curse.com | e.g. http://www.curse.com/mc-mods/minecraft/222213-codechickencore"></p>
            <p>You can use the button in the sidebar to open Curse below to get the link</p>
            <div class="hide6">
            <p>Go to the page of the mod you want to add, and press the button below</p>
            <p><iframe src="http://www.curse.com/mc-mods/minecraft" id="curseIframe" width="100%" height="300px">Your browser is so old it can't even support an iframe. I suggest updating it.</iframe></p>
            <p><button class="button special" id="Curse URL" onClick="addCurseIframe()" style="width:95%;">Add this mod</button></p>
            <p>Pressing this button will input it into the Curse URL field above, and hide this box</p>
            </div>
             <button onclick="downloadURL()" class="button special">Select Mod Version</button>            
<p>&nbsp;</p>             
             <div id="" class="hide1">
             <!-- Div hidden by default, will show when a URL has been added --> <select id="modJarSelect" name="select">
    <option value="default" name="defaultModValue" onclick="refreshSelector()">None Selected</option>
</select>
             <p><button class="button special" onclick="addToJSON()">Add to Modpack</button> <button class="button special" onclick="resetmod()">Remove Current Selction</button></p>
             <p><button class="button special" onclick="refreshSelector()">Press if you can't see mod jar list</button></p>
             </div>     
             <div class="hide2" id="externalmods">
             <p> <input type="text" name="modname" id="modname" placeholder="Mod name"></p>
             <p> <input type="text" name="modauthor" id="modauthor" placeholder="Mod author(s)"></p>
             <p> <input type="text" name="modlink" id="modlink" placeholder="Link to mod's webpage"></p>
             <p> <input type="text" name="moddownload" id="moddownload" placeholder="Link to active download. Can be left blank if thd mod jar has been added to the zip file in a 'mods' folder"></p>
            <p> <button class="button special" onClick="addExternal()">Add to modpack</button></p>
             </div>         
             <div id="output"><!-- This div will be invisible to the user, this is where the JSON for the mod info will be stored, while the user gets the version they want to use --></div>
             
             <div id="userJSON"></div>
             <strong>Mods added to pack: (Click the mods below to remove them from the pack)</strong><br>
             <div id="see"></div>
             
              
             -------<br>
             <div id="toPrint"></div>
             <button class="button special" onclick="finishJSON()">I have finished adding information</button>
             <div id="DLButton"> 
             <button class="button special" onClick="download()">Download</button>
                                      </div>       
                                      
                                      </div>  
<!-- Allow downloads -->
<script>
$("#modVersions").on('change', function (e) {
$(".hide5").show();
});
</script>
<script>
function urlVerify(){
var http = "http://";
var https = "https://";
var checkurl = $('#override').val();
var checkhttp = checkurl.substring(0,6);
var checkhttps = checkurl.substring(0,7);
if(checkhttp === http || checkhttps === https){	
$(".hide3").hide();
}
else $(".hide3").show();
}
</script>
<!-- Get from Curse -->
<script>
function downloadURL(){
var curseDom = 'http://www.curse.com/mc-mods/minecraft/';
var submittedURL = $('#download').val();
var domCheck = submittedURL.substring(0,39);
var getJSON = submittedURL.replace("http://www.curse.com/mc-mods/minecraft/", "http://widget.mcf.li/mc-mods/minecraft/") + ".json";
if(domCheck === curseDom){
urls = [];
urls.push(getJSON);
$(urls).each(function(i, item){
  $.get(item, function(data){
    if (typeof data === "object") {
      data = JSON.stringify(data);
    }
    $("#output").append(data).append('<hr>');
  });
});
//Show the mod version selection div
setTimeout(function(){
$(".hide1").show();
},1000);
}else 
//Will move to a more suitable place for user
$("#output").append("Invalid URL");
setTimeout(function refreshSelector(){
var text = document.getElementById("output").textContent;
//JSON parse
var obj = jQuery.parseJSON(text);
var version = $('#modVersions option:selected').text();
var doubleparse = obj.versions[version];	
//Add version selector
var $select = $('#modJarSelect');
$(doubleparse).each(function (index, o) {    
    var $option = $("<option/>").attr("value", o.url).text(o.name);
    $select.append($option);
});
},1000)
}
</script> 
<!-- For slow internet -->
<script>
function refreshSelector(){
var text = document.getElementById("output").textContent;
//JSON parse
var obj = jQuery.parseJSON(text);
var version = $('#modVersions option:selected').text();
var doubleparse = obj.versions[version];	
//Add version selector
var $select = $('#modJarSelect');
$(doubleparse).each(function (index, o) {    
    var $option = $("<option/>").attr("value", o.url).text(o.name);
    $select.append($option);
});
//obj.versions["1.7.10"].forEach(function (version) { $('#see').append(version.url) })
}

</script>
<!-- Add mod to JSON -->
<script>
//Time to make a JSON
//Get the output of the modpack JSON
function addToJSON(){
var text = document.getElementById("output").textContent;
var submittedURL = $('#download').val();
//JSON parse? - Taken from W3 schools
var obj = jQuery.parseJSON(text);	
//Get the pack title?
var modtitle = obj.title;
var author = obj.authors;
//ignore me for now, will be added later for the pack version selector
var version = $('#modJarSelect option:selected').text()+".jar";
var jar = $('#modJarSelect').val();
var dllinkpt1 = jar.replace("http://curse.com/mc-mods/minecraft/","");
var dllinkpt2 = dllinkpt1.replace("/","/files/");
var dllink = "http://minecraft.curseforge.com/projects/" + dllinkpt2 + "/download";
//Make modpack title (and version, at a later date, visible to the user
//'<span id="'+modtitle+'" onClick="reply_click(this.id)">' + + '</span>' 
var spantitle1 = modtitle.toLowerCase();
var spantitle = spantitle1.replace(/ /g,"");
$("#see").append('<span class="'+spantitle+'" onClick="reply_click(this.className)">' + modtitle  +" | " + version  + "<br>"+ '</span>');
$("#userJSON").append('<span class="'+spantitle+'">' + '{"name":"'+modtitle+'","url":"'+submittedURL+'","authors":["'+author+'"],"downloadUrl":"'+dllink+'","fileName":"'+version+'"},'+ '</span>');
//Remove the previous mod JSON
$( "#output" ).empty();
//Hide this div again
$(".hide1").hide();
$("#modJarSelect").find('option[value!=default]').remove();
}
</script>
<!-- Remove mod from list -->
<script>
function reply_click(clicked_id)
{
	$("." + clicked_id).remove();
	$("." + clicked_id).remove();
    alert("Removed from modpack");
}
</script>
<!-- Finalize JSON -->
<script>
function finishJSON(){
	var packname = $('#name').val();
	var launchernameLC = packname.toLowerCase();
	var launchername = launchernameLC.replace(/[^a-zA-Z0-9]/g, '');
	var packauthor = $('#author').val();
	var packdescription = $('#description').val();
	var packlogo = $('#logo').val();
	var packversion = $('#packversion').val();
	var changelog = $('#changelog').val();
	var mcversion = $('#modVersions option:selected').text();
	var forgeversion = $('#forge').val();
	var overrides = $('#override').val();
	var modlistpt1 = document.getElementById("userJSON").textContent;
	var modlistEnd = modlistpt1.slice(0, -1);
	//---
	var addpackname = '"displayName":"'+packname+'",';
	var addlaunchername = '{"name":"'+launchername+'",';
	var addpackauthor = '"author":"'+packauthor+'",';
	var addpackdescription = '"description":"'+packdescription+'",';
	var addpacklogo = '"logoUrl":"'+packlogo+'",';
	var addpackversion = '"version":"'+packversion+'",';
	var addchangelog = '"changelogUrl":"'+changelog+'",';
	var addmcversion = '"mcVersion":"'+mcversion+'",';
	var addforgeversion = '"forgeVersion":"'+forgeversion+'",';
	var addoverrides = '"overrideUrl":"'+overrides+'",';
	var addmodlist = modlistEnd;
	//$("#toPrint").append(modlistEnd);
	//if(packname !== null && packauthor !== null && packdescription !== null && packlogo !== null){
	$("#toPrint").append(addlaunchername + addpackname + addpackauthor + addpackdescription + addpacklogo + '"versions":[{' + addpackversion + addchangelog + addmcversion + addforgeversion + addoverrides + '"mods":[' + addmodlist+']}]}');
	populateStorage()
	//} //else
	//$("#toPrint").append(addpackversion + addchangelog + addmcversion + addforgeversion + addoverrides + '"mods":[' + addmodlist);
	setTimeout(function(){
$("#DLButton").show();
	},1000);
}
</script>
<!-- Add external modpacks -->
<script>
function showExternal(){
$(".hide2").show();
}
function addExternal(){
	var extmodname = $('#modname').val();
	var extmodauthor = $('#modauthor').val();
	var extmodlink = $('#modlink').val();
	var extmoddownload = $('#moddownload').val();
	var extfilename = extmodname+'-'+extmodauthor+'.jar';
	$("#see").append(extmodname + " | " + extfilename + "<br>");
$("#userJSON").append('{"name":"'+extmodname+'","url":"'+extmodlink+'","authors":["'+extmodauthor+'"],"downloadUrl":"'+extmoddownload+'","fileName":"'+extfilename+'"},');
}
</script>
<!-- Download this bish -->
<script>
function download(){
	var packname = $('#name').val();
	var packversion = $('#packversion').val();
    var a = document.body.appendChild(
        document.createElement("a")
    );
	if(packname !== null && packversion !== null){
    a.download = packname+"-"+packversion+".txt";
	}
	a.download = "your-modpack.txt";
	a.download = packname+"-"+packversion+".txt";
    a.href = "data:text/html," + document.getElementById("toPrint").textContent;
    a.click();
}
</script>
<!-- Rest a selected Cursemod - before adding -->    
<script>
function resetmod(){
	//Remove the previous mod JSON
$( "#output" ).empty();
//Hide this div again
$(".hide1").hide();
$("#modJarSelect").find('option[value!=default]').remove();
}
</script>

<!-- STORAGE -->
<script>
if(!localStorage.getItem('userjson')) {
  populateStorage();
} else {
  setStyles();
}
function populateStorage() {
  localStorage.setItem('userjson', $('#userJSON').html());
  localStorage.setItem('see', $('#see').html());

  setStyles();
}

function setStyles() {
  var Userjson = localStorage.getItem('userjson');
  var See = localStorage.getItem('see');

  $('#userJSON').html(Userjson);
  $('#see').html(See);
}
</script>
<script>
function showCurseIframe(){
$(".hide6").show();	
}
function addCurseIframe(){
 var id = $("#curseIframe").document.URL;
 var text = $('#download');
 text.val(id); 
 $(".hide6").hide(); 
}
</script>
									</section>

							</div>
							<div class="4u$ 12u$(medium)">

								<!-- Sidebar -->
									<section id="sidebar">
										<section>
											<h3>Need help?</h3>
											<p>Find us on:<br> <a href="https://www.reddit.com/r/temporalreality/">Reddit</a><br><a href="https://twitter.com/TemporalReality">Twitter</a><br><a href="http://irc.lc/esper/TemporalReality">IRC</a></p>
											<footer>
											
											</footer>
										</section>
										<hr />
										<section>
                                        <h4>Troubleshooting:</h4>
                                        <ul>
                                        <li>The mod version I am looking for isn't on the list<ul>
                                        <li>If the mod is in a lower, but compatible, MC version, you will need to change Minecraft version in the selctor above. A common occurence of this would be a 1.7.2 mod for a 1.7.10 modpack</li></ul></li>
                                        <li>The dropdown list for mods doesn't contain any mod versions<ul>
                                        <li>(1) The mod you have tried to add only has alpha releases; the pack tool cannot find those versions</li>
                                        <li>(2) The mod you are looking for isn't available for the version you have chosen: See the above suggestion</li>
                                        <li>(3) The server didn't have enough time to respond; press the "Press if you can't see mod jar list" button</li></ul></li>
                                        <li>The mod you are trying to upload needs a different version, and you have selected the version you need, but the list of jars doesn't show<ul><li>Press the "Remove current selection" button, and try re-adding the mod</li></ul></li>
                                        </ul>
										<button class="button special" id="notcurse" onClick="showExternal()" style="width:95%;">Add mod that isn't on Curse</button></p>
                                       <p> <button class="button special" id="showCurse" onClick="showCurseIframe()" style="width:95%;">Find mod on Curse</button></p>
                                        
											</footer>
										</section>
									</section>

							</div>
						</div>
					</div>
				</div>

			<!-- Footer -->
				<section id="six" class="wrapper style2 special fade">
					<div class="container">
						<div class="section group">
						<div class="col span_1_of_2">
	<h4>Twitter</h4><br>
<a class="twitter-timeline" href="https://twitter.com/TemporalReality" data-widget-id="615087875902828545">Tweets by @TemporalReality</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
	</div>
	<div class="col span_1_of_2">
	<h4>News</h4><div style="text-align:left;">
<script src="http://feeds.feedburner.com/tr-news?format=sigpro" type="text/javascript" ></script>
<noscript><p>Subscribe to RSS headline updates from: <a href="http://feeds.feedburner.com/tr-news">
Powered</a> by FeedBurner</p> </noscript>
</div>
	</div>
</div>
					</div>
				</section>

			<!-- Footer -->
<?php include 'phpFiles/footer.php' ?>
		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>