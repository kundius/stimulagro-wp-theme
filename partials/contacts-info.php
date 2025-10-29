<div class="contacts-info">
  <div class="contacts-info__title">Контактная информация</div>
  <div class="contacts-info__phone">
    <div class="contacts-info__phone-text">
      <div class="contacts-info__text">
        <?php echo $args['fields']['phone']; ?>
      </div>
    </div>
    <div class="contacts-info__phone-button">
      <button type="button" class="control-button" data-modal-open="modal-call">
        <span>Заказать звонок</span>
        <span class="icon icon-phone"></span>
      </button>
    </div>
  </div>
  <div class="contacts-info__address">
    <div class="contacts-info__text">
      <?php echo $args['fields']['address']; ?>
    </div>
  </div>
</div>