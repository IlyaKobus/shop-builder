create table admins
(
  id         bigint unsigned auto_increment
    primary key,
  username   varchar(255)                 not null,
  email      varchar(255)                 not null,
  password   varchar(255)                 not null,
  avatar     varchar(255)                 null,
  role       varchar(255) default 'admin' not null,
  created_at timestamp                    null,
  updated_at timestamp                    null,
  constraint admins_email_unique
    unique (email),
  constraint admins_username_unique
    unique (username)
)
  collate = utf8mb4_unicode_ci;

INSERT INTO larashop.admins (id, username, email, password, avatar, role, created_at, updated_at) VALUES (1, 'admin', 'admin@larashop.com', '$2y$10$0rjc/2Jp0yERR.ooWTDrpeFrNi8pI658XVqKOAfHEKApyY67jwtdS', null, 'super-admin', null, null);
INSERT INTO larashop.admins (id, username, email, password, avatar, role, created_at, updated_at) VALUES (2, 'admin_simple', 'admin-simple@larashop.com', '$2y$10$Zep.6Jqz6NRhWeWdwPy5H.D7Ji0kyU1tyXkIHiEng2wgeJxkqJiAS', null, 'admin', null, null);
INSERT INTO larashop.admins (id, username, email, password, avatar, role, created_at, updated_at) VALUES (3, 'admin_simple2', 'admin-simple2@larashop.com', '$2y$10$UYMi62K2PoXFwuUTbSATcOD.QR/rlJ2ExpA9QcLNvfI5Tngcc/Ray', null, 'admin', null, null);
create table attribute_groups
(
  id         bigint unsigned auto_increment
    primary key,
  sort_order int default 0 not null,
  created_at timestamp     null,
  updated_at timestamp     null
)
  collate = utf8mb4_unicode_ci;

INSERT INTO larashop.attribute_groups (id, sort_order, created_at, updated_at) VALUES (1, 4, null, null);
INSERT INTO larashop.attribute_groups (id, sort_order, created_at, updated_at) VALUES (2, 71, null, null);
INSERT INTO larashop.attribute_groups (id, sort_order, created_at, updated_at) VALUES (3, 84, null, null);
INSERT INTO larashop.attribute_groups (id, sort_order, created_at, updated_at) VALUES (4, 90, null, null);
INSERT INTO larashop.attribute_groups (id, sort_order, created_at, updated_at) VALUES (5, 69, null, null);
INSERT INTO larashop.attribute_groups (id, sort_order, created_at, updated_at) VALUES (11, 10, '2019-03-18 09:14:07', '2019-03-18 09:14:07');
create table attribute_product
(
  id           bigint unsigned auto_increment
    primary key,
  product_id   bigint unsigned not null,
  attribute_id bigint unsigned not null,
  created_at   timestamp       null,
  updated_at   timestamp       null,
  constraint attribute_product_attribute_id_foreign
    foreign key (attribute_id) references attributes (id)
      on delete cascade,
  constraint attribute_product_product_id_foreign
    foreign key (product_id) references products (id)
      on delete cascade
)
  collate = utf8mb4_unicode_ci;


create table attributes
(
  id                 bigint unsigned auto_increment
    primary key,
  sort_order         int default 0   not null,
  attribute_group_id bigint unsigned null,
  created_at         timestamp       null,
  updated_at         timestamp       null,
  constraint attributes_attribute_group_id_foreign
    foreign key (attribute_group_id) references attribute_groups (id)
      on delete cascade
)
  collate = utf8mb4_unicode_ci;

INSERT INTO larashop.attributes (id, sort_order, attribute_group_id, created_at, updated_at) VALUES (1, 0, 4, null, null);
INSERT INTO larashop.attributes (id, sort_order, attribute_group_id, created_at, updated_at) VALUES (2, 0, 2, null, null);
INSERT INTO larashop.attributes (id, sort_order, attribute_group_id, created_at, updated_at) VALUES (3, 0, 3, null, null);
INSERT INTO larashop.attributes (id, sort_order, attribute_group_id, created_at, updated_at) VALUES (4, 0, 3, null, null);
INSERT INTO larashop.attributes (id, sort_order, attribute_group_id, created_at, updated_at) VALUES (5, 0, 3, null, null);
INSERT INTO larashop.attributes (id, sort_order, attribute_group_id, created_at, updated_at) VALUES (6, 0, 3, null, null);
INSERT INTO larashop.attributes (id, sort_order, attribute_group_id, created_at, updated_at) VALUES (7, 0, 2, null, null);
INSERT INTO larashop.attributes (id, sort_order, attribute_group_id, created_at, updated_at) VALUES (8, 0, 4, null, null);
INSERT INTO larashop.attributes (id, sort_order, attribute_group_id, created_at, updated_at) VALUES (9, 0, 1, null, null);
INSERT INTO larashop.attributes (id, sort_order, attribute_group_id, created_at, updated_at) VALUES (10, 0, 3, null, null);
INSERT INTO larashop.attributes (id, sort_order, attribute_group_id, created_at, updated_at) VALUES (11, 0, 5, null, null);
INSERT INTO larashop.attributes (id, sort_order, attribute_group_id, created_at, updated_at) VALUES (12, 0, 3, null, null);
INSERT INTO larashop.attributes (id, sort_order, attribute_group_id, created_at, updated_at) VALUES (13, 0, 3, null, null);
INSERT INTO larashop.attributes (id, sort_order, attribute_group_id, created_at, updated_at) VALUES (14, 0, 3, null, null);
INSERT INTO larashop.attributes (id, sort_order, attribute_group_id, created_at, updated_at) VALUES (15, 0, 4, null, null);
INSERT INTO larashop.attributes (id, sort_order, attribute_group_id, created_at, updated_at) VALUES (16, 0, 2, null, null);
INSERT INTO larashop.attributes (id, sort_order, attribute_group_id, created_at, updated_at) VALUES (17, 0, 5, null, null);
INSERT INTO larashop.attributes (id, sort_order, attribute_group_id, created_at, updated_at) VALUES (18, 0, 2, null, null);
INSERT INTO larashop.attributes (id, sort_order, attribute_group_id, created_at, updated_at) VALUES (19, 0, 2, null, null);
INSERT INTO larashop.attributes (id, sort_order, attribute_group_id, created_at, updated_at) VALUES (20, 0, 1, null, null);
INSERT INTO larashop.attributes (id, sort_order, attribute_group_id, created_at, updated_at) VALUES (21, 0, 4, null, null);
INSERT INTO larashop.attributes (id, sort_order, attribute_group_id, created_at, updated_at) VALUES (22, 0, 3, null, null);
INSERT INTO larashop.attributes (id, sort_order, attribute_group_id, created_at, updated_at) VALUES (23, 0, 1, null, null);
INSERT INTO larashop.attributes (id, sort_order, attribute_group_id, created_at, updated_at) VALUES (24, 0, 3, null, null);
INSERT INTO larashop.attributes (id, sort_order, attribute_group_id, created_at, updated_at) VALUES (25, 0, 4, null, null);
INSERT INTO larashop.attributes (id, sort_order, attribute_group_id, created_at, updated_at) VALUES (26, 0, 2, null, null);
INSERT INTO larashop.attributes (id, sort_order, attribute_group_id, created_at, updated_at) VALUES (27, 0, 4, null, null);
INSERT INTO larashop.attributes (id, sort_order, attribute_group_id, created_at, updated_at) VALUES (28, 0, 2, null, null);
INSERT INTO larashop.attributes (id, sort_order, attribute_group_id, created_at, updated_at) VALUES (29, 0, 3, null, null);
INSERT INTO larashop.attributes (id, sort_order, attribute_group_id, created_at, updated_at) VALUES (30, 0, 4, null, null);
INSERT INTO larashop.attributes (id, sort_order, attribute_group_id, created_at, updated_at) VALUES (31, 15, 11, '2019-03-18 09:14:49', '2019-03-18 09:14:49');
create table categories
(
  id         bigint unsigned auto_increment
    primary key,
  image      varchar(255)                   null,
  status     varchar(255) default 'enabled' not null,
  sort_order int          default 0         not null,
  parent_id  int unsigned                   null,
  created_at timestamp                      null,
  updated_at timestamp                      null
)
  collate = utf8mb4_unicode_ci;

