<?php include('php/import.php'); ?><html>
<head>
    <link rel="stylesheet" type="text/css" href="css/general.css" />
    <link rel="stylesheet" type="text/css" href="css/fading.css" />
    <link rel="stylesheet" type="text/css" href="css/sliding.css" />
    <script>
        var folder = 'img/';
        var images = [<?php echo '"'.implode('","', $files).'"'; ?>];
        var imgSeconds = 5;
        var imgCount = images.length;
        var imgStay = imgSeconds*1000;
        var imgIndex = 0;
        var fadingInterval;

        document.addEventListener("DOMContentLoaded", function(event) {
            fadingItem();
            slidingItem();
            loopImagesFade(imgIndex);
            loadImages();
        });
    </script>
    <script src="./js/fading.js"></script>
    <script src="./js/sliding.js"></script>
</head>
<body>
    <h2>Fading Slider mit festgelegter Höhe</h2>
    <p>Breite des Bildes passt sich dem Verhältnis zur festgelegten Höhe an.</p>
    <div class="banner" id="bannerFading">
        <svg id="svgLeftFading" class="arrow left" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 300.003 300.003" style="enable-background:new 0 0 300.003 300.003;" xml:space="preserve" onclick="setFadingIndex(<?php count($files) - 1; ?>)">
            <g>
                <g>
                    <path d="M150,0C67.159,0,0.001,67.159,0.001,150c0,82.838,67.157,150.003,149.997,150.003S300.002,232.838,300.002,150
                        C300.002,67.159,232.842,0,150,0z M217.685,189.794c-5.47,5.467-14.338,5.47-19.81,0l-48.26-48.27l-48.522,48.516
                        c-5.467,5.467-14.338,5.47-19.81,0c-2.731-2.739-4.098-6.321-4.098-9.905s1.367-7.166,4.103-9.897l56.292-56.297
                        c0.539-0.838,1.157-1.637,1.888-2.368c2.796-2.796,6.476-4.142,10.146-4.077c3.662-0.062,7.348,1.281,10.141,4.08
                        c0.734,0.729,1.349,1.528,1.886,2.365l56.043,56.043C223.152,175.454,223.156,184.322,217.685,189.794z"/>
                </g>
            </g>
        </svg>
        <div id="wrapperFade" class="wrapper">
            <img class="fading" src="<?php echo "img/".$files[2]; ?>" id="imgFading">
        </div>
        <svg id="svgRightFading" class="arrow right" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
    viewBox="0 0 300.003 300.003" style="enable-background:new 0 0 300.003 300.003;" xml:space="preserve" onclick="setFadingIndex(1)">
            <g>
                <g>
                    <path d="M150,0C67.159,0,0.001,67.159,0.001,150c0,82.838,67.157,150.003,149.997,150.003S300.002,232.838,300.002,150
                        C300.002,67.159,232.842,0,150,0z M217.685,189.794c-5.47,5.467-14.338,5.47-19.81,0l-48.26-48.27l-48.522,48.516
                        c-5.467,5.467-14.338,5.47-19.81,0c-2.731-2.739-4.098-6.321-4.098-9.905s1.367-7.166,4.103-9.897l56.292-56.297
                        c0.539-0.838,1.157-1.637,1.888-2.368c2.796-2.796,6.476-4.142,10.146-4.077c3.662-0.062,7.348,1.281,10.141,4.08
                        c0.734,0.729,1.349,1.528,1.886,2.365l56.043,56.043C223.152,175.454,223.156,184.322,217.685,189.794z"/>
                </g>
            </g>
        </svg>
        <div class="itemChoser" id="itemFading"></div>
    </div>
    <h2>Slider mit festgelegter Höhe des kleinsten Bildes</h2>
    <p>Alle Bilder müssen die gleiche Breite haben.</p>
    <div class="banner" id="bannerSliding">
        <svg id="svgLeft" class="arrow left" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
    viewBox="0 0 300.003 300.003" style="enable-background:new 0 0 300.003 300.003;" xml:space="preserve" onclick="setSlidingIndex(<?php count($files) - 1; ?>)">
            <g>
                <g>
                    <path d="M150,0C67.159,0,0.001,67.159,0.001,150c0,82.838,67.157,150.003,149.997,150.003S300.002,232.838,300.002,150
                        C300.002,67.159,232.842,0,150,0z M217.685,189.794c-5.47,5.467-14.338,5.47-19.81,0l-48.26-48.27l-48.522,48.516
                        c-5.467,5.467-14.338,5.47-19.81,0c-2.731-2.739-4.098-6.321-4.098-9.905s1.367-7.166,4.103-9.897l56.292-56.297
                        c0.539-0.838,1.157-1.637,1.888-2.368c2.796-2.796,6.476-4.142,10.146-4.077c3.662-0.062,7.348,1.281,10.141,4.08
                        c0.734,0.729,1.349,1.528,1.886,2.365l56.043,56.043C223.152,175.454,223.156,184.322,217.685,189.794z"/>
                </g>
            </g>
        </svg>
        <div id="wrapperSliding" class="wrapperSliding">
            <div id="imgWrapper">

            </div>
        </div>
        <svg id="svgRight" class="arrow right" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
    viewBox="0 0 300.003 300.003" style="enable-background:new 0 0 300.003 300.003;" xml:space="preserve" onclick="setSlidingIndex(1)">
            <g>
                <g>
                    <path d="M150,0C67.159,0,0.001,67.159,0.001,150c0,82.838,67.157,150.003,149.997,150.003S300.002,232.838,300.002,150
                        C300.002,67.159,232.842,0,150,0z M217.685,189.794c-5.47,5.467-14.338,5.47-19.81,0l-48.26-48.27l-48.522,48.516
                        c-5.467,5.467-14.338,5.47-19.81,0c-2.731-2.739-4.098-6.321-4.098-9.905s1.367-7.166,4.103-9.897l56.292-56.297
                        c0.539-0.838,1.157-1.637,1.888-2.368c2.796-2.796,6.476-4.142,10.146-4.077c3.662-0.062,7.348,1.281,10.141,4.08
                        c0.734,0.729,1.349,1.528,1.886,2.365l56.043,56.043C223.152,175.454,223.156,184.322,217.685,189.794z"/>
                </g>
            </g>
        </svg>
        <div class="itemChoser" id="itemSliding"></div>
    </div>
    <p>Bilder sind von <a href="pixabay.com">Pixabay.com</a></p>
</body>
</html>