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
        $filename = substr($url, (strrpos($url, '/', -2)));
        $filename = str_replace('/', '', $filename);
    }
    return $filename;
  }

  public function get_pages(&$pages, &$current_page, &$prev_page, &$next_page) {
    $temp = array();
    foreach ($pages as $page) {
      $filename = $this->_make_filename($page['url']);
      $page['filename'] = $filename;
      $temp[$filename] = $page;
    }
    $filename = $this->_make_filename($current_page['url']);
    $current_page['filename'] = $filename;
    $pages = $temp;
  }

}

// End of file
