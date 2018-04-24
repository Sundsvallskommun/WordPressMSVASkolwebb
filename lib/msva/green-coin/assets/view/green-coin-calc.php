<script src="<?php echo get_stylesheet_directory_uri() . '/lib/msva/green-coin/assets/js/green-coin-calc.js' ?>"></script>
<div class="green-coin-calc-wrapper mb-5">
    <div class="form-group mr-5">
        <label for="team-size" class="calc-label">Hur många är ni i laget?</label>
        <select id="team-size">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
        </select>
    </div>
    <div class="form-group">
        <label for="number-passed-challenge" class="calc-label">Hur många klarade utmaningen?</label>
        <select id="number-passed-challenge">
          <option value="0">0</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
        </select>
    </div>
    <hr class="line">
    <div class="flex-content">
        <input id="green-coin-calc-submit" type="submit" value="räkna ut lagets greencoins">
        <div id="calc-loader" class="hidden msva-loader calc-loader"></div>
    </div>

    <input id="green-coin-calc-nonce" type="hidden" value="<?php echo wp_create_nonce( 'green-coin-calc' ); ?>" name="nonce" />




</div>

<!-- The Modal -->
<div id="myModal" class="modal">



    <div class="modal-content">

            <!-- Modal content -->
        <div class="modal-header">
            <span class="close">&times;</span>
        </div>

        <div class="modal-text mb-5">
            <span class="h1-look-alike">bra jobbat!</span>
            <p class="mt-1">Utmaningen är avklarad!</p>
            <p>Så här många greencoins fick laget:</p>
            <hr class="line">
                <img class="mr-1" width="103px" height="103px" src="<?php echo get_stylesheet_directory_uri() . '/assets/images/coin.svg';?>" alt="coin"><span id="score" class="score">7,500</span>
            <hr class="line">

            <span>nivå:</span><span id="level" class="level">MILJÖHJÄLTAR</span>
            <br>
            <a class="score-download" id="download" href="">Ladda hem och skriv ut ert diplom</a>

        </div>


        <div class="modal-footer"></div>
    </div>



</div>
