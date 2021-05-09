<h1 class="mb-5">
<?php
if(is_singular('rgm_phrase')){
    echo '<span class="small">' . __('Fraza', 'rgm') . ':</span> ' . get_the_title();
}
elseif(is_post_type_archive('rgm_phrase')){
    if(isset($_GET['litera'])){
        echo '<span class="small">' . __('Frazy na literę', 'rgm') . ' ' . '</span>' . '<b>' . strtoupper(strip_tags($_GET['litera'])) . '</b>';
    }else{
        echo __('Słownik', 'rgm');
    }
}
elseif(get_queried_object()){
    var_dump(get_queried_object()); exit;
}
else{
    echo get_the_title();
}
?>
</h1>