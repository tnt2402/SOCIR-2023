<!-- vscode-markdown-toc -->
* [Access control vulnerabilities](#Accesscontrolvulnerabilities)
	* [Lab 01: Unprotected admin functionality](#Lab01:Unprotectedadminfunctionality)
	* [Lab 02: Unprotected admin functionality with unpredictable URL](#Lab02:UnprotectedadminfunctionalitywithunpredictableURL)
	* [Lab 03: User role controlled by request parameter](#Lab03:Userrolecontrolledbyrequestparameter)
	* [Lab 04: User role can be modified in user profile](#Lab04:Userrolecanbemodifiedinuserprofile)
	* [Lab 05: User ID controlled by request parameter](#Lab05:UserIDcontrolledbyrequestparameter)
	* [Lab 06: User ID controlled by request parameter, with unpredictable user IDs](#Lab06:UserIDcontrolledbyrequestparameterwithunpredictableuserIDs)
	* [Lab 07: User ID controlled by request parameter with data leakage in redirect](#Lab07:UserIDcontrolledbyrequestparameterwithdataleakageinredirect)
	* [Lab 08: User ID controlled by request parameter with password disclosure](#Lab08:UserIDcontrolledbyrequestparameterwithpassworddisclosure)
	* [Lab 09: Insecure direct object references](#Lab09:Insecuredirectobjectreferences)
	* [Lab 10: URL-based access control can be circumvented](#Lab10:URL-basedaccesscontrolcanbecircumvented)
	* [Lab 11: Method-based access control can be circumvented](#Lab11:Method-basedaccesscontrolcanbecircumvented)
	* [Lab 12: Multi-step process with no access control on one step](#Lab12:Multi-stepprocesswithnoaccesscontrolononestep)
	* [Lab 13: Referer-based access control](#Lab13:Referer-basedaccesscontrol)

<!-- vscode-markdown-toc-config
	numbering=false
	autoSave=true
	/vscode-markdown-toc-config -->
<!-- /vscode-markdown-toc -->

[PortSwigger Cheat sheet](https://portswigger.net/web-security/sql-injection/cheat-sheet)

[PortSwigger Labs](https://portswigger.net/web-security/all-labs#sql-injection)

## <a name='Accesscontrolvulnerabilities'></a>Access control vulnerabilities

### <a name='Lab01:Unprotectedadminfunctionality'></a>Lab 01: Unprotected admin functionality
[Link](https://portswigger.net/web-security/access-control/lab-unprotected-admin-functionality)

robots.txt file:
![](imgs/2023-10-10-14-13-58.png)

administrator-panel site:
![](imgs/2023-10-10-14-14-28.png)

![](imgs/2023-10-10-14-14-59.png)

### <a name='Lab02:UnprotectedadminfunctionalitywithunpredictableURL'></a>Lab 02: Unprotected admin functionality with unpredictable URL
[Link](https://portswigger.net/web-security/access-control/lab-unprotected-admin-functionality-with-unpredictable-url)

Tracing the website in Repeater:
![](imgs/2023-10-10-14-20-03.png)

![](imgs/2023-10-10-14-22-36.png)
The html file contains a script that check if user is admin or not.

The original script:
```
<script>
    var isAdmin = false;
    if (isAdmin) {
        var topLinksTag = document.getElementsByClassName("top-links")[0];
        var adminPanelTag = document.createElement('a');
        adminPanelTag.setAttribute('href', '/admin-8utq2b');
        adminPanelTag.innerText = 'Admin panel';
        topLinksTag.append(adminPanelTag);
        var pTag = document.createElement('p');
        pTag.innerText = '|';
        topLinksTag.appendChild(pTag);
    }
</script>
```

I change the isAdmin attribute to true:
![](imgs/2023-10-10-14-27-34.png)

The "Admin Panel" show up:
![](imgs/2023-10-10-14-28-33.png)

![](imgs/2023-10-10-14-28-45.png)

![](imgs/2023-10-10-14-28-58.png)

### <a name='Lab03:Userrolecontrolledbyrequestparameter'></a>Lab 03: User role controlled by request parameter
[Link](https://portswigger.net/web-security/access-control/lab-user-role-controlled-by-request-parameter)

I login using the following credentials wiener:peter
![](imgs/2023-10-10-14-36-08.png)

In the cookie section, there is a "Admin" attribute that has false value.
![](imgs/2023-10-10-14-37-59.png)

I changed the value of the "Admin" attribute in the cookie section.

Refresh the page, now i have admin access.
![](imgs/2023-10-10-14-38-45.png)
![](imgs/2023-10-10-14-39-01.png)
![](imgs/2023-10-10-14-39-15.png)

### <a name='Lab04:Userrolecanbemodifiedinuserprofile'></a>Lab 04: User role can be modified in user profile
[Link](https://portswigger.net/web-security/access-control/lab-user-role-can-be-modified-in-user-profile)

I login using the following credentials wiener:peter
![](imgs/2023-10-10-14-42-12.png)

There is a Post request when you change the email
Add "roleid" to the json body of the request.
![](imgs/2023-10-10-14-51-12.png)

The information of wiener user is updated with the "roleid" value is 2 now.

Refresh the page
![](imgs/2023-10-10-14-52-30.png)

![](imgs/2023-10-10-14-52-45.png)

![](imgs/2023-10-10-14-52-58.png)

### <a name='Lab05:UserIDcontrolledbyrequestparameter'></a>Lab 05: User ID controlled by request parameter
[Link](https://portswigger.net/web-security/access-control/lab-user-id-controlled-by-request-parameter)

I login using the following credentials wiener:peter

/my-account?id=carlos

![](imgs/2023-10-10-14-58-57.png)

![](imgs/2023-10-10-14-59-20.png)

### <a name='Lab06:UserIDcontrolledbyrequestparameterwithunpredictableuserIDs'></a>Lab 06: User ID controlled by request parameter, with unpredictable user IDs
[Link](https://portswigger.net/web-security/access-control/lab-user-id-controlled-by-request-parameter-with-unpredictable-user-ids)

I login using the following credentials wiener:peter
![](imgs/2023-10-10-15-03-32.png)

We need to find the ID of user "carlos"
This blog post was created by "carlos"
![](imgs/2023-10-10-15-08-04.png)

![](imgs/2023-10-10-15-08-42.png)

So the ID of "carlos" is "4f983854-ad06-4c17-8126-db5452a85956"

![](imgs/2023-10-10-15-09-37.png)

Submit his API key
![](imgs/2023-10-10-15-10-11.png)

### <a name='Lab07:UserIDcontrolledbyrequestparameterwithdataleakageinredirect'></a>Lab 07: User ID controlled by request parameter with data leakage in redirect
[Link](https://portswigger.net/web-security/access-control/lab-user-id-controlled-by-request-parameter-with-data-leakage-in-redirect)



I login using the following credentials wiener:peter
Then i changed id in the URL as /my-account?id=carlos
![](imgs/2023-10-10-15-13-04.png)

There is a redirect after the request to /my-account?id=carlos, but the response still there

Submit his API key:
![](imgs/2023-10-10-15-14-55.png)

### <a name='Lab08:UserIDcontrolledbyrequestparameterwithpassworddisclosure'></a>Lab 08: User ID controlled by request parameter with password disclosure
[Link](https://portswigger.net/web-security/access-control/lab-user-id-controlled-by-request-parameter-with-password-disclosure)

I login using the following credentials wiener:peter
![](imgs/2023-10-10-15-16-35.png)

![](imgs/2023-10-10-15-22-54.png)
In the response, the password field show the real password of the login user.

Change the id in the URL to administrator:
![](imgs/2023-10-10-15-20-07.png)

![](imgs/2023-10-10-15-23-58.png)

So the password of "administrator" is "dtpf871eld5ngan11tx1".

![](imgs/2023-10-10-15-24-46.png)

![](imgs/2023-10-10-15-25-01.png)

### <a name='Lab09:Insecuredirectobjectreferences'></a>Lab 09: Insecure direct object references
[Link](https://portswigger.net/web-security/access-control/lab-insecure-direct-object-references)

![](imgs/2023-10-10-15-26-25.png)
This is the livechat site

![](imgs/2023-10-10-15-32-02.png)
When you view transcript, a transcript file will be downloaded.
![](imgs/2023-10-10-15-33-12.png)

The filename is increased, started from 2.
So i send a request to get the 1.txt transcript file :>
![](imgs/2023-10-10-15-34-08.png)

The password is "e1635ok1wtu09pcyeo80"

Login to carlos account
![](imgs/2023-10-10-15-35-22.png)

### <a name='Lab10:URL-basedaccesscontrolcanbecircumvented'></a>Lab 10: URL-based access control can be circumvented
[Link](https://portswigger.net/web-security/access-control/lab-url-based-access-control-can-be-circumvented)

X-Original-URL header can be used to control the behavior of the server.

![](imgs/2023-10-11-04-50-55.png)

I can send a similar POST request to the server and append the X-Original-URL header to it. The value of the X-Original-URL header is "/admin" - which means that the server will navigate to the /admin page.

Send the POST request to the server and then show the response in the browser
![](imgs/2023-10-11-04-53-02.png)
![](imgs/2023-10-11-04-52-37.png)

This works ~uwu~

I want to delete the "carlos" user. The website must navigate to "admin/delete?username=carlos". So i update the X-Original-URL field above to "admin/delete" and resend the request to "?username=carlos".

![](imgs/2023-10-11-05-13-20.png)

![](imgs/2023-10-11-05-13-39.png)

### <a name='Lab11:Method-basedaccesscontrolcanbecircumvented'></a>Lab 11: Method-based access control can be circumvented
[Link](https://portswigger.net/web-security/access-control/lab-method-based-access-control-can-be-circumvented)

I tried to downgrade user "wiener" to admin
![](imgs/2023-10-11-05-23-20.png)

So i can send a request to "/admin-roles" with parameters "username" and "action" to upgrade/downgrade an user. The cookie is needed to be authorized.

Also the METHOD need to be changed to "GET".
![](imgs/2023-10-11-05-26-10.png)

![](imgs/2023-10-11-05-26-41.png)

### <a name='Lab12:Multi-stepprocesswithnoaccesscontrolononestep'></a>Lab 12: Multi-step process with no access control on one step
[Link](https://portswigger.net/web-security/access-control/lab-multi-step-process-with-no-access-control-on-one-step)

I login as administrator and attempt to upgrade an user account
![](imgs/2023-10-11-05-40-24.png)

The POST request requires the following parameters "username", "comfirmed", "action"

I logout the administrator, then login as "wiener" user
![](imgs/2023-10-11-05-41-56.png)

Copy the cookie of the user login session to authorized.

Send a POST request to "/admin-roles" with the copied cookie
![](imgs/2023-10-11-05-43-12.png)

![](imgs/2023-10-11-05-43-41.png)

### <a name='Lab13:Referer-basedaccesscontrol'></a>Lab 13: Referer-based access control
[Link](https://portswigger.net/web-security/access-control/lab-referer-based-access-control)

I login as administrator and attempt to upgrade an user account
![](imgs/2023-10-11-05-48-27.png)

I logout the administrator, then login as "wiener" user

Send a POST request to "/admin-roles" to upgrade the "wiener" user account. i added the Referer header to the request.
![](imgs/2023-10-11-05-50-29.png)

![](imgs/2023-10-11-05-51-35.png)