<?php

/**
 * Return sizes readable by humans
 */
function human_filesize($bytes, $decimals = 2)
{
  $size = ['B', 'kB', 'MB', 'GB', 'TB', 'PB'];
  $factor = floor((strlen($bytes) - 1) / 3);

  return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) .
      @$size[$factor];
}

/**
 * Is the mime type an image
 */
function is_image($mimeType)
{
    return starts_with($mimeType, 'image/');
}

/**
 * Responsive images function
 */
function get_srcset($image, $sizes, $defaultSize = '100vw')
{
  $imageSizes = config('blog.image_sizes');
  $srcset = 'src="' . $image->url . '" srcset="';
  $imageUrl = str_replace('.jpg', '', $image->url);
  foreach ($imageSizes as $key => $size) {
    if ($size <= $image->max_size) {
      $srcset .= $imageUrl . '-' . $size . '.jpg ' . $size . 'w';
      if ($key < count($imageSizes) - 1) {
        $srcset .= ', ';
      }
    }
  }
  $srcset .= '" sizes="';
  foreach ($sizes as $size) {
    $srcset .= $size . ", ";
  }
  $srcset .= $defaultSize . '"';
  return $srcset;
}

/**
 * Recursive routine to set a unique slug
 *
 * @param string $title
 * @param mixed $extra
 */
function setUniqueSlug($object, $title, $extra)
{
    $slug = str_slug($title.'-'.$extra);

    if ($object->whereSlug($slug)->exists()) {
        return setUniqueSlug($object, $title, $extra + 1);
    }
    
    return $slug;
    
}
