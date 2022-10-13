<html>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="mtv.css">

        <script src="allnewjs.js"></script>

<script>
<?php 
    $videolar_ad=array();
    $ilk="";
    $videolar_klasor=opendir("videolar");
    while($video=readdir($videolar_klasor)) {
        if($video!="."&&$video!="..")
        {
            if($ilk == "")
        {
            array_push($videolar_ad,$video);
            shuffle($videolar_ad);
        }
else
{
    array_push($videolar_ad,$video);
    shuffle($videolar_ad);
}
}
}
closedir($videolar_klasor);
$toplam=count($videolar_ad);
$son= $toplam-1;
$dosyalar="var videos=new Array(";

for($sira=0;$sira<$toplam; $sira++)
{
    $video_ad= "videolar/". $videolar_ad[$sira];
    if($sira!=$son) 
    {
        $dosyalar_ek="\"".$video_ad."\",";
    }
    else
    {
        $dosyalar_ek="\"".$video_ad."\");";
    }
    $dosyalar.=$dosyalar_ek;
}
echo $dosyalar ?>


    var currentVideo = 0;
     
function nextVideo() {

    videoPlayer = document.getElementById("play-video")

    videoPlayer.removeEventListener('ended',nextVideo,false);
    
    videoPlayer.src = videos[currentVideo];
    videoPlayer.play()
    
    currentVideo = (currentVideo + 1) % videos.length
    
    videoPlayer.addEventListener('ended', nextVideo,false); 
}

function ooops() {
    console.log(document.getElementById("play-video").error.code)
}
</script>
    </head>

    
    <body> 

<header>
<h1>Here's a big tune for you:</h1>


</header>

<main>
<section>

<div class="video-player">

    <video class="videom" id="play-video" controls autobuffer></video>
</div>  


<?php
$path = "/var/www/html/videolar/*";

$latest_ctime = 0;
$latest_filename = '';

$files = glob($path);
foreach($files as $file)
{
        if (is_file($file) && filectime($file) > $latest_ctime)
        {
                $latest_ctime = filectime($file);
                $latest_filename = $file;
        }
}
echo "<p> Latest video added on " . date ("F d Y H:i:s.", $latest_ctime) . "</p>";
?>


</section>

<section>
  
    <p><input type="button" value="horn" onclick="horn()">    <audio id="horn" src="horn.wav"></audio>
     <input type="button" value="gunshot" onclick="gun()">    <audio id="gun" src="gun.wav"></audio> 
         <input type="button" value="beep" onclick="beep()">    <audio id="beep" src="beep.wav"></audio> 
         <input type="button" value="laser" onclick="laser()">    <audio id="laser" src="laser.wav"></audio> 
     <input type="button" value="rewind" onclick="rewind()">    <audio id="rewind" src="rewind.wav"></audio> 
</p>

<P>* tip: use picture-in-picture to use the sound effects on mobile</P>
</section>



</main>

<footer>
<p>
Don't touch that dial: another music video is coming right up!

&copy; <a href="https://lolfi.com">Larson Online Financial Services, Inc.</a></p>

</footer>

</body>
</html>
