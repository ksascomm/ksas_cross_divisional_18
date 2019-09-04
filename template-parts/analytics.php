<?php $theme_option = flagship_sub_get_global_options();
$analytics_id = $theme_option['flagship_sub_google_analytics']; ?>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-100553583-15"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-40512757-1');
  gtag('config', '<?php echo $analytics_id; ?>');
</script>

<?php $siteimprove_analytics = $theme_option['flagship_sub_siteimprove_analytics'];
if ($siteimprove_analytics === 1): ?>
<script type="text/javascript">
	/*<![CDATA[*/
	(function() {
	var sz = document.createElement('script'); sz.type = 'text/javascript'; sz.async = true;
	sz.src = '//siteimproveanalytics.com/js/siteanalyze_11464.js';
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(sz, s);
	})();
	/*]]>*/
</script>
<?php
endif; ?>