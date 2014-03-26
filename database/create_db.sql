create database library_search default character set utf8;
create database library_search_d default character set utf8;
create database library_search_t default character set utf8;

grant all on library_search.* to library_search@'localhost' identified by 'library_search';
grant all on library_search_dev.* to library_search_d@'localhost' identified by 'library_search_d';
grant all on library_search_test.* to library_search_t@'localhost' identified by 'library_search_t';