INSERT INTO larashop.categories (id, image, status, sort_order, parent_id, created_at, updated_at) VALUES (1, null, 'enabled', 0, null, '2019-03-14 10:40:58', null);
INSERT INTO larashop.categories (id, image, status, sort_order, parent_id, created_at, updated_at) VALUES (2, null, 'enabled', 0, 1, '2019-03-14 10:40:58', null);
INSERT INTO larashop.categories (id, image, status, sort_order, parent_id, created_at, updated_at) VALUES (3, null, 'enabled', 0, 2, '2019-03-14 10:40:58', null);
INSERT INTO larashop.categories (id, image, status, sort_order, parent_id, created_at, updated_at) VALUES (4, null, 'enabled', 0, 3, '2019-03-14 10:40:58', null);
INSERT INTO larashop.categories (id, image, status, sort_order, parent_id, created_at, updated_at) VALUES (5, null, 'enabled', 0, 3, '2019-03-14 10:40:58', null);
INSERT INTO larashop.categories (id, image, status, sort_order, parent_id, created_at, updated_at) VALUES (6, null, 'enabled', 0, 2, '2019-03-14 10:40:58', null);
INSERT INTO larashop.categories (id, image, status, sort_order, parent_id, created_at, updated_at) VALUES (7, null, 'enabled', 0, 6, '2019-03-14 10:40:58', null);
INSERT INTO larashop.categories (id, image, status, sort_order, parent_id, created_at, updated_at) VALUES (8, null, 'enabled', 0, 1, '2019-03-14 10:40:58', null);
INSERT INTO larashop.categories (id, image, status, sort_order, parent_id, created_at, updated_at) VALUES (9, null, 'enabled', 0, 8, '2019-03-14 10:40:58', null);
INSERT INTO larashop.categories (id, image, status, sort_order, parent_id, created_at, updated_at) VALUES (10, null, 'enabled', 0, 9, '2019-03-14 10:40:58', null);
INSERT INTO larashop.categories (id, image, status, sort_order, parent_id, created_at, updated_at) VALUES (11, null, 'enabled', 0, 9, '2019-03-14 10:40:58', null);
INSERT INTO larashop.categories (id, image, status, sort_order, parent_id, created_at, updated_at) VALUES (12, null, 'enabled', 0, 9, '2019-03-14 10:40:58', null);
INSERT INTO larashop.categories (id, image, status, sort_order, parent_id, created_at, updated_at) VALUES (13, null, 'enabled', 0, 8, '2019-03-14 10:40:58', null);
INSERT INTO larashop.categories (id, image, status, sort_order, parent_id, created_at, updated_at) VALUES (14, null, 'enabled', 0, 13, '2019-03-14 10:40:58', null);
INSERT INTO larashop.categories (id, image, status, sort_order, parent_id, created_at, updated_at) VALUES (15, null, 'enabled', 0, 13, '2019-03-14 10:40:58', null);
INSERT INTO larashop.categories (id, image, status, sort_order, parent_id, created_at, updated_at) VALUES (16, null, 'enabled', 0, 1, '2019-03-14 10:40:58', null);
INSERT INTO larashop.categories (id, image, status, sort_order, parent_id, created_at, updated_at) VALUES (17, null, 'enabled', 0, 16, '2019-03-14 10:40:58', null);
INSERT INTO larashop.categories (id, image, status, sort_order, parent_id, created_at, updated_at) VALUES (18, null, 'enabled', 0, 17, '2019-03-14 10:40:58', null);
INSERT INTO larashop.categories (id, image, status, sort_order, parent_id, created_at, updated_at) VALUES (19, null, 'enabled', 0, 17, '2019-03-14 10:40:58', null);
INSERT INTO larashop.categories (id, image, status, sort_order, parent_id, created_at, updated_at) VALUES (20, null, 'enabled', 0, 16, '2019-03-14 10:40:58', null);
INSERT INTO larashop.categories (id, image, status, sort_order, parent_id, created_at, updated_at) VALUES (21, null, 'enabled', 0, 20, '2019-03-14 10:40:58', null);
INSERT INTO larashop.categories (id, image, status, sort_order, parent_id, created_at, updated_at) VALUES (22, null, 'enabled', 0, 20, '2019-03-14 10:40:58', null);
INSERT INTO larashop.categories (id, image, status, sort_order, parent_id, created_at, updated_at) VALUES (23, null, 'enabled', 0, 20, '2019-03-14 10:40:58', null);
INSERT INTO larashop.categories (id, image, status, sort_order, parent_id, created_at, updated_at) VALUES (24, null, 'enabled', 0, 20, '2019-03-14 10:40:58', null);
INSERT INTO larashop.categories (id, image, status, sort_order, parent_id, created_at, updated_at) VALUES (25, null, 'enabled', 0, 16, '2019-03-14 10:40:58', null);
INSERT INTO larashop.categories (id, image, status, sort_order, parent_id, created_at, updated_at) VALUES (26, null, 'enabled', 0, 25, '2019-03-14 10:40:58', null);
INSERT INTO larashop.categories (id, image, status, sort_order, parent_id, created_at, updated_at) VALUES (27, null, 'enabled', 0, 25, '2019-03-14 10:40:58', null);
INSERT INTO larashop.categories (id, image, status, sort_order, parent_id, created_at, updated_at) VALUES (28, null, 'enabled', 0, 25, '2019-03-14 10:40:58', null);
INSERT INTO larashop.categories (id, image, status, sort_order, parent_id, created_at, updated_at) VALUES (29, null, 'enabled', 0, 25, '2019-03-14 10:40:58', null);
INSERT INTO larashop.categories (id, image, status, sort_order, parent_id, created_at, updated_at) VALUES (30, null, 'enabled', 0, 25, '2019-03-14 10:40:59', null);
INSERT INTO larashop.categories (id, image, status, sort_order, parent_id, created_at, updated_at) VALUES (31, null, 'enabled', 0, 16, '2019-03-14 10:40:59', null);
INSERT INTO larashop.categories (id, image, status, sort_order, parent_id, created_at, updated_at) VALUES (32, null, 'enabled', 0, 31, '2019-03-14 10:40:59', null);
INSERT INTO larashop.categories (id, image, status, sort_order, parent_id, created_at, updated_at) VALUES (33, null, 'enabled', 0, 31, '2019-03-14 10:40:59', null);
INSERT INTO larashop.categories (id, image, status, sort_order, parent_id, created_at, updated_at) VALUES (34, null, 'enabled', 0, null, '2019-03-14 10:40:59', null);
INSERT INTO larashop.categories (id, image, status, sort_order, parent_id, created_at, updated_at) VALUES (35, null, 'enabled', 0, 34, '2019-03-14 10:40:59', null);
INSERT INTO larashop.categories (id, image, status, sort_order, parent_id, created_at, updated_at) VALUES (36, null, 'enabled', 0, 35, '2019-03-14 10:40:59', null);
INSERT INTO larashop.categories (id, image, status, sort_order, parent_id, created_at, updated_at) VALUES (37, null, 'enabled', 0, 36, '2019-03-14 10:40:59', null);
INSERT INTO larashop.categories (id, image, status, sort_order, parent_id, created_at, updated_at) VALUES (38, null, 'enabled', 0, 36, '2019-03-14 10:40:59', null);
INSERT INTO larashop.categories (id, image, status, sort_order, parent_id, created_at, updated_at) VALUES (39, null, 'enabled', 0, null, '2019-03-14 10:40:59', null);
INSERT INTO larashop.categories (id, image, status, sort_order, parent_id, created_at, updated_at) VALUES (40, null, 'enabled', 0, 39, '2019-03-14 10:40:59', null);
INSERT INTO larashop.categories (id, image, status, sort_order, parent_id, created_at, updated_at) VALUES (41, null, 'enabled', 0, 40, '2019-03-14 10:40:59', null);
INSERT INTO larashop.categories (id, image, status, sort_order, parent_id, created_at, updated_at) VALUES (42, null, 'enabled', 0, 41, '2019-03-14 10:40:59', null);
INSERT INTO larashop.categories (id, image, status, sort_order, parent_id, created_at, updated_at) VALUES (43, null, 'enabled', 0, 39, '2019-03-14 10:40:59', null);
INSERT INTO larashop.categories (id, image, status, sort_order, parent_id, created_at, updated_at) VALUES (44, null, 'enabled', 0, 43, '2019-03-14 10:40:59', null);
INSERT INTO larashop.categories (id, image, status, sort_order, parent_id, created_at, updated_at) VALUES (45, null, 'enabled', 0, 44, '2019-03-14 10:40:59', null);
INSERT INTO larashop.categories (id, image, status, sort_order, parent_id, created_at, updated_at) VALUES (46, null, 'enabled', 0, 43, '2019-03-14 10:40:59', null);
INSERT INTO larashop.categories (id, image, status, sort_order, parent_id, created_at, updated_at) VALUES (47, null, 'enabled', 0, 46, '2019-03-14 10:40:59', null);
INSERT INTO larashop.categories (id, image, status, sort_order, parent_id, created_at, updated_at) VALUES (48, null, 'enabled', 0, 43, '2019-03-14 10:40:59', null);
INSERT INTO larashop.categories (id, image, status, sort_order, parent_id, created_at, updated_at) VALUES (49, null, 'enabled', 0, 48, '2019-03-14 10:40:59', null);
INSERT INTO larashop.categories (id, image, status, sort_order, parent_id, created_at, updated_at) VALUES (50, null, 'enabled', 0, 43, '2019-03-14 10:40:59', null);
INSERT INTO larashop.categories (id, image, status, sort_order, parent_id, created_at, updated_at) VALUES (51, null, 'enabled', 0, 50, '2019-03-14 10:40:59', null);
INSERT INTO larashop.categories (id, image, status, sort_order, parent_id, created_at, updated_at) VALUES (52, null, 'enabled', 0, 50, '2019-03-14 10:40:59', null);
INSERT INTO larashop.categories (id, image, status, sort_order, parent_id, created_at, updated_at) VALUES (53, null, 'enabled', 0, null, '2019-03-14 10:40:59', null);
INSERT INTO larashop.categories (id, image, status, sort_order, parent_id, created_at, updated_at) VALUES (54, null, 'enabled', 0, 53, '2019-03-14 10:40:59', null);
INSERT INTO larashop.categories (id, image, status, sort_order, parent_id, created_at, updated_at) VALUES (55, null, 'enabled', 0, 54, '2019-03-14 10:40:59', null);
INSERT INTO larashop.categories (id, image, status, sort_order, parent_id, created_at, updated_at) VALUES (56, null, 'enabled', 0, 55, '2019-03-14 10:40:59', null);
INSERT INTO larashop.categories (id, image, status, sort_order, parent_id, created_at, updated_at) VALUES (57, null, 'enabled', 0, 55, '2019-03-14 10:40:59', null);
INSERT INTO larashop.categories (id, image, status, sort_order, parent_id, created_at, updated_at) VALUES (58, null, 'enabled', 0, 54, '2019-03-14 10:40:59', null);
INSERT INTO larashop.categories (id, image, status, sort_order, parent_id, created_at, updated_at) VALUES (59, null, 'enabled', 0, 58, '2019-03-14 10:40:59', null);
INSERT INTO larashop.categories (id, image, status, sort_order, parent_id, created_at, updated_at) VALUES (60, null, 'enabled', 0, 53, '2019-03-14 10:40:59', null);
INSERT INTO larashop.categories (id, image, status, sort_order, parent_id, created_at, updated_at) VALUES (61, null, 'enabled', 0, 60, '2019-03-14 10:40:59', null);
INSERT INTO larashop.categories (id, image, status, sort_order, parent_id, created_at, updated_at) VALUES (62, null, 'enabled', 0, 61, '2019-03-14 10:40:59', null);
INSERT INTO larashop.categories (id, image, status, sort_order, parent_id, created_at, updated_at) VALUES (63, null, 'enabled', 0, 61, '2019-03-14 10:40:59', null);
INSERT INTO larashop.categories (id, image, status, sort_order, parent_id, created_at, updated_at) VALUES (64, null, 'enabled', 0, 60, '2019-03-14 10:40:59', null);
INSERT INTO larashop.categories (id, image, status, sort_order, parent_id, created_at, updated_at) VALUES (65, null, 'enabled', 0, 64, '2019-03-14 10:40:59', null);
INSERT INTO larashop.categories (id, image, status, sort_order, parent_id, created_at, updated_at) VALUES (66, null, 'enabled', 0, 64, '2019-03-14 10:40:59', null);
INSERT INTO larashop.categories (id, image, status, sort_order, parent_id, created_at, updated_at) VALUES (67, null, 'enabled', 0, 64, '2019-03-14 10:40:59', null);
INSERT INTO larashop.categories (id, image, status, sort_order, parent_id, created_at, updated_at) VALUES (68, null, 'enabled', 0, 64, '2019-03-14 10:40:59', null);
INSERT INTO larashop.categories (id, image, status, sort_order, parent_id, created_at, updated_at) VALUES (69, null, 'enabled', 0, 60, '2019-03-14 10:40:59', null);
INSERT INTO larashop.categories (id, image, status, sort_order, parent_id, created_at, updated_at) VALUES (70, null, 'enabled', 0, 69, '2019-03-14 10:40:59', null);
INSERT INTO larashop.categories (id, image, status, sort_order, parent_id, created_at, updated_at) VALUES (71, null, 'enabled', 0, 69, '2019-03-14 10:40:59', null);
INSERT INTO larashop.categories (id, image, status, sort_order, parent_id, created_at, updated_at) VALUES (72, null, 'enabled', 0, null, '2019-03-14 10:40:59', null);
INSERT INTO larashop.categories (id, image, status, sort_order, parent_id, created_at, updated_at) VALUES (73, null, 'enabled', 0, 72, '2019-03-14 10:40:59', null);
INSERT INTO larashop.categories (id, image, status, sort_order, parent_id, created_at, updated_at) VALUES (74, null, 'enabled', 0, 73, '2019-03-14 10:40:59', null);
INSERT INTO larashop.categories (id, image, status, sort_order, parent_id, created_at, updated_at) VALUES (75, null, 'enabled', 0, 74, '2019-03-14 10:40:59', null);
INSERT INTO larashop.categories (id, image, status, sort_order, parent_id, created_at, updated_at) VALUES (76, null, 'enabled', 0, 74, '2019-03-14 10:40:59', null);
INSERT INTO larashop.categories (id, image, status, sort_order, parent_id, created_at, updated_at) VALUES (77, null, 'enabled', 0, 74, '2019-03-14 10:40:59', null);
INSERT INTO larashop.categories (id, image, status, sort_order, parent_id, created_at, updated_at) VALUES (78, null, 'enabled', 0, 72, '2019-03-14 10:40:59', null);
INSERT INTO larashop.categories (id, image, status, sort_order, parent_id, created_at, updated_at) VALUES (79, null, 'enabled', 0, 78, '2019-03-14 10:40:59', null);
INSERT INTO larashop.categories (id, image, status, sort_order, parent_id, created_at, updated_at) VALUES (80, null, 'enabled', 0, 79, '2019-03-14 10:40:59', null);
create table category_product
(
  id          bigint unsigned auto_increment
    primary key,
  category_id bigint unsigned not null,
  product_id  bigint unsigned not null,
  created_at  timestamp       null,
  updated_at  timestamp       null,
  constraint category_product_category_id_foreign
    foreign key (category_id) references categories (id)
      on delete cascade,
  constraint category_product_product_id_foreign
    foreign key (product_id) references products (id)
      on delete cascade
)
  collate = utf8mb4_unicode_ci;


create table customers
(
  id           bigint unsigned auto_increment
    primary key,
  username     varchar(255)                    not null,
  email        varchar(255)                    not null,
  password     varchar(255)                    not null,
  avatar       varchar(255)                    null,
  is_confirmed tinyint(1)   default 0          not null,
  role         varchar(255) default 'customer' not null,
  created_at   timestamp                       null,
  updated_at   timestamp                       null,
  constraint customers_email_unique
    unique (email),
  constraint customers_username_unique
    unique (username)
)
  collate = utf8mb4_unicode_ci;

