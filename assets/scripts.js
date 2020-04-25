jQuery(document).ready(function ($) {

    let autoplayCheckbox = $('input[name="autoplay_vimeo"]');

    if (autoplayCheckbox.length) {
        let iFrames = $('iframe'),
            players = [],
            fullScreen = false;

        if (!Element.prototype.requestFullscreen) {
            Element.prototype.requestFullscreen = Element.prototype.mozRequestFullscreen
                || Element.prototype.webkitRequestFullscreen
                || Element.prototype.msRequestFullscreen;
        }

        iFrames.each(function () {

            let iframe = $(this);

            if (iframe.attr('src').indexOf("vimeo") >= 0) {
                let player = {};
                player.iframe = this;
                player.vimeoPlayer = new Vimeo.Player(iframe);

                players.push(player);
            }

        });

        setTimeout(function () {

            if (0 < players.length) {
                for (let i = 0; i < players.length; i++) {
                    players[i].vimeoPlayer.on('ended', function () {

                        if ($('input[name="autoplay_vimeo"]').is(':checked')) {
                            let nextKey = i + 1;
                            if (nextKey < players.length) {
                                if (fullScreen) {
                                    players[nextKey].iframe.requestFullscreen().catch(err => {
                                        document.exitFullscreen();
                                        fullScreen = false;
                                        scrollToPlayer(players[nextKey].iframe);
                                    });
                                } else {
                                    scrollToPlayer(players[nextKey].iframe);
                                }
                                players[nextKey].vimeoPlayer.play();
                            }
                        }

                    });

                    players[i].vimeoPlayer.on('fullscreenchange', function (data) {
                        fullScreen = data;
                    });
                }

            }

        }, 3000);

        function scrollToPlayer(iframe) {

            $('html, body').animate({
                scrollTop: $(iframe).offset().top - 100
            }, 1300);

        }

        autoplayCheckbox.change(function () {

            let data = {
                state: $(this).is(':checked') ? 1 : 0,
                action: 'change_autoload',
            };

            $.post(ajax_object.ajax_url, data, function (resp) {
                if (!resp.success) {
                    autoplayCheckbox.prop('checked', false);
                }
            });

        });

    }
});