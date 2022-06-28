<?php
    $links = dci_get_option('link','link_utili');
?>

<section id="novita" class="useful-links-section">
    <div class="section section-muted pt-35 pb-35 pt-lg-45 pb-lg-45">
        <div class="container">
            <div class="row">
                <div class="col col-sm-10 offset-sm-1 col-md-8 offset-md-2 px-0">
                <form role="search" id="search-form" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <div class="cmp-input-search">
                        <div class="form-group autocomplete-wrapper mb-2 mb-lg-4">
                        <label for="autocomplete-three" class="visually-hidden">Cerca una parola chiave</label>
                        <input type="search" class="autocomplete" placeholder="Cerca una parola chiave" id="autocomplete-three" name="s" value="<?php echo get_search_query(); ?>" data-bs-autocomplete="[]">
                        <span class="autocomplete-icon" aria-hidden="true">
                            <svg class="icon icon-sm icon-primary"><use href="#it-search"></use></svg>
                        </span>
                        
                        </div>
                    </div>
                </form>
                <div class="link-list-wrapper">
                    <div
                    class="link-list-heading text-uppercase mt-2 mt-lg-4 mb-3 ps-0"
                    >
                    Link utili
                    </div>
                    <ul class="link-list">
                        <?php foreach ($links as $link) { ?>
                            <li>
                                <a class="list-item mb-3 active ps-0" href="<?php echo $link['url']; ?>" aria-label="Vai alla pagina <?php echo $link['testo']; ?>" title="Vai alla pagina <?php echo $link['testo']; ?>"
                                ><span class="text-button-normal"
                                    ><?php echo $link['testo']; ?></span
                                ></a
                                >
                            </li>
                        <?php } ?>
                    </ul>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>