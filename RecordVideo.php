<?php include "initiate.php";
if($_SESSION) {
	$FullName = $_SESSION["NAME"];
} else{
	$FullName = "UndefinedName";
}?>
<!DOCTYPE html>
<html lang="GB">
<head>
    <title>TNMOC Knowledge Booth Program</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="WebRTC getUserMedia MediaRecorder API">
    <link rel="stylesheet" href="STYLE.css">
	<link rel="icon" type="image/x-icon" href="TNMOC-Apple-Logo.png">
</head>

<body>
<div style="height:1100px">
	<img src="TNMOC-Apple-Logo.png" class="logo" alt="logo">
	<div class="title">
		<h1>TNMOC Knowledge Booth</h1>
		<h2>Video Recorder</h2>
	</div>
    <div id="input-box">
        <div id="instructions">
            <h2>Instructions:</h2>
            <ol>
	            <li>Press 'Start Recording'</li>
	            <li>Record your story</li>
	            <li>Press 'Stop Recording'</li>
	            <li>Press 'Next' to continue, or start again by pressing 'Start Recording'</li>
            </ol>
        </div>
        <div style="height:20px"></div>
        <div id="gUMArea">
            <div>
	            <h3>Mode:</h3>
	            <label>Video & Audio Recording
                    <input type="radio" name="media" value="video" checked id="mediaVideo">
	            </label>
	            <br>
	            <label>Audio Only Recording
		            <input type="radio" name="media" value="audio">
	            </label>
            </div>
            <div style="height:40px"></div>
	        <button onclick="" id="gUMbtn" hidden><a class="link"><b>Confirm</b></a></button>
            `		</div>
	    <script type="text/javascript">
            window.onload = function(){
                document.getElementById("gUMbtn").click();
            }
	    </script>
        <div id="btns">
            <button id="start-button"><b><a class="link" href="#h-recording">Start Recording</a></b></button>
            <button id="stop-button"><b><a class="link" href="#h-stop">Stop Recording</a></b></button>
        </div>
        <p id="h-recording">Recording Started</p>
        <p id="h-stop">Recording Stopped</p>
    </div>
    <video id="myVidPlayer" muted autoplay>Webcam livestream</video>
    <script type="text/javascript">
        const video = document.querySelector('#myVidPlayer');
        window.navigator.mediaDevices.getUserMedia({ video: true })
            .then(stream => {
                video.srcObject = stream;
                video.onloadedmetadata = (e) => {
                    video.play();
                };
            })
            .catch( () => {
                alert("Error: Missing Webcam-Microphone Permisions :( ");
            });

    </script>
    <div>
        <ul id="ul"></ul>
    </div>
    <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script>
        let log = console.log.bind(console),
            id = val => document.getElementById(val),
            ul = id("ul"),
            gUMbtn = id("gUMbtn"),
            start = id("start-button"),
            stop = id("stop-button"),
            stream,
            recorder,
            counter=1,
            chunks,
            media;


        gUMbtn.onclick = e => {
            let mv = id("mediaVideo"),
                mediaOptions = {
                    video: {
                        tag: "video",
                        type: "video/mp4",
                        ext: ".mp4",
                        gUM: {video: true, audio: true}
                    },
                    audio: {
                        tag: "audio",
                        type: "audio/mp3",
                        ext: ".mp3",
                        gUM: {audio: true}
                    }
                };
            media = mv.checked ? mediaOptions.video : mediaOptions.audio;
            navigator.mediaDevices.getUserMedia(media.gUM).then(_stream => {
                stream = _stream;
                id("gUMArea").style.display = "none";
                id("btns").style.display = "inherit";
                start.removeAttribute("disabled");
                recorder = new MediaRecorder(stream);
                recorder.ondataavailable = e => {
                    chunks.push(e.data);
                    if(recorder.state == "inactive")  makeLink();
                };
                log("got media successfully");
            }).catch(log);
        }

        start.onclick = e => {
            start.disabled = true;
            stop.removeAttribute("disabled");
            chunks=[];
            recorder.start();
        }
        stop.onclick = e => {
            stop.disabled = true;
            recorder.stop();
            start.removeAttribute("disabled");
        }
        function makeLink(){
            let blob = new Blob(chunks, {type: media.type })
                , url = URL.createObjectURL(blob)
                , li = document.createElement("li")
                , mt = document.createElement(media.tag)
                , hf = document.createElement("a")
            ;
            mt.controls = true;
            mt.src = url;
            hf.href = url;
            hf.id = `media-download`;
            hf.download = `<?php echo mysqli_real_escape_string($connect, $FullName);?>${media.ext}`;
            hf.innerHTML = ``;
            li.appendChild(mt);
            li.appendChild(hf);
            ul.appendChild(li);
        }

    </script>
</div>
</body>
<footer>
    <div class="bottom-menu">
	    <button class="next-button" onclick="download()" style="font-size: 30px;"><b>Next</b></button>
	    <script type="text/javascript">
            function download(){
                document.getElementById("media-download").click();
                window.location.replace("Summary.php");
            }
	    </script>
	    <button class="cancel-button"><b><a class="link" href="index.php">Start Again</a></b></button>
	    <button class="back-button"><b><a href="Mode.php" class="link">Back</a></b></button>
    </div
</footer>
</html>
<!-- Made using MediaRecorder API and BootstrapCDN /-->
<!-- Developed for The National Museum of Computing by Taliesin Turner (https://earlgreyftw.carrd.co/) /-->

