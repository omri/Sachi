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
              playerVars: {'controls': 0 },
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
  function onPlayerStateChange(event) {
    if (event.data == YT.PlayerState.ENDED) {

//      setTimeout(function(){stopVideo(event.target)}, 6000);

    }
  }
  function stopVideo(player) {
    player.stopVideo();
  }


  function playVid(event) {

    jqElem = jQuery(event.target)
    jqElem.toggleClass("active")

    if (jqElem.hasClass("active")) {
      for (var vid in playerById) {
        playerById[vid].stopVideo();
      }
      var vid = jqElem.closest(".boxInner").children(".player")[0].dataset.vid;
      playerById[vid].playVideo();

    } else {
      playerById[vid].pauseVideo();
    }
  }


  function playVid(event) {

    jqElem = jQuery(event.target)
    var boxInner = jqElem.closest(".boxInner")
    var vid = boxInner.children(".player")[0].dataset.vid;
    var playbutton = boxInner.find(".playbutton");
    playbutton.toggleClass("active")

    if (playbutton.hasClass("active")) {
      for (var othervid in playerById) {
        playerById[othervid].stopVideo();
      }
      playerById[vid].playVideo();

    } else {
      playerById[vid].pauseVideo();
    }
  }


jQuery(".playbutton").click(playVid)
