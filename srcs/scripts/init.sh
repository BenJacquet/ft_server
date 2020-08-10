docker build -t debbuster .
docker run -it --name webhost -p 80:80 -p 443:443 debbuster
echo "\x1b[32mAll good !"