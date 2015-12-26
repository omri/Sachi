<?php get_header(); ?>

		<!-- main -->
		<div class="page-body">
			<div class="page-context">
				<h1 class="page-name">הווה</h1>
				<ul class="page-nav">
					<li>
						סיירת החסד
					</li>
					<li>
						מנהיגות
					</li>
					<li>
						צוות מלווה
					</li>
					<li>
						מפת פעילות
					</li>
				</ul>
			</div>
			<div class="brand-stripe">
				<div class="page-description">
					<h2 class="page-description-inner">
					סיירות חסד
					</h2>
				</div>
			</div>
			<div class="page-content">
				<?php
				// Start the loop.
				while ( have_posts() ) : the_post();

					// Include the page content template.
					get_template_part( 'content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				// End the loop.
				endwhile;
				?>
				<p class="page-long-desc">
					סח"י מביאה גישה חדשנית, ״הפוכה״, שיוצרת שותפות עם נוער
בסיכון, הלומד לקחת אחריות על עצמו ועל הסביבה דרך נתינה.
תהליך זה יוצר שינוי חיובי הן אצל הנער והן בקהילה מסביבו
				</p>
				<p>
					מעל ל -333,300 בני נוער בישראל נמצאים בסיכון. לעתים קרובות
הם חשים ניכור, חוסר שייכות, תסכול, חוסר תקווה וכישלון. הם
מרגישים מנותקים מהמשפחות, הקהילות שלהם והחברה כולה. הם
מפגינים התנהגות הרסנית ואנטי חברתית, אשר, אם אינה מטופלת
בזמן, עלולה להביא למעשים פליליים, התמכרות לסמים ואלכוהול.
				</p>
				<p>
					כמענה לכך הוקמה סח"י בשנת 9332 . סח"י - סיירת חסד ייחודית,
הינה תכנית מהפכנית שבה הופך נוער הנמצא על רצף הסיכון
לאזרחים אכפתיים ואחראים. סח " י פועלת לשינוי חברתי ומהותי
בחיי בני ובנות הנוער על ידי נתינה לזולת, מתוך אמונה כי חינוך
לנתינה יטפח צעירים ערכיים , סובלניים, הרגישים לצרכי האחר
ומאמינים בעצמם וביכולותיהם להשתלב בהצלחה בחברה.
				</p>
			</div>
		</div>
		<!-- end main-->
<?php get_footer(); ?>
