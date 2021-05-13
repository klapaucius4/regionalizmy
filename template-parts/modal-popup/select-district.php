<div id="selectDistrictModalPopup" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><?= __('Skąd jesteś / pochodzisz?', 'rgm'); ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="<?= __('Zamknij', 'rgm'); ?>">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form autocomplete="off" class="ui-widget">
          <fieldset class="form-group fieldset2">
            <input type="text" class="form-control findCountyInput3 has-warning" placeholder="<?= __('Powiat / miasto powiatowe', 'rgm'); ?>">
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" id="saveAsDefault1" value="option1">
              <label class="form-check-label small" for="saveAsDefault1"><?= __('ustaw jako domyślny region', 'rgm'); ?></label>
            </div>
          </fieldset>
        </form>
      </div>
      <?php include( locate_template('template-parts/modal-popup/footer.php') ); ?>
    </div>
  </div>
</div>