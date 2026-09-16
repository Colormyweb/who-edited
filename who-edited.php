<?php
/**
 * Plugin Name: WhoEdited
 * Plugin URI:  https://colormyweb.com
 * Description: Ajoute une colonne "Dernière modif." triable sur les écrans Pages et Articles : date/heure, auteur·rice de la dernière modification, et une pastille pour repérer en un coup d'œil les contenus modifiés récemment.
 * Version:     1.5
 * Author:      Colormyweb
 * Text Domain: who-edited
 */

if (!defined('ABSPATH')) {
    exit;
}

// Seuil (en jours) au-delà duquel un changement n'est plus considéré comme "récent".
// Modifier cette valeur pour ajuster la sensibilité de l'alerte.
define('WHOEDITED_RECENT_DAYS', 30);

// 1. Ajout de la colonne
add_filter('manage_pages_columns', 'whoedited_add_modified_column');
add_filter('manage_posts_columns', 'whoedited_add_modified_column');

function whoedited_add_modified_column($columns) {
    $new_columns = [];
    foreach ($columns as $key => $label) {
        if ($key === 'date') {
            $new_columns['whoedited_modified'] = __('Dernière modif.', 'who-edited');
        }
        $new_columns[$key] = $label;
    }
    if (!isset($new_columns['whoedited_modified'])) {
        $new_columns['whoedited_modified'] = __('Dernière modif.', 'who-edited');
    }
    return $new_columns;
}

// 2. Rendu du contenu de la colonne
add_action('manage_pages_custom_column', 'whoedited_render_modified_column', 10, 2);
add_action('manage_posts_custom_column', 'whoedited_render_modified_column', 10, 2);

function whoedited_render_modified_column($column, $post_id) {
    if ($column !== 'whoedited_modified') {
        return;
    }

    $modified_gmt = get_post_field('post_modified_gmt', $post_id);
    $modified_ts  = strtotime($modified_gmt . ' UTC');
    $current_gmt  = current_time('timestamp', true);
    $days_ago     = ($current_gmt - $modified_ts) / DAY_IN_SECONDS;

    $last_editor_id = get_post_meta($post_id, '_edit_last', true);
    if ($last_editor_id) {
        $editor = get_userdata($last_editor_id);
        $editor_name = $editor ? $editor->display_name : __('Inconnu', 'who-edited');
    } else {
        $author_id = get_post_field('post_author', $post_id);
        $editor_name = get_the_author_meta('display_name', $author_id);
    }

    if ($days_ago <= WHOEDITED_RECENT_DAYS) {
        $color = '#d6336c';
        $title = sprintf(
            /* translators: %d: nombre de jours */
            __('Modifié récemment (moins de %d jours)', 'who-edited'),
            WHOEDITED_RECENT_DAYS
        );
    } else {
        $color = '#8c8f94';
        $title = __('Pas de modification récente', 'who-edited');
    }

    printf(
        '<span style="display:inline-block;width:9px;height:9px;border-radius:50%%;background:%s;border:1px solid rgba(0,0,0,0.15);margin-right:6px;vertical-align:middle;" title="%s"></span>%s<br><span style="color:#666;font-size:12px;">par <strong><em>%s</em></strong></span>',
        esc_attr($color),
        esc_attr($title),
        esc_html(get_the_modified_date('d/m/Y à H:i', $post_id)),
        esc_html($editor_name)
    );
}

// 3. Rendre la colonne triable
add_filter('manage_edit-page_sortable_columns', 'whoedited_modified_sortable_column');
add_filter('manage_edit-post_sortable_columns', 'whoedited_modified_sortable_column');

function whoedited_modified_sortable_column($columns) {
    $columns['whoedited_modified'] = 'modified';
    return $columns;
}
