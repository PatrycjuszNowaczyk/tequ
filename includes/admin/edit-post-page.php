<?php

function tequ_edit_post_page($post){
    if($post->post_type != 'test'){
        return;
    };
    $post_meta = get_post_meta($post->ID, 'tequ_data',true);
    wp_enqueue_style('tequ-style-admin', TEQU_PLUGIN_URL . 'assets/css/tequ-style-admin.css', null, '1.0', false);
    wp_enqueue_script("jquery-ui-tabs");
    wp_enqueue_script('tequ-script-admin', TEQU_PLUGIN_URL . 'assets/js/tequ-admin.js', null, '1.0', true);
    wp_enqueue_media();
?>
        <div class="tequ-admin__shortcode-wrapper">
            <p><strong>Shortcode:</strong></p>
            <input type="text" id="" value='[tequ_test id="<?php echo get_the_ID(); ?>"]' readonly>
        </div>
        <div id="tequ-tabs" class="tequ-admin wp-core-ui">
            <ul class="tequ-admin__tabs-menu">
                <li><a href="#tequ-tabs-1">Initial text</a></li>
                <li><a href="#tequ-tabs-2">Questions</a></li>
                <li><a href="#tequ-tabs-3">Categories</a></li>
            </ul>
            <div id="tequ-tabs-1" class="tequ-admin__info">
                    <div class="tequ-admin__header">
                        <p class="p-4">
                        <?php _e('Header', 'tequ') ?>
                    </p>
                    <input type="text" name="header" id="tequ-header" value="<?php echo $post_meta['header'] ?>" autocomplete="off">
                </div>
                <div class="tequ-admin__description">
                    <p>
                        <?php _e('Description', 'tequ') ?>
                    </p>
                    <input type="text" name="description" id="tequ-description" value="<?php echo $post_meta['description'] ?>" autocomplete="off">
                </div>
                <div class="tequ-admin__begin-button">
                    <p>
                        <?php _e('Begin button', 'tequ') ?>
                    </p>
                    <input type="text" name="begin-button" id="tequ-begin-button" value="<?php echo $post_meta['begin-button'] ?>" autocomplete="off">
                </div>
            </div>
            <div  id="tequ-tabs-2">
                <div class="tequ-admin__questions tequ-admin__groups">
                    <?php $arrLength = count($post_meta['question']); 
                    for( $i = 0; $i < $arrLength; $i++ ){ ?>
                    <div class="tequ-admin__group-row">
                        <button type="button" class="notice-dismiss tequ-admin__delete-group"><span class="screen-reader-text"><?php _e('Delete question', 'tequ'); ?></span></button>
                        <div class="tequ-admin__group-header">
                            <p>
                                <?php _e('Question', 'tequ') ?>
                            </p>
                            <div class="tequ-admin__grab-lines">
                                <div class="tequ-admin__grab-lines-wrapper">
                                    <div class="tequ-admin__grab-line">
                                    </div>
                                    <div class="tequ-admin__grab-line">
                                    </div>
                                    <div class="tequ-admin__grab-line">
                                    </div>
                                </div>
                            </div>
                            <input type="text" name="question[]" id="tequ-question" value="<?php echo $post_meta['question'][$i]; ?>" placeholder="<?php _e('Type question here', 'tequ'); ?>" autocomplete="off">
                        </div>
                        <div class="tequ-admin__answers">
                            <div class="tequ-admin__answer">
                                <p>
                                    <?php _e('Answer one', 'tequ') ?>
                                </p>
                                <input type="text" name="answer-1[]" id="tequ-question" value="<?php echo $post_meta['answer-1'][$i]; ?>" placeholder="<?php _e('Type answer here', 'tequ'); ?>" autocomplete="off">
                            </div>
                            <div class="tequ-admin__answer">
                                <p>
                                    <?php _e('Answer two', 'tequ') ?>
                                </p>
                                <input type="text" name="answer-2[]" id="tequ-question" value="<?php echo $post_meta['answer-2'][$i]; ?>" placeholder="<?php _e('Type answer here', 'tequ'); ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <div class="tequ-admin__add-group">
                    <button id="add-question" class="button button-primary button-large"><?php _e('add question', 'tequ'); ?></button>
                </div>
            </div>
            <div  id="tequ-tabs-3">
                <div class="tequ-admin__categories tequ-admin__groups">
                    <?php $arrLength = count($post_meta['category']); 
                    for( $i = 0; $i < $arrLength; $i++ ){ ?>
                    <div class="tequ-admin__group-row tequ-admin__category-row">
                        <button type="button" class="notice-dismiss tequ-admin__delete-group"><span class="screen-reader-text"><?php _e('Delete question', 'tequ'); ?></span></button>
                        <div class="tequ-admin__group-header">
                            <p>
                                <?php _e('Category', 'tequ') ?>
                            </p>
                            <div class="tequ-admin__grab-lines">
                                <div class="tequ-admin__grab-lines-wrapper">
                                    <div class="tequ-admin__grab-line">
                                    </div>
                                    <div class="tequ-admin__grab-line">
                                    </div>
                                    <div class="tequ-admin__grab-line">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tequ-admin__category-top">
                            <div class="tequ-admin__category-name">
                                <input class="tequ-admin__category-input" type="text" name="category[]" value="<?php echo $post_meta['category'][$i]; ?>" placeholder="<?php _e('Category name', 'tequ'); ?>" autocomplete="off">
                                <input class="tequ-admin__category-digest-input" type="text" name="category-id[]" value="<?php echo $post_meta['category-id'][$i]; ?>" placeholder="<?php _e('ID', 'tequ'); ?>" autocomplete="off">
                                <input class="tequ-admin__category-image-url" type="text" name="category-image[]" value="<?php echo $post_meta['category-image'][$i]; ?>" readonly>
                            </div>
                            <div class="tequ-admin__category-image-wrapper">
                                <div class="tequ-admin__category-image">
                                    <button class="tequ-admin__upload-img button button-primary button-large <?php echo !empty($post_meta['category-image'][$i]) ? 'hidden' : ''; ?>"><?php _e('upload image', 'tequ'); ?></button>
                                    <button type="button" class="notice-dismiss tequ-admin__delete-image <?php echo empty($post_meta['category-image'][$i]) ? 'hidden' : ''; ?>"><span class="screen-reader-text"><?php _e('Delete question', 'tequ'); ?></span></button>
                                    <div class="tequ-admin__category-img-container">
                                        <?php echo !empty($post_meta['category-image'][$i]) ? '<img src="' . $post_meta['category-image'][$i] . '" alt="" style="max-width:100%;"/>' : ''; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p>
                            <?php _e('Header', 'tequ') ?>
                        </p>
                        <input type="text" name="category-header[]" value="<?php echo $post_meta['category-header'][$i]; ?>" placeholder="<?php _e('Category header', 'tequ'); ?>" autocomplete="off">
                        <p>
                            <?php _e('Description', 'tequ') ?>
                        </p>
                        <textarea class="tequ-admin__category-description" name="category-description[]" id="" ><?php echo $post_meta['category-description'][$i];?></textarea>
                    </div>
                    <?php } ?>
                </div>
                <div class="tequ-admin__add-group">
                    <button id="add-category" class="button button-primary button-large"><?php _e('add category', 'tequ'); ?></button>
                </div>
            </div>
        </div>
<?php
}