-- Struttura tabella articles
CREATE TABLE IF NOT EXISTS articles (
  id INT(11) NOT NULL AUTO_INCREMENT,
  title VARCHAR(255) NOT NULL,
  subtitle VARCHAR(255),
  description TEXT NOT NULL,
  category_id INT(11) NOT NULL DEFAULT 0,
  created DATETIME NOT NULL,
  modified TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  published BOOLEAN DEFAULT false,
  PRIMARY KEY (id)
) DEFAULT CHARSET=utf8mb4;

