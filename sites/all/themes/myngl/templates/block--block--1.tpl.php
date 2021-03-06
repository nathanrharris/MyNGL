<?php

/**
 * @file
 * Default theme implementation to display a block.
 *
 * Available variables:
 * - $block->subject: Block title.
 * - $content: Block content.
 * - $block->module: Module that generated the block.
 * - $block->delta: An ID for the block, unique within each module.
 * - $block->region: The block region embedding the current block.
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the
 *   following:
 *   - block: The current template type, i.e., "theming hook".
 *   - block-[module]: The module generating the block. For example, the user
 *     module is responsible for handling the default user navigation block. In
 *     that case the class would be 'block-user'.
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * Helper variables:
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $block_zebra: Outputs 'odd' and 'even' dependent on each block region.
 * - $zebra: Same output as $block_zebra but independent of any block region.
 * - $block_id: Counter dependent on each block region.
 * - $id: Same output as $block_id but independent of any block region.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 * - $block_html_id: A valid HTML ID and guaranteed unique.
 *
 * @see template_preprocess()
 * @see template_preprocess_block()
 * @see template_process()
 *
 * @ingroup themeable
 */
  global $brand;
  global $node;
  print_r($node);
?>


<div id="help-overlay-close" onclick="myngl.help_overlay_close()">X</div>
<div id="help-overlay-inner" >

  <div id="help-title" >Need Help? Find your problem below:</div>
  <div class="short-line"></div>
 
  <?php
    $result = db_query("SELECT nid FROM {nodequeue_nodes} WHERE qid = 1 ORDER BY position");

    foreach ($result as $r) {
      $faq[] = node_load($r->nid);
    }
  ?>

  <ol style="list-style-type:decimal">
  <?php
    foreach ($faq as $k => $f) {
      print "<li onclick='jQuery(\"#help-overlay-inner\").scrollTo(\"#answer-$k\");' style='cursor:pointer;'>{$f->title}</li>";
    }
  ?>
  </ol>

  <div class="short-line"></div>

  <ol style="list-style-type:decimal">
  <?php 

    foreach ($faq as $k => $f) {
      print "<li style='padding-top:50px;' id='answer-$k'>";
      print "<strong>{$f->title}</strong><br>";
      print "{$f->field_faq_answer['und'][0]['safe_value']}";
      print "<br /><br /><a href='#' onclick='jQuery(\"#help-overlay-inner\").scrollTo(\"#help-title\"); return false;' style='font-size:14px; font-weight:bold;'>Top</a>";
      print "</li>";
    }

  ?>
  </ol>

</div>
