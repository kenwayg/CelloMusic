<div id="music-player">
      <!-- The full black bar -->
      <div class="inner">
        <!-- Keeping everything centered -->

        <!-- The controls -->
        <div class="controls">
          <a class="previous" ><img src="./images/previous.svg" /></a>
          <a class="glue" href="#"
            ><img class="play-btn play" src="./images/music-playerplay.png"
          /></a>

        

          <a class="pa" href="#" style="display: none"
            ><img src="./images/music-playerpause.png"
          /></a>
          <a class="next"><img src="./images/next.svg" /></a>
        </div>

        <!-- The play bar -->
        <div class="play-bar">
          <span id="time">0:00</span>
          <div class="bar-bg">
            <div class="progress"></div>
          </div>
          <span id="total-time">0:00</span>
        </div>

        <div class="song-content">
          <!-- The songs meta -->
          <audio data-id="" class="aud" src="../admin/uploads/<?php echo $key['alb_music'];?>">
      </audio>
          <div class="user-info">
            <!-- The song cover -->
            <!-- <div class="images-wrapper"> -->
              <img class="cov" src="../images/cover-art.png" />
            <!-- </div> -->
            <!-- The artist name and song title -->
            <!-- <div class="song-info"> -->
              <span class="artist">Artist Name</span>
              <span class="music">Song Name</span>
            <!-- </div> -->
          </div>

          <!-- Comment counter -->
          <div class="comment-icon">
            <a href="#">
              <img src="images/comments.svg" />
              <span>7</span>
            </a>
          </div>
        </div>
        <!-- The songs meta END -->
      </div>
      <!-- Keeping everything centered END -->
    </div>