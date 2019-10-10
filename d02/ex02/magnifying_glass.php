#!/usr/bin/php
<?php
if ($argc == 2)
{
	$dom = new DOMDocument;
	if ($dom->loadHTMLFile($argv[1], LIBXML_HTML_NODEFDTD))
	{
		$links = $dom->getElementsByTagName("a");
		foreach ($links as $link)
		{
			$new_val = strtoupper($link->nodeValue);
			$imgs = $link->getElementsByTagName("img");
			foreach ($imgs as $image)
			{
				if ($image->hasAttribute("title"))
					$image->setAttribute("title", strtoupper($image->getAttribute("title")));
				$new_val .= $dom->saveHTML($image);
			}
			if ($link->hasAttribute("title"))
				$link->setAttribute("title", strtoupper($link->getAttribute("title")));
			$link->nodeValue = $new_val;
		}
		$output = htmlspecialchars_decode($dom->saveHTML());
		fwrite(STDOUT, $output);
 	}
}
?>
