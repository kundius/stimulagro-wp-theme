<section class="block-section faq-section" data-faq>
  <div class="container">
    <?php if ($title = $args['fields']['title']): ?>
    <h2 class="faq-section__title"><?php echo nl2br($title); ?></h2>
    <?php endif; ?>
    <?php if ($list = $args['fields']['list']): ?>
    <div class="faq-section__grid">
      <?php foreach ($list as $item): ?>
      <div class="faq-card" data-faq-item>
        <button class="faq-card__question" data-faq-trigger>
          <?php echo nl2br($item['question']); ?>
          <span class="faq-card__indicator"></span>
        </button>
        <div class="faq-card__answer">
          <?php echo nl2br($item['answer']); ?>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>
    <?php if ($action = $args['fields']['action']): ?>
    <div class="faq-section__button">
      <button type="button" class="primary-button primary-button--small" data-modal-open="faq-modal">
        <?php echo $action; ?>
      </button>
    </div>
    <?php endif; ?>
  </div>
</section>
