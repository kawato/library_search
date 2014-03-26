--
-- テーブルの構造 `book` 書籍
--
insert into book values('1','1','1','タイトル１','1','詳細１','100','1997/3/4','0',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
insert into book values('2','2','1','タイトル２','1','詳細２','110','1997/3/5','0',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
insert into book values('3','3','2','タイトル３','2','詳細３','1000','1997/3/6','0',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
insert into book values('4','4','2','タイトル４','2','詳細４','2900','2010/3/7','0',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
insert into book values('5','12','3','タイトル５','2','詳細５','3000','1997/3/8','0',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
insert into book values('6','13','3','タイトル６','3','詳細６','2700','1997/3/9','0',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
insert into book values('7','14','4','タイトル７','3','詳細７','1800','2007/3/10','0',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
insert into book values('8','15','4','タイトル８','3','詳細８','2100','1997/3/11','0',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
insert into book values('9','16','5','タイトル９','4','詳細９','2200','2009/3/12','0',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
insert into book values('10','17','5','タイトル１０','5','詳細１０','1900','2004/3/13','0',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
insert into book values('11','18','5','タイトル１１','6','詳細１１','2000','2003/3/14','0',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
insert into book values('12','19','6','タイトル１２','6','詳細１２','1000','2011/3/15','0',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
insert into book values('13','20','7','タイトル１３','7','詳細１３','1300','2014/3/16','0',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);

--
-- テーブルの構造 `category` カテゴリー
--
INSERT INTO category values('1','0','文学・評論','1','0',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO category values('2','0','人文・思想','2','0',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO category values('3','0','社会・政治･法律','3','0',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO category values('4','0','ノンフィクション','4','0',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO category values('5','0','歴史・地理','5','0',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO category values('6','0','ビジネス・経済','6','0',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO category values('7','0','投資・金融・会社経営','7','0',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO category values('8','0','科学・テクノロジー','8','0',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO category values('9','0','医学・薬学・看護学・歯科学','9','0',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO category values('10','0','コンピュータ・IT','10','0',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO category values('11','0','アート・建築・デザイン','11','0',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);

INSERT INTO category values('12','1','文芸作品','1','0',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO category values('13','1','歴史・時代小説','2','0',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO category values('14','1','経済・社会小説','3','0',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO category values('15','1','ミステリー・サスペンス・ハードボイルド','4','0',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO category values('16','1','SF・ホラー・ファンタジー','5','0',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);

INSERT INTO category values('17','10','一般・入門書','1','0',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO category values('18','10','プログラミング','2','0',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO category values('19','10','コンピュータサイエンス','3','0',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO category values('20','10','アプリケーション','4','0',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO category values('21','10','ハードウェア・周辺機器','5','0',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO category values('22','10','データベース','6','1',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);

--
-- テーブルの構造 `publisher` 出版社
--
INSERT INTO publisher values('1','あ書店','1','0',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO publisher values('2','い書店','1','0',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO publisher values('3','う書店','1','0',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO publisher values('4','え書店','1','0',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO publisher values('5','わかば出版','1','0',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO publisher values('6','あおば出版','1','0',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO publisher values('7','めかぶ出版','1','0',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);


--
-- テーブルの構造 `author` 著者
--
INSERT INTO author values('1','武田信玄','1','0',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO author values('2','北条早雲','1','0',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO author values('3','真田幸村','1','0',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO author values('4','明智光秀','1','0',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO author values('5','毛利元就','1','0',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO author values('6','黒田長政','1','0',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO author values('7','加藤清正','1','0',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);

--
-- テーブルの構造 `sequence`
--
INSERT INTO sequence(name,current_value) values('book_id','0');
INSERT INTO sequence(name,current_value) values('category_id','0');
INSERT INTO sequence(name,current_value) values('publisher_id','0');
INSERT INTO sequence(name,current_value) values('author_id','0');
