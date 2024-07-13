<?php
    $quote  = get_field( 'quote_text' );
    $wrapper_attributes = get_block_wrapper_attributes([
    ]);
?>
<section <?php echo $wrapper_attributes; ?>>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="cab-quote-area">
                    <p class="cab-quote-txt"><?php echo $quote ?></p>
                </div>
            </div>
        </div>
</section>
