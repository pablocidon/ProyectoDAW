<?php
/**
 * Created by IntelliJ IDEA.
 * User: PC
 * Date: 09/08/2018
 * Time: 12:35
 */
?>
<html lang="es">
    <head>
        <link rel="shortcut icon" href="webroot/img/favicon.ico" />
        <title>EmpleSauces</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="webroot/css/bootstrap.css">
        <link rel="stylesheet" href="webroot/css/bootstrap-grid.css">
        <link rel="stylesheet" href="webroot/css/bootstrap-reboot.css">
        <link rel="stylesheet" href="webroot/css/pace-theme-center-radar.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
        <script>
            paceOptions = {
                elements: true
            };
        </script>
        <script src="webroot/js/pace.js"></script>
        <script>
            function load(time){
                var x = new XMLHttpRequest()
                x.open('GET', "http://localhost:5646/walter/" + time, true);
                x.send();
            };

            load(20);
            load(100);
            load(500);
            load(2000);
            load(3000);

            setTimeout(function(){
                Pace.ignore(function(){
                    load(3100);
                });
            }, 4000);

            Pace.on('hide', function(){
                console.log('done');
            });

        </script>
    </head>
    <body>
        <script src="webroot/js/jquery.js"></script>
        <script src="webroot/js/bootstrap.js"></script>
        <script src="webroot/js/bootstrap.bundle.js"></script>
    </body>
</html>
