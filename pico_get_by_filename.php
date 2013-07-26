<?php

/**
 * Call pages by their filename like:
 * {{ pages['page2'].title }}
 *
 * @author James Doyle
 * @link http://ohdoylerules.com/
 * @license http://opensource.org/licenses/MIT
 */
class Pico_Get_By_Filename {

  private function _make_filename($url)
  {
    $filename = substr($url, (strrpos($url, '/')));
    $filename = str_replace('/', '', $filename);
    // need to find a way around files with the same name
    if (strlen($filename) <= 1) {
      $filename .= 'index';
    }
    return $filename;
  }

  public function get_pages(&$pages, &$current_page, &$prev_page, &$next_page) {
    foreach ($pages as $key => $value) {
      $new_key = $this->_make_filename($pages[$key]['url']);
      // not 0 because that is the homepage
      if ($key != 0) {
        unset($pages[$key]);
        // replace the old int key with the filename key
        $pages[$new_key] = $value;
        // store the filename so we can use it in templates
        $pages[$new_key]['filename'] = $new_key;
      }
    }
  }

}

// End of file