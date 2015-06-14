# Install latest Wordpress

class wordpress::install {

  # Create the Wordpress database
  exec { 'create-database':
    #unless the beach2015 DB is already there
    unless  => '/usr/bin/mysql -u root -psmurfmurph urbanstalls',
    command => '/usr/bin/mysql -u root -psmurfmurph --execute=\'create database urbanstalls\'',
  }

  exec { 'create-user':
    #unless the user smccord is already there
    unless  => '/usr/bin/mysql -u wordpress -psmurfmurph',
    command => '/usr/bin/mysql -u root -psmurfmurph --execute="GRANT ALL PRIVILEGES ON urbanstalls.* TO \'wordpress\'@\'%\' IDENTIFIED BY \'smurfmurph\'"',
    #command => '/usr/bin/mysql -u root -pLngs1369 --execute="FLUSH PRIVILEGES"',
  }

  exec { 'create-local-user':
    #unless the user smccord is already there
    unless  => '/usr/bin/mysql -u wordpress -psmurfmurph',
    command => '/usr/bin/mysql -u root -psmurfmurph --execute="GRANT ALL PRIVILEGES ON urbanstalls.* TO \'wordpress\'@\'localhost\' IDENTIFIED BY \'smurfmurph\'"',
    #command => '/usr/bin/mysql -u root -pLngs1369 --execute="FLUSH PRIVILEGES"',
  }

  exec { 'flush privileges':
    #flush the privileges of the user
    require => Exec["create-user"],
    command => '/usr/bin/mysql -u root -psmurfmurph --execute="FLUSH PRIVILEGES"',
  }

  # Perform mySQL dump of the latest beach remote DB
  exec { 'mysql-dump':
    command => '/usr/bin/mysqldump -u b25646bfd625db -p9994db5d -h us-cdbr-iron-east-02.cleardb.net heroku_c93eb6e13dfc629 > urbanstalls.sql',
    timeout => 3600,
  }
  #import mySQL DB from the dump from the previous step
  exec { 'import mysql':
    command   => '/usr/bin/mysql -u wordpress -psmurfmurph -D urbanstalls < /home/vagrant/urbanstalls.sql',
    require   => Exec["mysql-dump"],
    logoutput => true,
    #output => true
  }
  #change the host variables for mySQL so that it points to localhost
  exec { 'change host':
    command   => '/usr/bin/mysql -u wordpress -psmurfmurph -D urbanstalls --execute="UPDATE wp_options wp SET option_value=\'http://localhost:8080\' WHERE wp.option_name=\'siteurl\' OR wp.option_name=\'home\'"',
    require   => Exec["import mysql"],
    logoutput => true,
  }
}
