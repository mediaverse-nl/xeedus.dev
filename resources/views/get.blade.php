<!--
// Muaz Khan         - www.MuazKhan.com
// MIT License       - www.WebRTC-Experiment.com/licence
// Experiments       - github.com/muaz-khan/WebRTC-Experiment
-->
<!DOCTYPE html>
<html id="home" lang="en">

<head>
    <title>WebRTC one-to-many video broadcasting ® Muaz Khan</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <link rel="author" type="text/html" href="https://plus.google.com/+MuazKhan">
    <meta name="author" content="Muaz Khan">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="stylesheet" href="https://www.webrtc-experiment.com/style.css">

    <style>
        audio, video {
            -moz-transition: all 1s ease;
            -ms-transition: all 1s ease;

            -o-transition: all 1s ease;
            -webkit-transition: all 1s ease;
            transition: all 1s ease;
            vertical-align: top;

            width: 45%;
        }
        input {
            border: 1px solid #d9d9d9;
            border-radius: 1px;
            font-size: 2em;
            margin: .2em;
            width: 70%;
        }
        .setup {
            border-bottom-left-radius: 0;
            border-top-left-radius: 0;
            font-size: 102%;
            height: 47px;
            margin-left: -9px;
            margin-top: 8px;
            position: absolute;
        }
        p { padding: 1em; }
        li {
            border-bottom: 1px solid rgb(189, 189, 189);
            border-left: 1px solid rgb(189, 189, 189);
            padding: .5em;
        }
    </style>
    <script>
        document.createElement('article');
        document.createElement('footer');
    </script>
</head>

<body>
<article>
    <h1>WebRTC one-to-many video broadcasting / <a href="https://github.com/muaz-khan/WebRTC-Experiment/tree/master/broadcast" target="_blank">Source Code</a></h1>
    <p>
        {{--<a href="https://www.webrtc-experiment.com/">HOME</a>--}}
        {{--<span> &copy; </span>--}}
        {{--<a href="http://www.MuazKhan.com/" target="_blank">Muaz Khan</a>--}}

        {{--.--}}
        {{--<a href="http://twitter.com/WebRTCWeb" target="_blank" title="Twitter profile for WebRTC Experiments">@WebRTCWeb</a>--}}

        {{--.--}}
        {{--<a href="https://github.com/muaz-khan?tab=repositories" target="_blank" title="Github Profile">Github</a>--}}

        {{--.--}}
        {{--<a href="https://github.com/muaz-khan/WebRTC-Experiment/issues?state=open" target="_blank">Latest issues</a>--}}

        {{--.--}}
        {{--<a href="https://github.com/muaz-khan/WebRTC-Experiment/commits/master" target="_blank">What's New?</a>--}}
    </p>

    <div class="github-stargazers"></div>

    <table class="visible">
        <tr>
            <td style="text-align: right;">
                <input type="text" id="conference-name" placeholder="Broadcast Name">
            </td>
            <td>
                <button id="start-conferencing">New Broadcast</button>
            </td>
        </tr>
    </table>
    <table id="rooms-list" class="visible"></table>

    <table class="visible">
        <tr>
            <td style="text-align: center;">
                <h2>
                    <strong>Private Broadcast</strong> ?? <a href="" target="_blank" title="Open this link in new tab. Then your broadcasting room will be private!"><code><strong id="unique-token">#123456789</strong></code></a>
                </h2>
            </td>
        </tr>
    </table>

    <div id="participants"></div>

    <script src="https://www.webrtc-experiment.com/firebase.js"> </script>
    <script src="https://www.webrtc-experiment.com/RTCPeerConnection-v1.5.js"> </script>
    <script src="https://www.webrtc-experiment.com/broadcast/broadcast.js"> </script>
    <script src="https://www.webrtc-experiment.com/broadcast/broadcast-ui.js"> </script>
</article>


<a href="https://github.com/muaz-khan/WebRTC-Experiment/tree/master/broadcast" class="fork-left"></a>

<footer>

</footer>

<!-- commits.js is useless for you! -->
<script src="https://www.webrtc-experiment.com/commits.js" async> </script>
</body>
</html>