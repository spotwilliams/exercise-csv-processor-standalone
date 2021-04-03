create table users
(
    id serial not null
        constraint users_pk
            primary key,
    username varchar not null,
    password varchar not null
);

alter table users owner to catexercise;

create table products
(
    id serial not null
        constraint products_pk
            primary key,
    city varchar not null,
    product varchar not null,
    units integer,
    price integer not null,
    sales integer default 0 not null,
    user_id integer not null
        constraint products_user_id_fk
            references users
            on update cascade on delete cascade
);

alter table products owner to catexercise;

create table formulas
(
    id serial not null
        constraint formulas_pk
            primary key,
    name varchar not null,
    operator varchar not null,
    arguments varchar not null,
    user_id integer not null
        constraint formulas__user_id_fk
            references users
            on update cascade on delete cascade
);

alter table formulas owner to catexercise;

create unique index formulas_id_uindex
    on formulas (id);

create unique index users_id_uindex
    on users (id);

create unique index users_username_uindex
    on users (username);

INSERT INTO public.users (id, username, password) VALUES (1, 'admin', '$2y$10$JWnWkCECF297EIioG54G6uTR5FLoJoDb/QdkYQyfwDhSPIeYOTFia');