INSERT INTO larashop.customers (id, username, email, password, avatar, is_confirmed, role, created_at, updated_at) VALUES (1, 'customer1', 'customer1@larashop.com', '$2y$10$/rp.yo4m.NZBdwb6PbHkuem1iAHULCNmCdi16fVUEydHR23MTl.gW', null, 1, 'customer', null, null);
INSERT INTO larashop.customers (id, username, email, password, avatar, is_confirmed, role, created_at, updated_at) VALUES (2, 'customer2', 'customer2@larashop.com', '$2y$10$CTywVT3d1.H1dcZT/Ia11.vHQJQsB9I4EX0EroA0d5pXSW2cD3j3W', null, 0, 'customer', null, null);
INSERT INTO larashop.customers (id, username, email, password, avatar, is_confirmed, role, created_at, updated_at) VALUES (3, 'customer3', 'customer3@larashop.com', '$2y$10$CIImuU8SqxpngElaMKZKnuoPJVIhDXgRJ2QFL6rQ.2UpS24hw4m/q', null, 1, 'customer', null, null);
INSERT INTO larashop.customers (id, username, email, password, avatar, is_confirmed, role, created_at, updated_at) VALUES (4, 'customer4', 'customer4@larashop.com', '$2y$10$DV33zDkDWBEjsLwyWRHBre0XsZAEDzppaZxMOFEBmUot/ph/3Y6s.', null, 0, 'customer', null, null);
INSERT INTO larashop.customers (id, username, email, password, avatar, is_confirmed, role, created_at, updated_at) VALUES (5, 'customer5', 'customer5@larashop.com', '$2y$10$ySUl7FyMT/l5yf4gNQPDReWlIifhjQpMNVepW295jxn06i1WV2i6.', null, 1, 'customer', null, null);
INSERT INTO larashop.customers (id, username, email, password, avatar, is_confirmed, role, created_at, updated_at) VALUES (6, 'customer6', 'customer6@larashop.com', '$2y$10$w0GpC7crLLuY8QBAEzKO6ObU9UNCmolwFinbW6RLKN2hq7CEk8nLm', null, 0, 'customer', null, null);
INSERT INTO larashop.customers (id, username, email, password, avatar, is_confirmed, role, created_at, updated_at) VALUES (7, 'customer7', 'customer7@larashop.com', '$2y$10$rFZMSBC62vhTg56ejvQVLOFPAClehTnGMd.0BpzhYVso2EjTlQ44O', null, 1, 'customer', null, null);
INSERT INTO larashop.customers (id, username, email, password, avatar, is_confirmed, role, created_at, updated_at) VALUES (8, 'customer8', 'customer8@larashop.com', '$2y$10$FYsTSTH82fJLqUSe8vBnjeiP/N3Cn7y9xuWfmUrI9hfs.UpLJiV6q', null, 0, 'customer', null, null);
INSERT INTO larashop.customers (id, username, email, password, avatar, is_confirmed, role, created_at, updated_at) VALUES (9, 'customer9', 'customer9@larashop.com', '$2y$10$m1E4SIviwiR1DwtyL9EnsOgXLlbIUMlpW5cUFiP2wiGGAGMFuC1k2', null, 1, 'customer', null, null);
INSERT INTO larashop.customers (id, username, email, password, avatar, is_confirmed, role, created_at, updated_at) VALUES (10, 'customer10', 'customer10@larashop.com', '$2y$10$mROL2bfP.hTZDiSt.ejW/u.VzC6x0dhuLXYnuO4eK3rNzzhODtxBu', null, 0, 'customer', null, null);
INSERT INTO larashop.customers (id, username, email, password, avatar, is_confirmed, role, created_at, updated_at) VALUES (11, 'customer11', 'customer11@larashop.com', '$2y$10$6Cc.wcH.2MLx.i5WwSBDI.yVaeNN.fYHaaVmV1KNtIRstaoIJYZYS', null, 1, 'customer', null, null);
INSERT INTO larashop.customers (id, username, email, password, avatar, is_confirmed, role, created_at, updated_at) VALUES (12, 'customer12', 'customer12@larashop.com', '$2y$10$nSNrSLw4JhmFLPQ/ZJWZ1.N5wv2MfHMqJ6cKwsAmMct8NeRma9Ni.', null, 0, 'customer', null, null);
INSERT INTO larashop.customers (id, username, email, password, avatar, is_confirmed, role, created_at, updated_at) VALUES (13, 'customer13', 'customer13@larashop.com', '$2y$10$B/M8kSlPjtx4wezqNsRJiOlHrR4aalONkgSHiJSXAKA..NQW8ztJe', null, 1, 'customer', null, null);
INSERT INTO larashop.customers (id, username, email, password, avatar, is_confirmed, role, created_at, updated_at) VALUES (14, 'customer14', 'customer14@larashop.com', '$2y$10$G7GbvDNmp.7v88d49BnZxOlH.8rhL8zfqoNyHaPO6z77waIdXNlpa', null, 0, 'customer', null, null);
INSERT INTO larashop.customers (id, username, email, password, avatar, is_confirmed, role, created_at, updated_at) VALUES (15, 'customer15', 'customer15@larashop.com', '$2y$10$D8EX5J.jH6kqQM1ZGL544OFgqlGSKBrKW9/o8hg.UtE8GcG8ZiaJu', null, 1, 'customer', null, null);
INSERT INTO larashop.customers (id, username, email, password, avatar, is_confirmed, role, created_at, updated_at) VALUES (16, 'customer16', 'customer16@larashop.com', '$2y$10$FxzOsQciSFnc/ZFyT2OEGuVGl9dc57hvQEIjB/cqX5AoQidq3nfZK', null, 0, 'customer', null, null);
INSERT INTO larashop.customers (id, username, email, password, avatar, is_confirmed, role, created_at, updated_at) VALUES (17, 'customer17', 'customer17@larashop.com', '$2y$10$4fMcDKZJPCy0KwO9XHWGI.MpWjPxRBTqqzDX6iPR0eWWqM0DVsr06', null, 1, 'customer', null, null);
INSERT INTO larashop.customers (id, username, email, password, avatar, is_confirmed, role, created_at, updated_at) VALUES (18, 'customer18', 'customer18@larashop.com', '$2y$10$d5ZBmX1exxWuRW/CGkyQFef3pBsKTqcdEc8otYMvhmTm5SkD1.LAO', null, 0, 'customer', null, null);
INSERT INTO larashop.customers (id, username, email, password, avatar, is_confirmed, role, created_at, updated_at) VALUES (19, 'customer19', 'customer19@larashop.com', '$2y$10$j8TwVyjnKM1Z0e1mtgeOxexqVQF/DNG/mEI8cQwiONm7XTgKdaTVC', null, 1, 'customer', null, null);
INSERT INTO larashop.customers (id, username, email, password, avatar, is_confirmed, role, created_at, updated_at) VALUES (20, 'customer20', 'customer20@larashop.com', '$2y$10$2u9fLB9tq3C1frSL5spaU.C1IQ5vDe0lT.8sbPWQ0oQk8f/uJMz6W', null, 0, 'customer', null, null);
INSERT INTO larashop.customers (id, username, email, password, avatar, is_confirmed, role, created_at, updated_at) VALUES (21, 'customer21', 'customer21@larashop.com', '$2y$10$LqUld5PXmoX/x9sHaJzmgeOF6R3Vav/t/q3/Bf84NYvMj/xq4NbcK', null, 1, 'customer', null, null);
INSERT INTO larashop.customers (id, username, email, password, avatar, is_confirmed, role, created_at, updated_at) VALUES (22, 'customer22', 'customer22@larashop.com', '$2y$10$/hPq9HYZ2w4Cc7YRfrOE2OrrdGwdNgi1jaaQIW3ZUIZ4T2kOT7rFO', null, 0, 'customer', null, null);
INSERT INTO larashop.customers (id, username, email, password, avatar, is_confirmed, role, created_at, updated_at) VALUES (23, 'customer23', 'customer23@larashop.com', '$2y$10$T1IcMXO9PEYQXNPblPhW9eI6h0tLvTEWzWPeZjhmLVr4rLoaDSpcy', null, 1, 'customer', null, null);
INSERT INTO larashop.customers (id, username, email, password, avatar, is_confirmed, role, created_at, updated_at) VALUES (24, 'customer24', 'customer24@larashop.com', '$2y$10$He1X7X7LIJpmW8tg5pLFZ.maEsTjAqBk/EFJ4psB/Ney9DP268nw2', null, 0, 'customer', null, null);
INSERT INTO larashop.customers (id, username, email, password, avatar, is_confirmed, role, created_at, updated_at) VALUES (25, 'customer25', 'customer25@larashop.com', '$2y$10$TDafHijt2t9j9DadfzXiQePMlR.IwLM70wxwDdmBS5znM99HXHvgO', null, 1, 'customer', null, null);
INSERT INTO larashop.customers (id, username, email, password, avatar, is_confirmed, role, created_at, updated_at) VALUES (26, 'customer26', 'customer26@larashop.com', '$2y$10$HQaaA3BuJuRxIYCohvXij.yjeDYz3mrYqmxZ/8ceiZ/axUANtqyya', null, 0, 'customer', null, null);
INSERT INTO larashop.customers (id, username, email, password, avatar, is_confirmed, role, created_at, updated_at) VALUES (27, 'customer27', 'customer27@larashop.com', '$2y$10$gFT15UK4b8ol03yFzJeJQunh1j4G8plDPvb0nm7RZGx8v7EnZxLia', null, 1, 'customer', null, null);
INSERT INTO larashop.customers (id, username, email, password, avatar, is_confirmed, role, created_at, updated_at) VALUES (28, 'customer28', 'customer28@larashop.com', '$2y$10$whul0a1VdessxQZ3jK7cXe39jKjP2Hd6Z9XbGOP0Ah8xEH8vfGz7G', null, 0, 'customer', null, null);
INSERT INTO larashop.customers (id, username, email, password, avatar, is_confirmed, role, created_at, updated_at) VALUES (29, 'customer29', 'customer29@larashop.com', '$2y$10$epEcjZ/RHX6LJN4A2Sw/7ewk/itWdLpyxJO84VExkNHcB3ijj1fF.', null, 1, 'customer', null, null);
INSERT INTO larashop.customers (id, username, email, password, avatar, is_confirmed, role, created_at, updated_at) VALUES (30, 'customer30', 'customer30@larashop.com', '$2y$10$5VcpAQXsnGmKSkrlZPsu0eky1IChNpBCrIgzGkGltb4Xxf1U4T4Uq', null, 0, 'customer', null, null);
create table languages
(
  code       varchar(255) not null
    primary key,
  name       varchar(255) not null,
  created_at timestamp    null,
  updated_at timestamp    null
)
  collate = utf8mb4_unicode_ci;

INSERT INTO larashop.languages (code, name, created_at, updated_at) VALUES ('ru', 'Russian', null, null);
INSERT INTO larashop.languages (code, name, created_at, updated_at) VALUES ('us', 'English', null, null);
create table managers
(
  id         bigint unsigned auto_increment
    primary key,
  username   varchar(255)                 not null,
  email      varchar(255)                 not null,
  password   varchar(255)                 not null,
  avatar     varchar(255)                 null,
  role       varchar(255) default 'admin' not null,
  created_at timestamp                    null,
  updated_at timestamp                    null,
  constraint managers_email_unique
    unique (email),
  constraint managers_username_unique
    unique (username)
)
  collate = utf8mb4_unicode_ci;

INSERT INTO larashop.managers (id, username, email, password, avatar, role, created_at, updated_at) VALUES (1, 'manager1', 'manager1@larashop.com', '$2y$10$qsa1gSgOs.273XmdsNnqq.s7M6rcMEtXNEuKDeOPYw9v6o/zU5NGy', null, 'manager', null, null);
INSERT INTO larashop.managers (id, username, email, password, avatar, role, created_at, updated_at) VALUES (2, 'manager2', 'manager2@larashop.com', '$2y$10$ZsaKjNNS3Z33iRJbewvZeuG2HNZodH5CFHfdhx4NQEf09/kwHJ706', null, 'manager', null, null);
INSERT INTO larashop.managers (id, username, email, password, avatar, role, created_at, updated_at) VALUES (3, 'manager3', 'manager3@larashop.com', '$2y$10$Tet8HqzjFFIBkXubuFDEWOEJylEBTkdP79nMwpHIoykav0W.KPdMO', null, 'manager', null, null);
INSERT INTO larashop.managers (id, username, email, password, avatar, role, created_at, updated_at) VALUES (4, 'manager4', 'manager4@larashop.com', '$2y$10$uWfbHzqUkiz58Ea0exQ3EeVTxmvCHmLF4jOQptq/BSRz1LZq5jBKa', null, 'manager', null, null);
INSERT INTO larashop.managers (id, username, email, password, avatar, role, created_at, updated_at) VALUES (5, 'manager5', 'manager5@larashop.com', '$2y$10$liGj9ENbLNUFM8zcz5QYkukXkSgtJX6hztUNjNcaloE8i1af9WQS6', null, 'manager', null, null);
create table migrations
(
  id        int unsigned auto_increment
    primary key,
  migration varchar(255) not null,
  batch     int          not null
)
  collate = utf8mb4_unicode_ci;

INSERT INTO larashop.migrations (id, migration, batch) VALUES (1, '2019_03_06_084140_create_admins_table', 1);
INSERT INTO larashop.migrations (id, migration, batch) VALUES (2, '2019_03_06_084148_create_managers_table', 1);
INSERT INTO larashop.migrations (id, migration, batch) VALUES (3, '2019_03_07_090504_create_customers_table', 1);
INSERT INTO larashop.migrations (id, migration, batch) VALUES (4, '2019_03_07_135443_create_categories_table', 1);
INSERT INTO larashop.migrations (id, migration, batch) VALUES (5, '2019_03_11_112725_create_products_table', 1);
INSERT INTO larashop.migrations (id, migration, batch) VALUES (6, '2019_03_11_152958_create_category_product_table', 1);
INSERT INTO larashop.migrations (id, migration, batch) VALUES (7, '2019_03_11_153219_create_languages_table', 1);
INSERT INTO larashop.migrations (id, migration, batch) VALUES (8, '2019_03_11_165710_create_attribute_groups_table', 1);
INSERT INTO larashop.migrations (id, migration, batch) VALUES (9, '2019_03_11_165714_create_attributes_table', 1);
INSERT INTO larashop.migrations (id, migration, batch) VALUES (10, '2019_03_12_095016_create_options_table', 1);
INSERT INTO larashop.migrations (id, migration, batch) VALUES (11, '2019_03_12_095157_create_attribute_product_table', 1);
INSERT INTO larashop.migrations (id, migration, batch) VALUES (12, '2019_03_12_103944_create_translations_table', 1);
INSERT INTO larashop.migrations (id, migration, batch) VALUES (13, '2019_03_13_105148_create_option_values_table', 1);
INSERT INTO larashop.migrations (id, migration, batch) VALUES (14, '2019_03_13_105211_create_option_product_table', 1);
INSERT INTO larashop.migrations (id, migration, batch) VALUES (15, '2019_03_13_105219_create_product_option_values_table', 1);
create table option_product
(
  id         bigint unsigned auto_increment
    primary key,
  option_id  bigint unsigned not null,
  product_id bigint unsigned not null,
  created_at timestamp       null,
  updated_at timestamp       null,
  constraint option_product_option_id_foreign
    foreign key (option_id) references options (id)
      on delete cascade,
  constraint option_product_product_id_foreign
    foreign key (product_id) references products (id)
      on delete cascade
)
  collate = utf8mb4_unicode_ci;


