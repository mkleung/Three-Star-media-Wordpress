<?php

/**
 * Front page template
 *
 * @package Algonquin
 */


get_header();

?>


<article class="main-content">
			<section class="intro" id="about">



            	<?php
				// Start the Loop
				if (have_posts()) :
					while (have_posts()) : the_post(); ?>
		
						<div><?php the_content(); ?></div>
				<?php endwhile;
				endif;
				?>

			</section>
			
			
			<section class="team" id="team">

				<div class="extrainfo clearfix">
					<div>
						<p>Inform first party data yet target the low hanging fruit. Build key demographics and possibly be on brand. Executing awareness to, consequently, be CMSable. Amplifying user engagement so that as an end result, we improve overall outcomes. Generate agile and then funnel users.
						</p><p>
							Engaging bleeding edge with the possibility to infiltrate new markets. Leverage benchmarking in order to come up with a bespoke solution. Demonstrate key demographics but funnel users. Build daily standups and then funnel users. Demonstrating vertical integration but think outside the box. Executing brand integration with the possibility to get buy in.
						</p>
					</div>
				</div>
			</section>
		</article>

<div class="push"></div>


<?php
get_footer();
