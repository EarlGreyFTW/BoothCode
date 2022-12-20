<?php include "initiate.php";?>
<!DOCTYPE html>
<html>
<head>
    <title>TNMOC Knowledge Booth Program</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="WebRTC getUserMedia MediaRecorder API">
    <link rel="stylesheet" href="stylesheet.css">
</head>

<body>
<div style="height:900px">
    <h1> TNMOC Knowledge Booth Video Recorder</h1>
    <div id="input-box">
        <div id="instructions">
            <h2 id="instructions-heading">Instructions:</h2>
            <ol id="instructions-text">
                <li class="exc">Select Mode</li>
                <li class="exc">Press 'Ready'</li>
                <li class="exc">Press 'Start Recording'</li>
                <li class="exc">Record your story</li>
                <li class="exc">Press 'Stop Recording'</li>
                <li class="exc">Press 'Please click here to save your story'</li>
                <li class="exc">Press 'Next'</li>

            </ol>
        </div>
        <div style="height:20px"></div>
        <div id="gUMArea">
            <div> Mode:
                <input type="radio" name="media" value="video" checked id="mediaVideo">Video & Audio Recording
                <input type="radio" name="media" value="audio">Audio Only Recording
            </div>
            <div style="height:40px"></div>
            <button onclick="" id="gUMbtn"><b>Ready</b></button>
            `		</div>
        <div id="btns">
            <button id="start"><b><a class="link" href="#h-recording">Start Recording</a></b></button>
            <button id="stop"><b><a class="link" href="#h-stop">Stop Recording</a></b></button>
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
        <ul id="ul" class="exc"></ul>
    </div>
    <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script>
        let log = console.log.bind(console),
            id = val => document.getElementById(val),
            ul = id("ul"),
            gUMbtn = id("gUMbtn"),
            start = id("start"),
            stop = id("stop"),
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
    <div id="bottom-menu">
        <div id="next-button">
            <button id="next"><b><a class="link" href="Summary.php">Next</a></b></button>
        </div>
        <div id="back-button">
            <button id="back"><b><a href="PersonalDetails.php" class="link">Back</a></b></button>
        </div>
        <div id="cancel-button">
            <button id="cancel"><b><a class="link" href="index.php">Cancel</a></b></button>
        </div>
    </div>
</footer>
</html>
<!-- Made using MediaRecorder API and BootstrapCDN /-->
<!-- Developed for The National Museum of Computing by Taliesin Turner (https://earlgreyftw.carrd.co/) /-->

