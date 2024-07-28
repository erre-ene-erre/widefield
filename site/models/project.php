<?php

class ProjectPage extends Page
{
  public function children(): Kirby\Cms\Pages
  {
    $images = [];

    foreach ($this->images()->template('media-file') -> sort('sort', 'asc', 'filename', 'asc') as $image) {
      $images[] = [
        'slug'     => $image->name(),
        'num'      => $image->indexOf(),
        // 'num'      => $image->sort()->value(),
        'template' => 'media-file',
        'model'    => 'media-file',
      ];
    }

    return Pages::factory($images, $this);
  }
}