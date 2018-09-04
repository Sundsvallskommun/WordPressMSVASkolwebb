<script src="<?php echo get_stylesheet_directory_uri() . '/lib/msva/green-coin/assets/js/green-coin-calc.js' ?>"></script>
<div class="green-coin-calc-wrapper mb-5">
    <div class="form-group mr-5">
        <label for="team-size" class="calc-label">Hur många är ni i laget?</label>
        <select id="team-size">
        <option value="0">Välj</option>
          <?php for ($i = 1; $i <= 30; $i++) : ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
          <?php endfor; ?>
        </select>
    </div>
    <div class="form-group " id="number-passed-challenge-wrapper">
        <label for="number-passed-challenge" class="calc-label">Hur många klarade utmaningen?</label>
        <select id="number-passed-challenge">
          <?php for ($i = 0; $i <= 30; $i++) : ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
          <?php endfor; ?>
        </select>
    </div>
    <hr class="line">
    <div class="flex-content">
        <input id="green-coin-calc-submit" type="submit" value="räkna ut lagets greencoins">
        <div id="calc-loader" class="hidden msva-loader calc-loader"></div>
    </div>

    <input id="green-coin-calc-nonce" type="hidden" value="<?php echo wp_create_nonce( 'green-coin-calc' ); ?>" name="nonce" />

</div>