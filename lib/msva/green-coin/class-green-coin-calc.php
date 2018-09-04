<?php


class Green_Coin_Calc {

    /**
	 * Setup ajax hooks for admin and frontend
	 */
    public function __construct() {

		add_action( 'wp_ajax_nopriv_green_coin_calc', array( $this, 'calculate' ) );
		add_action( 'wp_ajax_green_coin_calc', array( $this, 'calculate' ) );

	}



	/**
     *
     * Calculate green coins points and hero level
	 */
	public function calculate() {

		check_ajax_referer( 'green-coin-calc', 'nonce' );


		$params_exists = array_key_exists('number_who_passed_challenge', $_POST) &&
		    array_key_exists('team_size', $_POST) &&
            array_key_exists('challenge_id', $_POST);

        if (!$params_exists) {
            sk_log('Missing params', $_POST);
            wp_send_json_error();
        }

        $challenge_id = $_POST['challenge_id'];
		$number_who_passed_challenge = intval($_POST['number_who_passed_challenge']);
        $team_size = intval($_POST['team_size']);

        // We cannot have more ppl who passed the challenge than there are team players
        // No calc on double zeros
        $is_wrong_param_values = ($number_who_passed_challenge > $team_size) ||
            ($number_who_passed_challenge === 0 && $team_size === 0);

        if ($is_wrong_param_values) {
            sk_log('Wrong parameter values', $_POST);
            wp_send_json_error();
        }

        $level = $this->challenge_hero_level_display_name($number_who_passed_challenge, $team_size);

        $result = [
            'score' => $this->challenge_green_coin_value($number_who_passed_challenge, $challenge_id),
            'level' => $level
        ];

        wp_send_json_success($result);

	}

    /**
     *
     * @param $percentage
     *
     * @return string the level closets (down) to the percentage of
     * players who completed the challenge
     */
    public function challenge_hero_level_display_name($players_made_it, $total_players) {

        $success_rate = $players_made_it / $total_players;
        $success_percentage = $success_rate * 100;
        $levels = get_field('green_coin_levels', 'option');

        $min_diff = 100;
        $closest_level = null;

        foreach ($levels as $level) {

            if (array_key_exists('green_coin_level', $level) &&
                array_key_exists('green_coin_level_displayname', $level)) {

                $level_threshold = intval($level['green_coin_level']);

                // if we hit a exact match we can finish early
                if ($level_threshold === $success_percentage) {
                    return $level;
                }

                $diff = $success_percentage - $level_threshold;

                // we want the closets level downwards
                if ($diff > 0) {
                    if ($diff < $min_diff) {
                        $min_diff = $diff;
                        $closest_level = $level;
                    }
                }
            }
        }

        return $closest_level;
    }


    /**
     *
     * @param $players_made_it number of players who made the challenge
     * @param $post_id id of the challenge
     *
     * @return int total score for the team of the current challenge
     */
    public function challenge_green_coin_value($players_made_it, $post_id = 0) {

        if ($players_made_it === 0) return 0;

        if ($post_id === 0) return $players_made_it * 1000;


        $value = get_field('gc_challenge_value', $post_id);
        if ($value === false || $value === null) return $players_made_it * 1000;

        return $value * $players_made_it;

    }


    /**
     *
	 * Write the html for the calculator
	 */
	public static function output_calculator_view() {

        // Buffer the output
        ob_start();
        include( STYLESHEETPATH . '/lib/msva/green-coin/assets/view/green-coin-calc.php');
        $output =  ob_get_contents();
        ob_end_clean();


		echo $output;

	}

    /**
     *
     * Write the html for the calculator
     */
    public static function output_diploma() {

        // Buffer the output
        ob_start();
        include( STYLESHEETPATH . '/lib/msva/green-coin/assets/view/green-coin-diploma.php');
        $output =  ob_get_contents();
        ob_end_clean();


        echo $output;

    }



}