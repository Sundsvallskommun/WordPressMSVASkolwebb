<script src="<?php echo get_stylesheet_directory_uri() . '/lib/msva/green-coin/assets/js/green-coin-calc.js' ?>"></script>

    <select id="team-size">
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
    </select>

    <select id="number-passed-challenge">
      <option value="0">0</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
    </select>

    <input id="green-coin-calc-submit" type="submit" value="Räkna ut lagets greencoins">
    <input id="green-coin-calc-nonce" type="hidden" value="<?php echo wp_create_nonce( 'green-coin-calc' ); ?>" name="nonce" />