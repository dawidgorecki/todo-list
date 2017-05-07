CREATE DATABASE todo_list DEFAULT CHARACTER SET utf8;

USE todo_list;

CREATE TABLE items (
    itemid int unsigned not null auto_increment primary key,
    value text not null,
    done boolean not null,
    created datetime not null
);

GRANT select, insert, delete, update
ON todo_list.*
TO todo_list@localhost identified by 'haslo';