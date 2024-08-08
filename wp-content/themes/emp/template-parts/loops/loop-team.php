<?php $team_counter = $args['team_counter'] ?? '';?>

<div class='team-single'>
    <a href="javascript:void(0)" class='screen-link' data-fancybox data-src="#team-single-<?php echo get_the_id() ?>"></a>
    <div class="team-single__content">
        <div class="team-media">
            <figure>
                <?php the_post_thumbnail(); ?>
            </figure>
        </div>
        <div class="team-text-content">
            <div class="team-top">
                <h3><?php the_title(); ?></h3>
                <p class='designation'><?php echo CFS()->get('designation'); ?></p>
            </div>  
            <div class="team-description team-description--card">
              <?php the_content();?>
                <div class="team-meta">
                    <ul class="list-unstyled">
                        <li>
                            <a href="mailto:<?php echo CFS()->get('team_email'); ?>"><i class="fas fa-envelope"></i> <?php echo CFS()->get('team_email'); ?></a>
                        </li>
                        <li>
                            <a href="tel:<?php echo CFS()->get('team_contact_number'); ?>"><i class="fas fa-phone-alt"></i> <?php echo CFS()->get('team_contact_number'); ?></a>
                        </li>
                        <li>
                            <a href="<?php echo CFS()->get('team_facebook'); ?>" target="_blank"><i class="fas fa-globe"></i> <?php echo CFS()->get('team_facebook'); ?></a>
                        </li>
                        <li>
                            <a href="<?php echo CFS()->get('team_linkedin'); ?>" target="_blank"><i class="fab fa-linkedin-in"></i> <?php echo CFS()->get('team_linkedin'); ?></a>
                        </li>
                        <li>
                            <a href="<?php echo CFS()->get('team_twitter'); ?>" target="_blank"><i class="fab fa-twitter"></i> <?php echo CFS()->get('team_twitter'); ?></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="popup-box popup-box--team" id="team-single-<?php echo get_the_id() ?>" style='display:none;'>

        <div class="popup-box__holder popup-box__holder--team">
            <div class="team-single__content">
                <div class="team-media">
                    <figure>
                        <?php the_post_thumbnail(); ?>
                    </figure>
                </div>
                <div class="team-text-content">
                    <div class="team-top">
                        <h3><?php the_title(); ?></h3>
                        <p class='designation'><?php echo CFS()->get('designation'); ?></p>
                    </div>  
                    <div class="team-meta">
                        <ul class="list-unstyled">
                            
                            <?php $team_email = CFS()->get('team_email'); ?>
                            <?php if (!empty($team_email)): ?>
                                <li>
                                    <a href="mailto:<?php echo $team_email; ?>"><i class="fas fa-envelope"></i><span> <?php echo $team_email; ?></span></a>
                                </li>
                            <?php endif; ?>
                            
                            <?php $team_contact_number = CFS()->get('team_contact_number'); ?>
                            <?php if (!empty($team_contact_number)): ?>
                                <li>
                                    <a href="tel:<?php echo $team_contact_number; ?>"><i class="fas fa-phone-alt"></i><span> <?php echo $team_contact_number; ?></span></a>
                                </li>
                            <?php endif; ?>
                            
                            <?php $team_facebook = CFS()->get('team_facebook'); ?>
                            <?php if (!empty($team_facebook)): ?>
                                <li>
                                    <a href="<?php echo $team_facebook; ?>" target="_blank"><i class="fas fa-globe"></i><span> <?php echo $team_facebook; ?></span></a>
                                </li>
                            <?php endif; ?>
                            
                            <?php $team_linkedin = CFS()->get('team_linkedin'); ?>
                            <?php if (!empty($team_linkedin)): ?>
                                <li>
                                    <a href="<?php echo $team_linkedin; ?>" target="_blank"><i class="fab fa-linkedin-in"></i><span> <?php echo $team_linkedin; ?></span></a>
                                </li>
                            <?php endif; ?>
                            
                            <?php $team_twitter = CFS()->get('team_twitter'); ?>
                            <?php if (!empty($team_twitter)): ?>
                                <li>
                                    <a href="<?php echo $team_twitter; ?>" target="_blank"><i class="fab fa-twitter"></i><span> <?php echo $team_twitter; ?></span></a>
                                </li>
                            <?php endif; ?>
                            
                        </ul>
                    </div>
                    <div class="team-description team-description--details">
                        <?php the_content();?>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>


