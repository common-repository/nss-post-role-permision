<?php
/* protected */
if (!defined('ABSPATH'))
    exit;

/**
 * Description of nss_role_cpost
 *
 * @author nssTheme
 */
//require
require_once 'nss_cpt_maker.php';

//class
class nss_role_cpost
{

    //trait
    use nss_cpt_generate;

    //constructor
    public function __construct()
    {
        add_shortcode('show_new_role', array($this, 'nss_role_presents'));
        add_action('init', array($this, 'nss_add_post_type'));
    }

    //methods
    public function nss_role_presents() 
    {
        global $post;
        $nssrole = 'nss_user';
        $nssu = get_role($nssrole);
        if (null !== $nssu) 
        {
            echo esc_html('Welcome, Custom User : ') . '<b>' . esc_html($nssu->name) . '</b>';
            $nss_review = array(
                'post_type' => array($this->cpt),
                'post_status' => array('publish'),
                'posts_per_page' => 5, // you may edit this number
                'orderby' => 'date',
                'order' => 'DESC'
            );
            $nss_cView = new WP_Query($nss_review);
            if ($nss_cView->have_posts()) 
            {
                while ($nss_cView->have_posts()) 
                {
                    $nss_cView->the_post();
                    $terms = get_the_terms($post->ID, $this->rv_cat);
                    $classes = '';
                    if (is_array($terms)&& $terms != '') 
                    {
                        foreach ($terms as $term)
                        {
                            if($term)
                            {
                                $classes .= '- ' . $term->name . ' ';
                            }                            
                        }
                    }
                    ?>
                        <div class="drive">
                            <h2><?php esc_html(the_title()); ?></h2>                        
                            <div class="des">
                                <div class="img">
                                    <?php                                   
                                        if (has_post_thumbnail()) 
                                        {
                                            the_post_thumbnail(array(1000, 600));
                                        }
                                        else
                                        {
                                            echo '<img src="http://placehold.it/1000x600" alt=""/>';
                                        }
                                    ?>
                                </div>
                                <div class="img-desc"><?php echo substr(get_the_content(), 0, 125); ?></div>
                                <div class="cat-off"><?php echo esc_html($classes); ?></div>
                            </div>
                        </div>
                    <?php
                }
            }
        } 
        else
        {
            echo esc_html('Oh... the ' . $nssu->name . 'role already exists.');
        }
    }
}//end class
//object
new nss_role_cpost();

            