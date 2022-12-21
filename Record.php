<?php include "initiate.php";?>
<!DOCTYPE html>
<html>
<head>
    <title>TNMOC Knowledge Booth Program</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="WebRTC getUserMedia MediaRecorder API">
    <link rel="stylesheet" href="STYLE.css">
</head>

<body>
<div style="height:900px">
    <h1> TNMOC Knowledge Booth Video Recorder</h1>
    <div id="input-box">
        <div id="instructions">
            <h2>Instructions:</h2>
            <ol>
                <li>Select Mode</li>
                <li>Press 'Ready'</li>
                <li>Press 'Start Recording'</li>
                <li>Record your story</li>
                <li>Press 'Stop Recording'</li>
                <li>Press 'Please click here to save your story'</li>
                <li>Press 'Next'</li>

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
	        <button onclick="" id="gUMbtn"><a class="link"><b>Confirm</b></a></button>
            `		</div>
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
                        type: "video/webm",
                        ext: ".mp4",
                        gUM: {video: true, audio: true}
                    },
                    audio: {
                        tag: "audio",
                        type: "audio/ogg",
                        ext: ".ogg",
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
            hf.download = `${counter++}${media.ext}`;
            hf.innerHTML = `Please click here to save your story`;
            li.appendChild(mt);
            li.appendChild(hf);
            ul.appendChild(li);
        }

    </script>
</div>
</div>
</body>
<footer>
    <div class="bottom-menu">
	    <button class="next-button"><b><a class="link" href="Summary.php">Next</a></b></button>
	    <button class="cancel-button"><b><a class="link" href="index.php">Cancel</a></b></button>
	    <button class="back-button"><b><a href="index.php" class="link">Back</a></b></button>
    </div
</footer>
</html>
<!-- Made using MediaRecorder API and BootstrapCDN /-->
<!-- Developed for The National Museum of Computing by Taliesin Turner (https://earlgreyftw.carrd.co/) /-->

