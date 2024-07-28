<button class="snipcart-add-item square-bordered button"
  data-item-id="<?= $page->ProductID() ?>"
  data-item-custom1-name='Type'
  data-item-custom1-value='<?= $page -> parent() -> title()?>'
  data-item-price="<?= $page->ProductPrice() ?>"
  data-item-url="<?= Url::path($page->url(), true, false); ?>"
  data-item-description="<?= $page->header() -> kt() ?>"
  data-item-name="<?= $page->title() ?>">
  ADD TO CART
</button>
