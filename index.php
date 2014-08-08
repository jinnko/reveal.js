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

<ul>
<?php
if ($handle = opendir('../Presentations')) {
    while (false !== ($entry = readdir($handle))) {
        if (strstr($entry, '.md')) {
            print "<li style='display:table-row'><strong style='display:table-cell; padding-right:1em'>".str_replace('.md', '', $entry)."</strong> ";
            foreach ( $themes as $t ) {
              $theme = str_replace('.css', '', $t);
              print "<a href='markdown.php?content=$entry&theme=$theme'>$theme</a> | ";
            }
            print "</li>\n";
        }
    }
    closedir($handle);
}
?>
</ul>

</body>
</html>
