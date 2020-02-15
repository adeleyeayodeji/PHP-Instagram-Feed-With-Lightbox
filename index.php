<?php 

     // use this instagram access token generator http://instagram.pixelunion.net/
          $access_token="_INSTAGRAM_ACCESS_TOKEN_";
          $photo_count=9;

          $json_link="https://api.instagram.com/v1/users/self/media/recent/?";
          $json_link.="access_token={$access_token}&count={$photo_count}";


          $json = file_get_contents($json_link);
          $obj = json_decode(preg_replace('/("\w+"):(\d+)/', '\\1:"\\2"', $json), true);

 ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>jQuery WS-LiSli Masonry Gallery With Lightbox Example</title>
    <script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet"
        href="https://use.fontawesome.com/releases/v5.1.0/css/all.css"
        integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt"
        crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <script src="es2015/lightbox.js" defer></script>
    <style>
        .container { margin: 70px auto; max-width: 960px; }
        h1 { text-align: center; }
    </style>
</head>
<body style="background: #000;">
    <div class="container">
        <h1 style="color: white;font-family: calibri;text-align: center;">Simple Instagram Feed</h1>
<div id="carbon-block" align="center"></div>
        <ul id="WS-LiSli" class="grid">
                 <?php
                  foreach ($obj['data'] as $post) {
                      $users_text =$post['user']['full_name'];
                      $pic_src=str_replace("http://", "https://", $post['images']['standard_resolution']['url']);
                      ?>
                      <li>
                        <img title="<?php echo $users_text; ?>" src="<?php echo $pic_src; ?>" data-description="<?php echo $users_text; ?>" style="border-radius: 3px;">
                      </li>
                      <?php
                    }
                   ?>
                
        </ul>
    </div>
    </body>

    <script type="text/javascript">
    $(function() {
        $('#WS-LiSli').WS_lightbox_free({
            'enable' : ['close', 'arrows'],
            buttons : {
                size          : 40,
                style         : 'square', // ( default, square, circle, rounded )
                color         : 'black',
                color_icon    : 'white',
                border_width  : 0,
                border_color  : '',
                opacity       : .5,
                hover_opacity : 1
            },
            arrows : {
                position      : 'attached', // ( inside, outside, attached )
                style         : 'svelt', // (default, square, circle, rounded, svelt)
                icon_style    : 'angle', // (default, caret, angle, chevron)
                icon_size     : 20,
                opacity       : .5,
                hover_effect  : 'shrink', // (zoom, shrink, translate)
                hover_opacity : .8
            },
            image : {
                border_radius : 0,
                border_color : '',
                border_width : 0,
                bg : 'none'
            },
            background : {
                filter : 'image',
                opacity : 1
            },
            display_velocity : 'low',
            slide_velocity : 'fast'
        });

    });
    </script>
</html>


