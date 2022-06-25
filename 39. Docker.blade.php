----------------------------------
Docker install linux
----------------------------------
sudo apt install docker.io
docker --version

----------------------------------
To check Docker status
----------------------------------
sudo systemctl status docker 

----------------------------------
To run/enable Docker 
----------------------------------
sudo systemctl enable --now docker

----------------------------------
To run
----------------------------------
sudo docker run hello-world


----------------------------------
all local images
----------------------------------
sudo docker images
sudo apt-get update

docker run -d -p 80:80 docker/getting-started


apt install neofetch
neofetch

