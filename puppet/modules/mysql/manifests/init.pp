#Install MySQL

class mysql::install {

  $password = 'smurfmurph'

  package { [
      'mysql-client',
      'mysql-server',
    ]:
    ensure => installed,
  }

  # Copy a different my.cnf file in the mysql directory so that we can bind to 0.0.0.0
  file { '/etc/mysql/my.cnf':
    source => 'puppet:///modules/wordpress/my.cnf',
    notify => Package['mysql-server']
  }

  exec { 'Set MySQL server\'s root password':
    subscribe   => [
      Package['mysql-server'],
      Package['mysql-client'],
    ],
    refreshonly => true,
    unless      => "mysqladmin -uroot -p${password} status",
    path        => '/bin:/usr/bin',
    command     => "mysqladmin -uroot password ${password}",
  }
}
