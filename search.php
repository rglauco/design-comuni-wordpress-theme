<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Design_Comuni_Italia
 */

get_header();
?>
    <main>
        <div class="container">
            <form role="search" id="search-form" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                <div class="row mb-md-5">
                    <div class="col-12">
                        <?php get_template_part("template-parts/common/breadcrumb"); ?>
                        <div class="form-group cmp-input-search-button mt-2 mb-4 mb-lg-50">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <svg class="icon icon-md">
                                        <use
                                            href="#it-search"
                                        ></use>
                                        </svg>
                                    </div>
                                </div>
                                <label for="search-input" class="active">Con Etichetta</label>
                                <input
                                type="search"
                                class="form-control"
                                id="search-input"
                                name="s"
                                value="<?php echo get_search_query(); ?>"
                                data-focus-mouse="false"
                                />
                            </div>
                            <button
                                type="submit"
                                class="btn btn-primary"
                            >
                                <span class="">Cerca</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <?php get_template_part("template-parts/search/filters"); ?>
                    <div class="col-lg-8 offset-lg-1">
                        <div class="d-flex justify-content-between align-items-center border-bottom border-light pb-3 mb-2">
                            <h2 class="visually-hidden" id="search-result">risultati di ricerca</h2>
                            <span class="search-results">
                                <strong><?php echo $wp_query->found_posts; ?></strong> Risultati
                            </span>
                            <button
                            type="button"
                            data-bs-toggle="modal"
                            data-bs-target="#modal-categories"
                            class="btn p-0 pe-2 d-lg-none"
                            aria-label="Filtra i risultati"
                            >
                            <span class="rounded-icon">
                                <svg class="icon icon-primary icon-xs mb-1">
                                <use href="#it-funnel"></use>
                                </svg> 
                            </span>
                            <span class="t-primary title-xsmall-semi-bold ms-1">
                                Filtra
                            </span>
                            </button>
                            <button
                            type="button"
                            data-bs-toggle="modal"
                            data-bs-target="#"
                            class="btn p-0 pe-2 d-none d-lg-block"
                            onclick="location.href='?s=<?php echo get_search_query(); ?>'"
                            aria-label="Rimuovi tutti i filtri"
                            >
                            <span class="title-xsmall-semi-bold ms-1">Rimuovi tutti filtri</span>
                            </button>
                        </div>
                        <div class="container p-0">
                            <div class="row flex-column-reverse flex-lg-row">
                                <div class="col-12 pt-3">
                                <?php if ( have_posts() ) : ?>
                                    <?php
                                    /* Start the Loop */
                                    while ( have_posts() ) :
                                        the_post();
                                        $descrizione = dci_get_meta('descrizione_breve');
                                    ?>
                                        <div class="cmp-card-latest-messages mb-3 mb-30" data-bs-toggle="modal" data-bs-target="#" id="">
                                            <div class="card drop-shadow px-4 pt-4 pb-4 rounded">
                                                <div class="card-header border-0 p-0">
                                                    <a 
                                                    class="title-xsmall-bold mb-2 category text-uppercase" 
                                                    href="<?php echo get_permalink( get_page_by_path( dci_get_group($post->post_type) ) ); ?>" 
                                                    title="<?php echo dci_get_group_name($post->post_type); ?>"
                                                    aria-label="Vai alla pagina <?php echo dci_get_group_name($post->post_type); ?>"
                                                    >
                                                    <?php echo dci_get_group_name($post->post_type); ?>
                                                    </a>
                                                </div>
                                                <div class="card-body p-0 my-2">
                                                    <h3 class="green-title-big t-primary mb-8">
                                                        <a href="<?php echo get_permalink(); ?>"><?php echo the_title(); ?></a>
                                                    </h3>
                                                    <p class="text-paragraph">
                                                        <?php echo $descrizione; ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endwhile;
                                    ?>   
                                    <?php get_template_part("template-parts/search/more-results"); ?>
                                <?php
                                else :
                                    get_template_part( 'template-parts/content', 'none' );

                                endif;
                                ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>  
        <?php echo get_template_part( 'template-parts/common/valuta-servizio'); ?>
        <?php echo get_template_part( 'template-parts/common/assistenza-contatti'); ?>
        <?php echo get_template_part( 'template-parts/search/filters-modal'); ?>
    </main>

<?php
get_footer();