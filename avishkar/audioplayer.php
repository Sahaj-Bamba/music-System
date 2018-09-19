<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
         <title>Audio player in JS</title>
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
        
        <script type="text/javascript" src="bootstrap/js/jquery-3.3.1.min.js"></script>
        
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        
        <style>

        .audio-player-container{
          width: 450px;
          height: 135px;
          background: #f3ebdc;
          box-shadow: 10px 10px 6px 2px #c7a8a8;
          color: #003ba9;
          font-family: verdana;
          font-size: 12px;
        }

        .logo{
          float: left;
        }

        .player{
          float: right;
          margin: 7px;
        }

        .song-title{
          width: 300px;
          padding: 5px 0 5px 0;
          white-space: nowrap;
          text-overflow: ellipsis;
          overflow: hidden;
        }

        .song-slider{
          width: 300px;

        }

        .current-time{
          float: left;
          font-size: 10px;

        }

        .duration{
          float: right;
          font-size: 10px;
        }

        .controllers{
          clear: both;

        }

        .volslider{
          margin-right: 3px;
          margin-left: 3px;
          width: 90px;
          float: right;

        }

        .voldown{
          
          float: right;
        }

        .volup{
          float: right;
        }

        .volume{
          float: right;
          position: relative;
          top: 14px;
        }




        </style>        
    </head>
    <body>
      <div class="audio-player-container">
        <div class="logo">
          <img src="logo.png" height="120px" width="120px">
        </div>

        <div class="player">
          <div class="song-title" id="songTitle">My song title will go hereMy song title will go hereMy song title will go here</div>

          <input id="songSlider" class="song-slider" type="range" min="0" step="1" onchange="seeksong()"  />
          <div id="currentTime" class="current-time">00:00</div>
          <div id="duration" class="duration">00:00</div>

          <div class="controllers">
            <img src="Previous.png" width="30px" onclick="previous();" />
            <img src="backward.png" width="30px" onclick="decreaseplaybackrate();" />
            <img src="pause.png" width="40px" onclick="playOrpause(this);" />
            <img src="forward.png" width="30px" onclick="increaseplaybackrate();" />
            <img src="Next.png" width="30px" onclick="next();" />
            
            <div class="volume">
            <div class="voldown">
            <img src="volume_up.png" width="15px" />
          </div>
            <div class="volslider">
            <input id="volumeSlider" class="volume-slider" type="range" min="0" max="1" step="0.01" onchange="adjustvolume()" />
          </div>

          <div class="volup">
            <img src="volume_down.png" width="15px" />
            </div>
            
            </div>

          </div>

          <div class="song-title" id="nextSongTitle"><b>Next Song -></b>Next song title goes here...</div>


        </div>
      </div>
        
      <script type="text/javascript" src="player.js"></script>

    </body>
    
 
  
    
</html>
