jQuery(function(){
     // See if this is a touch device
     if ('ontouchstart' in window)
     {
        // Set the correct body class
        jQuery('body').removeClass('no-touch').addClass('touch');

        // Add the touch toggle to show text
        jQuery('div.boxInner img').click(function(){
           jQuery(this).closest('.boxInner').toggleClass('touchFocus');
        });
     } else {

       jQuery('body').removeClass('touch').addClass('no-touch');
     }
  });

  // 2. This code loads the IFrame Player API code asynchronously.
  var tag = document.createElement('script');

  tag.src = "https://www.youtube.com/iframe_api";
  var firstScriptTag = document.getElementsByTagName('script')[0];
  firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);


  function onYouTubeIframeAPIReady() {
      preparePlayers();
  }


playerById = {}
function preparePlayers() {
      var players = jQuery(".player");

      // 3. This function creates an <iframe> (and YouTube player)
      //    after the API code downloads.
      players.each(function( index, playerElement ) {

          videoId = playerElement.dataset.vid;

          var player = new YT.Player(playerElement, {
              height: '100%',
              width: '100%',
              videoId: videoId,
              events: {
                'onReady': onPlayerReady,
                'onStateChange': onPlayerStateChange
              }
            });
          playerById[videoId] = player;
        });

}


  // 4. The API will call this function when the video player is ready.
  function onPlayerReady(event) {
    //event.target.playVideo();
  }

  // 5. The API calls this function when the player's state changes.
  //    The function indicates that when playing a video (state=1),
  //    the player should play for six seconds and then stop.
  var done = false;
  function onPlayerStateChange(event) {
    if (event.data == YT.PlayerState.PLAYING && !done) {
      setTimeout(function(){stopVideo(event.target)}, 6000);
      done = true;
    }
  }
  function stopVideo(player) {
    player.stopVideo();
  }

function playVid(event) {

  for (var vid in playerById) {
    playerById[vid].stopVideo();
  }
  var vid = jQuery(event.target).closest(".boxInner").children(".player")[0].dataset.vid;
  playerById[vid].playVideo();
}

jQuery(".play-button").click(playVid)
