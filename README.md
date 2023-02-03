# monkey_vuln_machine
Repository in which there is a machine with vulnerabilities for people who are starting in the world of cybersecurity.

## Deploy


```bash
git clone https://github.com/wanetty/monkey_vuln_machine.git
cd monkey_vuln_machine
sudo docker-compose up -d
```

### Get IP of machines

```bash
sudo docker container inspect monkey_vuln_machine-apache-1 | grep -i ipaddress
```



## ABOUT

Created by [@gm_eduard](https://twitter.com/gm_eduard/) 

If you have any questions or suggestions, do not hesitate to contact me via MD. If you want to upload a writeup is welcome.
