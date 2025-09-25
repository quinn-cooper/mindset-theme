<?php
/**
 * Title: Book Review
 * Slug: mindset-theme/book-review
 * Categories: media, text
 */
?>

<!-- wp:media-text {"mediaId":336,"mediaLink":"http://localhost/mindset/?attachment_id=336","mediaType":"image","mediaWidth":35,"imageFill":false} -->
<div class="wp-block-media-text is-stacked-on-mobile" style="grid-template-columns:35% auto"><figure class="wp-block-media-text__media">
    <img src="<?php echo esc_url(get_theme_file_uri('assets/images/book-cover.jpg')); ?>" 
    alt="<?php esc_html_e('Placeholder image of a book', 'mindset-theme'); ?>" 
    class="wp-image-336 size-full"
    />
</figure>
    <div class="wp-block-media-text__content"><!-- wp:heading -->
<h2 class="wp-block-heading"><?php esc_html_e('Book Title', 'mindset-theme'); ?></h2>

<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Author</p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:media-text -->