<div id="voteModalPopup" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <form class="modal-content ui-widget" autocomplete="off">
      <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="<?= __('Zamknij', 'rgm'); ?>">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <fieldset class="form-group fieldset1">
          <div class="form-check">
            <?php //$rgmUserCountyCookie = isset($_COOKIE['rgmUserCounty'])?json_decode(stripslashes($_COOKIE['rgmUserCounty']), true):null; ?>
            <input class="form-check-input" type="radio" name="voteModalPopupRadio" id="voteModalPopupRadio1" value="1" checked>
            <label class="form-check-label" for="voteModalPopupRadio1"></label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="voteModalPopupRadio" id="voteModalPopupRadio2" value="2">
            <label class="form-check-label" for="voteModalPopupRadio2"><?= __('Znam z innego regionu Polski'); ?></label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="voteModalPopupRadio" id="voteModalPopupRadio3" value="3">
            <label class="form-check-label" for="voteModalPopupRadio3"><?= __('Znam z ogólnopolskich środków masowego przekazu', 'rgm'); ?><small class="text-small d-block"><?= __('(prasa, radio, telewizja, Internet, książka, film)', 'rgm'); ?></small></label>
          </div>
        </fieldset>
        <fieldset class="form-group fieldset2">
          <input type="text" class="form-control findCountyInput2 has-warning" placeholder="<?= __('Powiat / miasto powiatowe', 'rgm'); ?>">
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="saveAsDefault2" value="option1">
            <label class="form-check-label small" for="saveAsDefault2"><?= __('ustaw jako domyślny region', 'rgm'); ?></label>
          </div>
        </fieldset>
        <fieldset class="form-group fieldset3">
        <?php
        $args = array(
          'post_type' => 'rgm_mass_media',
          'posts_per_page' => -1,
          'post_status' => 'publish'
        );
        $myQuery = new WP_Query($args);
        if($myQuery->have_posts()):
        ?>
          <?php while($myQuery->have_posts()): $myQuery->the_post(); ?>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio<?= get_the_ID(); ?>" value="option<?= get_the_ID(); ?>">
              <label class="form-check-label" for="inlineRadio<?= get_the_ID(); ?>"><?= get_the_title(); ?></label>
            </div>
          <?php endwhile; wp_reset_postdata(); ?>
        <?php endif; ?>
        </fieldset>
      </div>
      <?php include( locate_template('template-parts/modal-popup/footer.php') ); ?>
    </form>
  </div>
</div>