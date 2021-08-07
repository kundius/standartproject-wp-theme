<section class="section-contacts">
  <div class="ui-container section-contacts__container">
    <div class="section-contacts__cell">
      <div class="section-contacts__title">Контакты</div>

      <div class="contacts-block">
        <?php if ($addresses = get_field('addresses', 15)): ?>
        <div class="contacts-block__row contacts-block__row_address">
          <?php foreach ($addresses as $item): ?>
          <div class="contacts-block__cell-half">
            <div class="contacts-block__address">
              <?php echo $item['content'] ?>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <?php if ($phones = get_field('phones', 15)): ?>
        <div class="contacts-block__row contacts-block__row_phones">
          <?php foreach ($phones as $item): ?>
          <div class="contacts-block__cell-half">
            <div class="contacts-block__phone">
              <div class="contacts-block__phone-icon">
                <?php icon('icon-phone', [20, 20]) ?>
              </div>
              <?php echo $item['content'] ?>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <?php $email = get_field('email', 15) ?>
        <?php $additional_phone = get_field('additional_phone', 15) ?>
        <?php if ($email || $additional_phone): ?>
        <div class="contacts-block__row contacts-block__row_email">
          <?php if ($email): ?>
          <div class="contacts-block__cell-half">
            <div class="contacts-block__email">
              <div class="contacts-block__email-icon">
                <?php icon('icon-email', [15, 11]) ?>
              </div>
              <a href="mailto:<?php echo $email ?>"><?php echo $email ?></a>
            </div>
          </div>
          <?php endif; ?>
          <?php if ($additional_phone): ?>
          <div class="contacts-block__cell-half">
            <div class="contacts-block__phone">
              <?php echo $additional_phone ?>
            </div>
          </div>
          <?php endif; ?>
        </div>
        <?php endif; ?>

        <?php if ($schedule = get_field('schedule', 15)): ?>
        <div class="contacts-block__row">
          <div class="contacts-block__cell-full">
            <div class="contacts-block__schedule">
              <div class="contacts-block__schedule-icon">
                <?php icon('icon-schedule', [20, 20]) ?>
              </div>
              <?php echo $schedule ?>
            </div>
          </div>
        </div>
        <?php endif; ?>
      </div>
    </div>

    <div class="section-contacts__cell">
      <div class="section-contacts__title">Обратная связь</div>

      <?php echo do_shortcode('[contact-form-7 id="148" title="Обратная связь"]') ?>
    </div>
  </div>
</section>
