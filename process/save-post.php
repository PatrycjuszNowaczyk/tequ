<?php

function tequ_save_post($post_id, $post, $update){
// function tequ_save_post($post_id){
    // global $post_data;
    // $_POST;
    // wp_die(print_r($_POST));
    // wp_die(print_r($post_id));
    // $tequ_data = get_post_meta($post_id, 'test_data', true );
    // $tequ_data = empty($tequ_data) ? [] : $tequ_data;
    $tequ_data = [];
    // $tequ_data['header'] = isset($tequ_data['header']) ? $tequ_data['header'] : '';
    $tequ_data['title'] = $post->post_title;
    $tequ_data['header'] = isset($_POST['header']) ? $_POST['header'] : '';
    $tequ_data['description'] = isset($_POST['description']) ? $_POST['description'] : '';
    $tequ_data['begin-button'] = isset($_POST['begin-button']) ? $_POST['begin-button'] : '';
    $tequ_data['question'] = isset($_POST['question']) ? $_POST['question'] : array('');
    $tequ_data['answer-1'] = isset($_POST['answer-1']) ? $_POST['answer-1'] : array('');
    $tequ_data['answer-2'] = isset($_POST['answer-2']) ? $_POST['answer-2'] : array('');
    $tequ_data['category'] = isset($_POST['category']) ? $_POST['category'] : array('');
    $tequ_data['category-id'] = isset($_POST['category-id']) ? $_POST['category-id'] : array('');
    $tequ_data['category-header'] = isset($_POST['category-header']) ? $_POST['category-header'] : array('');
    $tequ_data['category-description'] = isset($_POST['category-description']) ? $_POST['category-description'] : array('');
    $tequ_data['category-image'] = isset($_POST['category-image']) ? $_POST['category-image'] : array('');
    // $tequ_data['test-input'] = 'test-input-value';
    // var_dump($tequ_data);
    // $tequ_data['question'] = isset($tequ_data['question']) ? $tequ_data['question'] : '';
    // $tequ_data['answer_1'] = isset($tequ_data['answer_1']) ? $tequ_data['answer_1'] : '';
    // $tequ_data['answer_2'] = isset($tequ_data['answer_2']) ? $tequ_data['answer_2'] : '';
    update_post_meta( $post_id, 'tequ_data', $tequ_data);
    // echo $tequ_data['header'];
    // delete_post_meta_by_key('test_data');
    // echo '<pre>';
    // var_dump($post_data);
    // var_dump($post);
    // var_dump($_POST);
    // echo '</pre>';
}