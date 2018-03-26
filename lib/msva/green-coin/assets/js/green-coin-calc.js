(function($) {

    $(document).ready(function() {

        $('#green-coin-calc-submit').on('click', function() {


            var teamSize = $('#team-size').val();
            var numWhoPassedChallenge = $('#number-passed-challenge').val();

            var data = {
                'action': 'green_coin_calc',
                'team_size': teamSize,
                'challenge_id': ajaxdata.post_id,
                'number_who_passed_challenge': numWhoPassedChallenge,
                'nonce': $('#green-coin-calc-nonce').val()
            };

            $.post(ajax_object.ajaxurl, data, function(response) {


                console.log(response);

                if (!response.success) {

                }
                else {

                }


            })
            .fail(function(response) {
                console.log(response);
                alert( "error" );
            });

        });

    });


})(jQuery);


