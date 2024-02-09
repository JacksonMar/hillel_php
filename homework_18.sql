CREATE DATABASE hillel;

USE hillel;

CREATE TABLE users (
                       id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
                       username VARCHAR(255) NOT NULL UNIQUE,
                       email VARCHAR(255) UNIQUE NOT NULL,
                       password VARCHAR(255) NOT NULL,
                       bio TEXT DEFAULT NULL,
                       profile_picture TEXT DEFAULT NULL,
                       created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                       updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO users (username, email, password) VALUES
                                                  ('alice123', 'alice@example.com', 'password1'),
                                                  ('bob456', 'bob@example.com', 'password2'),
                                                  ('charlie789', 'charlie@example.com', 'password3');

CREATE TABLE posts (
                       id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
                       user_id INT UNSIGNED NOT NULL,
                       title VARCHAR(255) NOT NULL,
                       content TEXT NOT NULL,
                       published BOOLEAN DEFAULT FALSE,
                       created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                       updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                       FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO posts (user_id, title, content) VALUES
                                                (1, 'My First Blog Post', 'This is my first blog post, and I\'m excited to share it with you!'),
                                                (2, 'Exploring Data Science', 'In this post, I\'ll delve into the exciting world of data science...'),
                                                (3, 'Tips for Effective Writing', 'Want to improve your writing skills? Check out these helpful tips...'),
                                                (1, 'Travel Adventures in Europe', 'Sharing my recent backpacking trip across Europe...'),
                                                (2, 'Building a Machine Learning Model', 'A step-by-step guide to building a simple machine learning model...'),
                                                (3, 'The Power of Storytelling', 'Why storytelling is crucial for effective communication...'),
                                                (2, 'My Favorite Books of 2023', 'Sharing my top book recommendations for the year...'),
                                                (3, 'Productivity Hacks for Busy People', 'Get things done with these valuable productivity tips...');

CREATE TABLE tags (
                      id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
                      title VARCHAR(255) NOT NULL UNIQUE,
                      created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                      updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO tags (title) VALUES
                             ('travel'),
                             ('data_science'),
                             ('writing'),
                             ('machine_learning'),
                             ('productivity'),
                             ('books'),
                             ('life');

CREATE TABLE posts_tags (
                            id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
                            post_id INT UNSIGNED NOT NULL,
                            tag_id INT UNSIGNED NOT NULL,
                            FOREIGN KEY (post_id) REFERENCES posts(id),
                            FOREIGN KEY (tag_id) REFERENCES tags(id)
);

INSERT INTO posts_tags (post_id, tag_id) VALUES
                                             (1, 1),
                                             (2, 2),
                                             (3, 3),
                                             (4, 1),
                                             (5, 2),
                                             (6, 3),
                                             (7, 2),
                                             (8, 5),
                                             (2, 7),
                                             (4, 7);

SELECT id, username, email, bio FROM users;
SELECT id, title, content, user_id FROM posts WHERE published = TRUE AND LENGTH(title) > 30 ORDER BY title DESC;
SELECT title FROM posts WHERE user_id = 2;

SELECT tags.title AS tag_title, COUNT(*) AS number_of_posts
FROM tags
         INNER JOIN posts_tags ON posts_tags.tag_id = tags.id
GROUP BY tags.id
ORDER BY number_of_posts DESC
    LIMIT 5;

UPDATE posts
SET title = 'Новий заголовок',
    content = 'Оновлений текст публікації'
WHERE id = 5;

DELETE FROM users
WHERE username = 'bob456';

DELETE FROM posts
WHERE user_id = (SELECT id FROM users WHERE username = 'alice123');
