[PortSwigger Cheat sheet](https://portswigger.net/web-security/sql-injection/cheat-sheet)

[PortSwigger Labs](https://portswigger.net/web-security/deserialization)

## Insecure deserialization

### Lab 01: Modifying serialized objects
[Link](https://portswigger.net/web-security/deserialization/exploiting/lab-deserialization-modifying-serialized-objects)


![](imgs/2023-10-23-16-53-02.png)

![](imgs/2023-10-23-16-54-50.png)

```
Cookie: Tzo0OiJVc2VyIjoyOntzOjg6InVzZXJuYW1lIjtzOjY6IndpZW5lciI7czo1OiJhZG1pbiI7YjowO30%3d

B64 Decode: O:4:"User":2:{s:8:"username";s:6:"wiener";s:5:"admin";b:0;}
```

![](imgs/2023-10-23-17-04-15.png)

![](imgs/2023-10-23-16-58-15.png)

![](imgs/2023-10-23-16-58-45.png)

### Lab 02: Modifying serialized data types
[Link](https://portswigger.net/web-security/deserialization/exploiting/lab-deserialization-modifying-serialized-data-types)



![](imgs/2023-10-23-17-07-16.png)

```
Cookie: Tzo0OiJVc2VyIjoyOntzOjg6InVzZXJuYW1lIjtzOjY6IndpZW5lciI7czoxMjoiYWNjZXNzX3Rva2VuIjtzOjMyOiJ0aHVzYjdoeXIyd28yOTF0bGNkaWJkYmEweWoydzRjbiI7fQ%3d%3d

B64 Decode: 
O:4:"User":2:{s:8:"username";s:6:"wiener";s:12:"access_token";s:32:"thusb7hyr2wo291tlcdibdba0yj2w4cn";}
```