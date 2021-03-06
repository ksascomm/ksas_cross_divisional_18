<?php
/**
 * The default template for the "roof"
 *
 * @package KSASAcademic
 * @since KSASAcademic 1.0.0
 */

?>
<?php $theme_option = flagship_sub_get_global_options();?>

<ul class="menu simple roof-menu align-right">
	<?php global $blog_id; $kasper = array(124); if (!in_array($blog_id, $kasper)) :?>
	<li class="roof-padding">
		<form method="GET" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search" aria-label="Utility Bar Search">
			<div class="input-group">
				<div class="input-group-button">
	    			<input type="submit" class="button" value="&#xf002;" aria-label="search">
	  			</div>
				<label for="s" class="screen-reader-text">
	                Search This Website
	            </label>
				<input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" data-swplive="true" placeholder="Search this site" aria-label="Search This Website"/>
			</div>
		</form>
	</li>
	<?php endif;?>
	<?php $explore_ksas_cond = $theme_option['flagship_sub_explore_ksas'];
		if ($explore_ksas_cond === 0 ):?>
	<li><a class="button" href="#" aria-label="Explore KSAS" data-toggle="offCanvasTop1">Explore JHU <span class="fa fa-bars" aria-hidden="true"></span></a></li>
	<?php endif;?>
</ul>
<?php if ($explore_ksas_cond === 0 ):?>
<div class="off-canvas position-top" id="offCanvasTop1" data-off-canvas aria-hidden="true">
	<div id="global-links" class="grid-x grid-padding-x small-up-2 medium-up-3 large-up-3">
		<h1 class="show-for-sr">Explore JHU</h1>
		<div class="cell">
			<h3>Inside the Krieger School</h3>
			<ul class="vertical menu" role="menu">
				<li role="menuitem"><a href="http://krieger.jhu.edu/academics/departments-programs-and-centers/" onclick="ga('send', 'event', 'Offcanvas', 'Academics', 'Departments')">Departments, Programs, and Centers</a></li>
				<li role="menuitem"><a href="http://krieger.jhu.edu/people/faculty-directory/" onclick="ga('send', 'event', 'Offcanvas', 'Academics', 'Faculty')">Faculty Directory</a></li>
				<li role="menuitem"><a href="http://krieger.jhu.edu/academics/fields/" onclick="ga('send', 'event', 'Offcanvas', 'Academics', 'Fields of Study')">Fields of Study</a></li>
				<li role="menuitem"><a href="http://krieger.jhu.edu/academics/majors-minors/" onclick="ga('send', 'event', 'Offcanvas', 'Academics', 'Majors & Minors')">Majors & Minors</a></li>
			</ul>
		</div>
		<div class="cell">
			<h3>Student & Faculty Resources</h3>
			<ul class="vertical menu" role="menu">
				<li role="menuitem"><a href="http://e-catalog.jhu.edu/" onclick="ga('send', 'event', 'Offcanvas', 'Resources', 'Academic Catalog')">Academic Catalog</a></li>
				<li role="menuitem"><a href="https://livejohnshopkins.sharepoint.com/sites/KSASFacultyHandbook" onclick="ga('send', 'event', 'Offcanvas', 'Resources', 'Faculty Handbook')">Faculty Handbook <span class="fas fa-sign-in-alt"></span></a></li>
				<li role="menuitem"><a href="https://studentaffairs.jhu.edu/registrar" onclick="ga('send', 'event', 'Offcanvas', 'Resources', 'Registrars')">Registrar's Office</a></li>
				<li role="menuitem"><a href="https://policies.jhu.edu/" onclick="ga('send', 'event', 'Offcanvas', 'Resources', 'Policy Library')">University Policies & Document Library <span class="fas fa-sign-in-alt"></span></a></li>
			</ul>
		</div>
		<div class="cell">
			<h3>Across Campus</h3>
			<ul class="vertical menu" role="menu">
				<li role="menuitem"><a href="https://www.jhu.edu/admissions/" onclick="ga('send', 'event', 'Offcanvas', 'Campus', 'Admissions')">Admissions & Aid</a></li>
				<li role="menuitem"><a href="https://www.jhu.edu/" onclick="ga('send', 'event', 'Offcanvas', 'Campus', 'JHU Home')">Johns Hopkins University Website</a></li>
				<li role="menuitem"><a href="https://www.jhu.edu/maps-directions/" onclick="ga('send', 'event', 'Offcanvas', 'Campus', 'Maps/Directions')">Maps & Directions</a></li>
				<li role="menuitem"><a href="https://my.jh.edu/portal/web/jhupub" onclick="ga('send', 'event', 'Offcanvas', 'Campus', 'myJHU')">myJHU</a></li>
			</ul>
		</div>
		<button class="close-button" aria-label="Close menu" type="button" data-close>
		  <span aria-hidden="true">&times;</span>
		</button>
	</div>
</div>
<?php endif;?>
