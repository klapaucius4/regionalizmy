<?php
/* Template Name: FAQ */
get_header();
?>

  <section class="accordion-section clearfix">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

          <?php
          $faqElements = get_field('faq_elements');
          if($faqElements):
            foreach($faqElements as $el): ?>
              <div class="panel panel-default">
                <div class="panel-heading p-3 mb-3" role="tab" id="heading<?= $i; ?>">
                <h3 class="panel-title">
                  <a class="arrow collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse<?= $i; ?>" aria-expanded="true" aria-controls="collapse<?= $i; ?>"><?= $el['title']; ?></a>
                </h3>
                </div>
                <div id="collapse<?= $i; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?= $i; ?>">
                <div class="panel-body px-3 mb-4">
                  <p class="m-0"><?= nl2br($el['content']); ?></p>
                </div>
                </div>
              </div>
            <?php endforeach;
          endif; ?>
          </div>
        </div>
      </div>
    </div>
</section>

<hr>

<?php
get_footer();