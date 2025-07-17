<?php

class MediaFilePage extends Page
{
  public function image(string $filename = null): Kirby\Cms\File|null
  {
    if (!$filename) {
      return $this->parent()->images()->template('media-file')->findBy('name', $this->slug());
    }

    return parent::image($filename);
  }
}