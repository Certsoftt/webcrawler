-- Table: crawler_sources
CREATE TABLE crawler_sources (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    url VARCHAR(255) NOT NULL,
    type VARCHAR(255) DEFAULT 'html',
    active BOOLEAN DEFAULT TRUE,
    meta JSON NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table: crawler_logs
CREATE TABLE crawler_logs (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    level VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    source VARCHAR(255) NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table: crawled_opportunities
CREATE TABLE crawled_opportunities (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    summary TEXT NULL,
    content LONGTEXT NOT NULL,
    type VARCHAR(255) NOT NULL,
    source_url VARCHAR(255) NOT NULL,
    language VARCHAR(8) DEFAULT 'en',
    status VARCHAR(255) DEFAULT 'draft',
    meta JSON NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
