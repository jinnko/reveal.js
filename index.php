<html>
<head>

</head>
<body>
<?php
if ($handle = opendir('./css/theme')) {
    while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != ".." && $entry != 'source' && $entry != 'template' && $entry != 'README.md') {
            $themes[] = $entry;
        }
    }
    closedir($handle);
}
?>

<div style='float: right'>
<form>Size: <select name=s onchange=this.form.submit()>
<option value=>default</option>
<?php
$sizes = Array('xl', 'l', 'm', 's', '720p', '480p');
foreach ( $sizes as $s ) {
  $selected = (isset($_GET['s']) && $_GET['s']==$s) ? ' selected=selected' : '';
  print '<option value="'.$s.'"'.$selected.'>'.$s.'</option>';
}
?>
</select></form>
</div>

<ul>
<?php
if ($handle = opendir('../Presentations')) {
    while (false !== ($entry = readdir($handle))) {
        if (strstr($entry, '.md')) {
            print "<li style='display:table-row'><strong style='display:table-cell; padding-right:1em'>".str_replace('.md', '', $entry)."</strong> ";
            foreach ( $themes as $t ) {
              $theme = str_replace('.css', '', $t);
              $s = !empty($_GET['s']) ? "&size=".$_GET['s'] : "";
              print "<a href='markdown.php?content=".rawurlencode($entry)."&theme=$theme$s'>$theme</a> | ";
            }
            print "<a href='markdown.php?content=$entry&theme=simple/print-pdf/'>print</a></li>\n";
        }
    }
    closedir($handle);
}
?>
</ul>

</body>
</html>
