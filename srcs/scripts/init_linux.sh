docker build -t debbuster ../..
docker run -it --name webhost -p 8080:80 -p 443:443 debbuster