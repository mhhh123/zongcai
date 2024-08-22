<?php if (! defined('ABSPATH')) {
    die;
}
$prefix = '_prefix_profile_options';
CSF::createProfileOptions( $prefix, array(
  'data_type' => 'unserialize'
) );

CSF::createSection( $prefix, array(
  'title'  => '封禁违规用户',
  'fields' => array(
      array(
          'id'    => 'ceo_banned',
          'type'  => 'switcher',
          'title' => '封禁该用户',
      ),
      array(
          'id'         => 'ceo_banned_reason',
          'type'       => 'textarea',
          'title'      => '封禁原因',
          'default'    => '您的账户涉嫌违规使用，已被管理员冻结，如有疑问请联系管理员。',
          'dependency' => array('ceo_banned', '==', 'true'),
      ),

  )
) );