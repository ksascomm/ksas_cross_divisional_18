<?php
/**
 * These conditionals run on specific single custom post types or page templates
 */

?>

<?php if (is_page_template('page-templates/people-directory.php') || is_page_template('page-templates/research-projects.php') ) : ?>
  <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js" defer></script>
  <script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js" defer></script>
<?php endif;?>

<?php if (is_page_template('page-templates/people-directory.php')):?>
  <script defer>
    jQuery(document).ready(function(e){var t,i;e("#noResult").hide();var o,s,l,n=e("#isotope-list").isotope({itemSelector:".person",layoutMode:"vertical",filter:function(){var o=e(this),s=!t||o.text().match(t),l=!i||o.is(i);return s&&l}}),a=e("#id_search").keyup((o=function(){t=new RegExp(a.val(),"gi"),n.isotope(),n.data("isotope").filteredItems.length?e("#noResult").hide():e("#noResult").show()},function(){l&&clearTimeout(l),setTimeout(function(){o(),l=null},s||100)}));function c(){var t;t=location.hash.match(/filter=([^&]+)/i),(i=t&&t[1])&&(e(".filter-list").find("a.is-checked").removeClass("is-checked"),e(".filter-list").find('[data-filter="'+i+'"]').addClass("is-checked"),n.isotope())}e(".filter-list li a").click(function(e){e.preventDefault()}),e(".filter-list a.button").on("click",function(){if(e(this).hasClass("is-checked"))e(this).removeClass("is-checked"),location.hash="filter=*";else{var t=e(this).attr("data-filter");location.hash="filter="+encodeURIComponent(t)}}),c(),window.onhashchange=c});
</script>
<?php endif;?>

<?php if (is_page_template('page-templates/research-projects.php')):?>
  <script defer>
    jQuery(document).ready(function(e){var t,i;e("#noResult").hide();var o,s,l,n=e("#isotope-list").isotope({itemSelector:".item",layoutMode:"fitRows",filter:function(){var o=e(this),s=!t||o.text().match(t),l=!i||o.is(i);return s&&l}}),a=e("#id_search").keyup((o=function(){t=new RegExp(a.val(),"gi"),n.isotope(),n.data("isotope").filteredItems.length?e("#noResult").hide():e("#noResult").show()},function(){l&&clearTimeout(l),setTimeout(function(){o(),l=null},s||100)}));function c(){var t;t=location.hash.match(/filter=([^&]+)/i),(i=t&&t[1])&&(e(".filter-list").find("a.is-checked").removeClass("is-checked"),e(".filter-list").find('[data-filter="'+i+'"]').addClass("is-checked"),n.isotope())}e(".filter-list li a").click(function(e){e.preventDefault()}),e(".filter-list a.button").on("click",function(){if(e(this).hasClass("is-checked"))e(this).removeClass("is-checked"),location.hash="filter=*";else{var t=e(this).attr("data-filter");location.hash="filter="+encodeURIComponent(t)}}),c(),window.onhashchange=c});
  </script>
<?php endif;?>

<?php if ( is_singular('post') ) : ?>
  <script>
    jQuery(document).ready( function($) {
      $('li[aria-label="About"]').addClass('current_page_parent current_page_ancestor');
    });
  </script>

<?php elseif (is_singular('ai1ec_event') ) : ?>
  <script>
    jQuery(document).ready( function($) {
      $('li[aria-label="Events"]').addClass('current_page_parent current_page_ancestor');
    });
  </script>

<?php elseif (is_singular('people') ) : ?>
  <script>
    jQuery(document).ready( function($) {
      $('li[aria-label="People"]').addClass('current_page_item current_page_parent current_page_ancestor');
    });
  </script>
<?php endif; ?>
