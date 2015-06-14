# Install latest Wordpress

class wordpress::install {

  # Create the Wordpress database
  exec { 'create-database':
    #unless the urban DB is already there
    unless  => '/usr/bin/mysql -u root -psmurfmurph urban',
    command => '/usr/bin/mysql -u root -psmurfmurph --execute=\'create database urban\'',
  }

  exec { 'create-user':
    #unless the user wordpress is already there
    unless  => '/usr/bin/mysql -u wordpress -psmurfmurph',
    command => '/usr/bin/mysql -u root -psmurfmurph --execute="GRANT ALL PRIVILEGES ON urban.* TO \'wordpress\'@\'%\' IDENTIFIED BY \'smurfmurph\'"',
    #command => '/usr/bin/mysql -u root -pLngs1369 --execute="FLUSH PRIVILEGES"',
  }

  exec { 'create-local-user':
    #unless the user wordpress is already there
    unless  => '/usr/bin/mysql -u wordpress -psmurfmurph',
    command => '/usr/bin/mysql -u root -psmurfmurph --execute="GRANT ALL PRIVILEGES ON urban.* TO \'wordpress\'@\'localhost\' IDENTIFIED BY \'smurfmurph\'"',
    #command => '/usr/bin/mysql -u root -pLngs1369 --execute="FLUSH PRIVILEGES"',
  }

  exec { 'flush privileges':
    #flush the privileges of the user
    require => Exec["create-user"],
    command => '/usr/bin/mysql -u root -psmurfmurph --execute="FLUSH PRIVILEGES"',
  }

  # Perform mySQL dump of the latest beach remote DB
  exec { 'mysql-dump':
    command => '/usr/bin/mysqldump -u b25646bfd625db -p9994db5d -h us-cdbr-iron-east-02.cleardb.net heroku_c93eb6e13dfc629 > urban.sql',
    timeout => 3600,
  }
  #import mySQL DB from the dump from the previous step
  exec { 'import mysql':
    command   => '/usr/bin/mysql -u wordpress -psmurfmurph -D urban < /home/vagrant/urban.sql',
    require   => Exec["mysql-dump"],
    logoutput => true,
    #output => true
  }
  #change the host variables for mySQL so that it points to localhost
  exec { 'change host':
    command   => '/usr/bin/mysql -u wordpress -psmurfmurph -D urban --execute="UPDATE wp_options wp SET option_value=\'http://localhost:8080\' WHERE wp.option_name=\'siteurl\' OR wp.option_name=\'home\'"',
    require   => Exec["import mysql"],
    logoutput => true,
  }
}
