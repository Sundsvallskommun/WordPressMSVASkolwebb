
(function($) {

    $(document).ready(function() {

        var modal = document.getElementById('myModal');

        $('#green-coin-calc-submit').on('click', function() {

            $('#calc-loader').removeClass('hidden');

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
                $('#calc-loader').addClass('hidden');
                if (!response.success) {
                    alert("Något gick fel, försök igen senare");
                }
                else {
                    var level = $('#level');
                    var score = $('#score');

                    // Get the <span> element that closes the modal
                    modal.style.display = "block";
                    level.text(response.data.level.green_coin_level_displayname);
                    score.text(response.data.score);

                }


            })
            .fail(function(response) {
                console.log(response);
                alert( "error" );
            });

        });


        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];
        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        $('#team-size').change(function() {

            $('#number-passed-challenge-wrapper').removeClass('hide');

            let numberOfPlayers = parseInt($(this).val());
            let passedSelectInput = $('#number-passed-challenge');
            passedSelectInput.find('option').remove();
            for (let i =0; i <= numberOfPlayers; i++) {
                passedSelectInput.append($('<option>', {
                    value: i,
                    text: i    
                }));
            }

        });


    });


})(jQuery);




