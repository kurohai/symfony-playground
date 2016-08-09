

### SCP to Remote with RSA Key

```bash
eval `ssh-agent -s`
ssh-add $G/hc-test/.ssh/HCTest.pem
scp ...
```


### Remove Password from RSA Key (DDTAH) ###

```bash
openssl rsa -in /root/.ssh/dev.kurohai.com.rsa -out /root/.ssh/dev.kurohai.com.rsa
```
