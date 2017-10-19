create table if not exists ts_user
(
 id int UNSIGNED primary key auto_increment not null,
 `user` varchar(20) not null,
 pwd varchar(50) not null,
 create_time datetime DEFAULT null,
 `status` SMALLINT(2) default '1' not null,
 vip SMALLINT(2) default '3' not null
)
insert into ts_user 
select 1,'社会你雷哥',MD5('960426'),NOW(),1,3 UNION
select 2,'小妖精',MD5('5201314'),now(),1,3 
create table if not EXISTS ts_class
(
 id smallint(4) unsigned not null AUTO_INCREMENT COMMENT '分类表',
	title varchar(30) not null  DEFAULT '' COMMENT '分类名称',
	pid smallint(4) unsigned not null  COMMENT 'tg_classID',
	PRIMARY KEY (id)
)
CREATE TABLE books (                                           
  bookId MEDIUMINT(8) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT'图书ID',
  classId SMALLINT(4) UNSIGNED NOT NULL DEFAULT 1 COMMENT'图书类别ID',
  bookName VARCHAR(50) NOT NULL COMMENT'图书名称',
  publisher VARCHAR(100) NOT NULL COMMENT'出版社',
  author VARCHAR(20) NOT NULL COMMENT'图书作者',
  price DOUBLE(6,2) NOT NULL COMMENT'图书价格',
  detail TEXT COMMENT'图书介绍',
  PRIMARY KEY (bookId) COMMENT'设置图书ID为主键',
  KEY bookname (bookName) COMMENT'设置图书名称为索引',
  FOREIGN key(categoryId) REFERENCES categories(categoryId)
) 
select * from ts_books
create table ts_rbac_role
(
 id int(4) not null auto_increment comment'分组的id',
 role_title varchar(20) not null default'' comment'角色名称',
 node_id varchar(50) not null default'' comment'节点的id',
 primary key(id)
);
create table ts_rbac_node
(
 id int(4) not null auto_increment comment'用户许可表',
 operation varchar(50) not null default'' comment'用户操作的节点',
 title varchar(50) not null default'' comment'操作名称',
 PRIMARY key(id) 
);