--
-- テーブルの構造 `book` 書籍
--

CREATE TABLE `book` (
  `book_id` int(10) unsigned NOT NULL PRIMARY KEY,
  `category_id` INT(10) unsigned NOT NULL, -- カテゴリーID
  `publisher_id` INT(10) unsigned NOT NULL, -- 出版社ID
  `title` VARCHAR(64),
  `author_id` INT(10) unsigned NOT NULL, -- 著者ID
  `detail` TEXT,
  `price` INT(10) unsigned,
  `publication_date` DATE,
  `del_flg` INT(1) DEFAULT 0,
  `create_date` TIMESTAMP,
  `update_date` TIMESTAMP
   ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルの構造 `category` カテゴリー
--

CREATE TABLE `category` (
  `category_id` int(10) unsigned NOT NULL PRIMARY KEY,
  `parent_category_id` int(10) unsigned NOT NULL DEFAULT 0,
  `name` VARCHAR(64),
  `sort` int(10),
  `del_flg` INT(1) DEFAULT 0,
  `create_date` TIMESTAMP,
  `update_date` TIMESTAMP
   ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルの構造 `publisher` 出版社
--

CREATE TABLE `publisher` (
  `publisher_id` int(10) unsigned NOT NULL PRIMARY KEY,
  `name` VARCHAR(64),
  `sort` int(10),
  `del_flg` INT(1) DEFAULT 0,
  `create_date` TIMESTAMP,
  `update_date` TIMESTAMP
   ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルの構造 `author` 著者
--

CREATE TABLE `author` (
  `author_id` int(10) unsigned NOT NULL PRIMARY KEY,
  `name` VARCHAR(64),
  `sort` int(10),
  `del_flg` INT(1) DEFAULT 0,
  `create_date` TIMESTAMP,
  `update_date` TIMESTAMP
   ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルの構造 `sequence` シーケンス
--

DROP TABLE IF EXISTS sequence;
CREATE TABLE sequence (
    name VARCHAR(50) NOT NULL,
    current_value INT unsigned NOT NULL,
    increment INT NOT NULL DEFAULT 1,
    PRIMARY KEY (name)
) ENGINE=InnoDB;

DROP FUNCTION IF EXISTS currval;
DELIMITER $
CREATE FUNCTION currval (seq_name VARCHAR(50))
    RETURNS INTEGER
    LANGUAGE SQL
    DETERMINISTIC
    CONTAINS SQL
    SQL SECURITY DEFINER
    COMMENT ''
BEGIN
    DECLARE value INTEGER;
    SET value = 0;
    SELECT current_value INTO value
        FROM sequence
        WHERE name = seq_name;
    RETURN value;
END
$
DELIMITER ;

DROP FUNCTION IF EXISTS nextval;
DELIMITER $
CREATE FUNCTION nextval (seq_name VARCHAR(50))
    RETURNS INTEGER
    LANGUAGE SQL
    DETERMINISTIC
    CONTAINS SQL
    SQL SECURITY DEFINER
    COMMENT ''
BEGIN
    UPDATE sequence
    SET current_value = current_value + increment
    WHERE name = seq_name;
    RETURN currval(seq_name);
END
$
DELIMITER ;

DROP FUNCTION IF EXISTS setval;
DELIMITER $
CREATE FUNCTION setval (seq_name VARCHAR(50), value INTEGER)
    RETURNS INTEGER
    LANGUAGE SQL
    DETERMINISTIC
    CONTAINS SQL
    SQL SECURITY DEFINER
    COMMENT ''
BEGIN
    UPDATE sequence
    SET current_value = value
    WHERE name = seq_name;
    RETURN currval(seq_name);
END
$
DELIMITER ;