create table option_values
(
  id         bigint unsigned auto_increment
    primary key,
  sort_order varchar(255)    not null,
  image      varchar(255)    not null,
  option_id  bigint unsigned null,
  created_at timestamp       null,
  updated_at timestamp       null,
  constraint option_values_option_id_foreign
    foreign key (option_id) references options (id)
      on delete cascade
)
  collate = utf8mb4_unicode_ci;


create table options
(
  id         bigint unsigned auto_increment
    primary key,
  sort_order int default 0 not null,
  created_at timestamp     null,
  updated_at timestamp     null
)
  collate = utf8mb4_unicode_ci;

INSERT INTO larashop.options (id, sort_order, created_at, updated_at) VALUES (1, 41, '2019-03-14 11:58:29', null);
INSERT INTO larashop.options (id, sort_order, created_at, updated_at) VALUES (2, 29, '2019-03-14 11:58:29', null);
INSERT INTO larashop.options (id, sort_order, created_at, updated_at) VALUES (3, 99, '2019-03-14 11:58:29', null);
INSERT INTO larashop.options (id, sort_order, created_at, updated_at) VALUES (4, 78, '2019-03-14 11:58:29', null);
INSERT INTO larashop.options (id, sort_order, created_at, updated_at) VALUES (5, 48, '2019-03-14 11:58:29', null);
INSERT INTO larashop.options (id, sort_order, created_at, updated_at) VALUES (6, 11, '2019-03-14 11:58:29', null);
INSERT INTO larashop.options (id, sort_order, created_at, updated_at) VALUES (7, 53, '2019-03-14 11:58:29', null);
INSERT INTO larashop.options (id, sort_order, created_at, updated_at) VALUES (8, 99, '2019-03-14 11:58:29', null);
INSERT INTO larashop.options (id, sort_order, created_at, updated_at) VALUES (9, 35, '2019-03-14 11:58:29', null);
INSERT INTO larashop.options (id, sort_order, created_at, updated_at) VALUES (10, 36, '2019-03-14 11:58:29', null);
INSERT INTO larashop.options (id, sort_order, created_at, updated_at) VALUES (11, 30, '2019-03-14 11:58:29', null);
INSERT INTO larashop.options (id, sort_order, created_at, updated_at) VALUES (12, 40, '2019-03-14 11:58:29', null);
INSERT INTO larashop.options (id, sort_order, created_at, updated_at) VALUES (13, 10, '2019-03-14 11:58:29', null);
INSERT INTO larashop.options (id, sort_order, created_at, updated_at) VALUES (14, 39, '2019-03-14 11:58:29', null);
INSERT INTO larashop.options (id, sort_order, created_at, updated_at) VALUES (15, 69, '2019-03-14 11:58:29', null);
INSERT INTO larashop.options (id, sort_order, created_at, updated_at) VALUES (16, 97, '2019-03-14 11:58:29', null);
INSERT INTO larashop.options (id, sort_order, created_at, updated_at) VALUES (17, 18, '2019-03-14 11:58:29', null);
INSERT INTO larashop.options (id, sort_order, created_at, updated_at) VALUES (18, 26, '2019-03-14 11:58:29', null);
INSERT INTO larashop.options (id, sort_order, created_at, updated_at) VALUES (19, 10, '2019-03-14 11:58:29', null);
INSERT INTO larashop.options (id, sort_order, created_at, updated_at) VALUES (20, 92, '2019-03-14 11:58:29', null);
create table product_option_values
(
  id                bigint unsigned auto_increment
    primary key,
  quantity          int             null,
  price             decimal(8, 2)   null,
  weight            double          null,
  option_product_id bigint unsigned not null,
  option_value_id   bigint unsigned not null,
  created_at        timestamp       null,
  updated_at        timestamp       null,
  constraint product_option_values_option_product_id_foreign
    foreign key (option_product_id) references option_product (id)
      on delete cascade,
  constraint product_option_values_option_value_id_foreign
    foreign key (option_value_id) references option_values (id)
      on delete cascade
)
  collate = utf8mb4_unicode_ci;


create table products
(
  id         bigint unsigned auto_increment
    primary key,
  model      varchar(255)                   not null,
  main_image varchar(255)                   null,
  price      decimal(8, 2)                  null,
  quantity   int                            null,
  weight     double                         null,
  dimensions json                           null,
  status     varchar(255) default 'enabled' not null,
  sort_order int          default 0         not null,
  created_at timestamp                      null,
  updated_at timestamp                      null
)
  collate = utf8mb4_unicode_ci;

INSERT INTO larashop.products (id, model, main_image, price, quantity, weight, dimensions, status, sort_order, created_at, updated_at) VALUES (1, 'rdQE5cW3FsztRDs0', null, 26.15, 104, 0.48, null, 'enabled', 0, null, null);
INSERT INTO larashop.products (id, model, main_image, price, quantity, weight, dimensions, status, sort_order, created_at, updated_at) VALUES (2, 'g617xELnOZmiTTlW', null, 847.05, 147, 0.11, null, 'enabled', 0, null, null);
INSERT INTO larashop.products (id, model, main_image, price, quantity, weight, dimensions, status, sort_order, created_at, updated_at) VALUES (3, 'EGZiQjWhUoopX6jp', null, 663.08, 18, 0.04, null, 'enabled', 0, null, null);
INSERT INTO larashop.products (id, model, main_image, price, quantity, weight, dimensions, status, sort_order, created_at, updated_at) VALUES (4, 'thsPxgQUt9Lbnp6c', null, 32.02, 72, 0.67, null, 'enabled', 0, null, null);
INSERT INTO larashop.products (id, model, main_image, price, quantity, weight, dimensions, status, sort_order, created_at, updated_at) VALUES (5, 'ZObLusr8nP4bULNz', null, 782.31, 115, 0.36, null, 'enabled', 0, null, null);
INSERT INTO larashop.products (id, model, main_image, price, quantity, weight, dimensions, status, sort_order, created_at, updated_at) VALUES (6, 'oJvpr0jL7rWcJEM6', null, 415.48, 132, 0.16, null, 'enabled', 0, null, null);
INSERT INTO larashop.products (id, model, main_image, price, quantity, weight, dimensions, status, sort_order, created_at, updated_at) VALUES (7, 'pgb0qKgB3WR1gyVP', null, 344.43, 102, 0.17, null, 'enabled', 0, null, null);
INSERT INTO larashop.products (id, model, main_image, price, quantity, weight, dimensions, status, sort_order, created_at, updated_at) VALUES (8, 'tsJSwE1ZHBUkYjfa', null, 419.95, 105, 0.26, null, 'enabled', 0, null, null);
INSERT INTO larashop.products (id, model, main_image, price, quantity, weight, dimensions, status, sort_order, created_at, updated_at) VALUES (9, 'q9sRizs1x0AwO14g', null, 197.74, 118, 0.02, null, 'enabled', 0, null, null);
INSERT INTO larashop.products (id, model, main_image, price, quantity, weight, dimensions, status, sort_order, created_at, updated_at) VALUES (10, '1QrtL4YtEYRrSlot', null, 554.05, 146, 0.13, null, 'enabled', 0, null, null);
INSERT INTO larashop.products (id, model, main_image, price, quantity, weight, dimensions, status, sort_order, created_at, updated_at) VALUES (11, 'XueRYZPwJlLv17e8', null, 423.95, 142, 0.17, null, 'enabled', 0, null, null);
INSERT INTO larashop.products (id, model, main_image, price, quantity, weight, dimensions, status, sort_order, created_at, updated_at) VALUES (12, 'eoOZIZ1ckX13HL9h', null, 984.42, 52, 0.43, null, 'enabled', 0, null, null);
INSERT INTO larashop.products (id, model, main_image, price, quantity, weight, dimensions, status, sort_order, created_at, updated_at) VALUES (13, 'OiFJvjDcaeQgSXvD', null, 974.22, 76, 0.69, null, 'enabled', 0, null, null);
INSERT INTO larashop.products (id, model, main_image, price, quantity, weight, dimensions, status, sort_order, created_at, updated_at) VALUES (14, 'QsufOHdzGhn2HVxx', null, 890.06, 130, 0.6, null, 'enabled', 0, null, null);
INSERT INTO larashop.products (id, model, main_image, price, quantity, weight, dimensions, status, sort_order, created_at, updated_at) VALUES (15, 'f4JxLarpn680T9zZ', null, 367.33, 84, 0.39, null, 'enabled', 0, null, null);
INSERT INTO larashop.products (id, model, main_image, price, quantity, weight, dimensions, status, sort_order, created_at, updated_at) VALUES (16, 'e2wb8MonfmD2H5FG', null, 915.50, 65, 0.25, null, 'enabled', 0, null, null);
INSERT INTO larashop.products (id, model, main_image, price, quantity, weight, dimensions, status, sort_order, created_at, updated_at) VALUES (17, 'J0vJI1ISVnBOlJme', null, 13.60, 15, 0.9, null, 'enabled', 0, null, null);
INSERT INTO larashop.products (id, model, main_image, price, quantity, weight, dimensions, status, sort_order, created_at, updated_at) VALUES (18, 'dzO0Vfg8nh7OJpC2', null, 592.79, 121, 0.81, null, 'enabled', 0, null, null);
INSERT INTO larashop.products (id, model, main_image, price, quantity, weight, dimensions, status, sort_order, created_at, updated_at) VALUES (19, 'uqkjvOm4SbCfe6JU', null, 361.64, 144, 0.1, null, 'enabled', 0, null, null);
INSERT INTO larashop.products (id, model, main_image, price, quantity, weight, dimensions, status, sort_order, created_at, updated_at) VALUES (20, 'parz7YzSLPyZBnKb', null, 690.05, 60, 0.69, null, 'enabled', 0, null, null);
INSERT INTO larashop.products (id, model, main_image, price, quantity, weight, dimensions, status, sort_order, created_at, updated_at) VALUES (21, 'xiM0zOjKwWlIW91g', null, 554.46, 37, 0.05, null, 'enabled', 0, null, null);
INSERT INTO larashop.products (id, model, main_image, price, quantity, weight, dimensions, status, sort_order, created_at, updated_at) VALUES (22, 'mDYYXWKOeqvRAzDH', null, 353.50, 35, 0.36, null, 'enabled', 0, null, null);
INSERT INTO larashop.products (id, model, main_image, price, quantity, weight, dimensions, status, sort_order, created_at, updated_at) VALUES (23, 'Eg2xqub8dxBe58JK', null, 895.95, 29, 0.97, null, 'enabled', 0, null, null);
INSERT INTO larashop.products (id, model, main_image, price, quantity, weight, dimensions, status, sort_order, created_at, updated_at) VALUES (24, 'QGOVdR0CanYHJHsh', null, 850.54, 60, 0.08, null, 'enabled', 0, null, null);
INSERT INTO larashop.products (id, model, main_image, price, quantity, weight, dimensions, status, sort_order, created_at, updated_at) VALUES (25, 'BVUdkeIPRDJWMif4', null, 665.65, 48, 0.07, null, 'enabled', 0, null, null);
INSERT INTO larashop.products (id, model, main_image, price, quantity, weight, dimensions, status, sort_order, created_at, updated_at) VALUES (26, 'bxPGVLIBTbLG97R3', null, 179.25, 13, 0.16, null, 'enabled', 0, null, null);
INSERT INTO larashop.products (id, model, main_image, price, quantity, weight, dimensions, status, sort_order, created_at, updated_at) VALUES (27, 'IeNzdbKZdspnD9Mo', null, 840.23, 73, 0.83, null, 'enabled', 0, null, null);
INSERT INTO larashop.products (id, model, main_image, price, quantity, weight, dimensions, status, sort_order, created_at, updated_at) VALUES (28, 'xHAozg5QampXFyEv', null, 722.57, 109, 0.23, null, 'enabled', 0, null, null);
INSERT INTO larashop.products (id, model, main_image, price, quantity, weight, dimensions, status, sort_order, created_at, updated_at) VALUES (29, 'XfC1hNUUtADdeeKr', null, 990.56, 142, 0.37, null, 'enabled', 0, null, null);
INSERT INTO larashop.products (id, model, main_image, price, quantity, weight, dimensions, status, sort_order, created_at, updated_at) VALUES (30, 'p0ywzO05cBTh2obC', null, 646.99, 65, 0.73, null, 'enabled', 0, null, null);
INSERT INTO larashop.products (id, model, main_image, price, quantity, weight, dimensions, status, sort_order, created_at, updated_at) VALUES (31, 'JggPfdpMEghLG8hs', null, 717.65, 61, 0.31, null, 'enabled', 0, null, null);
INSERT INTO larashop.products (id, model, main_image, price, quantity, weight, dimensions, status, sort_order, created_at, updated_at) VALUES (32, 'lfNiiedxZ3HORCgj', null, 167.16, 34, 0.23, null, 'enabled', 0, null, null);
INSERT INTO larashop.products (id, model, main_image, price, quantity, weight, dimensions, status, sort_order, created_at, updated_at) VALUES (33, '6xJ1yIvyZhht9cTX', null, 304.10, 67, 0.58, null, 'enabled', 0, null, null);
INSERT INTO larashop.products (id, model, main_image, price, quantity, weight, dimensions, status, sort_order, created_at, updated_at) VALUES (34, 'Id0zv8vBq32j1Jfs', null, 502.24, 87, 0.25, null, 'enabled', 0, null, null);
INSERT INTO larashop.products (id, model, main_image, price, quantity, weight, dimensions, status, sort_order, created_at, updated_at) VALUES (35, 'XGGhxrCDwpADTfNI', null, 27.16, 112, 0.1, null, 'enabled', 0, null, null);
INSERT INTO larashop.products (id, model, main_image, price, quantity, weight, dimensions, status, sort_order, created_at, updated_at) VALUES (36, 'QTbCftvbYrM8qLE3', null, 259.47, 7, 0.72, null, 'enabled', 0, null, null);
INSERT INTO larashop.products (id, model, main_image, price, quantity, weight, dimensions, status, sort_order, created_at, updated_at) VALUES (37, 'ei0TtTNL0tYRy4sw', null, 969.69, 95, 0.79, null, 'enabled', 0, null, null);
INSERT INTO larashop.products (id, model, main_image, price, quantity, weight, dimensions, status, sort_order, created_at, updated_at) VALUES (38, 'KBGBAHh0o9jqmgnm', null, 528.12, 57, 0.48, null, 'enabled', 0, null, null);
INSERT INTO larashop.products (id, model, main_image, price, quantity, weight, dimensions, status, sort_order, created_at, updated_at) VALUES (39, 'xdkjrHbCGQg6d7tL', null, 565.65, 98, 0.53, null, 'enabled', 0, null, null);
INSERT INTO larashop.products (id, model, main_image, price, quantity, weight, dimensions, status, sort_order, created_at, updated_at) VALUES (40, 'qTDKqVO40wUwMCHv', null, 730.28, 146, 0.36, null, 'enabled', 0, null, null);
INSERT INTO larashop.products (id, model, main_image, price, quantity, weight, dimensions, status, sort_order, created_at, updated_at) VALUES (41, '8GOiLKQcD0MmGCsW', null, 639.14, 34, 0.88, null, 'enabled', 0, null, null);
INSERT INTO larashop.products (id, model, main_image, price, quantity, weight, dimensions, status, sort_order, created_at, updated_at) VALUES (42, 'dCPijg8RB3vgTYwv', null, 64.81, 53, 0.71, null, 'enabled', 0, null, null);
INSERT INTO larashop.products (id, model, main_image, price, quantity, weight, dimensions, status, sort_order, created_at, updated_at) VALUES (43, 'W37fq2PWkvXYPFHz', null, 37.16, 23, 0.12, null, 'enabled', 0, null, null);
INSERT INTO larashop.products (id, model, main_image, price, quantity, weight, dimensions, status, sort_order, created_at, updated_at) VALUES (44, 'PWPUc6IhAShgadhT', null, 519.89, 109, 0.93, null, 'enabled', 0, null, null);
INSERT INTO larashop.products (id, model, main_image, price, quantity, weight, dimensions, status, sort_order, created_at, updated_at) VALUES (45, 'acMuNlc6jU8dAt70', null, 868.79, 18, 0.27, null, 'enabled', 0, null, null);
INSERT INTO larashop.products (id, model, main_image, price, quantity, weight, dimensions, status, sort_order, created_at, updated_at) VALUES (46, 'oUXCbAQ9bTjoQa9H', null, 922.64, 88, 0.88, null, 'enabled', 0, null, null);
INSERT INTO larashop.products (id, model, main_image, price, quantity, weight, dimensions, status, sort_order, created_at, updated_at) VALUES (47, 'IQLLmLxPnUhK8UI2', null, 671.74, 46, 0.64, null, 'enabled', 0, null, null);
INSERT INTO larashop.products (id, model, main_image, price, quantity, weight, dimensions, status, sort_order, created_at, updated_at) VALUES (48, 'y7FC74OQbtKjHN2j', null, 558.28, 52, 0.12, null, 'enabled', 0, null, null);
INSERT INTO larashop.products (id, model, main_image, price, quantity, weight, dimensions, status, sort_order, created_at, updated_at) VALUES (49, 'MiRCJZ0BwBnm1eZq', null, 293.59, 148, 0.64, null, 'enabled', 0, null, null);
INSERT INTO larashop.products (id, model, main_image, price, quantity, weight, dimensions, status, sort_order, created_at, updated_at) VALUES (50, 'XzfPQoYQiUONnsZZ', null, 204.77, 60, 0.85, null, 'enabled', 0, null, null);
create table translations
(
  id             bigint unsigned auto_increment
    primary key,
  `key`          varchar(255)    not null,
  value          mediumtext      not null,
  language_code  varchar(255)    not null,
  localable_id   bigint unsigned not null,
  localable_type varchar(255)    not null,
  created_at     timestamp       null,
  updated_at     timestamp       null,
  constraint translations_language_code_foreign
    foreign key (language_code) references languages (code)
      on delete cascade
)
  collate = utf8mb4_unicode_ci;

