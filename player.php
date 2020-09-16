<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>vimeo player</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style lang="scss">
        .player {
            background-color: #f2f2f2;
            width: 640px;
            height: 360px;
            /* pointer-events: none; */
        }

        .video-wrapper {
            overflow: hidden;
            position: relative;
        }

        .video-wrapper:hover .video-control {
            opacity: 1;
        }

        .video-control {
            z-index: 1;
            position: absolute;

            position: absolute;
            bottom: 10px;
            left: 10px;

            opacity: 0;
            transition: opacity 250ms ease-out;
        }

        .video-control-btn {
            border: none;
            width: 65px;
            height: 40px;
            color: #fff;

            background: rgba(23, 35, 34, .75);
            border-radius: 4px;

            transition: opacity 250ms ease-out, background-color 40ms, color 40ms;

            display: flex;
            justify-content: center;
            align-items: center;
        }

        .video-control-btn:hover {
            background-color: #007bff;
        }

        .video-control-btn:focus {
            outline: none;
        }

        .video-control-btn svg {
            width: 20px;
            height: 20px;
            position: absolute;

            fill: currentColor;
        }

        .video-ended {
            position: absolute;
            z-index: 5;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: #f2f2f2;

            display: none;
        }
    </style>
</head>

<body>

    <div class="my-5"></div>
    <div class="container">
        <h1 class="text-center mb-3">PHP Vimeo Player Tutorial</h1>

        <div class="row mb-4">

            <div class="col-auto">

                <div class="video-wrapper">
                    <div id="made-in-ny" class="player"></div>

                    <div class="video-control d-none">
                        <button type="button" class="video-control-btn act-play"><svg width="20" height="20" viewBox="0 0 20 20">
                                <title id="play-icon-title">Play</title>
                                <polygon class="fill" points="1,0 20,10 1,20"></polygon>
                            </svg></button>
                        <button type="button" class="video-control-btn d-none act-pause" disabled><svg width="20" height="20" viewBox="0 0 20 20" preserveAspectRatio="xMidYMid" focusable="false" aria-labelledby="pause-icon-title" role="img">
                                <title id="pause-icon-title">Pause</title>
                                <rect class="fill" width="6" height="20" x="0" y="0"></rect>
                                <rect class="fill" width="6" height="20" x="12" y="0"></rect>
                            </svg></button>
                    </div>

                    <div class="video-ended">
                        <div class="d-flex h-100 justify-content-center text-muted align-items-center">
                            Vimeo End
                        </div>

                    </div>
                </div>

                <div class="d-flex mt-2">
                    <button type="button" class="video-control-btn act-play mr-2"><svg width="20" height="20" viewBox="0 0 20 20">
                            <title id="play-icon-title">Play</title>
                            <polygon class="fill" points="1,0 20,10 1,20"></polygon>
                        </svg></button>

                    <button type="button" class="video-control-btn d-none act-pause mr-2" disabled><svg width="16" height="16" viewBox="0 0 20 20" preserveAspectRatio="xMidYMid" focusable="false" aria-labelledby="pause-icon-title" role="img">
                            <title id="pause-icon-title">Pause</title>
                            <rect class="fill" width="6" height="20" x="0" y="0"></rect>
                            <rect class="fill" width="6" height="20" x="12" y="0"></rect>
                        </svg></button>
                    <button type="button" class="video-control-btn act-fullscreen"><svg width="16" height="16" viewBox="0 0 12 12" preserveAspectRatio="xMidYMid" focusable="false" aria-labelledby="fullscreen-icon-title" role="img">
                            <title id="fullscreen-icon-title">Enter full screen</title>
                            <polyline class="fill" points="6,6 5.9,2 4.9,3 2.9,1 1,2.9 3,4.9 2,5.9" transform="translate(6,6)"></polyline>
                            <polyline class="fill" points="6,6 5.9,2 4.9,3 2.9,1 1,2.9 3,4.9 2,5.9" transform="translate(6,6) rotate(90)"></polyline>
                            <polyline class="fill" points="6,6 5.9,2 4.9,3 2.9,1 1,2.9 3,4.9 2,5.9" transform="translate(6,6) rotate(180)"></polyline>
                            <polyline class="fill" points="6,6 5.9,2 4.9,3 2.9,1 1,2.9 3,4.9 2,5.9" transform="translate(6,6) rotate(270)"></polyline>
                        </svg></button>
                </div>
            </div>
            <div class="col">

                <table class="table">
                    <tr>
                        <td width="10" class="text-nowrap">Vimeo Title</td>
                        <td><span id="title"></span></td>
                    </tr>

                    <tr>
                        <td width="10" class="text-nowrap">Status</td>
                        <td><span id="status">Paused</span></td>
                    </tr>

                    <tr>
                        <td width="10" class="text-nowrap">Time Counter</td>
                        <td><label id="minutes">00</label>:<label id="seconds">00</label></td>
                    </tr>
                    <tr>
                        <td width="10" class="text-nowrap">Vimeo Time</td>
                        <td>

                            <div>
                                <span id="vimeo-minutes">00</span>:<span id="vimeo-seconds">00</span> <span class="text-muted" id="vimeo-percent">(00%)</span>
                            </div>
                            <div class="progress mt-1" style="height: 6px;">
                                <div class="progress-bar" id="progressbar" style="width: 0%"></div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td width="10" class="text-nowrap">Vimeo End</td>
                        <td><span id="ended"></span></td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="row mb-4">

            <div class="col-auto">

                <div class="video-wrapper">
                    <iframe src="https://player.vimeo.com/video/458727497?title=0&byline=0&portrait=0&sidedock=0&controls=0" frameborder="0" width="640" height="360" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>


                </div>
            </div>
            <div class="col">

                <table class="table">
                    <tr>
                        <td width="10" class="text-nowrap">Vimeo Title</td>
                        <td><span id="title2"></span></td>
                    </tr>

                    <tr>
                        <td width="10" class="text-nowrap">Status</td>
                        <td><span id="status2">Paused</span></td>
                    </tr>

                    <tr>
                        <td width="10" class="text-nowrap">Time Counter</td>
                        <td><label id="minutes2">00</label>:<label id="seconds2">00</label></td>
                    </tr>
                    <tr>
                        <td width="10" class="text-nowrap">Vimeo Time</td>
                        <td>

                            <div>
                                <span id="vimeo-minutes2">00</span>:<span id="vimeo-seconds2">00</span> <span class="text-muted" id="vimeo-percent2">(00%)</span>
                            </div>
                            <div class="progress mt-1" style="height: 6px;">
                                <div class="progress-bar" id="progressbar2" style="width: 0%"></div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td width="10" class="text-nowrap">Vimeo End</td>
                        <td><span id="ended2"></span></td>
                    </tr>
                </table>
            </div>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="https://player.vimeo.com/api/player.js"></script>
    <script>
        var minutesLabel = document.getElementById("minutes");
        var secondsLabel = document.getElementById("seconds");
        var totalSeconds = 0;

        let isTimeCounter = false;
        setInterval(setTime, 1000);

        function setTime() {

            if (isTimeCounter == true) {

                ++totalSeconds;
                secondsLabel.innerHTML = pad(totalSeconds % 60);
                minutesLabel.innerHTML = pad(parseInt(totalSeconds / 60));

                // player.getCurrentTime().then(function(seconds) {

                //     $('#vimeo-seconds').text(pad(parseInt(seconds) % 60) );
                //     $('#vimeo-minutes').text(pad(parseInt(seconds / 60)) );
                //     // console.log( 'getCurrentTime',  );
                //     // `seconds` indicates the current playback position of the video
                // });
            }
        }

        function pad(val) {
            var valString = val + "";
            if (valString.length < 2) {
                return "0" + valString;
            } else {
                return valString;
            }
        }

        $('.act-play').click(function(e) {
            e.preventDefault();
            e.stopPropagation();

            _play();
        });

        $('.act-pause').click(function(e) {
            e.preventDefault();
            e.stopPropagation();

            _pause();
        })

        $('.act-fullscreen').click(function(e) {

            var fullscreenChange = null;
            // other vars …

            // Check for fullscreen support
            if (document.fullscreenElement || document.mozFullScreenElement || document.webkitFullscreenElement || document.msFullscreenElement) {

                // If there's currently an element fullscreen, exit fullscreen
                if (document.exitFullscreen) {
                    document.exitFullscreen();
                } else if (document.mozCancelFullScreen) {
                    document.mozCancelFullScreen();
                } else if (document.webkitExitFullscreen) {
                    document.webkitExitFullscreen();
                } else if (document.msExitFullscreen) {
                    document.msExitFullscreen();
                }

                // Do stuff when the video exits fullscreen mode
                // …
            } else {

                // Otherwise, enter fullscreen
                // `player` is just a `div` element wrapping the video
                if (player.requestFullscreen) {
                    player.requestFullscreen();
                } else if (player.mozRequestFullScreen) {
                    player.mozRequestFullScreen();
                } else if (player.webkitRequestFullscreen) {
                    player.webkitRequestFullscreen();
                } else if (player.msRequestFullscreen) {
                    player.msRequestFullscreen();
                }

                // Do stuff when the video enters fullscreen mode
                // …
            }

            fullscreenChange = function() {

                // Do something on fullscreen change event
                // …
            };

            document.onfullscreenchange = function() {
                if (!document.fullscreenElement) {
                    fullscreenChange();
                }
            };
            document.onwebkitfullscreenchange = function() {
                if (!document.webkitFullscreenElement) {
                    fullscreenChange();
                }
            };
            document.onmozfullscreenchange = function() {
                if (!document.mozFullScreenElement) {
                    fullscreenChange();
                }
            };
            document.onmsfullscreenchange = function() {
                if (!document.msFullscreenElement) {
                    fullscreenChange();
                }
            };
        });

        function _play() {

            if (vimeoState.ended) {
                vimeoState.ended = false;

                $('.video-ended').hide()
            }

            player.play().then(function() {

                vimeoState.played = true;
                $('.act-play').addClass('d-none').prop('disabled', true);
                $('.act-pause').removeClass('d-none').prop('disabled', false);
            });
        }

        function _pause() {
            player.pause().then(function() {

                vimeoState.played = false;
                $('.act-play').removeClass('d-none').prop('disabled', false);
                $('.act-pause').addClass('d-none').prop('disabled', true);
            });
        }

        // $('.video-wrapper').click(function(e) {
        //     e.preventDefault();

        //     if( vimeoState.played ){
        //         _pause();
        //     }
        //     else{
        //         _play();
        //     }
        // })

        var vimeoState = {
            waiting_for_first_pause_not_autoplay: false,
            played: false,
            ended: false,
        };

        var options = {
            id: 458631997,
            width: 640,
            // loop: true,

            speed: false,
            playsinline: false,

            portrait: false, // เจ้าของวิดีโอ

            controls: false, // play bar, sharing buttons, etc


            byline: false,
            autopause: false,
            // muted: false,

            sidedock: false,

        };


        var player = new Vimeo.Player('made-in-ny', options);

        // Your Vimeo SDK player script goes here
        // var iframe = document.querySelector('iframe');
        // var player = new Vimeo.Player(iframe);

        /* ปรับเสียง */
        // player.setVolume(0);

        /* Auto Play */
        // player.play().then(function() {
        //     // The video is playing
        // }).catch(function(error) {
        //     switch (error.name) {
        //         case 'PasswordError':
        //             // The video is password-protected
        //             break;

        //         case 'PrivacyError':
        //             // The video is private
        //             break;

        //         default:
        //             // Some other error occurred
        //             break;
        //     }
        // });

        player.on('play', function(data) {
            // console.log('Played the video');
            $('#status').text('Play');

            // console.log('play duration', data.duration);
            // console.log('play percent', data.percent);
            // console.log('play seconds', data.seconds);

            isTimeCounter = true
        });

        player.on('pause', function() {
            // console.log('paused the video');

            $('#status').text('Paused')

            isTimeCounter = false
        });
        player.on('timeupdate', function(data) {
            // console.log('timeupdate', data.percent*100);

            const seconds = data.seconds;
            const percent = (data.percent * 100);

            $('#vimeo-seconds').text(pad(parseInt(seconds) % 60));
            $('#vimeo-minutes').text(pad(parseInt(seconds / 60)));

            $('#progressbar').css('width', percent + '%');
            $('#vimeo-percent').text('(' + parseFloat(percent).toFixed(2) + '%)');


            // if (vimeoState.waiting_for_first_pause_not_autoplay || 1==1) {
            //     player.setVolume(1).then(() => {

            //         player.pause().then(() => {
            //             player.getPaused().then((paused) => {
            //                 if (paused) {
            //                     // A successful pause has occurred

            //                     player.setCurrentTime(0.0).then(() => {

            //                         player.pause().then(() => {

            //                             vimeoState.waiting_for_first_pause_not_autoplay = false;
            //                         });
            //                     });
            //                 }
            //             });
            //         });
            //     });
            // }
        });

        var onPlay = function(data) {
            console.log('onPlay', data.index);
            console.log('onPlay', data.startTime);
            console.log('onPlay', data.title);
        };

        player.on('bufferend', onPlay);

        // player.on('chapterchange', onPlay);

        player.setColor('#ffffff').then(function(color) {
            // The new color value: #00ADEF

            console.log('color', color);
        }).catch(function(error) {
            // An error occurred while setting the color
        });

        player.setPlaybackRate(0.5).then(function(playbackRate) {
            // The playback rate is set

            console.log('setPlaybackRate', playbackRate);
        }).catch(function(error) {

            // console.log('setPlaybackRate', error);
            switch (error.name) {
                case 'RangeError':
                    // The playback rate is less than 0.5 or greater than 2
                    break;

                default:
                    // Some other error occurred
                    break;
            }
        });

        player.on('ended', function(data) {
            // `data` is an object containing properties specific to that event

            $('#ended').text('Ended')
            $('.video-ended').show()

            vimeoState.ended = true;

        });
        player.on('duration', function(data) {
            // `data` is an object containing properties specific to that event

            // $('#ended').text('duration')
            console.log('getDuration', data);
        });

        // player.on('volume', function() {
        //     console.log('Volume the video');

        //     // $('#status').text('paused')
        // });

        player.getVideoTitle().then(function(title) {

            $('#title').text(title)
        });


        // player.getCurrentTime().then(function(seconds) {
        //     // `seconds` indicates the current playback position of the video

        //     console.log('getCurrentTime', seconds);
        //     $('#CurrentTime').text(seconds)
        // });

        // player.getDuration().then(function(duration) {
        //     // `duration` indicates the duration of the video in seconds

        //     console.log('getDuration', duration);
        // });

        // player.getEnded().then(function(ended) {
        //     // `ended` indicates whether the video has ended

        //     console.log('getEnded', ended);
        // });

        // player.getLoop().then(function(loop) {
        //     // `loop` indicates whether the loop behavior is active
        //     console.log('getEnded', ended);
        // });

        // player.getPaused().then(function(paused) {
        //     // `paused` indicates whether the player is paused

        //     console.log('getPaused', paused);
        // });

        // player.getPlaybackRate().then(function(playbackRate) {
        //     // `playbackRate` indicates the numeric value of the current playback rate

        //     console.log('getPlaybackRate', playbackRate);
        // });
    </script>
</body>

</html>