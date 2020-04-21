create table if not exists userDeta(
      id int not null auto_increment primary key,
      name varchar(255),
      password varchar(255),
      created timestamp not null default current_timestamp
    )