create index translations_localable_type_localable_id_index
  on translations (localable_type, localable_id);

INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (1, 'description', 'Category1 description', 'us', 1, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (2, 'name', 'Category1 name', 'us', 1, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (3, 'description', 'Категория1 описание', 'ru', 1, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (4, 'name', 'Категория1 имя', 'ru', 1, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (5, 'description', 'Category2 description', 'us', 2, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (6, 'name', 'Category2 name', 'us', 2, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (7, 'description', 'Категория2 описание', 'ru', 2, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (8, 'name', 'Категория2 имя', 'ru', 2, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (9, 'description', 'Category3 description', 'us', 3, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (10, 'name', 'Category3 name', 'us', 3, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (11, 'description', 'Категория3 описание', 'ru', 3, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (12, 'name', 'Категория3 имя', 'ru', 3, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (13, 'description', 'Category4 description', 'us', 4, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (14, 'name', 'Category4 name', 'us', 4, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (15, 'description', 'Категория4 описание', 'ru', 4, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (16, 'name', 'Категория4 имя', 'ru', 4, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (17, 'description', 'Category5 description', 'us', 5, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (18, 'name', 'Category5 name', 'us', 5, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (19, 'description', 'Категория5 описание', 'ru', 5, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (20, 'name', 'Категория5 имя', 'ru', 5, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (21, 'description', 'Category6 description', 'us', 6, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (22, 'name', 'Category6 name', 'us', 6, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (23, 'description', 'Категория6 описание', 'ru', 6, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (24, 'name', 'Категория6 имя', 'ru', 6, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (25, 'description', 'Category7 description', 'us', 7, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (26, 'name', 'Category7 name', 'us', 7, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (27, 'description', 'Категория7 описание', 'ru', 7, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (28, 'name', 'Категория7 имя', 'ru', 7, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (29, 'description', 'Category8 description', 'us', 8, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (30, 'name', 'Category8 name', 'us', 8, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (31, 'description', 'Категория8 описание', 'ru', 8, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (32, 'name', 'Категория8 имя', 'ru', 8, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (33, 'description', 'Category9 description', 'us', 9, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (34, 'name', 'Category9 name', 'us', 9, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (35, 'description', 'Категория9 описание', 'ru', 9, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (36, 'name', 'Категория9 имя', 'ru', 9, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (37, 'description', 'Category10 description', 'us', 10, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (38, 'name', 'Category10 name', 'us', 10, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (39, 'description', 'Категория10 описание', 'ru', 10, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (40, 'name', 'Категория10 имя', 'ru', 10, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (41, 'description', 'Category11 description', 'us', 11, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (42, 'name', 'Category11 name', 'us', 11, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (43, 'description', 'Категория11 описание', 'ru', 11, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (44, 'name', 'Категория11 имя', 'ru', 11, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (45, 'description', 'Category12 description', 'us', 12, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (46, 'name', 'Category12 name', 'us', 12, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (47, 'description', 'Категория12 описание', 'ru', 12, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (48, 'name', 'Категория12 имя', 'ru', 12, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (49, 'description', 'Category13 description', 'us', 13, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (50, 'name', 'Category13 name', 'us', 13, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (51, 'description', 'Категория13 описание', 'ru', 13, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (52, 'name', 'Категория13 имя', 'ru', 13, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (53, 'description', 'Category14 description', 'us', 14, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (54, 'name', 'Category14 name', 'us', 14, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (55, 'description', 'Категория14 описание', 'ru', 14, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (56, 'name', 'Категория14 имя', 'ru', 14, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (57, 'description', 'Category15 description', 'us', 15, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (58, 'name', 'Category15 name', 'us', 15, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (59, 'description', 'Категория15 описание', 'ru', 15, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (60, 'name', 'Категория15 имя', 'ru', 15, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (61, 'description', 'Category16 description', 'us', 16, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (62, 'name', 'Category16 name', 'us', 16, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (63, 'description', 'Категория16 описание', 'ru', 16, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (64, 'name', 'Категория16 имя', 'ru', 16, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (65, 'description', 'Category17 description', 'us', 17, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (66, 'name', 'Category17 name', 'us', 17, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (67, 'description', 'Категория17 описание', 'ru', 17, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (68, 'name', 'Категория17 имя', 'ru', 17, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (69, 'description', 'Category18 description', 'us', 18, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (70, 'name', 'Category18 name', 'us', 18, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (71, 'description', 'Категория18 описание', 'ru', 18, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (72, 'name', 'Категория18 имя', 'ru', 18, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (73, 'description', 'Category19 description', 'us', 19, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (74, 'name', 'Category19 name', 'us', 19, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (75, 'description', 'Категория19 описание', 'ru', 19, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (76, 'name', 'Категория19 имя', 'ru', 19, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (77, 'description', 'Category20 description', 'us', 20, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (78, 'name', 'Category20 name', 'us', 20, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (79, 'description', 'Категория20 описание', 'ru', 20, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (80, 'name', 'Категория20 имя', 'ru', 20, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (81, 'description', 'Category21 description', 'us', 21, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (82, 'name', 'Category21 name', 'us', 21, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (83, 'description', 'Категория21 описание', 'ru', 21, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (84, 'name', 'Категория21 имя', 'ru', 21, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (85, 'description', 'Category22 description', 'us', 22, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (86, 'name', 'Category22 name', 'us', 22, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (87, 'description', 'Категория22 описание', 'ru', 22, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (88, 'name', 'Категория22 имя', 'ru', 22, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (89, 'description', 'Category23 description', 'us', 23, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (90, 'name', 'Category23 name', 'us', 23, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (91, 'description', 'Категория23 описание', 'ru', 23, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (92, 'name', 'Категория23 имя', 'ru', 23, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (93, 'description', 'Category24 description', 'us', 24, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (94, 'name', 'Category24 name', 'us', 24, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (95, 'description', 'Категория24 описание', 'ru', 24, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (96, 'name', 'Категория24 имя', 'ru', 24, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (97, 'description', 'Category25 description', 'us', 25, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (98, 'name', 'Category25 name', 'us', 25, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (99, 'description', 'Категория25 описание', 'ru', 25, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (100, 'name', 'Категория25 имя', 'ru', 25, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (101, 'description', 'Category26 description', 'us', 26, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (102, 'name', 'Category26 name', 'us', 26, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (103, 'description', 'Категория26 описание', 'ru', 26, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (104, 'name', 'Категория26 имя', 'ru', 26, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (105, 'description', 'Category27 description', 'us', 27, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (106, 'name', 'Category27 name', 'us', 27, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (107, 'description', 'Категория27 описание', 'ru', 27, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (108, 'name', 'Категория27 имя', 'ru', 27, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (109, 'description', 'Category28 description', 'us', 28, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (110, 'name', 'Category28 name', 'us', 28, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (111, 'description', 'Категория28 описание', 'ru', 28, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (112, 'name', 'Категория28 имя', 'ru', 28, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (113, 'description', 'Category29 description', 'us', 29, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (114, 'name', 'Category29 name', 'us', 29, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (115, 'description', 'Категория29 описание', 'ru', 29, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (116, 'name', 'Категория29 имя', 'ru', 29, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (117, 'description', 'Category30 description', 'us', 30, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (118, 'name', 'Category30 name', 'us', 30, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (119, 'description', 'Категория30 описание', 'ru', 30, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (120, 'name', 'Категория30 имя', 'ru', 30, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (121, 'description', 'Category31 description', 'us', 31, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (122, 'name', 'Category31 name', 'us', 31, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (123, 'description', 'Категория31 описание', 'ru', 31, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (124, 'name', 'Категория31 имя', 'ru', 31, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (125, 'description', 'Category32 description', 'us', 32, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (126, 'name', 'Category32 name', 'us', 32, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (127, 'description', 'Категория32 описание', 'ru', 32, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (128, 'name', 'Категория32 имя', 'ru', 32, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (129, 'description', 'Category33 description', 'us', 33, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (130, 'name', 'Category33 name', 'us', 33, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (131, 'description', 'Категория33 описание', 'ru', 33, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (132, 'name', 'Категория33 имя', 'ru', 33, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (133, 'description', 'Category34 description', 'us', 34, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (134, 'name', 'Category34 name', 'us', 34, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (135, 'description', 'Категория34 описание', 'ru', 34, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (136, 'name', 'Категория34 имя', 'ru', 34, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (137, 'description', 'Category35 description', 'us', 35, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (138, 'name', 'Category35 name', 'us', 35, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (139, 'description', 'Категория35 описание', 'ru', 35, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (140, 'name', 'Категория35 имя', 'ru', 35, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (141, 'description', 'Category36 description', 'us', 36, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (142, 'name', 'Category36 name', 'us', 36, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (143, 'description', 'Категория36 описание', 'ru', 36, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (144, 'name', 'Категория36 имя', 'ru', 36, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (145, 'description', 'Category37 description', 'us', 37, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (146, 'name', 'Category37 name', 'us', 37, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (147, 'description', 'Категория37 описание', 'ru', 37, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (148, 'name', 'Категория37 имя', 'ru', 37, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (149, 'description', 'Category38 description', 'us', 38, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (150, 'name', 'Category38 name', 'us', 38, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (151, 'description', 'Категория38 описание', 'ru', 38, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (152, 'name', 'Категория38 имя', 'ru', 38, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (153, 'description', 'Category39 description', 'us', 39, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (154, 'name', 'Category39 name', 'us', 39, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (155, 'description', 'Категория39 описание', 'ru', 39, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (156, 'name', 'Категория39 имя', 'ru', 39, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (157, 'description', 'Category40 description', 'us', 40, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (158, 'name', 'Category40 name', 'us', 40, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (159, 'description', 'Категория40 описание', 'ru', 40, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (160, 'name', 'Категория40 имя', 'ru', 40, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (161, 'description', 'Category41 description', 'us', 41, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (162, 'name', 'Category41 name', 'us', 41, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (163, 'description', 'Категория41 описание', 'ru', 41, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (164, 'name', 'Категория41 имя', 'ru', 41, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (165, 'description', 'Category42 description', 'us', 42, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (166, 'name', 'Category42 name', 'us', 42, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (167, 'description', 'Категория42 описание', 'ru', 42, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (168, 'name', 'Категория42 имя', 'ru', 42, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (169, 'description', 'Category43 description', 'us', 43, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (170, 'name', 'Category43 name', 'us', 43, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (171, 'description', 'Категория43 описание', 'ru', 43, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (172, 'name', 'Категория43 имя', 'ru', 43, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (173, 'description', 'Category44 description', 'us', 44, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (174, 'name', 'Category44 name', 'us', 44, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (175, 'description', 'Категория44 описание', 'ru', 44, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (176, 'name', 'Категория44 имя', 'ru', 44, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (177, 'description', 'Category45 description', 'us', 45, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (178, 'name', 'Category45 name', 'us', 45, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (179, 'description', 'Категория45 описание', 'ru', 45, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (180, 'name', 'Категория45 имя', 'ru', 45, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (181, 'description', 'Category46 description', 'us', 46, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (182, 'name', 'Category46 name', 'us', 46, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (183, 'description', 'Категория46 описание', 'ru', 46, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (184, 'name', 'Категория46 имя', 'ru', 46, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (185, 'description', 'Category47 description', 'us', 47, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (186, 'name', 'Category47 name', 'us', 47, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (187, 'description', 'Категория47 описание', 'ru', 47, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (188, 'name', 'Категория47 имя', 'ru', 47, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (189, 'description', 'Category48 description', 'us', 48, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (190, 'name', 'Category48 name', 'us', 48, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (191, 'description', 'Категория48 описание', 'ru', 48, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (192, 'name', 'Категория48 имя', 'ru', 48, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (193, 'description', 'Category49 description', 'us', 49, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (194, 'name', 'Category49 name', 'us', 49, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (195, 'description', 'Категория49 описание', 'ru', 49, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (196, 'name', 'Категория49 имя', 'ru', 49, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (197, 'description', 'Category50 description', 'us', 50, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (198, 'name', 'Category50 name', 'us', 50, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (199, 'description', 'Категория50 описание', 'ru', 50, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (200, 'name', 'Категория50 имя', 'ru', 50, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (201, 'description', 'Category51 description', 'us', 51, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (202, 'name', 'Category51 name', 'us', 51, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (203, 'description', 'Категория51 описание', 'ru', 51, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (204, 'name', 'Категория51 имя', 'ru', 51, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (205, 'description', 'Category52 description', 'us', 52, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (206, 'name', 'Category52 name', 'us', 52, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (207, 'description', 'Категория52 описание', 'ru', 52, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (208, 'name', 'Категория52 имя', 'ru', 52, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (209, 'description', 'Category53 description', 'us', 53, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (210, 'name', 'Category53 name', 'us', 53, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (211, 'description', 'Категория53 описание', 'ru', 53, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (212, 'name', 'Категория53 имя', 'ru', 53, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (213, 'description', 'Category54 description', 'us', 54, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (214, 'name', 'Category54 name', 'us', 54, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (215, 'description', 'Категория54 описание', 'ru', 54, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (216, 'name', 'Категория54 имя', 'ru', 54, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (217, 'description', 'Category55 description', 'us', 55, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (218, 'name', 'Category55 name', 'us', 55, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (219, 'description', 'Категория55 описание', 'ru', 55, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (220, 'name', 'Категория55 имя', 'ru', 55, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (221, 'description', 'Category56 description', 'us', 56, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (222, 'name', 'Category56 name', 'us', 56, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (223, 'description', 'Категория56 описание', 'ru', 56, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (224, 'name', 'Категория56 имя', 'ru', 56, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (225, 'description', 'Category57 description', 'us', 57, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (226, 'name', 'Category57 name', 'us', 57, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (227, 'description', 'Категория57 описание', 'ru', 57, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (228, 'name', 'Категория57 имя', 'ru', 57, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (229, 'description', 'Category58 description', 'us', 58, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (230, 'name', 'Category58 name', 'us', 58, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (231, 'description', 'Категория58 описание', 'ru', 58, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (232, 'name', 'Категория58 имя', 'ru', 58, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (233, 'description', 'Category59 description', 'us', 59, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (234, 'name', 'Category59 name', 'us', 59, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (235, 'description', 'Категория59 описание', 'ru', 59, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (236, 'name', 'Категория59 имя', 'ru', 59, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (237, 'description', 'Category60 description', 'us', 60, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (238, 'name', 'Category60 name', 'us', 60, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (239, 'description', 'Категория60 описание', 'ru', 60, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (240, 'name', 'Категория60 имя', 'ru', 60, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (241, 'description', 'Category61 description', 'us', 61, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (242, 'name', 'Category61 name', 'us', 61, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (243, 'description', 'Категория61 описание', 'ru', 61, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (244, 'name', 'Категория61 имя', 'ru', 61, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (245, 'description', 'Category62 description', 'us', 62, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (246, 'name', 'Category62 name', 'us', 62, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (247, 'description', 'Категория62 описание', 'ru', 62, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (248, 'name', 'Категория62 имя', 'ru', 62, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (249, 'description', 'Category63 description', 'us', 63, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (250, 'name', 'Category63 name', 'us', 63, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (251, 'description', 'Категория63 описание', 'ru', 63, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (252, 'name', 'Категория63 имя', 'ru', 63, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (253, 'description', 'Category64 description', 'us', 64, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (254, 'name', 'Category64 name', 'us', 64, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (255, 'description', 'Категория64 описание', 'ru', 64, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (256, 'name', 'Категория64 имя', 'ru', 64, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (257, 'description', 'Category65 description', 'us', 65, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (258, 'name', 'Category65 name', 'us', 65, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (259, 'description', 'Категория65 описание', 'ru', 65, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (260, 'name', 'Категория65 имя', 'ru', 65, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (261, 'description', 'Category66 description', 'us', 66, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (262, 'name', 'Category66 name', 'us', 66, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (263, 'description', 'Категория66 описание', 'ru', 66, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (264, 'name', 'Категория66 имя', 'ru', 66, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (265, 'description', 'Category67 description', 'us', 67, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (266, 'name', 'Category67 name', 'us', 67, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (267, 'description', 'Категория67 описание', 'ru', 67, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (268, 'name', 'Категория67 имя', 'ru', 67, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (269, 'description', 'Category68 description', 'us', 68, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (270, 'name', 'Category68 name', 'us', 68, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (271, 'description', 'Категория68 описание', 'ru', 68, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (272, 'name', 'Категория68 имя', 'ru', 68, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (273, 'description', 'Category69 description', 'us', 69, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (274, 'name', 'Category69 name', 'us', 69, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (275, 'description', 'Категория69 описание', 'ru', 69, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (276, 'name', 'Категория69 имя', 'ru', 69, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (277, 'description', 'Category70 description', 'us', 70, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (278, 'name', 'Category70 name', 'us', 70, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (279, 'description', 'Категория70 описание', 'ru', 70, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (280, 'name', 'Категория70 имя', 'ru', 70, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (281, 'description', 'Category71 description', 'us', 71, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (282, 'name', 'Category71 name', 'us', 71, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (283, 'description', 'Категория71 описание', 'ru', 71, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (284, 'name', 'Категория71 имя', 'ru', 71, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (285, 'description', 'Category72 description', 'us', 72, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (286, 'name', 'Category72 name', 'us', 72, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (287, 'description', 'Категория72 описание', 'ru', 72, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (288, 'name', 'Категория72 имя', 'ru', 72, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (289, 'description', 'Category73 description', 'us', 73, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (290, 'name', 'Category73 name', 'us', 73, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (291, 'description', 'Категория73 описание', 'ru', 73, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (292, 'name', 'Категория73 имя', 'ru', 73, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (293, 'description', 'Category74 description', 'us', 74, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (294, 'name', 'Category74 name', 'us', 74, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (295, 'description', 'Категория74 описание', 'ru', 74, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (296, 'name', 'Категория74 имя', 'ru', 74, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (297, 'description', 'Category75 description', 'us', 75, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (298, 'name', 'Category75 name', 'us', 75, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (299, 'description', 'Категория75 описание', 'ru', 75, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (300, 'name', 'Категория75 имя', 'ru', 75, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (301, 'description', 'Category76 description', 'us', 76, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (302, 'name', 'Category76 name', 'us', 76, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (303, 'description', 'Категория76 описание', 'ru', 76, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (304, 'name', 'Категория76 имя', 'ru', 76, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (305, 'description', 'Category77 description', 'us', 77, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (306, 'name', 'Category77 name', 'us', 77, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (307, 'description', 'Категория77 описание', 'ru', 77, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (308, 'name', 'Категория77 имя', 'ru', 77, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (309, 'description', 'Category78 description', 'us', 78, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (310, 'name', 'Category78 name', 'us', 78, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (311, 'description', 'Категория78 описание', 'ru', 78, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (312, 'name', 'Категория78 имя', 'ru', 78, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (313, 'description', 'Category79 description', 'us', 79, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (314, 'name', 'Category79 name', 'us', 79, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (315, 'description', 'Категория79 описание', 'ru', 79, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (316, 'name', 'Категория79 имя', 'ru', 79, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (317, 'description', 'Category80 description', 'us', 80, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (318, 'name', 'Category80 name', 'us', 80, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (319, 'description', 'Категория80 описание', 'ru', 80, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (320, 'name', 'Категория80 имя', 'ru', 80, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (321, 'description', 'Category81 description', 'us', 81, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (322, 'name', 'Category81 name', 'us', 81, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (323, 'description', 'Категория81 описание', 'ru', 81, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (324, 'name', 'Категория81 имя', 'ru', 81, 'App\\Modules\\Category\\Models\\Category', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (325, 'description', 'Product1 description', 'us', 1, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (326, 'name', 'Product1 name', 'us', 1, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (327, 'description', 'Продукт1 описание', 'ru', 1, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (328, 'name', 'Продукт1 имя', 'ru', 1, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (329, 'description', 'Product2 description', 'us', 2, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (330, 'name', 'Product2 name', 'us', 2, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (331, 'description', 'Продукт2 описание', 'ru', 2, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (332, 'name', 'Продукт2 имя', 'ru', 2, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (333, 'description', 'Product3 description', 'us', 3, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (334, 'name', 'Product3 name', 'us', 3, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (335, 'description', 'Продукт3 описание', 'ru', 3, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (336, 'name', 'Продукт3 имя', 'ru', 3, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (337, 'description', 'Product4 description', 'us', 4, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (338, 'name', 'Product4 name', 'us', 4, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (339, 'description', 'Продукт4 описание', 'ru', 4, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (340, 'name', 'Продукт4 имя', 'ru', 4, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (341, 'description', 'Product5 description', 'us', 5, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (342, 'name', 'Product5 name', 'us', 5, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (343, 'description', 'Продукт5 описание', 'ru', 5, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (344, 'name', 'Продукт5 имя', 'ru', 5, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (345, 'description', 'Product6 description', 'us', 6, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (346, 'name', 'Product6 name', 'us', 6, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (347, 'description', 'Продукт6 описание', 'ru', 6, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (348, 'name', 'Продукт6 имя', 'ru', 6, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (349, 'description', 'Product7 description', 'us', 7, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (350, 'name', 'Product7 name', 'us', 7, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (351, 'description', 'Продукт7 описание', 'ru', 7, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (352, 'name', 'Продукт7 имя', 'ru', 7, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (353, 'description', 'Product8 description', 'us', 8, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (354, 'name', 'Product8 name', 'us', 8, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (355, 'description', 'Продукт8 описание', 'ru', 8, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (356, 'name', 'Продукт8 имя', 'ru', 8, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (357, 'description', 'Product9 description', 'us', 9, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (358, 'name', 'Product9 name', 'us', 9, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (359, 'description', 'Продукт9 описание', 'ru', 9, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (360, 'name', 'Продукт9 имя', 'ru', 9, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (361, 'description', 'Product10 description', 'us', 10, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (362, 'name', 'Product10 name', 'us', 10, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (363, 'description', 'Продукт10 описание', 'ru', 10, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (364, 'name', 'Продукт10 имя', 'ru', 10, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (365, 'description', 'Product11 description', 'us', 11, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (366, 'name', 'Product11 name', 'us', 11, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (367, 'description', 'Продукт11 описание', 'ru', 11, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (368, 'name', 'Продукт11 имя', 'ru', 11, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (369, 'description', 'Product12 description', 'us', 12, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (370, 'name', 'Product12 name', 'us', 12, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (371, 'description', 'Продукт12 описание', 'ru', 12, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (372, 'name', 'Продукт12 имя', 'ru', 12, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (373, 'description', 'Product13 description', 'us', 13, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (374, 'name', 'Product13 name', 'us', 13, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (375, 'description', 'Продукт13 описание', 'ru', 13, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (376, 'name', 'Продукт13 имя', 'ru', 13, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (377, 'description', 'Product14 description', 'us', 14, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (378, 'name', 'Product14 name', 'us', 14, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (379, 'description', 'Продукт14 описание', 'ru', 14, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (380, 'name', 'Продукт14 имя', 'ru', 14, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (381, 'description', 'Product15 description', 'us', 15, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (382, 'name', 'Product15 name', 'us', 15, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (383, 'description', 'Продукт15 описание', 'ru', 15, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (384, 'name', 'Продукт15 имя', 'ru', 15, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (385, 'description', 'Product16 description', 'us', 16, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (386, 'name', 'Product16 name', 'us', 16, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (387, 'description', 'Продукт16 описание', 'ru', 16, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (388, 'name', 'Продукт16 имя', 'ru', 16, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (389, 'description', 'Product17 description', 'us', 17, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (390, 'name', 'Product17 name', 'us', 17, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (391, 'description', 'Продукт17 описание', 'ru', 17, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (392, 'name', 'Продукт17 имя', 'ru', 17, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (393, 'description', 'Product18 description', 'us', 18, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (394, 'name', 'Product18 name', 'us', 18, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (395, 'description', 'Продукт18 описание', 'ru', 18, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (396, 'name', 'Продукт18 имя', 'ru', 18, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (397, 'description', 'Product19 description', 'us', 19, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (398, 'name', 'Product19 name', 'us', 19, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (399, 'description', 'Продукт19 описание', 'ru', 19, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (400, 'name', 'Продукт19 имя', 'ru', 19, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (401, 'description', 'Product20 description', 'us', 20, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (402, 'name', 'Product20 name', 'us', 20, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (403, 'description', 'Продукт20 описание', 'ru', 20, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (404, 'name', 'Продукт20 имя', 'ru', 20, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (405, 'description', 'Product21 description', 'us', 21, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (406, 'name', 'Product21 name', 'us', 21, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (407, 'description', 'Продукт21 описание', 'ru', 21, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (408, 'name', 'Продукт21 имя', 'ru', 21, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (409, 'description', 'Product22 description', 'us', 22, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (410, 'name', 'Product22 name', 'us', 22, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (411, 'description', 'Продукт22 описание', 'ru', 22, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (412, 'name', 'Продукт22 имя', 'ru', 22, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (413, 'description', 'Product23 description', 'us', 23, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (414, 'name', 'Product23 name', 'us', 23, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (415, 'description', 'Продукт23 описание', 'ru', 23, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (416, 'name', 'Продукт23 имя', 'ru', 23, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (417, 'description', 'Product24 description', 'us', 24, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (418, 'name', 'Product24 name', 'us', 24, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (419, 'description', 'Продукт24 описание', 'ru', 24, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (420, 'name', 'Продукт24 имя', 'ru', 24, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (421, 'description', 'Product25 description', 'us', 25, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (422, 'name', 'Product25 name', 'us', 25, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (423, 'description', 'Продукт25 описание', 'ru', 25, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (424, 'name', 'Продукт25 имя', 'ru', 25, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (425, 'description', 'Product26 description', 'us', 26, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (426, 'name', 'Product26 name', 'us', 26, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (427, 'description', 'Продукт26 описание', 'ru', 26, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (428, 'name', 'Продукт26 имя', 'ru', 26, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (429, 'description', 'Product27 description', 'us', 27, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (430, 'name', 'Product27 name', 'us', 27, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (431, 'description', 'Продукт27 описание', 'ru', 27, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (432, 'name', 'Продукт27 имя', 'ru', 27, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (433, 'description', 'Product28 description', 'us', 28, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (434, 'name', 'Product28 name', 'us', 28, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (435, 'description', 'Продукт28 описание', 'ru', 28, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (436, 'name', 'Продукт28 имя', 'ru', 28, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (437, 'description', 'Product29 description', 'us', 29, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (438, 'name', 'Product29 name', 'us', 29, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (439, 'description', 'Продукт29 описание', 'ru', 29, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (440, 'name', 'Продукт29 имя', 'ru', 29, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (441, 'description', 'Product30 description', 'us', 30, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (442, 'name', 'Product30 name', 'us', 30, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (443, 'description', 'Продукт30 описание', 'ru', 30, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (444, 'name', 'Продукт30 имя', 'ru', 30, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (445, 'description', 'Product31 description', 'us', 31, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (446, 'name', 'Product31 name', 'us', 31, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (447, 'description', 'Продукт31 описание', 'ru', 31, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (448, 'name', 'Продукт31 имя', 'ru', 31, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (449, 'description', 'Product32 description', 'us', 32, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (450, 'name', 'Product32 name', 'us', 32, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (451, 'description', 'Продукт32 описание', 'ru', 32, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (452, 'name', 'Продукт32 имя', 'ru', 32, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (453, 'description', 'Product33 description', 'us', 33, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (454, 'name', 'Product33 name', 'us', 33, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (455, 'description', 'Продукт33 описание', 'ru', 33, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (456, 'name', 'Продукт33 имя', 'ru', 33, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (457, 'description', 'Product34 description', 'us', 34, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (458, 'name', 'Product34 name', 'us', 34, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (459, 'description', 'Продукт34 описание', 'ru', 34, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (460, 'name', 'Продукт34 имя', 'ru', 34, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (461, 'description', 'Product35 description', 'us', 35, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (462, 'name', 'Product35 name', 'us', 35, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (463, 'description', 'Продукт35 описание', 'ru', 35, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (464, 'name', 'Продукт35 имя', 'ru', 35, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (465, 'description', 'Product36 description', 'us', 36, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (466, 'name', 'Product36 name', 'us', 36, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (467, 'description', 'Продукт36 описание', 'ru', 36, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (468, 'name', 'Продукт36 имя', 'ru', 36, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (469, 'description', 'Product37 description', 'us', 37, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (470, 'name', 'Product37 name', 'us', 37, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (471, 'description', 'Продукт37 описание', 'ru', 37, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (472, 'name', 'Продукт37 имя', 'ru', 37, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (473, 'description', 'Product38 description', 'us', 38, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (474, 'name', 'Product38 name', 'us', 38, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (475, 'description', 'Продукт38 описание', 'ru', 38, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (476, 'name', 'Продукт38 имя', 'ru', 38, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (477, 'description', 'Product39 description', 'us', 39, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (478, 'name', 'Product39 name', 'us', 39, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (479, 'description', 'Продукт39 описание', 'ru', 39, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (480, 'name', 'Продукт39 имя', 'ru', 39, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (481, 'description', 'Product40 description', 'us', 40, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (482, 'name', 'Product40 name', 'us', 40, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (483, 'description', 'Продукт40 описание', 'ru', 40, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (484, 'name', 'Продукт40 имя', 'ru', 40, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (485, 'description', 'Product41 description', 'us', 41, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (486, 'name', 'Product41 name', 'us', 41, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (487, 'description', 'Продукт41 описание', 'ru', 41, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (488, 'name', 'Продукт41 имя', 'ru', 41, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (489, 'description', 'Product42 description', 'us', 42, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (490, 'name', 'Product42 name', 'us', 42, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (491, 'description', 'Продукт42 описание', 'ru', 42, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (492, 'name', 'Продукт42 имя', 'ru', 42, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (493, 'description', 'Product43 description', 'us', 43, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (494, 'name', 'Product43 name', 'us', 43, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (495, 'description', 'Продукт43 описание', 'ru', 43, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (496, 'name', 'Продукт43 имя', 'ru', 43, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (497, 'description', 'Product44 description', 'us', 44, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (498, 'name', 'Product44 name', 'us', 44, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (499, 'description', 'Продукт44 описание', 'ru', 44, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (500, 'name', 'Продукт44 имя', 'ru', 44, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (501, 'description', 'Product45 description', 'us', 45, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (502, 'name', 'Product45 name', 'us', 45, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (503, 'description', 'Продукт45 описание', 'ru', 45, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (504, 'name', 'Продукт45 имя', 'ru', 45, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (505, 'description', 'Product46 description', 'us', 46, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (506, 'name', 'Product46 name', 'us', 46, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (507, 'description', 'Продукт46 описание', 'ru', 46, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (508, 'name', 'Продукт46 имя', 'ru', 46, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (509, 'description', 'Product47 description', 'us', 47, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (510, 'name', 'Product47 name', 'us', 47, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (511, 'description', 'Продукт47 описание', 'ru', 47, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (512, 'name', 'Продукт47 имя', 'ru', 47, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (513, 'description', 'Product48 description', 'us', 48, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (514, 'name', 'Product48 name', 'us', 48, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (515, 'description', 'Продукт48 описание', 'ru', 48, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (516, 'name', 'Продукт48 имя', 'ru', 48, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (517, 'description', 'Product49 description', 'us', 49, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (518, 'name', 'Product49 name', 'us', 49, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (519, 'description', 'Продукт49 описание', 'ru', 49, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (520, 'name', 'Продукт49 имя', 'ru', 49, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (521, 'description', 'Product50 description', 'us', 50, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (522, 'name', 'Product50 name', 'us', 50, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (523, 'description', 'Продукт50 описание', 'ru', 50, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (524, 'name', 'Продукт50 имя', 'ru', 50, 'App\\Modules\\Product\\Models\\Product', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (525, 'name', 'Attribute1 name', 'us', 1, 'App\\Modules\\Attribute\\Models\\Attribute', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (526, 'name', 'Аттрибут1 name', 'ru', 1, 'App\\Modules\\Attribute\\Models\\Attribute', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (527, 'name', 'Attribute2 name', 'us', 2, 'App\\Modules\\Attribute\\Models\\Attribute', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (528, 'name', 'Аттрибут2 name', 'ru', 2, 'App\\Modules\\Attribute\\Models\\Attribute', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (529, 'name', 'Attribute3 name', 'us', 3, 'App\\Modules\\Attribute\\Models\\Attribute', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (530, 'name', 'Аттрибут3 name', 'ru', 3, 'App\\Modules\\Attribute\\Models\\Attribute', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (531, 'name', 'Attribute4 name', 'us', 4, 'App\\Modules\\Attribute\\Models\\Attribute', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (532, 'name', 'Аттрибут4 name', 'ru', 4, 'App\\Modules\\Attribute\\Models\\Attribute', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (533, 'name', 'Attribute5 name', 'us', 5, 'App\\Modules\\Attribute\\Models\\Attribute', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (534, 'name', 'Аттрибут5 name', 'ru', 5, 'App\\Modules\\Attribute\\Models\\Attribute', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (535, 'name', 'Attribute6 name', 'us', 6, 'App\\Modules\\Attribute\\Models\\Attribute', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (536, 'name', 'Аттрибут6 name', 'ru', 6, 'App\\Modules\\Attribute\\Models\\Attribute', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (537, 'name', 'Attribute7 name', 'us', 7, 'App\\Modules\\Attribute\\Models\\Attribute', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (538, 'name', 'Аттрибут7 name', 'ru', 7, 'App\\Modules\\Attribute\\Models\\Attribute', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (539, 'name', 'Attribute8 name', 'us', 8, 'App\\Modules\\Attribute\\Models\\Attribute', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (540, 'name', 'Аттрибут8 name', 'ru', 8, 'App\\Modules\\Attribute\\Models\\Attribute', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (541, 'name', 'Attribute9 name', 'us', 9, 'App\\Modules\\Attribute\\Models\\Attribute', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (542, 'name', 'Аттрибут9 name', 'ru', 9, 'App\\Modules\\Attribute\\Models\\Attribute', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (543, 'name', 'Attribute10 name', 'us', 10, 'App\\Modules\\Attribute\\Models\\Attribute', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (544, 'name', 'Аттрибут10 name', 'ru', 10, 'App\\Modules\\Attribute\\Models\\Attribute', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (545, 'name', 'Attribute11 name', 'us', 11, 'App\\Modules\\Attribute\\Models\\Attribute', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (546, 'name', 'Аттрибут11 name', 'ru', 11, 'App\\Modules\\Attribute\\Models\\Attribute', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (547, 'name', 'Attribute12 name', 'us', 12, 'App\\Modules\\Attribute\\Models\\Attribute', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (548, 'name', 'Аттрибут12 name', 'ru', 12, 'App\\Modules\\Attribute\\Models\\Attribute', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (549, 'name', 'Attribute13 name', 'us', 13, 'App\\Modules\\Attribute\\Models\\Attribute', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (550, 'name', 'Аттрибут13 name', 'ru', 13, 'App\\Modules\\Attribute\\Models\\Attribute', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (551, 'name', 'Attribute14 name', 'us', 14, 'App\\Modules\\Attribute\\Models\\Attribute', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (552, 'name', 'Аттрибут14 name', 'ru', 14, 'App\\Modules\\Attribute\\Models\\Attribute', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (553, 'name', 'Attribute15 name', 'us', 15, 'App\\Modules\\Attribute\\Models\\Attribute', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (554, 'name', 'Аттрибут15 name', 'ru', 15, 'App\\Modules\\Attribute\\Models\\Attribute', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (555, 'name', 'Attribute16 name', 'us', 16, 'App\\Modules\\Attribute\\Models\\Attribute', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (556, 'name', 'Аттрибут16 name', 'ru', 16, 'App\\Modules\\Attribute\\Models\\Attribute', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (557, 'name', 'Attribute17 name', 'us', 17, 'App\\Modules\\Attribute\\Models\\Attribute', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (558, 'name', 'Аттрибут17 name', 'ru', 17, 'App\\Modules\\Attribute\\Models\\Attribute', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (559, 'name', 'Attribute18 name', 'us', 18, 'App\\Modules\\Attribute\\Models\\Attribute', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (560, 'name', 'Аттрибут18 name', 'ru', 18, 'App\\Modules\\Attribute\\Models\\Attribute', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (561, 'name', 'Attribute19 name', 'us', 19, 'App\\Modules\\Attribute\\Models\\Attribute', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (562, 'name', 'Аттрибут19 name', 'ru', 19, 'App\\Modules\\Attribute\\Models\\Attribute', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (563, 'name', 'Attribute20 name', 'us', 20, 'App\\Modules\\Attribute\\Models\\Attribute', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (564, 'name', 'Аттрибут20 name', 'ru', 20, 'App\\Modules\\Attribute\\Models\\Attribute', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (565, 'name', 'Attribute21 name', 'us', 21, 'App\\Modules\\Attribute\\Models\\Attribute', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (566, 'name', 'Аттрибут21 name', 'ru', 21, 'App\\Modules\\Attribute\\Models\\Attribute', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (567, 'name', 'Attribute22 name', 'us', 22, 'App\\Modules\\Attribute\\Models\\Attribute', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (568, 'name', 'Аттрибут22 name', 'ru', 22, 'App\\Modules\\Attribute\\Models\\Attribute', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (569, 'name', 'Attribute23 name', 'us', 23, 'App\\Modules\\Attribute\\Models\\Attribute', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (570, 'name', 'Аттрибут23 name', 'ru', 23, 'App\\Modules\\Attribute\\Models\\Attribute', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (571, 'name', 'Attribute24 name', 'us', 24, 'App\\Modules\\Attribute\\Models\\Attribute', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (572, 'name', 'Аттрибут24 name', 'ru', 24, 'App\\Modules\\Attribute\\Models\\Attribute', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (573, 'name', 'Attribute25 name', 'us', 25, 'App\\Modules\\Attribute\\Models\\Attribute', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (574, 'name', 'Аттрибут25 name', 'ru', 25, 'App\\Modules\\Attribute\\Models\\Attribute', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (575, 'name', 'Attribute26 name', 'us', 26, 'App\\Modules\\Attribute\\Models\\Attribute', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (576, 'name', 'Аттрибут26 name', 'ru', 26, 'App\\Modules\\Attribute\\Models\\Attribute', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (577, 'name', 'Attribute27 name', 'us', 27, 'App\\Modules\\Attribute\\Models\\Attribute', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (578, 'name', 'Аттрибут27 name', 'ru', 27, 'App\\Modules\\Attribute\\Models\\Attribute', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (579, 'name', 'Attribute28 name', 'us', 28, 'App\\Modules\\Attribute\\Models\\Attribute', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (580, 'name', 'Аттрибут28 name', 'ru', 28, 'App\\Modules\\Attribute\\Models\\Attribute', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (581, 'name', 'Attribute29 name', 'us', 29, 'App\\Modules\\Attribute\\Models\\Attribute', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (582, 'name', 'Аттрибут29 name', 'ru', 29, 'App\\Modules\\Attribute\\Models\\Attribute', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (583, 'name', 'Attribute30 name', 'us', 30, 'App\\Modules\\Attribute\\Models\\Attribute', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (584, 'name', 'Аттрибут30 name', 'ru', 30, 'App\\Modules\\Attribute\\Models\\Attribute', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (585, 'name', 'Attribute_group1 name', 'us', 1, 'App\\Modules\\Attribute\\Models\\AttributeGroup', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (586, 'name', 'Аттрибут группа1 имя', 'ru', 1, 'App\\Modules\\Attribute\\Models\\AttributeGroup', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (587, 'name', 'Attribute_group2 name', 'us', 2, 'App\\Modules\\Attribute\\Models\\AttributeGroup', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (588, 'name', 'Аттрибут группа2 имя', 'ru', 2, 'App\\Modules\\Attribute\\Models\\AttributeGroup', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (589, 'name', 'Attribute_group3 name', 'us', 3, 'App\\Modules\\Attribute\\Models\\AttributeGroup', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (590, 'name', 'Аттрибут группа3 имя', 'ru', 3, 'App\\Modules\\Attribute\\Models\\AttributeGroup', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (591, 'name', 'Attribute_group4 name', 'us', 4, 'App\\Modules\\Attribute\\Models\\AttributeGroup', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (592, 'name', 'Аттрибут группа4 имя', 'ru', 4, 'App\\Modules\\Attribute\\Models\\AttributeGroup', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (593, 'name', 'Attribute_group5 name', 'us', 5, 'App\\Modules\\Attribute\\Models\\AttributeGroup', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (594, 'name', 'Аттрибут группа5 имя', 'ru', 5, 'App\\Modules\\Attribute\\Models\\AttributeGroup', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (595, 'name', 'Option0 name', 'us', 0, 'App\\Modules\\Option\\Models\\Option', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (596, 'name', 'Опция0 имя', 'ru', 0, 'App\\Modules\\Option\\Models\\Option', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (597, 'name', 'Option1 name', 'us', 1, 'App\\Modules\\Option\\Models\\Option', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (598, 'name', 'Опция1 имя', 'ru', 1, 'App\\Modules\\Option\\Models\\Option', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (599, 'name', 'Option2 name', 'us', 2, 'App\\Modules\\Option\\Models\\Option', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (600, 'name', 'Опция2 имя', 'ru', 2, 'App\\Modules\\Option\\Models\\Option', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (601, 'name', 'Option3 name', 'us', 3, 'App\\Modules\\Option\\Models\\Option', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (602, 'name', 'Опция3 имя', 'ru', 3, 'App\\Modules\\Option\\Models\\Option', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (603, 'name', 'Option4 name', 'us', 4, 'App\\Modules\\Option\\Models\\Option', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (604, 'name', 'Опция4 имя', 'ru', 4, 'App\\Modules\\Option\\Models\\Option', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (605, 'name', 'Option5 name', 'us', 5, 'App\\Modules\\Option\\Models\\Option', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (606, 'name', 'Опция5 имя', 'ru', 5, 'App\\Modules\\Option\\Models\\Option', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (607, 'name', 'Option6 name', 'us', 6, 'App\\Modules\\Option\\Models\\Option', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (608, 'name', 'Опция6 имя', 'ru', 6, 'App\\Modules\\Option\\Models\\Option', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (609, 'name', 'Option7 name', 'us', 7, 'App\\Modules\\Option\\Models\\Option', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (610, 'name', 'Опция7 имя', 'ru', 7, 'App\\Modules\\Option\\Models\\Option', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (611, 'name', 'Option8 name', 'us', 8, 'App\\Modules\\Option\\Models\\Option', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (612, 'name', 'Опция8 имя', 'ru', 8, 'App\\Modules\\Option\\Models\\Option', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (613, 'name', 'Option9 name', 'us', 9, 'App\\Modules\\Option\\Models\\Option', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (614, 'name', 'Опция9 имя', 'ru', 9, 'App\\Modules\\Option\\Models\\Option', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (615, 'name', 'Option10 name', 'us', 10, 'App\\Modules\\Option\\Models\\Option', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (616, 'name', 'Опция10 имя', 'ru', 10, 'App\\Modules\\Option\\Models\\Option', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (617, 'name', 'Option11 name', 'us', 11, 'App\\Modules\\Option\\Models\\Option', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (618, 'name', 'Опция11 имя', 'ru', 11, 'App\\Modules\\Option\\Models\\Option', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (619, 'name', 'Option12 name', 'us', 12, 'App\\Modules\\Option\\Models\\Option', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (620, 'name', 'Опция12 имя', 'ru', 12, 'App\\Modules\\Option\\Models\\Option', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (621, 'name', 'Option13 name', 'us', 13, 'App\\Modules\\Option\\Models\\Option', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (622, 'name', 'Опция13 имя', 'ru', 13, 'App\\Modules\\Option\\Models\\Option', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (623, 'name', 'Option14 name', 'us', 14, 'App\\Modules\\Option\\Models\\Option', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (624, 'name', 'Опция14 имя', 'ru', 14, 'App\\Modules\\Option\\Models\\Option', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (625, 'name', 'Option15 name', 'us', 15, 'App\\Modules\\Option\\Models\\Option', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (626, 'name', 'Опция15 имя', 'ru', 15, 'App\\Modules\\Option\\Models\\Option', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (627, 'name', 'Option16 name', 'us', 16, 'App\\Modules\\Option\\Models\\Option', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (628, 'name', 'Опция16 имя', 'ru', 16, 'App\\Modules\\Option\\Models\\Option', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (629, 'name', 'Option17 name', 'us', 17, 'App\\Modules\\Option\\Models\\Option', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (630, 'name', 'Опция17 имя', 'ru', 17, 'App\\Modules\\Option\\Models\\Option', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (631, 'name', 'Option18 name', 'us', 18, 'App\\Modules\\Option\\Models\\Option', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (632, 'name', 'Опция18 имя', 'ru', 18, 'App\\Modules\\Option\\Models\\Option', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (633, 'name', 'Option19 name', 'us', 19, 'App\\Modules\\Option\\Models\\Option', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (634, 'name', 'Опция19 имя', 'ru', 19, 'App\\Modules\\Option\\Models\\Option', null, null);
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (635, 'name', 'Attribute group 6', 'ru', 10, 'App\\Modules\\Attribute\\Models\\AttributeGroup', '2019-03-18 09:13:30', '2019-03-18 09:13:30');
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (636, 'name', 'Атрибут группа 6', 'us', 10, 'App\\Modules\\Attribute\\Models\\AttributeGroup', '2019-03-18 09:13:30', '2019-03-18 09:13:30');
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (637, 'name', 'Атрибут группа 6', 'ru', 11, 'App\\Modules\\Attribute\\Models\\AttributeGroup', '2019-03-18 09:14:07', '2019-03-18 09:14:07');
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (638, 'name', 'Attribute group 6', 'us', 11, 'App\\Modules\\Attribute\\Models\\AttributeGroup', '2019-03-18 09:14:07', '2019-03-18 09:14:07');
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (639, 'name', 'Аттрибут 10', 'ru', 31, 'App\\Modules\\Attribute\\Models\\Attribute', '2019-03-18 09:14:49', '2019-03-18 09:14:49');
INSERT INTO larashop.translations (id, `key`, value, language_code, localable_id, localable_type, created_at, updated_at) VALUES (640, 'name', 'Attribute 10', 'us', 31, 'App\\Modules\\Attribute\\Models\\Attribute', '2019-03-18 09:14:49', '2019-03-18 09:14:49');