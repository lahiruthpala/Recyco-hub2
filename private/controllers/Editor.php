<?php
require 'vendor/autoload.php';

use EditorJS\EditorJS;
use EditorJS\Blocks\Block;
use HTMLPurifier;

// Handle image uploads
if (isset($_FILES['file'])) {
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["file"]["name"]);
  move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
  echo json_encode(['url' => $target_file]);
  exit;
}

// Get data from AJAX request
$data = json_decode($_POST['data'], true);

// Validate and sanitize data
$config = [
  'HTML.Allowed' => 'p,br,b,i,u,a[href],ul,ol,li',
  'Attr.AllowedFrameTargets' => ['_blank'],
  'Attr.AllowedRel' => ['nofollow', 'noopener', 'noreferrer'],
  'Attr.AllowedClasses' => [],
];

$purifier = new HTMLPurifier($config);
$content = $purifier->purify($data['blocks']);

// Save data to database
// ...

// Render blocks
$renderer = new EditorJS\Renderer($blocks);
$html = $renderer->render();

// Send HTML to client
echo $html;