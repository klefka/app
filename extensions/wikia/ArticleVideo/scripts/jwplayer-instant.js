(function () {
    var videoDetails = window.wgFeaturedVideoData;
    var videoElementId = 'featured-video-player';
    var videoId = videoDetails.videoId;
    var playerInstance = jwplayer(videoElementId);

    require([
        'wikia.cookies',
        'wikia.geo',
        'wikia.instantGlobals'
    ], function (cookies, geo, instantGlobals) {
        var inAutoplayCountries = geo.isProperGeo(instantGlobals.wgArticleVideoAutoplayCountries),
            inNextVideoAutoplayCountries = geo.isProperGeo(instantGlobals.wgArticleVideoNextVideoAutoplayCountries),
            autoplayCookieName = 'featuredVideoAutoplay',
            willAutoplay = cookies.get(autoplayCookieName) !== '0' && inAutoplayCountries;

        playerInstance.setup({
            file: "//content.jwplatform.com/videos/" + videoId + ".mp4",
            mediaid: videoId,
            autostart: willAutoplay && !document.hidden
        });


        if (true || inAutoplayCountries) {
            playerInstance.addButton(
                //This portion is what designates the graphic used for the button
                "//icons.jwplayer.com/icons/white/download.svg",
                //This portion determines the text that appears as a tooltip
                "Toggle Autoplay",
                //This portion designates the functionality of the button itself
                function () {
                    //With the below code, we're grabbing the file that's currently playing
                    cookies.set(autoplayCookieName, cookies.get(autoplayCookieName) === '0' ? '1' : '0');

                    console.log('autoplay', cookies.get(autoplayCookieName))
                },
                //And finally, here we set the unique ID of the button itself.
                "autoplayToggle"
            );
        }

    });
})();
