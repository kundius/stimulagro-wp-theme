<?php
$posts_query_args = [
  'post_type' => 'prices',
  'posts_per_page' => -1,
];

if ($args['fields']['what'] !== 'all') {
  $posts_query_args['post__in'] = [];
  if ($fields_entries = $args['fields']['entries']) {
    foreach ($fields_entries as $item) {
      $posts_query_args['post__in'][] = $item['id'];
    }
  }
}

$posts_query = new WP_Query($posts_query_args);
?>

<section class="block-section prices-section">
  <div class="container">
    <?php if ($title = $args['fields']['title']): ?>
    <h2 class="prices-section__title"><?php echo nl2br($title); ?></h2>
    <?php endif; ?>

    <div class="prices" data-prices>
      <div class="prices-tabs prices-tabs--count-<?php echo $posts_query->found_posts; ?>">
        <div class="prices-tabs__content">
          <?php $n = 0; while ($posts_query->have_posts()): $posts_query->the_post(); ?>
          <button
            class="prices-tabs__item<?php if ($n === 0): ?> active<?php endif; ?>"
            data-prices-tab="<?php echo esc_html(get_the_title()); ?>"
          >
            <?php echo nl2br(get_the_title()); ?>
          </button>
          <?php $n++; endwhile; ?>
        </div>
        <button type="button" class="prices-tabs__show" data-prices-tabs-show data-prices-tabs-show-alt="Свернуть">Показать все</button>
      </div>

      <div class="prices-table">
        <div class="prices-table__head">
          <div class="prices-table__head-cell">
            Наименование работ
          </div>
          <div class="prices-table__head-cell">
            Ед. изм
          </div>
          <div class="prices-table__head-cell">
            Цена
          </div>
        </div>

        <div class="prices-table__body">
          <div class="prices-panes">
            <?php $n = 0; while ($posts_query->have_posts()): $posts_query->the_post(); ?>
            <div
              class="prices-panes__item<?php if ($n === 0): ?> active<?php endif; ?>"
              data-prices-pane="<?php echo esc_html(get_the_title()); ?>"
            >
              <?php $options = carbon_get_post_meta(get_the_ID(), 'options'); ?>
              <div class="prices-list">
                <?php foreach ($options as $option): ?>
                  <?php if ($option['_type'] === 'title'): ?>
                  <div class="prices-list__title">
                    <?php echo nl2br($option['name']); ?>
                  </div>
                  <?php endif; ?>
                  <?php if ($option['_type'] === 'option'): ?>
                  <div class="prices-list__row" data-prices-row>
                    <div class="prices-list__enable">
                      <input class="prices-list__checkbox" type="checkbox" name="enable" value="1" data-prices-row-enable />
                    </div>
                    <div class="prices-list__name" data-prices-row-name>
                      <?php echo nl2br($option['name']); ?>
                    </div>
                    <div class="prices-list__quantity">
                      <?php if ($option['price']): ?>
                      <input
                        class="prices-list__quantity-input"
                        type="text"
                        name="quantity"
                        min="1"
                        value="1"
                        data-prices-row-quantity
                      />
                      <?php endif; ?>
                    </div>
                    <div class="prices-list__units" data-prices-row-units>
                      <?php echo $option['unit']; ?>
                    </div>
                    <div class="prices-list__price" data-prices-row-price="<?php echo $option['price']; ?>">
                      <?php if ($option['price']): ?>
                      <?php echo number_format_i18n($option['price']); ?> руб.
                      <?php endif; ?>
                    </div>
                  </div>
                  <?php endif; ?>
                <?php endforeach; ?>
              </div>
            </div>
            <?php $n++; endwhile; ?>
          </div>
        </div>

        <div class="prices-table__footer">
          <button type="button" class="control-button" data-prices-download>
            <span>Скачать расчет стоимости</span>
            <span class="icon icon-download"></span>
          </button>

          <div class="prices-total">
            <div class="prices-total__label">
              Итого:
            </div>
            <div class="prices-total__value" data-prices-total></div>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>
<?php wp_reset_postdata(); ?>
