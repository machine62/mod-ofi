<?php if (!defined('IN_SPYOGAME')) die("Hacking Attemp!"); ?>


<script type="text/javascript" language="JavaScript">

    $(document).ready(function () {
        //  syncTimer()
        setInterval(syncTimer, (syncdelay * 1000));

    });


    // __________________________________________________________//
    //_______________  SYNCHRONISATION __________________________//
    // __________________________________________________________//


    var currentTime = 0;
    var syncdelay = 1; // seconde
    var visibility = 0;


    function syncTimer() {
        jQuery('.syncTimestamp').each(function () {
            var currentElement = $(this);
            timeStamp = Number($(this).attr('data')) + Number(currentTime);
            currentElement.text(sformat(timeStamp));
        });
        // préparation prochaine passe
        currentTime += syncdelay;
    }

    // https://forum.jquery.com/topic/converting-seconds-to-dd-hh-mm-ss-format
    function sformat(timestamp) {

        var fm = [
            Math.floor(timestamp / 60 / 60 / 24), // DAYS
            Math.floor(timestamp / 60 / 60) % 24, // HOURS
            Math.floor(timestamp / 60) % 60, // MINUTES
            timestamp % 60 // SECONDS
        ];
        //console.log(fm)
        return $.map(fm, function (v, i) {
            return ((v < 10) ? '0' : '') + v;
        }).join(':');

    }

    // __________________________________________________________//


    $("tr .timeobstr").hover(
        function () {
            if (visibility == 1) {

                var currentSpy = $(this).attr('id_spy');
                var contentre = $("#infore_" + currentSpy);

                var destre = $("#currentre");
                destre.html(contentre.html());
            }
        }
    );


    $('.imgview').click(function () {
        visibility = 1;
        $('.info').show();
        $('.info').fadeIn();
    });

    $('.imghide').click(function () {
        visibility = 0;
        $('.info').hide();
        $('.info').fadeOut();
    });

    $('.imgdelete').click(function () {
        if (confirm("Supprimer la ligne ?")) {
            // recuperation de l 'element
            var currentElement = $(this);
            var currentSpy = $(this).attr('id_spy')
            $(".idspy_" + currentSpy).remove();
        }
        return false;

    });


</script>
