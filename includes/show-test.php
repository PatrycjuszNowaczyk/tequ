<?php

function tequ_show_test( $atts ){
    ob_start();
    if (false){ ?>
        <div>
            <p>TEST SHORTCODE</p>
            <p>Here you will see test</p>
        </div>
    <?php   
        $content = ob_get_clean();
        return $content;
    } else{
        ob_start(); ?>

        <?php if(false){ ?>
            <h1>bla bla bla</h1>
        <?php } ?>

        <?php    // get data from database
        $post_meta = get_post_meta($atts['id'], 'tequ_data', true);

        // enqueue required scripts and styles
        if(\Elementor\Plugin::$instance->editor->is_edit_mode()){
            add_action('elementor/editor/after_register_scripts', function(){
                wp_register_script('tequ-script', TEQU_PLUGIN_URL . 'assets/js/tequ.js', '', '1.0', true);
            });
            add_action('elementor/editor/after_enqueue_scripts', function(){
                wp_enqueue_script('tequ-script');
                // wp_enqueue_script('tequ-script');
            });
            add_action('elementor/editor/after_enqueue_styles', function(){
                wp_enqueue_style('tequ-style', TEQU_PLUGIN_URL . 'assets/css/tequ-style.css', null, '1.0', false);
            });
            // wp_enqueue_script('tequ-script', TEQU_PLUGIN_URL . 'assets/js/tequ.js', null, '1.0', true);
            // wp_enqueue_style('tequ-style', TEQU_PLUGIN_URL . 'assets/css/tequ-style.css', null, '1.0', false);

        }
        else{
            wp_enqueue_style('tequ-style', TEQU_PLUGIN_URL . 'assets/css/tequ-style.css', null, '1.0', false);
            wp_enqueue_script('tequ-script', TEQU_PLUGIN_URL . 'assets/js/tequ.js', null, '1.0', true);
        }

        function tequ_getCategories($answer){
            $aCategories = explode(':', $answer);
            return $aCategories[1];
        };
        function tequ_getAnswer($answer){
            $aCategories = explode(':', $answer);
            return $aCategories[0];
        };

        ?>
        <script>
            <?php // set array of categories objects ?>
            const tequCategories = [<?php $arrLength = count($post_meta['category']);
                    for ($i = 0; $i < $arrLength; $i++){
                        echo '{';
                        echo '\'category\' :' . (isset($post_meta['category'][$i]) ? '\'' . $post_meta['category'][$i] . '\',' : '\'\',');
                        echo '\'id\' :' . (isset($post_meta['category-id'][$i]) ? '\'' . $post_meta['category-id'][$i] . '\',' : '\'\',');
                        echo '\'header\' :' . (isset($post_meta['category-header'][$i]) ? '\'' . $post_meta['category-header'][$i] . '\',' : '\'\',');
                        echo '\'description\' :' . (isset($post_meta['category-description'][$i]) ? '\'' . $post_meta['category-description'][$i] . '\',' : '\'\',');
                        echo '\'image\' :' . (isset($post_meta['category-image'][$i]) ? '\'' . $post_meta['category-image'][$i] . '\'' : '\'\'');
                        echo '}';
                        if($i < $arrLength - 1 ){
                            echo ', ';
                    }
                } ?>];
        </script>
        <div class="test">
            <div class="test__header">
                <h2>
                    <?php echo isset($post_meta['header']) ? $post_meta['header'] : ''; ?>
                </h2>
            </div>
            <div class="test__questions">
                <div class="test__question--intro">
                    <h3>
                    <?php echo isset($post_meta['description']) ? $post_meta['description'] : ''; ?>
                    </h3>
                    <button class="test__question-enter"><?php echo isset($post_meta['begin-button']) ? $post_meta['begin-button'] : ''; ?></button>
                </div>
                <?php // start questions loop ?>
                <?php $arrLength = count($post_meta['question']);
                for ($i = 0; $i < $arrLength; $i++){ ?>

                <div class="test__question">
                    <div class="test__question-paragraph">
                        <p>
                            <?php echo isset($post_meta['question'][$i]) ? $post_meta['question'][$i] : ''; ?>
                        </p>
                    </div>
                    <div class="test__question-answer">
                        <button class="test__answer-button" data-testCategory="<?php echo tequ_getCategories($post_meta['answer-1'][$i]); ?>"> <?php echo isset($post_meta['answer-1'][$i]) ? tequ_getAnswer($post_meta['answer-1'][$i]) : ''; ?> </button>
                        <button class="test__answer-button" data-testCategory="<?php echo tequ_getCategories($post_meta['answer-2'][$i]); ?>"> <?php echo isset($post_meta['answer-2'][$i]) ? tequ_getAnswer($post_meta['answer-2'][$i]) : ''; ?> </button>
                    </div>
                </div>

                <?php // end questions loop ?>
                <?php } ?>
                <div class="test__score"></div>
            </div>
        </div>
    <?php 
        $content = ob_get_clean();
        return $content;
    };
} ?>