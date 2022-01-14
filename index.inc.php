<?php include("config.php"); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
<script type="text/javascript">
var innerOn = { timeout : null, showMenu : function(){ clearTimeout(this.timeout); if($('innerOn').style.display == 'none'){ this.timeout = setTimeout(function(){new Effect.BlindDown('innerOn', {duration:1, fps:50})},300); } }, hideMenu : function(){ if($('innerOn').style.display == 'none'){ clearTimeout(this.timeout); }else{ this.timeout = setTimeout(function(){new Effect.BlindUp('innerOn', {duration:1, fps:50})},500); } } }
</script>
<title><?php echo($title); ?></title>
<meta name="description" content="<?php echo $metadescription; ?>" />
<meta name="keywords" content="<?php echo $metakeywords; ?>" />
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<center>

<div id="head">
<div id="logo"></div>
</div>

<div id="ad2"><?php echo($adcode1); ?><?php echo($adcode1); ?>
</div>
<p>&nbsp;</p>
<div id="desc"><?php echo($desc); ?></div>

<div id="surf">
<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>"><p>
<input value="http://www." size="50" name="<?php echo $GLOBALS['_config']['url_var_name'] ?>" type="text" id="search" onfocus="this.select()" />
<input id="submit" type="submit" value="" /><br />
<div id="ad1"><?php echo($adcode2); ?></div>
</p>
<?php

switch ($data['category'])
{
    case 'auth':
        break;
    case 'error':
        echo '<br /><div align="center"><div id="error">';
        
        switch ($data['group'])
        {
            case 'url':
                echo '<b>URL Error (' . $data['error'] . ')</b>: ';
                switch ($data['type'])
                {
                    case 'internal':
                        $message = 'Failed to connect to the specified host. '
                                 . 'Possible problems are that the server was not found, the connection timed out, or the connection refused by the host. '
                                 . 'Try connecting again and check if the address is correct. <br />';
                        break;
                    case 'external':
                        switch ($data['error'])
                        {
                            case 1:
                                $message = 'The URL you\'re attempting to access is blacklisted by this server. Please select another URL.';
                                break;
                            case 2:
                                $message = 'The URL you entered is malformed. Please check whether you entered the correct URL or not.';
                                break;
                        }
                        break;
                }
                break;
            case 'resource':
                echo '<b>Resource Error:</b> ';
                switch ($data['type'])
                {
                    case 'file_size':
                        $message = 'The file your are attempting to download is too large.<br />'
                                 . 'Maxiumum permissible file size is <b>' . number_format($GLOBALS['_config']['max_file_size']/1048576, 2) . ' MB</b><br />'
                                 . 'Requested file size is <b>' . number_format($GLOBALS['_content_length']/1048576, 2) . ' MB</b>';
                        break;
                    case 'hotlinking':
                        $message = 'It appears that you are trying to access a resource through this proxy from a remote Website.<br />'
                                 . 'For security reasons, please use the form below to do so.';
                        break;
                }
                break;
        }
        
        echo 'An error has occured while trying to browse through the proxy. <br />' . $message . '</div></div><br />';
        break;
}
?>
<div id="innerOff" onclick="innerOn.hideMenu('innerOn')"> <div id="innerOn" style="display: none;">
<?php
      
      foreach ($GLOBALS['_flags'] as $flag_name => $flag_value)
      {
          if (!$GLOBALS['_frozen_flags'][$flag_name])
          {
              echo '<ul><li class="option"><label><input type="checkbox" name="' . $GLOBALS['_config']['flags_var_name'] . '[' . $flag_name . ']"' . ($flag_value ? ' checked="checked"' : '') . ' />' . $GLOBALS['_labels'][$flag_name][1] . '</label></li></ul>' . "\n";
          }
      }
      ?>
</div></div>
</form>
</div>
<!-- DO NOT REMOVE OR EDIT ANY OF THE LINKS BELOW.  THIS TEMPLATE IS PROVIDED FOR FREE PROVIDED THAT THESE LINKS REMAIN INTACT.  REMOVAL, REPLACEMENT OR ALTERATION OF THE LINKS BELOW WILL NULL AND VOID THE PERMISSION GRANTED AND IS AN INFRINGEMENT OF APPLICABLE COPYRIGHT LAWS. -->
<div id="footer">
<?php echo($footer); ?> | Designed by <a href="http://www.freeproxytemplates.com" title="FreeProxyTemplates.com">FreeProxyTemplates.com</a> | Sponsored by: <a href="http://www.bloonstowerdefense.info">Bloons Tower Defense</a> | <a href="http://www.proxyhost.org">Proxy Hosting Sites</a>

</center>
</body>
</html>